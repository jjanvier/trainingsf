<?php

namespace AppBundle\Poker;

use AppBundle\Entity\PokerHand;

class RandomHandGenerator
{
    public function __invoke(string $player): PokerHand
    {
        do {
            $cards = $this->generateRandomCards();
        } while ($this->twiceTheSameCard($cards));

        return new PokerHand($player, $cards[0], $cards[1], $cards[2], $cards[3], $cards[4]);
    }

    private function twiceTheSameCard(array $cards): bool
    {
        $uniqueCards = array_unique($cards, SORT_STRING);

        return 5 !== count($uniqueCards);
    }

    /**
     * @return Card[]
     */
    private function generateRandomCards(): array
    {
        return [
            Card::random(),
            Card::random(),
            Card::random(),
            Card::random(),
            Card::random(),
        ];
    }
}
