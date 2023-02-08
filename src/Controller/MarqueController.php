<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marques')]
class MarqueController extends AbstractController
{

    #[Route('/', name: "marque_liste")]
    public function index(): Response
    {
        return $this->render('marque/liste.html.twig');
    }

    #[Route('/new', name: "marque_new")]
    public function new(): Response
    {
        return new Response('Nouvelle marque');
    }

    #[Route('/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_show")]
    public function show(string $slug): Response
    {
        return new Response('Détails marque ' . $slug);
    }

    #[Route('/modify/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_modify")]
    public function modify(string $slug): Response
    {
        return new Response('Modification marque ' . $slug);
    }

    #[Route('/delete/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_delete")]
    public function delete(string $slug): Response
    {
        return new Response('Suppression marque ' . $slug);
    }
}
