<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class MembersController extends AbstractController
{
    /**
     * @Route ("/membershome", name="membersHome")
     */
    public function membersHome(){
        return $this ->render("members/memberHome.html.twig");
    }
}