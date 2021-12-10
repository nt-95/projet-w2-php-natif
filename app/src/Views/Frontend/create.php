<?php

/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

use App\Fram\Utils\Flash;
$upload_dir = '/var/www/html/src/Assets/Uploads/';

 if(isset($_POST['submit'])){
    // Fetching variables of the form which travels in URL
    $title = $_POST['title'];
    $content = $_POST['content'];

    $img = $_FILES['img'];
    $img_name = $img['name'];
    $img_size = $img['size'];
    $img_type = $img['type'];
    $img_error = $img['error'];
    $img_tmp_name = $img['tmp_name'];
    $file_ext = strtolower(end(explode('.', $img_name)));
    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($file_ext, $allowed)) {
        if($img_error === 0) {
            if($img_size < 10000000) {                               
                if($title !=''&& $content !='')
                {   $uploaded_img_name = uniqid('', true).'.'.$file_ext;
                    $upload_destination = $upload_dir.$uploaded_img_name; 
                    move_uploaded_file($img_tmp_name, $upload_destination);
                    $post = $postManager->createPost($title, $content, $user, $uploaded_img_name);
                    if ($post) {
                        Flash::setFlash('success', 'Your post has been successfully created.');            
                    }
                    if(!$post) {
                        Flash::setFlash('alert', 'The post could not be created.');
                    }
                }
                else{
                    Flash::setFlash('alert', 'Please fill in all the fileds.');
                }
                
            }
            else {
                Flash::setFlash('alert', 'The file is too big. Only files under 10MB are accepted.');

            }
        }
        else {
            Flash::setFlash('alert', 'There was an error uploading the file.');

        }
    }
    else {
        Flash::setFlash('alert', 'The file uploaded should be an image format (jpg, jpeg, png).');

    }

    
}


?>

<h1>Write a new post</h1>
<form method='POST' enctype="multipart/form-data">
    <label for="title">Title</label><br>
    <input class="form-text mb-3" type="text" id="title" name="title"><br>
    <label for="content">Picture</label><br>
    <input class="form-text mb-3" type="file" id="img" name="img"><br>
    <label for="content">Content</label><br>
    <textarea  class="form-text mb-3" name="content" cols="40" rows="5"></textarea><br>
     <input class="btn btn-primary" type="submit" name="submit" value="Post">
</form>