<?php

class Database {

    private $host = 'localhost';
    private $db_name = 'ppp';
    private $user = 'root';
    private $pass = '';

    private $dbh;
    private $stmt;
    private $query;
    private $params = array();
    private $pdoOptions = array();

    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options = array(
          PDO::ATTR_PERSISTENT => true,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function prepare($query, $params = array(), $pdoOptions = array()) {
        $this->stmt = $this->dbh->prepare($query, $pdoOptions);
        $this->params = $params;
        $this->query = $query;
        return $this;
    }

    public function execute($params = array()){
        if($params) {
            $this->params = $params;
        }
        $this->stmt->execute($this->params);
        return $this;
    }

    public function fetchAssoc() {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastInsertId() {
        return $this->dbh->lastInsertId();
    }

    public function getAffectedRows() {
        return $this->stmt->rowCount();
    }

    public function getStmt() {
        return $this->stmt;
    }

}
