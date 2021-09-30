<?php

require_once('../includes/initialize.php');
if (!$session->isLoggedIn()) {
    redirectTo("index.php");
}

?>

<?php includeLayoutTemplate('header.php'); ?>

<h3>Hello, <?php echo h($session->author); ?>! You can edit your profile on this page!</h3>

<?php includeLayoutTemplate('footer.php'); ?>