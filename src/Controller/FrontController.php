<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use App\Repository\TalentRepository;
use App\Form\PortageConfigurationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FrontController extends AbstractController
{
  #[Route('/home', name: 'home')]
  public function home(offreRepository $offreRepository, TalentRepository $talentRepository, Request $request): Response
  {
    $form = $this->createForm(PortageConfigurationType::class);

    $estimation = [
      'tauxJournalierMoyen' => 0,
      'salaireBrutMensuel' => 0,
      'chargesSociales' => 0,
      'salaireNet' => 0,
      'fraisGestion' => 0,
      'coutTotal' => 0,
      'disponibleConsultant' => 0,
      'chargesPatronales' => 0,
      'salaireAnuelleBrut'=> 0,
    ];
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();

      // Here, you can save the configuration values to a database or session
      // For simplicity, we'll just store them in the session for now
      $estimation = $this->calculEstimationPortage($data["tauxJournalierMoyen"], $data["joursTravailMois"],  $data["fraisGestion"],  $data["tauxChargesSociales"], 
      $data["chargesPatronales"], $data["disponibleConsultant"], $data["salaireAnuelleBrut"]  );  // Exemple avec un taux journalier moyen de 400€ et 20 jours travaillés *100;

    }

    return $this->render('front/home.html.twig', [
      'offres' => $offreRepository->findAll(),
      'talents' => $talentRepository->findAll(),
      'estimation' => $estimation,
      'form' => $form->createView(),
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


  public function calculEstimationPortage(float $tauxJournalierMoyen, int $joursTravailMois = 20,  $fraisGestion= 0.1,  $tauxChargesSociales = 0.45, $chargesPatronales= 0.25,  $disponibleConsultant= 0.2 ): array
 
  {
    $salaireBrutMensuel = $tauxJournalierMoyen * $joursTravailMois;
    $chargesSociales = $salaireBrutMensuel * $tauxChargesSociales;
    $salaireNet = $salaireBrutMensuel - $chargesSociales;
    $frais = $salaireBrutMensuel * $fraisGestion;
    $coutTotal = $salaireBrutMensuel + $frais;
    $salaireAnuelleBrut =  $salaireBrutMensuel * 12;
    $disponibleConsultant = 0.2;
    $chargesPatronales = $salaireBrutMensuel * 25;
    

    return [
      'tauxJournalierMoyen' => $tauxJournalierMoyen,
      'salaireBrutMensuel' => $salaireBrutMensuel,
      'chargesSociales' => $chargesSociales,
      'salaireNet' => $salaireNet,
      'fraisGestion' => $frais,
      'coutTotal' => $coutTotal,
      'salaireAnuelleBrut' => $salaireAnuelleBrut,
      'disponibleConsultant' => $disponibleConsultant,
      'chargesPatronales' => $chargesPatronales,
    ];
  }
}
