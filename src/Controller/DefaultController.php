<?php

namespace App\Controller;

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
        $lost = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label'=>State::LOST]);
        $find = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label'=>State::FOUND]);
        $traobjectsLost = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($lost, 3);
        $traobjectsFound =$this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($find, 3);

        return $this->render('default/homepage.html.twig', ['traobjectsLost' => $traobjectsLost, 'traobjectsFound' => $traobjectsFound ]);
    }

}
