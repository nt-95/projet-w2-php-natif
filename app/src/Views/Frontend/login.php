<?php

use App\Fram\Utils\Flash;

if(isset($_POST['user_name']) && isset($_POST['password'])) {
    $isQueryExecuted = $userManager->add($_POST);

    if($isQueryExecuted) {
        Flash::setFlash("Success", "User Created");
    } else {
        Flash::setFlash("Error", "alert");
    }
}
?>

<form style="margin: 50px auto; width: 50%" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">User Name</label>
        <input name="user_name" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlTextarea1" rows="3" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit" name="add">Connect</button>
    </div>
</form>