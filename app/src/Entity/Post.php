<?php

namespace App\Entity;

class Post
{
    private $id_post;
    private $date;
    private $title;
    private $content;
    private $author;
    private $authorId;
    private $img_name;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_post;
    }

     /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getImageName(): string {
        return $this->img_name;
    }

}