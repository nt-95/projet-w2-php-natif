<div class="container border my-3 d-flex justify-content-center">
    <div class="container">
        <h1><?= $post_id; ?></h1>
        <h2 class="mt-2"><?= $post->getTitle(); ?></h2>
        <div><?= "Posted by " . $post->getAuthor() . " on " . $post->getDate(); ?></div>
        <img class="img-fluid my-4" src=<?= $upload_dir . $post->getImageName();?>/>
        <p><?= $post->getContent(); ?></p>       
        <form class="mb-4" action="/remove/<?= $post_id?>" method="POST">
            <!-- <button class="btn btn-primary">Edit</button> -->
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>