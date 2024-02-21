<?php declare(strict_types=1);

namespace App\Domain\Algorithm;

use App\Domain\Bid;

interface AlgorithmInterface {
    public function solution(array $maxBids, int $reservePrice): Bid;
}
