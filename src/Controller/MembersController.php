<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this ->render("members/memberStand.html.twig",['articles'=>$articles]);
    }
    /**
     *@Route("members/Product/{id}", name="member_product")
     */
    public function article($id, ArticlesRepository $articlesRepository){
        $article = $articlesRepository->find($id);
        return $this->render('members/memberArticle.html.twig',['article'=> $article]);
    }
}
