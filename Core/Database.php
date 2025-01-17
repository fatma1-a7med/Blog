<?php

namespace Core;
use PDO;

class Database{

    private $connection;
    private $statement;
    

    public function __construct($config,$username='fatma',$password='root'){
        $dsn = "mysql:".http_build_query($config,'',';');
       $this->connection = new PDO(
              $dsn,
              $username,
              $password,
              [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]
            );
    }
    public function query($query,$params=[]){
      $this->statement = $this->connection->prepare($query);
      $this->statement->execute($params);

      return $this;
    }

    public function find(){
        return $this->statement->fetch();
    }
    public function findAll(){
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findORfail(){
        
    }
    public function fetchColumn($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

}