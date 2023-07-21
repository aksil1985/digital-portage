<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    // public function index(OffreRepository $offreRepository): Response
    // {
    //   $variableName = 'Hello, World!';
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //         'offres' => $offreRepository->findAll(),

    //     ]);
    // }


}
