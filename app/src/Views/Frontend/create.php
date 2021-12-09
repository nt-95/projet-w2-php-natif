<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

?>

<h1>Write a new post</h1>
<form>
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content</label><br>
    <textarea name="content" cols="40" rows="5"></textarea><br>
     <input type="submit" value="Post">
</form>