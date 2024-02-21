<?php declare(strict_types=1);

namespace App\Domain;

class Buyer {
    public string $name;

    public array $bids;

    public function __construct(string $name, array $bids) {
        $this->name = $name;
        $this->bids = $bids;
    }
}
