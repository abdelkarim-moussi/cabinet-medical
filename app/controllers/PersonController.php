<?php
use App\Core\Controller;
use App\Models\Person;

class PersonController extends Controller
{
    private Person $person;

    public function get(){

        $result = $this->person->findAll();

        echo json_encode(['success'=>true,'data'=>$result]);

    }
}