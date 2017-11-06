<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 03/10/2017
 * Time: 18:42
 */

abstract class Model
{

    protected $dbhandler;
    protected $statement;
    protected $error;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        ];
        try{
            $this->dbhandler = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS,$options);
        }catch (PDOException $e){
            $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Methode die query accepteert en prepared
     * @param $query
     */
    public function query($query){
    $this->statement = $this->dbhandler->prepare($query);
    }

    /**
     * @param $param : parameter in de query.
     * @param $value value van wat er gebined word.
     * @param null $type
     */
    public function bind($param, $value, $type=null) {
        if(is_null($type)) {

            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param,$value,$type);
    }

    /*
     * execute methode die statement execute.
     */
    public function execute(){
        $this->statement->execute();
    }

    /*
     * methode die alle resultaten uit de db fetched.
     */
    public function results(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
     * methode die returned laatste ingevoerde id.
     */
    public function lastInsertId(){
        return $this->dbhandler->lastInsertId();
    }

    /*
     * methode die 1 record uit database fetched.
     */
    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}