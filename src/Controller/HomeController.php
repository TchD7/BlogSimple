<?php

namespace App\Controller;

use App\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    //je recupere tout les articles dans ma base de donné
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $articles = $repo->findAll();
        return $this->render("./home/index.html.twig", [
            'articles' => $articles,
        ]);
    }
    /* public function index(): Response
    {
        return $this->render("./home/index.html.twig");
    }*/
}
