<?php

namespace App\Entity;

class User {

    private $id_user;
    private $user_name;
    private $password;
    private $admin;

    public function setUser($data) {
        $this->setIdUser($data['id_user']);
        $this->setUserName($data['user_name']);
        $this->setPassword($data['password']);
        $this->setAdmin($data['admin']);
    }


    public function setIdUser(string $idUser) {
        if(strlen($idUser) > 0) {
            $this->id_user = htmlspecialchars($idUser);
        } else {
            $this->id_user = NULL;
        }
    }

    public function setUserName(string $userName) {
        if(strlen($userName) > 0){
            $this->user_name = htmlspecialchars($userName);
        } else {
            $this->user_name = NULL;
        }

    }

    public function setPassword(string $password) {
        if(strlen($password) > 0) {
            $this->password = password_hash((htmlspecialchars($password)), PASSWORD_BCRYPT);
        } else {
            $this->password = NULL;
        }

    }

    public function setAdmin(string $admin) {
        if(strlen($admin) > 0) {
            $this->admin = htmlspecialchars($admin);
        } else {
            $this->admin = NULL;
        }
    }


    public function getUser() {
        $user['id_user'] = $this->id_user;
        $user['user_name'] = $this->user_name;
        $user['password'] = $this->password;
        $user['admin'] = $this->admin;

        return $user;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function getPassword () {
        return $this->password;
    }
}