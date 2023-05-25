<?php
namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{



 #[Route('/index', name: 'index')]   
 public function home()
 {

 return $this->render('welcome.html.twig');
 }

 #[Route('/article/new', name: 'addArticle',methods: ['GET', 'POST'])]
        public function new(Request $request,EntityManagerInterface $entityManager) {
          

$article = new Article();
$form = $this->createForm(ArticleType::class,$article);
$form->handleRequest($request);
if($form->isSubmitted() && $form->isValid()) {
$article = $form->getData();

$entityManager->persist($article);
$entityManager->flush();
return $this->redirectToRoute('allArticles');
}
return $this->render('new.html.twig',['form' => $form->createView()]);
            }

            #[Route('/article/all', name: 'allArticles')]
            public function articles(Request $request,EntityManagerInterface $entityManager)
            {
             /*   $propertySearch = new PropertySearch();
                $form = $this->createForm(PropertySearchType::class,$propertySearch);
                $form->handleRequest($request);
                //initialement le tableau des articles est vide,
                //c.a.d on affiche les articles que lorsque l'utilisateur
                //clique sur le bouton rechercher
                $articles= [];
                if($form->isSubmitted() && $form->isValid()) {
                //on récupère le nom d'article tapé dans le formulaire
                $nom = $propertySearch->getNom();
    if ($nom!="")
    //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
    $articles= $entityManager->getRepository(Article::class)->findBy(['nom' => $nom] );
    else*/
    //si si aucun nom n'est fourni on affiche tous les articles
    $articles= $entityManager->getRepository(Article::class)->findAll();
    //}
    return $this->render('index.html.twig',[  'articles' => $articles]);
    }

}
