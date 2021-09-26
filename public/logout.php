<?php require_once("../includes/initialize.php"); ?>
<?php	
    $session->logout();
    redirectTo("index.php");
?>
