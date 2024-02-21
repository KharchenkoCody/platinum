<?php declare(strict_types=1);

namespace Unit;

use App\Domain\ValueObjects\Money;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
    public function testMoneyCanBeCreatedWithPositiveValue(): void {
        $money = new Money(100);

        $this->assertInstanceOf(Money::class, $money);
        $this->assertSame(100, $money->getMoney());
    }

    public function testMoneyCannotBeCreatedWithNegativeValue(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Money cannot be below zero");

        new Money(-1);
    }

    public function testMoneyCanBeCreatedWithZeroValue(): void {
        $money = new Money(0);

        $this->assertInstanceOf(Money::class, $money);
        $this->assertSame(0, $money->getMoney());
    }
}
