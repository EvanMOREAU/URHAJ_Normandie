<?php

namespace App\Controller;

use App\Repository\PageRepository;
use App\Entity\Structure;
use App\Form\StructureType;
use App\Repository\StructureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/structure')]
class StructureController extends AbstractController
{
    #[Route('/', name: 'app_structure_index', methods: ['GET'])]
    public function index(StructureRepository $structureRepository, PageRepository $pageRepository): Response
    {
        return $this->render('structure/index.html.twig', [
            'structures' => $structureRepository->findAll(),
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_structure_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StructureRepository $structureRepository, PageRepository $pageRepository): Response
    {
        $structure = new Structure();
        $form = $this->createForm(StructureType::class, $structure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $structureRepository->save($structure, true);

            return $this->redirectToRoute('app_structure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('structure/new.html.twig', [
            'structure' => $structure,
            'form' => $form,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_structure_show', methods: ['GET'])]
    public function show(Structure $structure, PageRepository $pageRepository): Response
    {
        return $this->render('structure/show.html.twig', [
            'structure' => $structure,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_structure_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Structure $structure, StructureRepository $structureRepository, PageRepository $pageRepository): Response
    {
        $form = $this->createForm(StructureType::class, $structure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $structureRepository->save($structure, true);

            return $this->redirectToRoute('app_structure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('structure/edit.html.twig', [
            'structure' => $structure,
            'form' => $form,
            'pages' => $pageRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_structure_delete', methods: ['POST'])]
    public function delete(Request $request, Structure $structure, StructureRepository $structureRepository, PageRepository $pageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$structure->getId(), $request->request->get('_token'))) {
            $structureRepository->remove($structure, true);
        }

        return $this->redirectToRoute('app_structure_index', [], Response::HTTP_SEE_OTHER);
    }
}
