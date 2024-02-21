<?php declare(strict_types=1);

namespace App\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Domain\UseCases\Winner;

#[Route('/api/auction')]
class AuctionController {
    #[Route('/winner', methods: 'GET')]
    public function winner(Winner $winner): Response {
        return new Response(json_encode($winner->run()));
    }
}
