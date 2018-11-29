<?php

namespace App\Controller;

use App\Entity\Departement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/departement")
 */
class DepartementController extends AbstractController
{
    /**
     * @Route("/departement", name="departement")
     */
    public function index()
    {
        return $this->render('departement/index.html.twig', [
            'controller_name' => 'DepartementController',
        ]);
    }

    /**
     * @Route("/{id}", name="departement_show", methods="GET")
     * @param Departement $departement
     * @return Response
     */
    public function show(Departement $departement): Response
    {
        return $this->render('departement/show.html.twig', ['departement' => $departement]);
    }

    public function dropdown()
    {
        $departements = $this->getDoctrine()->getRepository(Departement::class)->findAll();

        return $this->render('departement/dropdown.html.twig', ['departements' => $departements]);
    }



}
