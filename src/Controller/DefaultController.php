<?php

namespace App\Controller;

use App\Repository\PageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(PageRepository $pageRepository): Response
    {
        return $this->render('base.html.twig',[
            'pages' => $pageRepository->findAll(),
        ]);
    }
}