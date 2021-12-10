<?php

namespace App\Controller;

use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Entity\User;
use App\Manager\UserManager;

class UserController extends BaseController
{
    public function executeLogin() {
        $userManager = new UserManager();
        $this->render(
            'login.php',
            ['userManager'=> $userManager],
            'login');
    }

    public function executeSignUp()
    {
        $userManager = new UserManager();
        return $this->render(
            'signup.php',
            [
                'userManager'=> $userManager,
            ],
            'signup'
        );
    }

    public function logout() {
        return $this->render('Logout', 'logout', []);
    }

    public function showUpdateAccount() {
        ErrorHandler::redirectIfNoLogin();
        $manager = new UserManager();
        $connectedUser = intval($_SESSION['user']['id']);
        $user = $manager->getSingleUser($connectedUser);
        return $this->render('Update Account', 'update-account', $user);
    }

    public function executeAllUsers() {
        $userManager = new UserManager();
        $users = $userManager->getAllUsers();

        $this->render(
            'users.php',
            ['users' => $users, 'userManager'=> $userManager],
            'utilisateurs');
    }

    public function executeRemoveUser() {
        $id_user = $_GET['param'];
        $userManager = new UserManager();
        $user = $userManager->remove($id_user);

        header('Location: /users');
        $this->render(
            'users.php',
            ['users' => $users, 'userManager'=> $userManager],
            'utilisateurs'
        );
    }

}

