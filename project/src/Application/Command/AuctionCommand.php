<?php declare(strict_types=1);

namespace App\Application\Command;

use App\Domain\UseCases\Winner;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'auction:winner')]
class AuctionCommand extends Command {
    public function __construct(private readonly Winner $useCase) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int {
        $result = $this->useCase->run();

        print_r($result);

        return Command::SUCCESS;
    }
}
