<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnagesController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('personnages/index.html.twig', [
            'controller_name' => 'PersonnagesController',
        ]);
    }

    #[Route('/persos', name: 'personnages')]
    public function persos(): Response
    {
        Personnage::creerPersonnages();
        return $this->render('personnages/persos.html.twig', [
            "players" => Personnage::$personnages  
        ]);
    }

    #[Route('/perso/{nom}', name: 'afficher_personnage')]
    public function afficherPerso($nom): Response
    {
        Personnage::creerPersonnages();
        $perso = Personnage::getPersonnageParNom($nom);
        return $this->render('personnages/perso.html.twig', [
            "perso" => $perso
        ]);
    }
}
