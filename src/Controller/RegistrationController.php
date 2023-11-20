<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\GarageHoursRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;

#[Route('/gestion_utilisateurs', name: 'app_register_')]
class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'add')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager ,GarageHoursRepository $garageHoursRepository): Response
    {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            //récupération de l'image
            $pictureFile = $form->get('picture')->getData();

            //deplacement de l'image 

            if ($pictureFile) {
                $fichier = md5(uniqid()) . '.' . $pictureFile->guessExtension();
 
                $pictureFile->move(
                    $this->getParameter('pictures_directory'),
                    $fichier, 
                );
            }
 
            $user->setPicture($fichier);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_register_list');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager ,Users $user,GarageHoursRepository $garageHoursRepository): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $userPicture = $user->getPicture();
            $pathToFile = $this->getParameter('pictures_directory').$userPicture;
            if(file_exists($pathToFile)){
                unlink($pathToFile);
            }
            
            //récupération de l'image
            $pictureFile = $form->get('picture')->getData();

            //deplacement de l'image 

            if ($pictureFile) {
                $fichier = md5(uniqid()) . '.' . $pictureFile->guessExtension();
 
                $pictureFile->move(
                    $this->getParameter('pictures_directory'),
                    $fichier, 
                );
            }

            $user->setPicture($fichier);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_register_list');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('registration/edit.html.twig', [
            'registrationForm' => $form->createView(),
            'hours' => $garageHoursRepository->findAll(),
            'user' => $user
        ]);
    }

    #[Route('/liste', name: 'list')]
    public function usersList(UsersRepository $usersRepository ,GarageHoursRepository $garageHoursRepository  ): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('registration/list.html.twig', [
            'users' => $usersRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    
    #[Route('/suppression/{id}', name: 'delete')]
    public function deleteUsers(UsersRepository $usersRepository , EntityManagerInterface $em , Users $user ,GarageHoursRepository $garageHoursRepository, Filesystem $filesystem): Response
    {

        if(!$user){
            $this->addFlash('warning','le utilsateur non trouvé');
        }

        $userPicture = $user->getPicture();
        $pathToFile = $this->getParameter('pictures_directory').$userPicture;
        if(file_exists($pathToFile)){
            unlink($pathToFile);
        }
        
        $em->remove($user);
        $em->flush();

        $this->addFlash('success','Utilisateur supprimé avec succés');


        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('registration/list.html.twig', [
            'users' => $usersRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }
}