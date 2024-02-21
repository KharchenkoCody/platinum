<?php declare(strict_types=1);

namespace App\Domain\UseCases;

use App\Domain\Algorithm\AlgorithmInterface;
use App\Domain\Buyer;
use App\Domain\ValueObjects\Money;

readonly class Winner {
    public function __construct(
       private AlgorithmInterface $algorithm,
    ) {}

    public function run(): array {
        // Let's imagine that this data came from wherever and is ready to use
        $buyerA = new Buyer('A', [new Money(110), new Money(130)]);
        $buyerB = new Buyer('B', [new Money(0)]);
        $buyerC = new Buyer('C', [new Money(125)]);
        $buyerD = new Buyer('D', [new Money(105), new Money(115), new Money(90)]);
        $buyerE = new Buyer('E', [new Money(132), new Money(135), new Money(140)]);

        $buyers = [$buyerA, $buyerB, $buyerC, $buyerD, $buyerE];
        $reservePrice = 100;

        $result = $this->algorithm->solution($buyers, $reservePrice);
        return ['winner' => $result->getBuyerName(), 'price' => $result->getMoney()];
    }
}
