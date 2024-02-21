<?php declare(strict_types=1);

namespace App\Domain\Algorithm;

use App\Domain\Bid;
use App\Domain\Buyer;
use App\Domain\ValueObjects\Money;
use App\Domain\Exceptions\NoResultsException;

class Algorithm implements AlgorithmInterface {

    public function solution(array $buyers, int $reservePrice): Bid {
        if (!$buyers || count($buyers) == 0) {
            throw new NoResultsException();
        }

        $maxBids = $this->getMaxBids($buyers);
        if (empty($maxBids)
            || $maxBids[0]->getMoney() < $reservePrice
            || $maxBids[0]->getMoney() === $maxBids[1]->getMoney()) {
            throw new NoResultsException();
        }

        return $this->getResult($maxBids, $reservePrice);
    }

    private function getMaxBids(array $buyers): array {
        $maxBids = array_map(function(Buyer $buyer) {
            return new Bid($buyer->name, max($buyer->bids  ?: [0]));
        }, $buyers);

        usort($maxBids, function($maxBid1, $maxBid2) {
            return $maxBid2->getMoney() - $maxBid1->getMoney();
        });

        return $maxBids;
    }

    private function getResult(array $maxBids, int $reservePrice): Bid {
        $winningBuyerName = $maxBids[0]->getBuyerName();
        $winningPrice = $maxBids[1]->getMoney() < $reservePrice ? $maxBids[0]->getMoney() : $maxBids[1]->getMoney();

        return new Bid($winningBuyerName, new Money($winningPrice));
    }
}
