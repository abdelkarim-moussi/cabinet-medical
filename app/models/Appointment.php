<?php
require_once "../core/Database.php";

use App\Models\Doctor;
use App\core\Database;

class Appointement
{
    private $idApp;
    private $date;
    private Doctor $doctor;
    private Patient $patient;
    private static $connection;

    function __construct($idApp,$date,Doctor $doctor, Patient $patient)
    {
    
        $this->idApp = $idApp;
        $this->date = $date;
        $this->doctor =$doctor;
        $this->patient = $patient;

        self::$connection = Database::getInstance()->getConnection();
    }


    //getters and setters

    public function getIdApp(){
        return $this->idApp;
    }
   
    public function getDateApp(){
        return $this->date;
    }
    public function setDateApp($date){
        $this->date = $date;
    }

    public function getPatient(){
        return $this->patient;
    }

    public function setPatient($patient){
        $this->patient = $patient;
        return $this->patient;
    }

    public function getDoctor(){
        return $this->doctor;
    }

    public function setDoctor($doctor){
        
        $this->doctor = $doctor;
        return $this->doctor;
    }

    public function findAll(){
        $stmt = self::$connection->prepare("SELECT * FROM public.rendez_vous");
        $stmt->execute();
        $appointmnents = [];
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        while($result){

            foreach($result as $obj){
                $appointmnent = new self($obj->id_rend,$obj->date,$obj->id_person,$obj->id_medcin);
                array_push($appointmnents,$appointmnent);
            }
            return $appointmnents;
        
        }
    }

    public function findById($id){

        $stmt = self::$connection->prepare("SELECT * FROM public.rendez_vous WHERE id_rend = :id_rend");
        $stmt->bindParam(':id_rend',$id);
        $stmt->execute();
        return $result = $stmt->fetchObject(__CLASS__);

    }

    public function create(){

        $stmt = self::$connection->prepare("INSERT INTO public.rendez_vous (id_person,id_medcin,date_rv) VALUES(:id_person,:id_medcin,:date_rv)");
        
        $stmt->bindParam(':id_person',$this->patient->getIdPerson());
        $stmt->bindParam(':id_medcin',$this->doctor->getIdPerson());
        $stmt->bindParam(':date_rv', $this->date);
        $stmt->execute();

        return $stmt->execute();

    }

    public function update(){

        $stmt = self::$connection->prepare("UPDATE public.rendez_vous SET id_medcin = :id_medcin , date_rv = :date_rv");

        $stmt->bindParam(':id_medcin',$this->doctor->getIdPerson());

        $stmt->bindParam('date_rv',$this->date);

        $stmt->execute();

        return $stmt->execute();

    }

    public function delete(){

        $stmt = self::$connection->prepare("DELETE FROM public.rendez_vous WHERE id_rend = :id_rend");
        $stmt->bindParam('id_rend',$this->idApp);
        $stmt->execute();
        return $stmt->execute();

    }
}


