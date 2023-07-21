<?php

namespace App\Controller;

use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


#[Route('/profil')]
class ProfilController extends AbstractController
{
    #[Route('', name: 'app_profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', []);
    }

    #[Route('edit', name: 'profil_edit')]

    public function edit_profil(Request $request, UserRepository $userRepository ): Response
    /* je doit faire le repository pour envoyer tt dans la base de donner  */
    {
      // pour chercher l'utilisateur connecter
      $user = $this->getUser();
      // create the form and mention what he can change (email,first name,last name)
      $form =$this->createForm(RegistrationFormType::class, $user, [
        'email' => true,
        'nom' => true,
        'prenom' => true,
        'address' => true,
      ]);

      // pour le traitement du formulaire je doit ajouter
      $form->handleRequest($request);
      if($form->isSubmitted() AND $form->isValid())
      {
        $userRepository->save($user, true);
        return $this->redirectToRoute('app_profil');
      }

      return $this->render('profil/profil_edit.html.twig', [
        'formUser' => $form->createView()
        // pour l'afficher sure la vue
      ]);
    }

    #[Route('edit/password', name: 'password_edit')]

    public function edit_password(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
      $user = $this->getUser();
      $form = $this->createForm(RegistrationFormType::class, $user, [
        'password' => true
      ]);

      $form->handleRequest($request);
      if($form->isSubmitted() AND $form->isValid())
      {
       $user->setPassword(
          $userPasswordHasher->hashPassword(
            $user,
            $form->get('plainPassword')->getData()
          )
        );
          // POUR ENVOYER EN BASE DE DONNER ET REDIRIGER
      $userRepository->save($user, true);
      return $this->redirectToRoute('app_profil');
      }

      return $this->render('profil/password_edit.html.twig', [
        // pour passer la vue du formulaire dans la vue de la route
        'formUser' => $form->createView()
      ]);
    }




}
