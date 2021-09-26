<?php

require_once("../includes/initialize.php");

if ($session->isLoggedIn()) {
    redirectTo("index.php");
}

// Remember to give your form's submit tag a name="submit" attribute!
// Помним, что тегу submit формы нужно задать аттрибут name="submit"!
if (isset($_POST['submit'])) { // Form has been submitted // Форма была отправлена
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='$username'";
    $sql .= "LIMIT 1";
    $result = $database->query($sql);
    $database->confirmQuery($result);
    $found_user = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);

    if (password_verify($password, $found_user['hashed_password'])) {
        session_regenerate_id();
        $session->login($username);
        $_SESSION['user_id'] = $found_user['id'];
        $_SESSION['author'] = $found_user['username'];
        $_SESSION['message'] = "Logged in successfully.";
        redirectTo("index.php");
    } else {
        // username/password combo was not found in the database
        // комбинация юзернейм/пароль не найдена в базе данных
        $_SESSION['message'] = "Username/password combination incorrect.";
        redirectTo("index.php");
    }
}
