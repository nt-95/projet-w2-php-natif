<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{


    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->db->query('SELECT * FROM post ORDER BY id_post DESC');
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\Post');
        return $query->fetchAll();
    }

        /**
     * @param int $id
     * @return Post | bool
     */

    public function getPostById(int $id): Post
    {
        // TODO - Posts by Id
       $query = $this->db->prepare('SELECT * FROM post WHERE id_post = :id');
       $query->bindValue(':id', $id, \PDO::PARAM_INT);
       $query->execute();
       $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\Post');
       return $query->fetch();
    }
    /**
     * @param Post $post
     * @return Post|bool
     */
    public function createPost(string $title, string $content, string $user) : bool
    {
        // TODO - create post
        $insert = 'INSERT INTO `post` (`id_post`, `title`, `content`, `author`, `date`) VALUES (NULL, :title, :content, :author, CURRENT_DATE())';
        $query = $this->db->prepare($insert);
        $query->bindValue(':title', $title, \PDO::PARAM_STR);
        $query->bindValue(':content', $content, \PDO::PARAM_STR);
        $query->bindValue(':author', $user, \PDO::PARAM_STR);
        return $query->execute();
        
    }

    /**
     * @param Post $post
     * @return Post|bool
     */
    public function updatePost(Post $post)
    {
        // TODO - getPostById($post->getId())
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deletePostById(int $id): bool
    {
        // TODO - Delete post
    }
}