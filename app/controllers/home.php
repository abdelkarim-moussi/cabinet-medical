<?php

use App\Views\HomeView;

class Home
{
    private $homeView;

    public function index(){
        $this->homeView = new HomeView\Index;
    }
    
}