<?php

namespace App\Controller;

use App\Repository\PageRepository;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\StructureRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository, PageRepository $pageRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_URHAJ');

        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository, PageRepository $pageRepository, StructureRepository $structureRepository, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $this->denyAccessUnlessGranted('ROLE_URHAJ');
    
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez le mot de passe en clair depuis le formulaire
            $plainPassword = $form->get('password')->getData();
    
            // Utilisez UserPasswordHasherInterface pour hasher le mot de passe
            $hashedPassword = $passwordEncoder->hashPassword($user, $plainPassword);
    
            // Définissez le mot de passe haché dans l'entité User
            $user->setPassword($hashedPassword);
    
            // Enregistrez l'utilisateur dans la base de données
            $userRepository->save($user, true);
    
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'pages' => $pageRepository->findAll(),
            'structures' => $structureRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user, PageRepository $pageRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_URHAJ');

        return $this->render('user/show.html.twig', [
            'user' => $user,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository, PageRepository $pageRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_URHAJ');

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository, PageRepository $pageRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_URHAJ');

        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    
}

