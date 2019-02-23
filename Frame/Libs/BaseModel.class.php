<?php
namespace Frame\Libs;
use \Frame\Vendor\PDOWrapper;

abstract class BaseModel{
    protected $pdo = NULL;
    protected static $arrModelObj = array();

    public function __construct(){
        $this->pdo = new PDOWrapper();
    }

    public static function getInstance(){
        //Late static binding
        $modelClassName = get_called_class();
        // echo $modelClassName;die();
        if(!isset(self::$arrModelObj[$modelClassName])){
            self::$arrModelObj[$modelClassName] = new $modelClassName();
        }
        return self::$arrModelObj[$modelClassName];
    }

    public function fetchOne($where="2>1"){
        $sql = "SELECT * FROM {$this->table} WHERE {$where} LIMIT 1";
        return $this->pdo->fetchOne($sql);
    }

    public function fetchAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->fetchAll($sql);
    }

    public function delete($id){
        $sql ="DELETE FROM {$this->table} WHERE id = {$id}";
        return $this->pdo->exec($sql);
    }

    public function insert($data){
        $fields = "";
        $values = "";
        foreach ($data as $key => $value) {
            $fields .= "$key,";
            $values .= "$value,";
        }

        $fields = rtrim($fields,",");
        $values = rtrim($values,",");

        $sql = "INSERT INTO {$this->table}($fields) VALUES($values)";
        return $this->pdo->exec($sql);
    }

    public function Update($data,$id){
        $str = "";
        foreach ($data as $key => $value) {
            $str .= "$key = '$value',";
        }
        $str = rtrim($str,",");

        $sql = "UPDATE {$this->table} SET {$str} WHERE id = $id";
        return $this->pdo->exec($sql);
    }

    public function rowCount($where="2>1"){
        $sql = "SELECT * FROM {$this->table} WHERE {$where}";
        return $this->pdo->rowCount($sql);
    }
}