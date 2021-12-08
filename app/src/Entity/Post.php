<?php

namespace App\Entity;

class Post
{
    private int $id;
    private string $date;
    private string $title;
    private string $content;
    private string $author;
    private int $authorId;

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
}