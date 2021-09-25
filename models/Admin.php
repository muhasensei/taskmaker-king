<?php

class Admin{
    protected $username = 'admin';
    protected $password = '123';

    public function validate($username, $password){
        if($username && $password) {
          if(is_string($username) && is_string($password)) {
            return true;
          }
        }
        return false;
      }

    public function login($username, $password) {
        if (!$this->validate($username, $password)) {
            print("Неправильные данные");
            return false;
        }
        if ($this->username == $username && $this->password == $password) {
            return true;
        }

        return false;
    }
}

?>