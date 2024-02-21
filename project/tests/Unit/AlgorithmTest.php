<?php declare(strict_types=1);

namespace Unit;

use App\Domain\Algorithm\Algorithm;
use App\Domain\Buyer;
use App\Domain\ValueObjects\Money;
use PHPUnit\Framework\TestCase;

class AlgorithmTest extends TestCase {
    /**
     * @dataProvider bidDataProvider
     */
    public function testBidSolution(array $buyers, int $reservePrice, array $expectedResult): void {
        $algorithm = new Algorithm();
        $result = $algorithm->solution($buyers, $reservePrice);
        $this->assertSame($expectedResult['winner'], $result->getBuyerName());
        $this->assertSame($expectedResult['price'], $result->getMoney());
    }

    public function bidDataProvider(): array {
        $buyerA = new Buyer('A', [new Money(110), new Money(130)]);
        $buyerB = new Buyer('B', [new Money(0)]);
        $buyerC = new Buyer('C', [new Money(125)]);
        $buyerD = new Buyer('D', [new Money(105), new Money(115), new Money(90)]);
        $buyerE = new Buyer('E', [new Money(132), new Money(135), new Money(140)]);

        return [
            [
                'buyers' => [$buyerA, $buyerB, $buyerC, $buyerD, $buyerE],
                'reservePrice' => 100,
                'expectedResult' => ['winner' => 'E', 'price' => 130],
            ],
            [
                'buyers' => [$buyerA, $buyerB, $buyerC, $buyerD, $buyerE],
                'reservePrice' => 133,
                'expectedResult' => ['winner' => 'E', 'price' => 140],
            ],
            [
                'buyers' => [$buyerA, $buyerB, $buyerC, $buyerD, $buyerE],
                'reservePrice' => 139,
                'expectedResult' => ['winner' => 'E', 'price' => 140],
            ],
        ];
    }
}