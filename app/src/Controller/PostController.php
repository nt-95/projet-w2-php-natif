<?php

namespace App\Controller;

use App\Entity\Author;
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
                'user' => "User_name",
                // 'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'Home page'
        );

    }

    public function executeShow()    
    {
        $post_id = intval($this->params['id']);
        $postManager = new PostManager();
        $post = $postManager->getPostById($post_id);

        $this->render(
            'show.php',
            [
                'post_id' => $post_id, 
                'post' => $post,
                'postManager' => $postManager,
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
        $postManager = new PostManager();
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

    public function executeRemove()
    {
        $post_id = intval($this->params['id']);
        $postManager = new PostManager();
        $isDeleted = $postManager->deletePostById($post_id);

        $this->render(
            'remove.php',
            [
                'post_id' => $post_id, 
                'isDeleted' => $isDeleted,
                'postManager' => $postManager,
            ],
            'Remove Page'
        );
    }
}