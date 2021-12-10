<?php
\App\Vendors\ErrorHandler::redirectIfLogin();

if(isset($_POST['user_name']) && isset($_POST['admin']) && isset($_POST['password'])) {
    $userId = $userManager->add($_POST);

    if(intVal($userId) > 0) {
        \App\Vendors\SuccessHandler::successLogin($_POST['admin'], $_POST['user_name'], $userId, '/');
    } else {
        \App\Vendors\Flash::setFlash("Error", "alert");
    }
}
?>

<form style="width: 50%; margin: auto;" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">User Name</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="select_role">Role</label>
        <select class="form-control" name="role" id="select_role">
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