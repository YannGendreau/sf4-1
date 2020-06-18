<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;




class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home.html.twig', [
            'pseudo' => 'John Doe',
            'liste' => [
                'foo',
                'bar',
                'baz',
            ]

        ]);

    }

    /**
     * on place les param dynamiques entre accolades
     * URI valide : /test/42
     *
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $em)
    {
        //création d'une entité
        $product = new Product();

        $product
            ->setName('Jeans')
            ->setDescription('Un super jean !')
            ->setPrice(79.99)
            ->setQuantity(50)
        ;
        //l'entité n'est pas encore enregistré en bas de données
        dump($product);

        //enregistrement (insertion)
        //1 - préparer à l'enregistrement d'une entité.
        $em->persist($product);
        //2 - exec les requetes SQL
        $em->flush();

            //fonction de debug dump and die = var_dump
        dd($product);
    }
}
