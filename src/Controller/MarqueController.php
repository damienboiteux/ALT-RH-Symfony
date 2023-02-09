<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Repository\MarqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marques')]
class MarqueController extends AbstractController
{

    #[Route('/', name: "marque_liste")]
    public function index(MarqueRepository $repo): Response
    {
        return $this->render('marque/liste.html.twig', [
            'marques' => $repo->findAll(),
        ]);
    }

    #[Route('/new', name: "marque_new")]
    public function new(): Response
    {
        return $this->render('marque/new.html.twig');
    }

    #[Route('/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_show")]
    public function show(MarqueRepository $repo, Marque $marque): Response
    {
        return $this->render('marque/show.html.twig', [
            'marque' => $marque,
        ]);
    }

    #[Route('/modify/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_modify")]
    public function modify(string $slug): Response
    {
        return $this->render('marque/modify.html.twig', [
            'slug' => $slug,
        ]);
    }

    #[Route('/delete/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_delete")]
    public function delete(string $slug, MarqueRepository $repo): Response
    {
        $marque = $repo->findOneBy(['slug' => $slug]);
        $repo->remove($marque, true);
        $this->addFlash('success', 'Marque supprimée');
        return $this->redirectToRoute('marque_liste');
    }
}
