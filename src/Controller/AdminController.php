<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController{

        /**
     * @Route("admin/gestion", name="gestion")
     */
        public function gestion(){
        return $this ->render('admin/adminStand.html.twig');
    }

        /**
         * @Route('admin/addProduct", name="ajoutProduit")
         */
        public function addProduct(Request $request, EntityManagerInterface $entityManager){
            $article = new article();

        }
}