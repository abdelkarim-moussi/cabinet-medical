<?php
namespace App\Models;

class Doctor extends Person{

    private $specialite;

    public function __construct($specialite)
    {
        $this->specialite = $specialite;
        
    }


    public function getSpecialite(){
        return $this->specialite;
    }
    public function setSpecialite($specialite){
        $this->specialite = $specialite;
    }
}