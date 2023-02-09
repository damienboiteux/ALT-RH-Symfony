<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marques')]
class MarqueController extends AbstractController
{
    private array $marques  = [
        ['id' => 1, 'nom' => 'Fiat', 'slug' => 'fiat'],
        ['id' => 2, 'nom' => 'Ford', 'slug' => 'ford'],
        ['id' => 3, 'nom' => 'BMW', 'slug' => 'bmw'],
        ['id' => 4, 'nom' => 'Tesla', 'slug' => 'tesla'],
        ['id' => 5, 'nom' => 'Audi', 'slug' => 'audi'],
    ];

    #[Route('/', name: "marque_liste")]
    public function index(): Response
    {
        return $this->render('marque/liste.html.twig', [
            'marques' => $this->marques,
        ]);
    }

    #[Route('/new', name: "marque_new")]
    public function new(): Response
    {

        return $this->render('marque/new.html.twig');
    }

    #[Route('/{slug}', requirements: ['slug' => '[a-z-]+'], name: "marque_show")]
    public function show(string $slug): Response
    {

        // entrée : slug
        $marque = [];
        foreach ($this->marques as $value) {
            // Pour chaque ligne du tableau
            if ($value['slug'] === $slug) {
                $marque = $value;
                break;
            }
        }

        // -> vue : ligne qui correspond au slug
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
    public function delete(string $slug): Response
    {
        // Suppression dans la base de données

        // Message
        $this->addFlash('success', 'Marque supprimée');

        // Redirection vers la liste des marques
        return $this->redirectToRoute('marque_liste');

        // return new Response('Suppression marque ' . $slug);
    }
}
