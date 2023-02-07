<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class MarqueController
{
    public function index()
    {
        dd('Liste des marques');
    }

    public function new()
    {
        dd('Ajout d\'une marque');
    }

    #[Route('/marques/show', name: 'marque_show')]
    public function show()
    {
        dd('Affichage d\'une marque');
    }

    #[Route('/marques/delete')]
    public function delete()
    {
        dd('Suppression d\'une marque');
    }

    #[Route('/marques/update')]
    public function update()
    {
        dd('Modification d\'une marque');
    }
}
