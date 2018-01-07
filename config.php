<?php

class Database {

    private $host = 'localhost';
    private $db_name = 'priem_mag';
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


    /* qq */

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

class Login {

    private $username = 'ksk';
    private $pass = '123';

    public function IsLogged($user, $password) {
        // test echo $user . "<br>" . $password;
        if($user == $this->username AND $password == $this->pass) {
            header('location: logged.php');
        }
    }

    public function clean($data)
    {
        if (!empty($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        else {
            return 'empty valaue';
        }
    }
}

class SessionHub {

    public function __construct($name, $lifetime = 3600, $path = null, $domain = null, $secure = false){
        if(strlen($name)<1) {
            $name = "_sess";
        }
        session_name($name);
        session_set_cookie_params($lifetime, $path, $domain, $secure, true);
        session_start();
    }

    public function __get($name) {
        return $_SESSION["name"];
    }

    public function __set($name, $value) {
        return $_SESSION["name"] = $value;
    }

    public function destroy() {
        session_destroy();
        unset($_SESSION['name']);
    }

    public function getSessionId() {
        return session_id();
    }

    public function saveSession() {
        session_write_close();
    }


}




