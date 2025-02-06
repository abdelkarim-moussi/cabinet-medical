<?php
// use App\Views\HomeView;

class Contact
{
   
    public function index(){
        require_once __DIR__."/../views/home/contactView.php";
    }

    public function create(){
        echo "create object";
    }
    
}

