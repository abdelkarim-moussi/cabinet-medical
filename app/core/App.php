<?php
class App
{
    
    // protected $controller = "HomeController";
    // protected $method = "index";
    // protected $params;

    // public function __construct()
    // {
    //     $url = $this->parseUrl();

    //     // require_once "../app/controllers/".$this->controller.'.php';

    //     if(isset($url[0])){

    //         $filename = '../app/controllers/.'. ucfirst($url[0]) .'Controller.php';

    //         if(file_exists($filename)){
               
    //             $this->controller = ucfirst($url[0]).'Controller';

    //             unset($url[0]);

    //             require $filename;
    //         }
    //         else{
    //             $filename = "../app/controllers/_404.php";
    //             require $filename;
        
    //         }
    //     }

    //     $controller = new $this->controller;       

    //     if(isset($url[1])){

    //         if(method_exists($this->controller,$url[1])){

    //             $this->method = $url[1];
    //             unset($url[1]);
    //         }
    //     }

    //     $this->params = $url ? array_values($url) : [];

    //     call_user_func_array([$controller,$this->method],$this->params);
        
    // }

    // private function parseUrl()
    //     {
    //     if(isset($_GET['url'])){
    //         return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
    //     }
    // }

    public function __construct()
    {
        $url = $this->parseUrl();

        $filename = '../app/controllers/'. ucfirst($url[0]) .'Controller.php';

        if(file_exists($filename)){
            require $filename;
        }
        else{
            $filename = '../app/controllers/_404.php';
            require $filename;
        }

    }
    private function parseUrl(){
        $url = 'home';
        if(isset( $_GET['url'])){
            $url = $_GET['url'];
            $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
        return $url;

    }
}