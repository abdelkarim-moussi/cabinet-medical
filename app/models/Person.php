<?php
namespace App\Models;

use PDO;
use App\core\Database;
use IModelRepositorie;

class Person implements IModelRepositorie
{
    private $idPerson;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $motdepass;
    private static $connection;

    public function __contruct($idPerson,$nom,$prenom,$email,$telephone,$motdepass)
    {

        $this->idPerson =$idPerson;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->motdepass = $motdepass;

        self::$connection = Database::getInstance()->getConnection();

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


    public function findAll(){
        $stmt = self::$connection->prepare("SELECT * FROM public.personne");
        $stmt->execute();
        $users = [];
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        while($result){

            foreach($result as $obj){
                $user = new self($obj->id_person,$obj->nom,$obj->prenom,$obj->telephone,$obj->email,$obj->mod_de_pass,$obj->role);
                array_push($users,$user);
            }
            return $users;
        
        }
    }

    public function findById($id){

        $stmt = self::$connection->prepare("SELECT * FROM public.person WHERE id_person = :id_person");
        $stmt->bindParam(':id_person',$id);
        $stmt->execute();
        return $result = $stmt->fetchObject(__CLASS__);

    }

    public function create(){

        $stmt = self::$connection->prepare("INSERT INTO public.personne (nom,prenom,telephone,email,mod_de_pass) VALUES(nom,prenom,telephone,email,mod_de_pass)");
        
        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam(':prenom',$this->prenom);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':mot_de_pass', $this->motdepass);
        $stmt->execute();

        return $stmt->execute();

    }

    public function update(){

        $stmt = self::$connection->prepare("UPDATE public.personne 
        SET nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, mod_de_pass = :mod_de_pass
        WHERE id_person = :id_person");

        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam('prenom',$this->prenom);
        $stmt->bindParam('telephone',$this->telephone);
        $stmt->bindParam('email',$this->email);
        $stmt->bindParam('mod_de_pass',$this->motdepass);
        $stmt->bindParam('id_person',$this->idPerson);
        $stmt->execute();

        return $stmt->execute();

    }

    public function delete(){

        $stmt = self::$connection->prepare("DELETE FROM public.personne WHERE id_person = :id_person");
        $stmt->bindParam('id_person',$this->idPerson);
        $stmt->execute();
        return $stmt->execute();

    }


}