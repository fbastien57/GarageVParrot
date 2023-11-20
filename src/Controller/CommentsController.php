<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Form\CommentsFormType;
use App\Repository\CommentsRepository;
use App\Repository\GarageHoursRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commentaire', name: 'app_comments_')]
class CommentsController extends AbstractController
{
    #[Route('/ajouter', name: 'add')]
    public function add(Request $request , EntityManagerInterface $em ,GarageHoursRepository $garageHoursRepository): Response
    { 
        $comment = new Comments();

        $commentForm = $this->createForm(CommentsFormType::class, $comment);

        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {

            $em->persist($comment);
            $em->flush();

            $this->addFlash('success','Avis envoyé avec succés , il sera publié prochainement');

            return $this->redirectToRoute('app_main');
        }



        return $this->render('comments/commentsAddForm.html.twig', [
            'commentForm' => $commentForm->createView(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request $request , EntityManagerInterface $em , Comments $comment ,GarageHoursRepository $garageHoursRepository): Response
    { 

        $commentForm = $this->createForm(CommentsFormType::class, $comment);

        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {

            $em->persist($comment);
            $em->flush();

            $this->addFlash('success','Commentaire modifié envoyé avec succés');

            return $this->redirectToRoute('app_comments_list');
        }


        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('comments/commentsEditForm.html.twig', [
            'commentForm' => $commentForm->createView(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/liste', name: 'list')]
    public function list(CommentsRepository $commentsRepository ,GarageHoursRepository $garageHoursRepository): Response
    { 

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('comments/commentsList.html.twig', [
            'comments' => $commentsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $em, Comments $comment, CommentsRepository $commentsRepository ,GarageHoursRepository $garageHoursRepository): Response
    {

        if(!$comment){
            $this->addFlash('warning','commentaire non trouvé');
        }
        
        $em->remove($comment);
        $em->flush();

        
        $this->redirectToRoute('app_comments_list');
        
        $this->addFlash('success','Commentaire supprimé avec succés');


        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('comments/commentsList.html.twig', [
            'comments' => $commentsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/publication/{id}', name: 'published')]
    public function published(EntityManagerInterface $em, Comments $comment, CommentsRepository $commentsRepository ,GarageHoursRepository $garageHoursRepository , Request $request): Response
    {

        if(!$comment){
            $this->addFlash('warning','commentaire non trouvé');
        }
        $comment->setIsPublished(true);
    
        
        $em->persist($comment);
        $em->flush();

       
        $this->redirectToRoute('app_comments_list', $request->query->all());
        
        $this->addFlash('success','Commentaire publié avec succés');

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('comments/commentsList.html.twig', [
            'comments' => $commentsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }

    #[Route('/annulation/{id}', name: 'notPublished')]
    public function NotPublished(EntityManagerInterface $em, Comments $comment, CommentsRepository $commentsRepository ,GarageHoursRepository $garageHoursRepository , Request $request): Response
    {

        if(!$comment){
            $this->addFlash('warning','commentaire non trouvé');
        }
        $comment->setIsPublished(false);
    
        
        $em->persist($comment);
        $em->flush();

    
        $this->redirectToRoute('app_comments_list');
        $this->addFlash('success','Commentaire retiré avec succés');

        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('comments/commentsList.html.twig', [
            'comments' => $commentsRepository->findAll(),
            'hours' => $garageHoursRepository->findAll(),
        ]);
    }
}
