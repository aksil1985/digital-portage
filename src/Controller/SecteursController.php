<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecteursController extends AbstractController
{
    #[Route('/secteurs', name: 'app_secteurs')]
    public function index(): Response
    {
        return $this->render('secteurs/secteur.html.twig', []);
    }
}
