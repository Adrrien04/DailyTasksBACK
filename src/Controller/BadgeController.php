<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BadgeController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/badges", name="badge_list")
     */
    public function badgeList(): Response
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/badges', [
                'timeout' => 60,
                'verify_peer' => false,
                'verify_host' => false,
            ]);

            $data = $response->toArray();

            return $this->render('home/badge_list.html.twig', [
                'badges' => $data['member'] ?? [],
            ]);

        } catch (\Exception $e) {
            return new Response('Erreur lors de la récupération des badges : ' . $e->getMessage(), 500);
        }
    }
}