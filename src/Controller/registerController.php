<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\RegistrationFormType;

class registerController extends AbstractController 
{

    #[Route('/register', name: 'register')]
    public function register(ManagerRegistry $doctrine, Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->persist($user);
            $doctrine->getManager()->flush();
            return $this->redirectToRoute('login');
        }
        return $this->render('register.html.twig', ['form' => $form->createView()]);
    }

   


}