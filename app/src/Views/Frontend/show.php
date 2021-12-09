<h1><?= $post_id; ?></h1>
<div class="container border border-info">
    <h2><?= $post->getTitle(); ?></h2>
    <div><?= "Posted by " . $post->getAuthor() . " on " . $post->getDate(); ?></div>
    <p><?= $post->getContent(); ?></p>
</div>  
<div>
    <form method="PUT">
        <button>Edit</button>
    </form>
    <form method="DELETE">
        <button>Delete</button>
    </form>
</div>