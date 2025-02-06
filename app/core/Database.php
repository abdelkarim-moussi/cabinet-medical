<?php 
namespace App\core;
require_once 'config.php';

use PDO;
use PDOException;
class Database
{
    private static $instance;
    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('pgsql:host='. SERVERNAME .';dbname='. DBNAME, USERNAME,PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC).
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die('database error : '.$e->getMessage());
        }
        
    }

    public static function getInstance(){

        if(!isset(self::$instance)){
            return self::$instance = new self;
        }

        else {
            return self::$instance;
        }
    }

    public function getConnection(){

        return $this->connection;

    }
}

$db = new Database;
