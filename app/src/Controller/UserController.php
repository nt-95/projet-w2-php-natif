<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Entity\User;
use App\Manager\UserManager;

class UserController extends BaseController
{
    public function showUsers() {
        $manager = new UserManager();
        $users = $manager->getAllUsers();

        return $this->render('users', 'users', $users);
    }

    public function showLogin() {
        return $this->render('Login', 'login', []);
    }

    public function logout() {
        return $this->render('Logout', 'logout', []);
    }

    public function showRegister() {
        return $this->render('Register', 'register', []);
    }

    public function showAccount() {
        ErrorHandler::redirectIfNoLogin();
        $manager = new UserManager();
        $connectedUser = intval($_SESSION['user']['id']);
        $user = $manager->getSingleUser($connectedUser);
        return $this->render('Account', 'account', $user);
    }

    public function showUpdateAccount() {
        ErrorHandler::redirectIfNoLogin();
        $manager = new UserManager();
        $connectedUser = intval($_SESSION['user']['id']);
        $user = $manager->getSingleUser($connectedUser);
        return $this->render('Update Account', 'update-account', $user);
    }

    public function executeAllUsers() {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $users = $userManager->getAllUsers();

        $this->render(
            'users.php',
            ['users' => $users, 'userManager'=> $userManager],
            'utilisateurs');
    }

    public function executeRemoveUser() {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $user = $userManager->executeRemoveUser($user_id);

        // $this->render(
        //     'users.php',
        //     ['users' => $users, 'userManager'=> $userManager],
        //     'utilisateurs');
    }

    public function executeSetAdmin() {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $user = $userManager->executeSetAdmin($user_id);
        Flash::setFlash('alert', 'Vous venez de passer cette personne en admin');

        // $this->render(
        //     'users.php',
        //     ['users' => $users, 'userManager'=> $userManager],
        //     'utilisateurs');
    }
}