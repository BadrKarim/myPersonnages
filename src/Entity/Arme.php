<?php

namespace App\Entity;

class Arme{
    public $nom;
    public $title;
    public $description;
    public $degat;

    public static $armes = [];

    public function __construct($nom, $description, $degat){
        $this->nom = $nom;
        $this->description = $description;
        $this->degat = $degat;
        self::$armes[] = $this;
    }

    public function getmon(){
        return $this->nom;
    }

    public function getDescription(){
        return $this->nom;
    }

    public function getDegat(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function setDescription($Description){
        $this->Description = $Description;
        return $this;
    }

    public function setDegat($Degat){
        $this->Degat = $Degat;
        return $this;
    }
    
    public static function creerArmes(){
        $p1 = new Arme("épée", "Une superbe épée" ,25);

        $p2 = new Arme("hache", "Une superbe hache" ,30);

        $p3 = new Arme("arc", "Un super arc" ,22);
    }

    public static function getArmeParNom($nom){
        foreach(self::$armes as $arme){
            if (strtolower(str_replace("é","e",$arme->nom)) === $nom){
                return $arme;
            }
        }
    }
}