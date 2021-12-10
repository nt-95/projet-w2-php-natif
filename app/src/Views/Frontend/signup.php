<?php

use App\Fram\Utils\Flash;

if(isset($_POST['user_name']) && isset($_POST['password'])) {
    $isQueryExecuted = $userManager->add($_POST);

    if($isQueryExecuted) {
        Flash::setFlash("success", "Welcome !");
    } else {
        Flash::setFlash("error", "The user could not be created.");
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
    <div class="form-check" style="margin-bottom: 1.5rem">
        <input name="admin" class="form-check-input" type="checkbox" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Admin
        </label>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit" name="add">Create Account</button>
    </div>
</form>