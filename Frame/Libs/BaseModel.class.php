<?php
namespace Frame\Libs;
use \Frame\Vendor\PDOWrapper;

abstract class BaseModel{
    //create pdo obj
    protected $pdo = NULL;
    //create model obj array
    protected static $arrModelObj = array();

    public function __construct(){
        // new PDO
        $this->pdo = new PDOWrapper();
    }

    //create class modelobj function
    public static function getInstance(){
        //Late static binding
        $modelClassName = get_called_class();
        // echo $modelClassName;die();
        //check if the obj exist
        if(!isset(self::$arrModelObj[$modelClassName])){
            //if not exists, create it
            self::$arrModelObj[$modelClassName] = new $modelClassName();
        }
        return self::$arrModelObj[$modelClassName];
    }

    //get one row
    public function fetchOne($where="2>1"){
        $sql = "SELECT * FROM {$this->table} WHERE {$where} LIMIT 1";
        return $this->pdo->fetchOne($sql);
    }

    //get all data
    public function fetchAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->fetchAll($sql);
    }

    //delete data
    public function delete($id){
        $sql ="DELETE FROM {$this->table} WHERE id = {$id}";
        return $this->pdo->exec($sql);
    }

    //insert data
    public function insert($data){
        //build insert string
        $fields = "";
        $values = "";
        foreach ($data as $key => $value) {
            $fields .= "$key,";
            $values .= "$value,";
        }
        //Remove the comma at the end of the string
        $fields = rtrim($fields,",");
        $values = rtrim($values,",");

        $sql = "INSERT INTO {$this->table}($fields) VALUES($values)";
        return $this->pdo->exec($sql);
    }

    //update data
    public function Update($data,$id){
        //build update string
        $str = "";
        foreach ($data as $key => $value) {
            $str .= "$key = '$value',";
        }
        //remove comma
        $str = rtrim($str,",");

        $sql = "UPDATE {$this->table} SET {$str} WHERE id = $id";
        return $this->pdo->exec($sql);
    }

    //get count num
    public function rowCount($where="2>1"){
        $sql = "SELECT * FROM {$this->table} WHERE {$where}";
        return $this->pdo->rowCount($sql);
    }
}