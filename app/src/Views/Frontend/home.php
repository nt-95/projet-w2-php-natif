<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

?>
 
<div class="home">
    <div class="home__layout">
        <div class="container ">
            <h1 class="text-center m-5"><?= "Welcome to MySpace " . $user; ?></h1>
        </div>

        <?php
        if (count($posts) == 0) {
         
            ?>
            <div>
            <p>You have no posts yet.</p>
            <form action="/create">
            <input type="submit" value ="Create your first post!"></input>
            </form>
            </div><?php
        }
        else {
            foreach ($posts as $post) :
                ?>
                <a href=<?= "show/". $post->getId();?> class="container d-block link-dark text-decoration-none">
                    <div class="container border my-3 d-flex justify-content-center">
                        <div class="container">
                            <h2 class="mt-2"><?= $post->getId().".".$post->getTitle(); ?></h2>
                            <div><?= "Posted by " . $post->getAuthor() . " on " . $post->getDate(); ?></div>
                            <div class="">
                                <img class="img-fluid my-4" src="https://i.imgur.com/Eukht.jpeg"/>
                            </div>
                            <p><?= $post->getContent(); ?></p>
                        </div>
                    </div>    
                </a>
            <?php endforeach; 
        }
        ?>
    <div>    
</div>
