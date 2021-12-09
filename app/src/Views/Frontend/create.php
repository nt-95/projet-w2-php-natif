<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

?>

<h1>Write a new post</h1>
<form action='/' method='POST'>
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content</label><br>
    <textarea name="content" cols="40" rows="5"></textarea><br>
     <input type="submit" value="Post">
</form>

<?php
if(isset($_POST['submit'])){
        echo "Yayyyy";
    // Fetching variables of the form which travels in URL
    $title = $_POST['title'];
    $content = $_POST['content'];
    if($title !=''&& $content !='')
    {
    //  To redirect form on a particular page
    header("Location:localhost:5555/");
    }
    else{
    ?>  <span><?php echo "Please fill all fields.....!!!!!!!!!!!!";?></span> <?php
    }
}
else echo "pffff";
// $postManager->createPost("hello")
?>