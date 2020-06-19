<?php

namespace App\Controller;

use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_list")
     */
    public function list(ProductRepository $repository)
    {

        return $this->render('product/list.html.twig', [
            'product_list' => $repository->findAll()
        ]);


    }

    /**
     * @Route("/product/new", name="product_add")
     */
    public function add(Request $request, EntityManagerInterface $em)
        {
            //création du formulaire
            $productForm = $this->createForm(productFormType::class);
            //on passe la requete au formulaire

            $productForm->handleRequest($request);

            //on vérifie que le formulaire est envoyé et valide.
            if ($productForm->isSubmitted() && $productForm->isValid()){
                //on récupere les données du formulaire
                $product = $productForm->getData();

                $em->persist($product);
                $em->flush();

                //redirection sur le liste des produits
                return $this->redirectToRoute('product_list');
            }


            return $this->render('product/add.html.twig',[
                'product_form' => $productForm->createView()
            ]);

        }

    /**
     * @Route("/product/{id}/edit", name="product_edit")
     */

    public function edit($id)
        {
            return $this->render('product/edit.html.twig');

        }



}
