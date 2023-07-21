<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use App\Repository\TalentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FrontController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(offreRepository $offreRepository,TalentRepository $talentRepository): Response
    {
        return $this->render('front/home.html.twig', [
          'offres' => $offreRepository->findAll(),
          'talents' => $talentRepository->findAll(),

        ]);
    }




    #[Route('/portage', name: 'portage')]
    public function explorer(): Response
    {
        return $this->render('front/portage.html.twig', []);
    }

    #[Route('/resources', name: 'resources')]
    public function resources(): Response
    {
      return $this->render('front/resources.html.twig', []);
    }


    #[Route('/sommesNous', name: 'sommesNous')]
    public function sommesNous(): Response
    {
      return $this->render('front/sommesNous.html.twig', []);
    }


}
