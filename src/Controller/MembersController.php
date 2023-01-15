<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class MembersController extends AbstractController
{
    /**
     * @Route ("members/membershome", name="membersHome")
     */
    public function membersHome(){
        return $this ->render("members/memberHome.html.twig");
    }

    /**
     * @Route("members/stand", name="memberStand")
     */
    public function stand(ArticlesRepository $articlesRepository){
        $articles = $articlesRepository->findAll();
        return $this ->render("members/stand.html.twig",['articles'=>$articles]);
    }
}
