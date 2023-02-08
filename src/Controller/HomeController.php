<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: "home")]
    public function index(): Response
    {
        $tableau = ['a', 'b', 'c'];

        $objet = new stdClass();

        $compte = new stdClass();
        $compte->login = 'tutu';
        $compte->password = 'tutu';

        $liste = [
            ['login' => 'toto', 'password' => 'azerty'],
            ['password' => 'qsdfghh', 'login' => 'titi'],
            ['login' => 'tata', 'password' => 'admin'],
            $compte,
        ];

        $objet->nom = "Dupont";
        $objet->prenom = "Paul";

        return $this->render(
            'home/homepage.html.twig',
            [
                'titre'     =>  'Je suis la page d\'accueil',
                'tableau'   =>  $tableau,
                'personne'  =>  $objet,
                'personnes' =>  $liste,
                'test'      =>  0,
                'tableau2'  =>  ['x', 'y'],
                'test2'     =>  'azert',
            ]
        );
    }
}
