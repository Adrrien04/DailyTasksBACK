<?php

namespace App\Controller;

use App\Entity\DailyQuest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DailyQuestController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/mark_quest_done/{id}', name: 'mark_quest_done', methods: ['POST'])]
    public function markQuestDone(int $id): JsonResponse
    {
        $quest = $this->entityManager->getRepository(DailyQuest::class)->find($id);

        if (!$quest) {
            return new JsonResponse(['error' => 'Quête non trouvée.'], Response::HTTP_NOT_FOUND);
        }

        $quest->setDone(true);
        $this->entityManager->flush();
        

        return new JsonResponse(['message' => 'Quête marquée comme terminée et supprimée'], Response::HTTP_OK);
    }
}
