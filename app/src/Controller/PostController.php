<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;

class PostController extends BaseController
{
    /**
     * Show all Posts
     */
    public function executeIndex()
    {
        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();

        $this->render(
            'home.php',
            [
                'posts' => $posts,
                'postManager' => $postManager,
                'user' => "Naiara",
                // 'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'Home page'
        );

    }

    public function executeShow()
    {
        Flash::setFlash('alert', 'je suis une alerte');

        $this->render(
            'show.php',
            [
                'test' => 'article ' . $this->params['id']
            ],
            'Show Page'
        );
    }

    public function executeAuthor()
    {
        $this->render(
            'author.php',
            [],
            'Auteur'
        );
    }

    public function executeCreate()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();

        $this->render(
            'create.php',
            [
                'posts' => $posts,
                'postManager' => $postManager,
                'user' => "Naiara",
                // 'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'Create page'
        );

    }
}