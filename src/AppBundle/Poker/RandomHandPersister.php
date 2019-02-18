<?php

namespace AppBundle\Poker;

use AppBundle\Entity\PokerHand;
use Doctrine\Common\Persistence\ObjectManager;

class RandomHandPersister
{
    /** @var ObjectManager */
    private $objectManager;

    /** @var RandomHandGenerator */
    private $randomHandGenerator;

    public function __construct(ObjectManager $objectManager, RandomHandGenerator $randomHandGenerator)
    {
        $this->objectManager = $objectManager;
        $this->randomHandGenerator = $randomHandGenerator;
    }

    public function generateAndPersist(string $player): PokerHand
    {
        $hand = ($this->randomHandGenerator)($player);
        $this->objectManager->persist($hand);
        $this->objectManager->flush($hand);

        return $hand;
    }
}
