<?php

namespace App\Controller;

use App\Entity\Traobject;
use App\Form\TraobjectType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/traobject")
 */
class TraobjectController extends BaseController
{
    /**
     * @Route("/create-ad-found", name="traobject_new_ad_found", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function newFound(Request $request): Response
    {
        $traobject = new Traobject();
        $form = $this->createForm(TraobjectType::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traobject);
            $em->flush();

            return $this->redirectToRoute('traobject_new_ad_found');
        }

        return $this->render('traobject/annonce-perdu.html.twig', [
            'traobject' => $traobject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/create-ad-lost", name="traobject_new_ad_lost")
     * @param Request $request
     * @return Response
     */
    public function newLost(Request $request): Response
    {
        $traobject = new Traobject();
        $form = $this->createForm(TraobjectType::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traobject);
            $em->flush();

            return $this->redirectToRoute('traobject_new_ad_found');
        }

        return $this->render('traobject/annonce-trouve.html.twig', [
            'traobject' => $traobject,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/show/{id}", name="traobject_show", methods="GET")
     */
    public function show(Traobject $traobject): Response
    {
        return $this->render('traobject/object.html.twig', ['traobject' => $traobject]);
    }

    /**
     * @Route("/{id}/edit", name="traobject_edit", methods="GET|POST")
     */
    public function edit(Request $request, Traobject $traobject): Response
    {
        $form = $this->createForm(Traobject1Type::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('traobject_index', ['id' => $traobject->getId()]);
        }

        return $this->render('traobject/edit.html.twig', [
            'traobject' => $traobject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="traobject_delete", methods="DELETE")
     */
    public function delete(Request $request, Traobject $traobject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$traobject->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($traobject);
            $em->flush();
        }

        return $this->redirectToRoute('traobject_index');
    }


}
