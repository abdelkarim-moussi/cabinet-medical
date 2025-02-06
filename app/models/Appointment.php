<?php
require_once "../core/Database.php";

use App\Models\Doctor;

class Appointement
{
    private $idApp;
    private $date;
    private Doctor $doctor;
    private Patient $patient;
    private $connection;

    function __construct($date,Doctor $doctor)
    {
        $this->connection = Database::getInstance()->getConnection();
        $this->date = $date;
        $this->doctor =$doctor;

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
        $stmt = $this->connection->prepare("SELECT * FROM public.rendez_vous");
        $stmt->execute();
        $stmt->fetchObject('Appointment');
    }

    public function create(){

        $stmt = $this->connection->prepare("INSERT INTO public.rendez_vous (id_person,id_medcin,date_rv) VALUES(:id_person,:id_medcin,:date_rv)");
        
        $stmt->bindParam(':id_person',$this->patient->getIdPerson());
        $stmt->bindParam(':id_medcin',$this->doctor->getIdPerson());
        $stmt->bindParam(':date_rv', $this->date);
        $stmt->execute();

        return $stmt->execute();

    }

    public function update(){

        $stmt = $this->connection->prepare("UPDATE public.rendez_vous SET id_medcin = :id_medcin , date_rv = :date_rv");

        $stmt->bindParam(':id_medcin',$this->doctor->getIdPerson());

        $stmt->bindParam('date_rv',$this->date);

        $stmt->execute();

        return $stmt->execute();

    }

    public function delete(){

        $stmt = $this->connection->prepare("DELETE FROM public.rendez_vous WHERE id_rend = :id_rend");
        $stmt->bindParam('id_rend',$this->idApp);
        $stmt->execute();
        return $stmt->execute();

    }
}


