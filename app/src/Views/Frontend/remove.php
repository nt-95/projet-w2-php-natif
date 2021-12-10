<?php
/**
 * @var $isDeleted 
 */

 use App\Fram\Utils\Flash;


 if($isDeleted) {
    Flash::setFlash('success', 'Your post has been successfully deleted.');            

 }
 else {
     Flash::setFlash('alert', 'The post could not be deleted.'); 
 }

?>