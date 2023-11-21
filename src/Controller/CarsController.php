<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Cars;
use App\Form\SearchFormType;
use App\Repository\CarsRepository;
use App\Repository\GarageHoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/véhicules', name: 'app_cars_')]
class CarsController extends AbstractController
{
    #[Route('/liste_des_véhicules', name: 'list')]
    public function CarsList(CarsRepository $carsRepository , GarageHoursRepository $garageHoursRepository , Request $request): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchFormType::class, $data);
        $form->handleRequest($request);
        //dd($data);
        $cars = $carsRepository->findSearch($data);

        return $this->render('cars/carList.html.twig', [
            'cars'=> $cars,
            'hours' => $garageHoursRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }


    #[Route('/details/{id}', name: 'details')]
    public function CarsDetails( Cars $cars, CarsRepository $carsRepository ,GarageHoursRepository $garageHoursRepository): Response
    {
        $carsDetails = $carsRepository->find($cars->getId());
        return $this->render('cars/carDetails.html.twig', [
           'cars'=> $carsDetails,
           'hours' => $garageHoursRepository->findAll(),
        ]);
    }
}

