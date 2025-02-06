<?php
namespace App\Models;

class Person
{
    private $idPerson;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $motdepass;

    public function __contruct()
    {

    }

    //getters and setters
    public function getIdPerson(){
        return $this->idPerson;
    }
    public function setIdPerson($idPerson){
        $this->idPerson = $idPerson;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getMotDePass(){
        return $this->motdepass;
    }
    public function setModDePass($motdepass){
        $this->motdepass = $motdepass;
    }


}