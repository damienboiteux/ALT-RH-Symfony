<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/employes', name: 'employe_liste')]
    public function index(EmployeRepository $repo): Response
    {
        return $this->render('employe/liste.html.twig', [
            'employes' => $repo->findAll(),
        ]);
    }

    #[Route('/employes/new', name: 'employe_new')]
    public function new()
    {
    }

    #[Route('/employes/{id}', name: 'employe_show')]
    public function show(EmployeRepository $repo, Employe $employe)
    {
        return $this->render(
            'employe/show.html.twig',
            [
                'employe' => $employe,
            ]
        );
    }
    // public function show(int $id, EmployeRepository $repo)
    // {
    //     return $this->render(
    //         'employe/show.html.twig',
    //         [
    //             'employe' => $repo->find($id),
    //         ]
    //     );
    // }

    #[Route('/employes/modify/{id}', name: 'employe_modify')]
    public function modify()
    {
    }

    #[Route('/employes/delete/{id}', name: 'employe_delete')]
    public function delete()
    {
    }
}
