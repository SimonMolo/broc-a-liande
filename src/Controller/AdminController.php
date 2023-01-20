<?php
namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FileUploader;


class AdminController extends AbstractController
{

    /**
     * @Route("admin/gestion", name="gestion")
     */
    public function gestion()
    {
        return $this->render('admin/adminStand.html.twig');
    }

    /**
     * @Route("admin/productManagement", name="productManagement")
     */
    public function productManagement(ArticlesRepository $articlesRepository)
    {
        $article = $articlesRepository->findAll();
        return $this->render('admin/gestionArticles.html.twig', ['articles' => $article]);
    }
                                         /*Ajouter un Produit*/

    /**
     * @Route("admin/addProduct", name="ajoutProduit")
     */
    public function addProduct(Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader)
    {
        $article = new Articles();
        $articleForm = $this->createForm(ArticlesType::class, $article);
        $articleForm->handleRequest($request);
        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            /**@var UploadedFile $articleFile*/
            $articleFile = $articleForm->get('articleFilename')->getData();
            if ($articleFile){
            $productFileName = $fileUploader->upload($articleFile);
            $article->setArticleFilename($productFileName);
            }
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute('productManagement');
        }
        return $this->renderForm('admin/addArticle.html.twig', ['articleForm'=>$articleForm]);
    }

                                        /*Supprimer un produit*/
    /**
     *@Route("admin/delProduct/{id}delete", name="admin_product_delete")
     */
    public function delProduit($id, ArticlesRepository $articlesRepository, Request $request, EntityManagerInterface $entityManager){
        $article = $articlesRepository->find($id);
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('productManagement');
    }
                                        /* Modifier un Produit*/
    /**
     * @Route("admin/Produit/update/{id}", name="admin_product_update")
     */
    public function updateProduct($id, Request $request,ArticlesRepository $articlesRepository ,EntityManagerInterface $entityManager){
        $article = $articlesRepository->find($id);
        $articleForm = $this->createForm(ArticlesType::class, $article);
        $articleForm->handleRequest($request);
        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute('productManagement');
        }
        return $this->render('admin/updateProduct.html.twig',['articleForm'=> $articleForm->createView()]);
    }
                                     /* Vue Produits Individuels */
    /**
     *@Route("admin/Product/{id}", name="admin_product")
     */
    public function article($id, ArticlesRepository $articlesRepository){
        $article = $articlesRepository->find($id);
        return $this->render('admin/adminArticle.html.twig',['article'=> $article]);
    }

}