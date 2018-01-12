<?php

class Login {

    private $username = 'ksk';
    private $pass = '123';

    public function IsLogged($user, $password) {
        // test echo $user . "<br>" . $password;
        if($user == $this->username AND $password == $this->pass) {
            //header('location: logged.php');  
            $_SESSION['name'] = 'user'; 
            return true;
        }
        else {
            print "won";
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