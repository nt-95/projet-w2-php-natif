<?php

use \App\Fram\Utils\Flash;

if(isset($_POST['user_name']) && isset($_POST['admin']) && isset($_POST['password'])) {
    $isQueryExecuted = $userManager->add($_POST);

    if($isQueryExecuted) {
        Flash::setFlash("Success", "User Created");
    } else {
        Flash::setFlash("Error", "alert");
    }
}
?>

<form style="width: 50%; margin: auto;" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">User Name</label>
        <input name="user_name" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label class="form-label" for="select_role">Role</label>
        <select class="form-control" name="admin" id="select_role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlTextarea1" rows="3" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit" name="add">Create Account</button>
    </div>
</form>