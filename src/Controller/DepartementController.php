<?php

namespace App\Controller;


use App\Repository\PageRepository;
use App\Entity\Departement;
use App\Form\DepartementType;
use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/departement')]
class DepartementController extends AbstractController
{
    #[Route('/', name: 'app_departement_index', methods: ['GET'])]
    public function index(DepartementRepository $departementRepository, PageRepository $pageRepository): Response
    {
        return $this->render('departement/index.html.twig', [
            'departements' => $departementRepository->findAll(),
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_departement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DepartementRepository $departementRepository, PageRepository $pageRepository): Response
    {
        $departement = new Departement();
        $form = $this->createForm(DepartementType::class, $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $departementRepository->save($departement, true);

            return $this->redirectToRoute('app_departement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('departement/new.html.twig', [
            'departement' => $departement,
            'form' => $form,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_departement_show', methods: ['GET'])]
    public function show(Departement $departement, PageRepository $pageRepository): Response
    {
        return $this->render('departement/show.html.twig', [
            'departement' => $departement,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_departement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Departement $departement, DepartementRepository $departementRepository, PageRepository $pageRepository): Response
    {
        $form = $this->createForm(DepartementType::class, $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $departementRepository->save($departement, true);

            return $this->redirectToRoute('app_departement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('departement/edit.html.twig', [
            'departement' => $departement,
            'form' => $form,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_departement_delete', methods: ['POST'])]
    public function delete(Request $request, Departement $departement, DepartementRepository $departementRepository, PageRepository $pageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$departement->getId(), $request->request->get('_token'))) {
            $departementRepository->remove($departement, true);
        }

        return $this->redirectToRoute('app_departement_index', [], Response::HTTP_SEE_OTHER);
    }
}
