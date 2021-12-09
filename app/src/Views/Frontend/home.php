<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

?>
 
<div class="home">
    <div class="home__layout">
        <div class="home__title">
            <h1><?= "Welcome to MySpace " . $user; ?></h1>
        </div>

        <?php
        if (count($posts) == 0) {
            echo "You have no posts yet.";
            ?><br />
            <form action="/create">
            <input type="submit" value ="Create your first post!"></input>
            </form><?php
        }
        else {
            foreach ($posts as $post) :
                $id=$post->getId();
                ?>
                <a href=<?= "show/". $id?> class="container d-block">
                    <div class="container border border-info">
                        <h2><?= $post->getTitle(); ?></h2>
                        <div><?= "Posted by " . $post->getAuthor() . " on " . $post->getDate(); ?></div>
                        <p><?= $post->getContent(); ?></p>
                    </div>    
                </a>
            <?php endforeach; 
        }
        ?>
    <div>    
</div>
