<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vehicules')]
class VehiculeController
{

    #[Route('/', name: "vehicule_liste")]
    public function index(): Response
    {
        return new Response('Liste des véhicules');
    }

    #[Route('/new', name: "vehicule_new")]
    public function new(): Response
    {
        return new Response('Nouveau véhicule');
    }

    #[Route('/{id}', requirements: ['id' => '\d+'], name: "vehicule_show")]
    public function show(int $id): Response
    {
        return new Response('Détails véhicule' . $id);
    }

    #[Route('/modify/{id}', requirements: ['id' => '\d+'], name: "vehicule_modify")]
    public function modify(int $id): Response
    {
        return new Response('Modification véhicule' . $id);
    }

    #[Route('/delete/{id}', requirements: ['id' => '\d+'], name: "vehicule_delete")]
    public function delete(int $id): Response
    {
        return new Response('Suppression véhicule' . $id);
    }
}
