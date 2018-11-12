<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app",  methods={"GET","HEAD"})
     */
    public function index()
    {
        return $this->render('app.html.twig');
    }

    /**
     * @Route("/keyword", name="keyword",  methods={"GET","HEAD"})
     */
    public function appKeyword()
    {
        return $this->json(array('username' => 'jane.doe'));
    }

    /**
     * @Route("/ingredient", name="ingredient",  methods={"GET","HEAD"})
     */
    public function appIngredients()
    {
        return $this->json(array('username' => 'ingredientes'));
    }

}
