<?php declare(strict_types=1);

namespace Unit;

use App\Domain\Bid;
use App\Domain\ValueObjects\Money;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BidTest extends TestCase {
    public function testBidCanBeCreatedWithValidValues(): void {
        $money = new Money(100);
        $buyerName = "John Doe";
        $bid = new Bid($buyerName, $money);

        $this->assertInstanceOf(Bid::class, $bid);
        $this->assertSame($buyerName, $bid->getBuyerName());
        $this->assertSame(100, $bid->getMoney());
    }

    public function testGetMoneyReturnsCorrectValue(): void {
        $money = new Money(150);
        $bid = new Bid("Alice", $money);

        $this->assertSame(150, $bid->getMoney());
    }

    public function testGetBuyerNameReturnsCorrectValue(): void {
        $money = new Money(200);
        $bid = new Bid("Bob", $money);

        $this->assertSame("Bob", $bid->getBuyerName());
    }

    public function testBidCannotBeCreatedWithNegativeMoneyValue(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Money cannot be below zero");
        new Bid("Charlie", new Money(-50));
    }
}
