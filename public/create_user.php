<?php

require_once('../includes/initialize.php');
if ($session->isLoggedIn()) {
    redirectTo("index.php");
}

?>

<?php
if (isPostRequest()) {
    $user = new User();
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!preg_match('/[A-Z]/', $user->password)) {
        $_SESSION['message']  =
        "Password must contain at least 1 UPPERCASE letter, 1 lowercase letter, 1digit, and 1 symbol.";
        redirectTo("create_user.php");
    } elseif (!preg_match('/[a-z]/', $user->password)) {
        $_SESSION['message']  =
        "Password must contain at least 1 UPPERCASE letter, 1 lowercase letter, 1digit, and 1 symbol.";
        redirectTo("create_user.php");
    } elseif (!preg_match('/[0-9]/', $user->password)) {
        $_SESSION['message']  =
        "Password must contain at least 1 UPPERCASE letter, 1 lowercase letter, 1digit, and 1 symbol.";
        redirectTo("create_user.php");
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $user->password)) {
        $_SESSION['message']  =
        "Password must contain at least 1 UPPERCASE letter, 1 lowercase letter, 1digit, and 1 symbol.";
        redirectTo("create_user.php");
    } elseif (preg_match('/[^A-Za-z0-9]/', $user->username)) {
        $_SESSION['message']  = "Username should contain letters and/or numbers.";
        redirectTo("create_user.php");
    }

    if ($user->isUnique($user->username)) {
        if ($user->save()) {
            // Success // Успех
            $_SESSION['message'] = "User created successfully.";
        }
            // Login after user creation
            // Логин после создания пользователя
            $sql = "SELECT * FROM users ";
            $sql .= "WHERE username='$user->username'";
            $sql .= "LIMIT 1";
            $result = $database->query($sql);
            $database->confirmQuery($result);
            $found_user = mysqli_fetch_assoc($result);
            mysqli_free_result($result);

        if (password_verify($user->password, $found_user['hashed_password'])) {
            $session->login($user->username);
            $_SESSION['user_id'] = $found_user['id'];
            $_SESSION['author'] = $found_user['username'];
            redirectTo("index.php");
        }
    } else {
        $_SESSION['message'] = "User already exists. Try another username.";
        redirectTo("create_user.php");
    }
}

?>

<?php includeLayoutTemplate('header.php'); ?>

<div id="content">
   <div class="bg-danger px-3"><?php echo '<p class="text-white"><strong>' . $message . '</strong></p>'; ?></div>
   <a class="bg-primary text-white" href="index.php">&laquo; Back to Home Page</a>
    <h3>Hello, new Creator!!! Feel free to register your account!</h3>
    <h5 class="bg-warning">
      <strong>!!! You must use STRONG Password, that contains both UPPERCASE and lowercase letters,
      digits and even some $pecial $ymbols. Don't use dates of birth, wedding, historical events and names !!!</strong>
    </h5>
    <form id="reg" action="create_user.php" method="post">
        <fieldset class="form-group">
          <div class="form-group row">
            <label class="col-form-label col-2" for="username">Username</label>
            <div class="col-6">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
            </div>
          </div>
          <div class="form-group row pt-2">
            <label class="col-form-label col-2" for="password">Password</label>
            <div class="col-6">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            </div>
          </div>
          <div class="form-group row pt-2">
            <label class="col-form-label col-2" for="confirm_password">Confirm Password</label>
            <div class="col-6">
              <input type="password" class="form-control" id="confirm_password"
              name="confirm_password" placeholder="Confirm Password" />
            </div>
          </div>
          <div class="form-group offset-2 pt-3">
              <input type="submit" class="btn btn-primary" name="submit" value="Register" />
          </div>
        </fieldset>
    </form>
</div>

<?php includeLayoutTemplate('footer.php'); ?>