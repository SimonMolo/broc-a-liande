<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController{


/**
 * @Route("admin/gestion", name="gestion")
 */
public function gestion(){
    return $this ->render('admin/adminStand.html.twig');
}

}