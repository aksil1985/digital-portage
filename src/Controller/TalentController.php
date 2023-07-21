<?php

namespace App\Controller;

use App\Entity\Talent;
use App\Form\TalentType;
use App\Repository\TalentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/talent')]
class TalentController extends AbstractController
{
    #[Route('/', name: 'app_talent_index', methods: ['GET'])]
    public function index(TalentRepository $talentRepository): Response
    {
        return $this->render('talent/index.html.twig', [
            'talents' => $talentRepository->findAll(),

        ]);
    }

    #[Route('/new', name: 'app_talent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TalentRepository $talentRepository): Response
    {
        $talent = new Talent();
        $form = $this->createForm(TalentType::class, $talent);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $talentRepository->save($talent, true);

            return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);

        }

        return $this->renderForm('talent/new.html.twig', [
            'talent' => $talent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_talent_show', methods: ['GET', 'POST'])]
    public function show($id, Request $request, TalentRepository $talentRepository): Response
    {
      $talent = $talentRepository->find($id);


        $form = $this->createForm(TalentType::class, $talent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $talentRepository->save($talent, true);

            return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('talent/show.html.twig', [
            'talent' => $talent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_talent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Talent $talent, TalentRepository $talentRepository): Response
    {
        $form = $this->createForm(TalentType::class, $talent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $talentRepository->save($talent, true);

            return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('talent/edit.html.twig', [
            'talent' => $talent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_talent_delete', methods: ['POST'])]
    public function delete(Request $request, Talent $talent, TalentRepository $talentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$talent->getId(), $request->request->get('_token'))) {
            $talentRepository->remove($talent, true);
        }

        return $this->redirectToRoute('app_talent_index', [], Response::HTTP_SEE_OTHER);
    }
}
