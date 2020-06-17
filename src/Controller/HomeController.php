<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HomeController.php',
        ]);
    }

    /**
     * on place les param dynamiques entre accolades
     * URI valide : /test/42
     *
     * @route("/test/{id}", name="test")
     */
    public function test($id, Request $request, SessionInterface $session)
    {
        return $this->json([
            'id' => $id,
            'section' =>$request->query->get('section', 'profil'),
            'session' => $session->get('user'),
        ]);
    }
}
