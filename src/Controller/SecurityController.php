<?php

namespace App\Controller;

use App\Repository\GarageHoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils ,GarageHoursRepository $garageHoursRepository): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $this->redirectToRoute('app_main');
        $this->addFlash('success', 'Connexion reussi');

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error,
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): void
    {
        $this->redirectToRoute('app_main');
        $this->addFlash('success','Vous êtes déconnecté');
      


        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
