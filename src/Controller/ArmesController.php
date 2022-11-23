<?php

namespace App\Controller;

use App\Entity\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArmesController extends AbstractController
{

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
