<?php require_once("../includes/initialize.php"); ?>
<?php
if (empty($_GET['id'])) {
    $session->message("No Ad ID was provided.");
    redirectTo('index.php');
}

$ad = Ad::findById($_GET['id']);

if (!$ad) {
    $session->message("The Ad could not be located.");
    redirectTo('index.php');
}

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE author='$ad->author' ";
    $sql .= "ORDER by created_at DESC";
    $ads = Ad::findBySql($sql);
?>
<?php includeLayoutTemplate('header.php'); ?>

<h2>You are about to delete: <?php echo h($ad->title); ?><br>Are you sure?</h2>
<p><strong>Description: <?php echo h($ad->description); ?></strong></p>
<p><strong>Created at  <?php echo date('H:i:s d-m-Y', h($ad->created_at)) . ' by ' . h($ad->author); ?></strong></p>
<?php if ($session->author === $ad->author) {
    echo '
        <div class="col-4">
            <a class="btn btn-primary" href="edit.php?id=' . h(u($ad->id)) . '">Edit ad</a>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete ad</button>
        </div>';
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Ad?!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you REALLY sure?!</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">
                    <a style="text-decoration: none; color: white" href="<?php echo 'delId.php?id=' . h(u($ad->id)); ?>">Delete ad</a>
                </button>
            </div>
        </div>
    </div>
</div>

<?php includeLayoutTemplate('footer.php'); ?>
