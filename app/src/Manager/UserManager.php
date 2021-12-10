<?php
namespace App\Manager;

use App\Entity\Entity;
use App\Entity\User;
use App\Manager\BaseManager;

class UserManager extends BaseManager
{
    public function getAllUsers() : array
    {
        $query = $this->db->query('SELECT * FROM user');
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\User');

        return $query->fetchAll();
    }

    public function getSingleUser(int $id)
    {
        $query = $this->db->query('SELECT * FROM user WHERE id_user = :idUser');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\User');

        return $query->fetch();
    }

    public function login(string $user_name, string $password)
    {
        $userEntity = new User();
        $userEntity->setUserName($user_name);

        $query = $this->db->query('SELECT * FROM user WHERE user_name = :userName');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\User');

        $user = $query->fetch();

        if ($user === false) {
            ErrorHandler::wrongLogin();
        } else {
            if (password_verify($password, $user['password'])) {
                SuccessHandler::successLogin($user['admin'], $user['user_name'], $user['id_user'], "/");
            } else {
                ErrorHandler::wrongLogin();
            }
        }

        return $user;
    }

    public function logout()
    {
        unset($_SESSION['id_user']);
    }

    public function add(array $data)
    {
        try {
            /*$userEntity = new User();
            $userEntity->setUser($data);
            $user = $userEntity->getUser();*/
            $query = $this->db->prepare('INSERT INTO user (id_user, user_name, admin, password) VALUES (:idUser, :userName, :admin, :password)');
            $query->bindValue(':idUser', $data['id_user'], \PDO::PARAM_INT);
            $query->bindValue(':userName', $data['user_name'], \PDO::PARAM_STR);
            $query->bindValue(':admin', isset($data['admin']) ? $data['admin']:FALSE, \PDO::PARAM_BOOL);
            $query->bindValue(':password', $data['password'], \PDO::PARAM_STR);
            return $query->execute();



        }
        catch (\PDOException $e) {

        }
    }

    public function update(array $data)
    {
        try {
            $userEntity = new User();
            $userEntity->setUser($data);
            $user = $userEntity->getUser();

            $filteredUsers = [];
            foreach ($user as $key => $item) {
                if ($item !== NULL) {
                    $filteredUsers[$key] = $item;
                }
            }

            $keysString = "";

            foreach ($filteredUsers as $key => $value) {
                $keysString .= $key . " = :" . "$key" . ", ";
            }

            $filteredUsers['id'] = intval($_SESSION['id_user']);

            $sql = 'UPDATE users SET ' . substr($keysString, 0, -2) . ' WHERE id_user = :idUser';

            $query = $this->db->prepare($sql);
            $query->execute($filteredUsers);
            return self::getSingleUser(intval($_SESSION['id_user']));

        } catch (\PDOException $e) {
            ErrorHandler::homeRedirect($e->getMessage());
        }
    }

    public function remove(int $id_user)
    {
        try {
            $userManager = new UserManager();
            $query = $this->db->prepare('DELETE FROM user WHERE id_user= :id_user');
            $query->bindParam(':id_user', $id_user, \PDO::PARAM_INT);
            $query->execute();
        
        } catch (\PDOException $e) {
            ErrorHandler::homeRedirect($e->getMessage());
        }

    }
}