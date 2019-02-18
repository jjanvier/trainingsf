<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokerController extends Controller
{
    /**
     * @Route("/poker/random-hand/{player}", name="randomHand")
     */
    public function randomHandAction(string $player) {

        $em = $this->container->get('doctrine.orm.entity_manager');
        $generator = $this->container->get('PokerRandomHandGenerator');

        $hand = $generator($player);

        $em->persist($hand);
        $em->flush($hand);

        return new Response(
            "hand " . $hand->__toString() . " " .
            "by " . $hand->getPlayer() . " " .
            "at " . $hand->getAt()->format("Y-m-d H:i:s")
        );
    }
}
