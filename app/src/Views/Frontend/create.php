<?php

/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

use App\Fram\Utils\Flash;


 if(isset($_POST['submit'])){
    // Fetching variables of the form which travels in URL
    $title = $_POST['title'];
    $content = $_POST['content'];
    if($title !=''&& $content !='')
    {
        //  To redirect form on a particular page
        // header("Location:/");
        $post = $postManager->createPost($title, $content, $user);
        if ($post) {
            Flash::setFlash('success', 'Your post has been successfully created.');            
        }
        if(!$post) {
            Flash::setFlash('alert', 'The post could not be created.');
        }
    }
    else{
    ?>  <span><?php Flash::setFlash('alert', 'Please fill in all the fileds.');?></span> <?php
    }
}


?>

<h1>Write a new post</h1>
<form method='POST'>
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content</label><br>
    <textarea name="content" cols="40" rows="5"></textarea><br>
     <input type="submit" name="submit" value="Post">
</form>