<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_list")
     */
    public function list()
    {
        return $this->json([
            'Titre' => 'liste des produits',

        ]);
    }
    /**
     * @Route("/product/new", name="product_add")
     */
    public function add()
    {
        return $this->json([
            'Titre' => 'Ajouter un produit',

        ]);
    }
    /**
     * @Route("/product/{id}/edit", name="product_edit")
     */
    public function edit($id)
    {
        return $this->json([
            'Titre' => 'modifier le produit'. $id,

        ]);
    }


}
