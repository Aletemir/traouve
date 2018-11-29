<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TraobjectRepository;

/**
 *Class DefaultController
 * @package App/Controller
 */
class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $lost = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label' => State::LOST]);
        $find = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label' => State::FOUND]);
        $traobjectsLost = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($lost, 3);
        $traobjectsFound = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($find, 3);


        return $this->render('default/homepage.html.twig', ['traobjectsLost' => $traobjectsLost, 'traobjectsFound' => $traobjectsFound]);
    }

    /**
     * @Route("/stated-lost-obj", name="stated-lost-traobjects")
     */

    public function showLostTraobject()
    {
        $lost = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label' => State::LOST]);
        $traobjectsLost = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByState($lost);
        return $this->render('traobject/show-statedLost-traobject.html.twig', ['traobjectsLost' => $traobjectsLost]);


    }

    /**
     * @Route("/stated-found-obj", name="stated-found-traobjects")
     */
    public function showFoundTraobject()
    {

        $find = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label' => State::FOUND]);
        $traobjectsFound = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByState($find);

        return $this->render('traobject/show-statedFound-traobject.html.twig', ['traobjectsFound' => $traobjectsFound]);
    }

}
