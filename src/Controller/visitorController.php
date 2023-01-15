<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;

class visitorController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render("visitor/home.html.twig");
    }

    /**
     * @Route("/visiteurStand", name="visiteurStand")
     */
    public function visiteurStand(ArticlesRepository $articlesRepository){
        $articles = $articlesRepository->findAll();
        return $this->render('visitor/visitStand.html.twig',['articles'=>$articles]);
    }
}
