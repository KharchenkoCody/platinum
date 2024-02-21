<?php declare(strict_types=1);

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Money {
    private int $money;

    public function __construct(int $money) {
        if ($money < 0) {
            throw new InvalidArgumentException("Money cannot be below zero");
        }

        $this->money = $money;
    }

    public function getMoney(): int {
        return $this->money;
    }
}
