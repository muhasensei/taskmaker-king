<?php

class Admin{
    protected $username = 'admin';
    protected $password = '123';


    public function login($username, $password) {
        if ($this->username == $username && $this->password == $password) {
            return true;
        }

        return false;
    }
}

?>