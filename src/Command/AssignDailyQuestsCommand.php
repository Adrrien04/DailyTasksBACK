<?php
namespace App\Command;

use App\Entity\DailyQuest;
use App\Repository\QuestRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:assign-daily-quests',
    description: 'Attribue 5 quêtes aléatoires à chaque utilisateur chaque jour.',
)]
class AssignDailyQuestsCommand extends Command
{
    private UserRepository $userRepository;
    private QuestRepository $questRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        UserRepository         $userRepository,
        QuestRepository        $questRepository,
        EntityManagerInterface $entityManager
    )
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->questRepository = $questRepository;
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = $this->userRepository->findAll();
        $quests = $this->questRepository->findAll();

        if (count($quests) < 5) {
            $output->writeln("Pas assez de quêtes disponibles.");
            return Command::FAILURE;
        }

        foreach ($users as $user) {
            
            foreach ($user->getDailyQuests() as $dailyQuest) {
                $this->entityManager->remove($dailyQuest);
            }

            
            $selectedQuests = array_rand($quests, 5);
            foreach ($selectedQuests as $index) {
                $quest = $quests[$index];
                $dailyQuest = new DailyQuest();
                $dailyQuest->setUser($user);
                $dailyQuest->setQuest($quest);
                $this->entityManager->persist($dailyQuest);
            }
        }

        $this->entityManager->flush();

        $output->writeln("Quêtes attribuées avec succès !");
        return Command::SUCCESS;
    }
}
