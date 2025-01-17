<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiUserController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/users', name: 'app_user_list')]
    public function userList(): Response
    {
        try {

            $response = $this->client->request('GET', 'http://localhost:8000/api/users', [
                'timeout' => 10,
                'verify_peer' => false,
                'verify_host' => false,
            ]);

            $data = $response->toArray();

            return $this->render('user_list.html.twig', [
                'users' => $data['member'],
            ]);
        } catch (\Exception $e) {
            return new Response('Erreur lors de la récupération des utilisateurs : ' . $e->getMessage(), 500);
        }
    }
}
