<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiUserController extends AbstractController
{
    private $client;

    // Injecte le client HTTP pour faire des requêtes à l'API
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    // Route pour afficher la liste des utilisateurs
    #[Route('/users', name: 'app_user_list')]
    public function userList(): Response
    {
        try {
            // Faire une requête GET à l'API pour récupérer les utilisateurs
            $response = $this->client->request('GET', 'http://localhost:8000/api/users', [
                'timeout' => 10,  // Délai d'attente pour la requête
                'verify_peer' => false,  // Désactive la vérification SSL
                'verify_host' => false,  // Désactive la vérification de l'hôte SSL
            ]);

            // Convertir la réponse JSON en tableau
            $data = $response->toArray();

            // Passer les utilisateurs récupérés à la vue Twig
            return $this->render('user_list.html.twig', [
                'users' => $data['member'],  // Les utilisateurs sont sous 'member' dans la réponse de l'API
            ]);
        } catch (\Exception $e) {
            // Gérer l'erreur et renvoyer une réponse d'erreur
            return new Response('Erreur lors de la récupération des utilisateurs : ' . $e->getMessage(), 500);
        }
    }
}
