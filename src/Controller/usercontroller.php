<?php
namespace App\Controller;

use App\Entity\Article;
use App\Entity\loginForm;
use App\Entity\Product;
use App\Entity\rechercheProduit;
use App\Form\ArticleType;
use App\Form\RechercheProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class usercontroller extends AbstractController
{


#[Route('/login', name: 'login')]
public function login(Request $request)
{
 $form = $this->createForm(loginForm::class);
    $form->handleRequest($request);
     
    if ($form->isSubmitted() && $form->isValid()) {
        return $this->redirectToRoute('allArticles');


    }

else
return $this->render('login.html.twig');

}





}