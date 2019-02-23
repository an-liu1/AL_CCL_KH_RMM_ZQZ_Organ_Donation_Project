<?php

namespace Frame\Vendor;

final class PDOWrapper{
    private $db_type;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $charset;
    private $pdo = NULL;

    public function __construct(){
        $this->db_type = $GLOBALS['config']['db_type'];
        $this->db_host = $GLOBALS['config']['db_host'];
        $this->db_user = $GLOBALS['config']['db_user'];
        $this->db_pass = $GLOBALS['config']['db_pass'];
        $this->db_name = $GLOBALS['config']['db_name'];
        $this->charset = $GLOBALS['config']['charset'];
        $this->connectDb();
    }

    private function connectDb(){
        $db_dsn = array(
			'host' => "{$this->db_host}",
			'dbname' => "{$this->db_name}",
			'charset' => "{$this->charset}",
		);
        $dsn = $this->db_type.http_build_query($db_dsn,'',';');
        try{
        $this->pdo = new \PDO($dsn,$this->db_user,$this->db_pass);
        }catch(\PDOException $exception){
            echo "Wrong Message: ".$exception->getMessage();
        }
    }

    public function exec($sql){
        try{
            return $this->pdo->exec($sql);
        }catch(\PDOException $exception){
            echo "Wrong Message: ".$exception->getMessage();
        }
    }

    public function fetchOne($sql){
        try{
            $result = $this->pdo->query($sql);
            return $result->fetch(\PDO::FETCH_ASSOC);
        }catch(\PDOException $exception){
            echo "Wrong Message: ".$exception->getMessage();
        }
    }

    public function fetchAll($sql){
        try{
            $result = $this->pdo->query($sql);
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $exception){
            echo "Wrong Message: ".$exception->getMessage();
        }
    }

    public function rowCount($sql){
        try{
            $result = $this->pdo->query($sql);
            return $result->rowCount();
        }catch(\PDOException $exception){
            echo "Wrong Message: ".$exception->getMessage();
        }
    }
}