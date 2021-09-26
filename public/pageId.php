<?php

require_once('../includes/initialize.php');

if (!$session->isLoggedIn()) {
    redirectTo("index.php");
}

if (isPostRequest()) {
    $ad = new Ad();
    $ad->title = $_POST['title'];
    $ad->description = $_POST['description'];
    $ad->author = $_POST['author'];
    $ad->created_at = $_POST['created_at'];

    if ($ad->isUnique($ad->title)) {
        if ($ad->save()) {
            $_SESSION['message'] = "Ad created successfully.";
            //redirectTo('index.php');
        }
    } else {
        $_SESSION['message'] = "Ad with this title already exists.";
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['description'] = $_POST['description'];
        //redirectTo('create.php');
    }

    $new_id = $database->insertId($database->connection);

    $return = array('success' => false);

    if ($new_id) {
        $return = array('success' => true, 'id' => $new_id);
    }
    echo json_encode($return);
}
