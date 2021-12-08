
<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

 $post = $postManager->getPostById(2);
var_dump($posts);

?>

<div class="home">
    <div class="home__layout">
        <div class="home__title">
            <h1><?php echo "Welcome to MySpace " . $user; ?></h1>
        </div>

        <div class="container">
            <h2><?php echo $post->getTitle(); ?></h2>
            <h3><?php echo "Posted by " . $post->getAuthor() . " on " . $post->getDate(); ?></h3>
            <p><?php echo $post->getContent(); ?></p>
        </div>
    <div>

</div>
