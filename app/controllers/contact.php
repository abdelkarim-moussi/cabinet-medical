<?php
use App\Views\HomeView;

class Contact
{
    private $homeView;

    public function index(){
        $this->homeView = new HomeView\Index;
    }
    
}

