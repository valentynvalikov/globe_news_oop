<?php require_once("../includes/initialize.php"); ?>

<?php
if (!$session->isLoggedIn()) {
    redirectTo("index.php");
}
?>

<?php
if (empty($_GET['id'])) {
    $session->message("No Ad ID was provided.");
    redirectTo('index.php');
}

$ad = Ad::findById($_GET['id']);
if ($session->author === $ad->author) {
    if ($ad && $ad->delete()) {
        $session->message("The Ad was deleted.");
        redirectTo('index.php');
    }
} else {
    $session->message("The Ad could not be deleted.");
    redirectTo('index.php');
}

?>
<?php if (isset($database)) {
    $database->closeConnection();
}
