<?php declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObjects\Money;

class Bid {
    private string $buyerName;

    private Money $money;

    public function __construct(string $buyerName, Money $money) {
        $this->buyerName = $buyerName;
        $this->money = $money;
    }

    public function getBuyerName(): string {
        return $this->buyerName;
    }

    public function getMoney(): int {
        return $this->money->getMoney();
    }
}
