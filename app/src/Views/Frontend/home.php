
<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

 $post = $postManager->getPostById(1);
var_dump($posts);
var_dump($post->author);

?>

<div class="home">
    <div class="home__layout">
        <div class="home__title">
            <h1>Un titre de home page</h1>
        </div>

        <div class="container">
            <h2>Blabla</h2>
            <h2><?php "hello " . $post->getTitle(); ?></h2>
        </div>
    <div>

</div>
