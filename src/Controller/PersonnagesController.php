<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Entity\Arme;
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

    #[Route('/armes', name: 'armes')]
    public function armes(): Response
    {
        Arme::creerArmes();
        return $this->render('armes/armes.html.twig', [
            "armes" => Arme::$armes  
        ]);
    }

    #[Route('/arme/{nom}', name: 'afficher_arme')]
    public function afficherArmes($nom): Response
    {
        Arme::creerArmes();
        $arme = Arme::getArmeParNom($nom);
        return $this->render('armes/arme.html.twig', [
            "arme" => $arme
        ]);
    }
}
