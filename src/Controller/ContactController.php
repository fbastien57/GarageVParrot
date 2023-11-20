<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactFormType;
use App\Repository\ContactsRepository;
use App\Repository\GarageHoursRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact', name: 'app_contact_')]
class ContactController extends AbstractController
{
    #[Route('/formulaire', name: 'form')]
    public function formulaire(Request $request , EntityManagerInterface $em ,GarageHoursRepository $garageHoursRepository): Response
    {
        $contact = new Contacts();

        $contactForm = $this->createForm(ContactFormType::class, $contact);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {

            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', 'demande de contact envoyée avec succés');
            return $this->redirectToRoute('app_main');
        }



        return $this->render('contact/contactForm.html.twig', [
            'contactForm' => $contactForm->createView(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/liste', name: 'list')]
    public function management(ContactsRepository $contactsRepository ,GarageHoursRepository $garageHoursRepository): Response
    {

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('contact/contactList.html.twig', [
            'contacts' => $contactsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function deleteCars(EntityManagerInterface $em, Contacts $contacts , ContactsRepository $contactRepository ,GarageHoursRepository $garageHoursRepository): Response
    {

        if(!$contacts){
            $this->addFlash('warning','Demande de contact non trouvé');
        }
        
        $em->remove($contacts);
        $em->flush();

        $this->addFlash('success','Demande de contact supprimé avec succés');

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('contact/contactList.html.twig', [
            'contacts' => $contactRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }
}
