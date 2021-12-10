<div class="container border my-3 d-flex justify-content-center">
    <div class="container">
        <h1><?= $post_id; ?></h1>
        <h2 class="mt-2"><?= $post->getTitle(); ?></h2>
        <div><?= "Posted by " . $post->getAuthor() . " on " . $post->getDate(); ?></div>
        <img class="img-fluid my-4" src="https://i.imgur.com/Eukht.jpeg"/>
        <p><?= $post->getContent(); ?></p>
        <div class="mb-4">
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>