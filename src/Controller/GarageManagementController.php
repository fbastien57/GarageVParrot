<?php

namespace App\Controller;

use App\Entity\BodyServices;
use App\Entity\GarageHours;
use App\Entity\MechanicsServices;
use App\Form\BodyFormType;
use App\Form\HoursFormType;
use App\Form\MecaFormType;
use App\Repository\BodyServicesRepository;
use App\Repository\GarageHoursRepository;
use App\Repository\MechanicsServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion_garage', name: 'app_garage_')]
class GarageManagementController extends AbstractController
{
    #[Route('/', name: 'management')]
    public function management(Request $request , EntityManagerInterface $em , MechanicsServicesRepository $meca , BodyServicesRepository $body , GarageHoursRepository $hour ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageManagement.html.twig', [
            
            'mecas' => $meca->findAll(),
            'bodys' => $body->findAll(),
            'hours' => $hour->findAll(),
        ]);

    }

    #[Route('/ajout_meca', name: 'addM')]
    public function addMeca(Request $request , EntityManagerInterface $em ,GarageHoursRepository $hour): Response
    {
        $mecaServices = new MechanicsServices();

        $mecaServicesForm = $this->createForm(MecaFormType::class, $mecaServices);

        $mecaServicesForm->handleRequest($request);

        if ($mecaServicesForm->isSubmitted() && $mecaServicesForm->isValid()) {
        
            $em->persist($mecaServices);
            $em->flush();

            $this->addFlash('success','Service mécanique ajouté avec succés');
            return $this->redirectToRoute('app_garage_management');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageMecaAdd.html.twig', [
            'mecaServicesForm' => $mecaServicesForm->createView(),
            'hours' => $hour->findAll(),
        ]);
    }

    #[Route('/modification_meca/{id}', name: 'editM')]
    public function editMeca(Request $request , EntityManagerInterface $em , MechanicsServices $mecaServices, GarageHoursRepository $hour): Response
    {

        $mecaServicesForm = $this->createForm(MecaFormType::class, $mecaServices);

        $mecaServicesForm->handleRequest($request);

        if ($mecaServicesForm->isSubmitted() && $mecaServicesForm->isValid()) {
        
            $em->persist($mecaServices);
            $em->flush();

            $this->addFlash('success','Service mécanique Modifié avec succés');
            return $this->redirectToRoute('app_garage_management');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageMecaEdit.html.twig', [
            'mecaServicesForm' => $mecaServicesForm->createView(),
            'hours' => $hour->findAll(),
        ]);
    }
    
    #[Route('/suppression_meca/{id}', name: 'deleteM')]
    public function deleteMeca(EntityManagerInterface $em, MechanicsServices $mecaServices, MechanicsServicesRepository $meca ,BodyServicesRepository $body ,GarageHoursRepository $hour): Response
    {

        if(!$mecaServices){
            $this->addFlash('warning','Service mécanique non trouvé');
        }
        
        $em->remove($mecaServices);
        $em->flush();
        
        $this->addFlash('success','Service supprimé avec succés');

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageManagement.html.twig', [
            'mecas' => $meca->findAll(),
            'bodys' => $body->findAll(),
            'hours' => $hour->findAll(),
        ]);
    }

    #[Route('/ajout_body', name: 'addB')]
    public function addBody(Request $request , EntityManagerInterface $em , BodyServicesRepository $body ,GarageHoursRepository $hour): Response
    {
        $bodyServices = new BodyServices();

        $bodyServicesForm = $this->createForm(BodyFormType::class, $bodyServices);

        $bodyServicesForm->handleRequest($request);

        if ($bodyServicesForm->isSubmitted() && $bodyServicesForm->isValid()) {
        
            $em->persist($bodyServices);
            $em->flush();

            $this->addFlash('success','Service carosserie ajouté avec succés');

            return $this->redirectToRoute('app_garage_management');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageBodyAdd.html.twig', [
            'bodyServicesForm' => $bodyServicesForm->createView(),
            'hours' => $hour->findAll(),
        ]);
    }

    #[Route('/modifier_body/{id}', name: 'editB')]
    public function EditBody(Request $request , EntityManagerInterface $em , BodyServices $bodyServices ,GarageHoursRepository $hour): Response
    {

        $bodyServicesForm = $this->createForm(BodyFormType::class, $bodyServices);

        $bodyServicesForm->handleRequest($request);

        if ($bodyServicesForm->isSubmitted() && $bodyServicesForm->isValid()) {
        
            $em->persist($bodyServices);
            $em->flush();

            $this->addFlash('success','Service carosserie modifié avec succés');
            return $this->redirectToRoute('app_garage_management');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageBodyEdit.html.twig', [
            'bodyServicesForm' => $bodyServicesForm->createView(),
            'hours' => $hour->findAll(),
        ]);
    }
    
    #[Route('/suppression_body/{id}', name: 'deleteB')]
    public function deleteBody(EntityManagerInterface $em, BodyServices $bodyServices, BodyServicesRepository $body ,MechanicsServicesRepository $meca ,GarageHoursRepository $hour): Response
    {

        if(!$bodyServices){
            $this->addFlash('warning','Service non trouvé');
        }
        
        $em->remove($bodyServices);
        $em->flush();

        
        $this->redirectToRoute('app_garage_management');
        
        $this->addFlash('success','Service supprimé avec succés');

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('garage_management/garageManagement.html.twig', [
            'mecas' => $meca->findAll(),
            'bodys' => $body->findAll(),
            'hours' => $hour->findAll(),
        ]);
    }

    #[Route('/ajout_Hours', name: 'addH')]
    public function addHours(Request $request , EntityManagerInterface $em ,GarageHoursRepository $hour): Response
    {
        $hoursServices = new GarageHours();

        $hoursServicesForm = $this->createForm(HoursFormType::class, $hoursServices);

        $hoursServicesForm->handleRequest($request);

        if ($hoursServicesForm->isSubmitted() && $hoursServicesForm->isValid()) {
        
            $em->persist($hoursServices);
            $em->flush();

            $this->addFlash('success','Horaires ajoutés avec succés');
            return $this->redirectToRoute('app_garage_management');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageHoursAdd.html.twig', [
            'hoursServicesForm' => $hoursServicesForm->createView(),
            'hours' => $hour->findAll(),
        ]);
    }
    
    #[Route('/edit_hours/{id}', name: 'editH')]
    public function editHours(Request $request , EntityManagerInterface $em , GarageHours $hoursServices ,GarageHoursRepository $hour): Response
    {

        $hoursServicesForm = $this->createForm(HoursFormType::class, $hoursServices);

        $hoursServicesForm->handleRequest($request);

        if ($hoursServicesForm->isSubmitted() && $hoursServicesForm->isValid()) {
        
            $em->persist($hoursServices);
            $em->flush();

            $this->addFlash('success','Horaires ajoutés avec succés');
            return $this->redirectToRoute('app_garage_management');
            
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageHoursEdit.html.twig', [
            'hoursServicesForm' => $hoursServicesForm->createView(),
            'hours' => $hour->findAll(),
        ]);
    }

    #[Route('/suppression/{id}', name: 'deleteH')]
    public function DeleteHours(EntityManagerInterface $em, GarageHours $hoursServices, BodyServicesRepository $body ,MechanicsServicesRepository $meca ,GarageHoursRepository $hour): Response
    {

        if(!$hoursServices){
            $this->addFlash('warning','Horaires non trouvés');
        }
        
        $em->remove($hoursServices);
        $em->flush();

        
        $this->redirectToRoute('app_garage_management');
        
        $this->addFlash('success','Horaires supprimés avec succés');

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('garage_management/garageManagement.html.twig', [
            'mecas' => $meca->findAll(),
            'bodys' => $body->findAll(),
            'hours' => $hour->findAll(),
        ]);
    }



}
