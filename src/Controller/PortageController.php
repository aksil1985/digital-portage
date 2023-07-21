<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortageController extends AbstractController
{
    #[Route('/portage', name: 'portage')]
    public function portage(): Response
    {

      return $this->render('portage/portage.html.twig', []);
    }

    #[Route('/avantages', name: 'avantages')]
    public function avantages(): Response
    {
      return $this->render('front/avantages.html.twig', []);
    }

    #[Route('/fonctionne', name: 'fonctionne')]
    public function fonctionne(): Response
    {
      return $this->render('front/fonctionne.html.twig', []);
    }

    #[Route('/blog', name: 'blog')]
    public function blog(): Response
    {
      return $this->render('front/blog.html.twig', []);
    }


    #[Route('/communaute', name: 'communaute')]
    public function communaute(): Response
    {
      return $this->render('front/communaute.html.twig', []);
    }

    #[Route('/valeurs', name: 'valeurs')]
    public function resources(): Response
    {
      return $this->render('front/valeurs.html.twig', []);
    }

    #[Route('/equipe', name: 'equipe')]
    public function equipe(): Response
    {
      return $this->render('front/equipe.html.twig', []);
    }




}
