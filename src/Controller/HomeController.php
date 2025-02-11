<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/badge_list.html.twig', [
            'title' => 'Bienvenue dans Daily Quests',
            'description' => 'Votre plateforme pour accomplir des quêtes quotidiennes !',
        ]);
    }
}