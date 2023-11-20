<?php

namespace App\Controller;

use App\Repository\BodyServicesRepository;
use App\Repository\CommentsRepository;
use App\Repository\GarageHoursRepository;
use App\Repository\MechanicsServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CommentsRepository $commentsRepository , MechanicsServicesRepository $mechanicsRepository , BodyServicesRepository $bodysRepository , GarageHoursRepository $garageHoursRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'comments' => $commentsRepository->findAll(),
            'mecas' => $mechanicsRepository->findAll(),
            'bodys' => $bodysRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }
}
