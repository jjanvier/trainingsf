<?php

namespace AppBundle\Entity;

use AppBundle\Poker\Card;

class PokerHand
{
    /** @var string */
    private $player;

    /** @var Card|array */
    private $cards;

    /** @var \DateTime */
    private $at;

    public function __construct(string $player, Card $card1, Card $card2, Card $card3, Card $card4, Card $card5)
    {
        $cards = [$card1, $card2, $card3, $card4, $card5];
        $this->assertNonIdenticalCards($cards);

        $this->player = $player;
        $this->cards = $cards;
        $this->at = new \DateTime();
    }

    public function getCards(): array {
        return $this->cards;
    }

    public function getPlayer(): string
    {
        return $this->player;
    }

    public function getAt(): \DateTime
    {
        return $this->at;
    }

    public function __toString()
    {
        return implode("-", $this->cards);
    }

    private function assertNonIdenticalCards(array $cards): void
    {
        $uniqueCards = array_unique($cards, SORT_STRING);

        if (5 !== count($uniqueCards)) {
            throw new \Exception('Cheaters will not be tolerated');
        }
    }
}
