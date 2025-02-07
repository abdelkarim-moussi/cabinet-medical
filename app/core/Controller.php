<?php
namespace App\Core;

class Controller{
    

    public function View($name){
        
        $filename = '../app/views/'. $name .'.view.php';

        if(file_exists($filename)){
            require_once $filename;
        }
        else{

            $filename = '../app/views/404.php';
            require_once $filename;
            
        }
    }
}