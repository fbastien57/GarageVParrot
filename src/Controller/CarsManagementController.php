<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Form\CarsFormType;
use App\Repository\CarsRepository;
use App\Repository\GarageHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion_des_véhicules', name: 'app_cars_management_')]
class CarsManagementController extends AbstractController
{
    #[Route('/ajouter', name: 'add')]
    public function AddCars(Request $request , EntityManagerInterface $em ,GarageHoursRepository $garageHoursRepository): Response
    {
        //creation nouveau véhicule
        $car = new Cars();

        //creation du formulaire
        $carForm = $this->createForm(CarsFormType::class , $car);

        //traitement de la requête du formulaire
        $carForm->handleRequest($request);


        //vérification soumission et validité formulaire
        if($carForm->isSubmitted() && $carForm->isValid()){

            //récupération de l'image
            $pictureFile = $carForm->get('picture')->getData();

            //deplacement de l'image 

            if ($pictureFile) {
                $fichier = md5(uniqid()) . '.' . $pictureFile->guessExtension();
 
                $pictureFile->move(
                    $this->getParameter('pictures_directory'),
                    $fichier, 
                );
            }
 
            $car->setPicture($fichier);



            //stockage en base de données
            $em->persist($car);
            $em->flush();

            $this->addFlash('success' , 'véhicule ajouté avec succés');
            //redirection
            return $this->redirectToRoute('app_cars_management_list');
        }

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('cars_management/carsAdd.html.twig', [
            'carForm' => $carForm->createView(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/modifier/{id}', name: 'edit')]
    public function EditCars(Cars $car , Request $request , EntityManagerInterface $em ,GarageHoursRepository $garageHoursRepository): Response
    {

        //creation du formulaire
        $carForm = $this->createForm(CarsFormType::class , $car);

        //traitement de la requête du formulaire
        $carForm->handleRequest($request);


        //vérification soumission et validité formulaire
        if($carForm->isSubmitted() && $carForm->isValid()){

            $carPicture = $car->getPicture();
            $pathToFile = $this->getParameter('pictures_directory').$carPicture;
            if(file_exists($pathToFile)){
                unlink($pathToFile);
            }
            //récupération de l'image
            $pictureFile = $carForm->get('picture')->getData();

            //deplacement de l'image 

            if ($pictureFile) {
                $fichier = md5(uniqid()) . '.' . $pictureFile->guessExtension();
 
                $pictureFile->move(
                    $this->getParameter('pictures_directory'),
                    $fichier, 
                );
            }
 
            $car->setPicture($fichier);

            //stockage en base de données
            $em->persist($car);
            $em->flush();

            $this->addFlash('success' , 'véhicule modifieé avec succés');
            //redirection
            return $this->redirectToRoute('app_cars_management_list');
        }

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('cars_management/carsEdit.html.twig', [
            'carForm' => $carForm->createView(),
            'hours' => $garageHoursRepository->findAll(),
            'car' => $car
        ]);
    }

    #[Route('/liste', name: 'list')]
    public function CarsList(CarsRepository $carsRepository ,GarageHoursRepository $garageHoursRepository): Response
    {

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('cars_management/carsManagement.html.twig', [
            'cars' => $carsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function deleteCars(EntityManagerInterface $em, Cars $car , CarsRepository $carsRepository ,GarageHoursRepository $garageHoursRepository): Response
    {

        if(!$car){
            $this->addFlash('warning','le véhicule non trouvé');
        }

        $carPicture = $car->getPicture();
        $pathToFile = $this->getParameter('pictures_directory').$carPicture;
        if(file_exists($pathToFile)){
            unlink($pathToFile);
        }
        
        $em->remove($car);
        $em->flush();

        
        $this->addFlash('success','Véhicule supprimé avec succés');
        $this->redirectToRoute('app_cars_management_list');

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('cars_management/carsManagement.html.twig', [
            'cars' => $carsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }
}
