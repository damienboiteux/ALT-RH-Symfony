<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MarqueController
{
    public function index()
    {
        return new Response('<h1>Liste des marques</h1>');
    }

    public function new()
    {
        dd('Ajout d\'une marque');
    }

    public function show(Request $req): Response
    {
        $marque = $req->attributes->get('slug');
        return new Response('Affichage de la marque : ' . $marque);
    }

    public function delete(Request $request): Response
    {
        $marque = $request->attributes->get('slug');
        return new Response('Suppression de la marque : ' . $marque);
    }

    // #[Route('/marques/update/{slug}', defaults: ['slug' => 'BMW'], requirements: ['slug' => '[a-z-]{3,32}'], methods: ['GET', 'POST'], name: 'marque_update')]

    // #[Route('/marques/update/{slug}', requirements: ['slug' => '[a-z-]{3,32}'], methods: ['GET', 'POST'], name: 'marque_update')]
    // public function update(string $slug = 'BMW')
    // {
    //     return new Response('Modification de la marque : ' . $slug);
    // }

    #[Route('/marques/update/{id}', requirements: ['id' => '\d{1,10}'], methods: ['GET', 'POST'], name: 'marque_update')]
    public function update(int $id = 0)
    {
        return new Response('Modification de la marque : ' . $id);
    }
}
