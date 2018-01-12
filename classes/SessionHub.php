<?php

class SessionHub {

    public function __construct($name, $lifetime = 3600, $path = '/', $domain = null, $secure = false){
        if(strlen($name)<1) {
            $name = "_sess";
        }
        session_start();
        session_name($name);
        session_set_cookie_params($lifetime, $path, $domain, $secure, true);     
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