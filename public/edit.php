<?php

require_once('../includes/initialize.php');

if (!$session->isLoggedIn()) {
    redirectTo("login.php");
}

if (empty($_GET['id'])) {
    $session->message("No Ad ID was provided.");
    //redirectTo('index.php');
}

$id = $_GET['id'];

if (isPostRequest()) {
    $ad = new Ad();
    $ad->id = $id;
    $ad->title = $_POST['title'];
    $ad->description = $_POST['description'];
    $ad->author = $_POST['author'];
    $ad->created_at = $_POST['created_at'];

    if ($ad->save()) {
        // Success
        $_SESSION['message'] = "Ad updated successfully.";
        //redirectTo('index.php');
    }
}
    $ad = Ad::findById($id);

?>

<?php includeLayoutTemplate('header.php'); ?>

<div id="content">
  <div class="bg-success px-3 mt-2"><?php echo '<p class="text-white"><strong>' . $message . '</strong></p>'; ?></div>
  <a class="bg-primary text-white" href="index.php">&laquo; Back to Home Page</a>
  <h1 class="pt-2">Edit Ad</h1>
  <h3>Hello, <?php echo h($session->author); ?>!!! Please, edit your Ad!</h3>
  <form id="edit_ad" method="post">
    <fieldset class="form-group">
      <div class="form-group row">
        <label class="col-form-label col-2" for="title">Ad title</label>
        <div class="col-8">
          <input type="text" class="form-control" id="title" name="title" placeholder="Ad title"
          value="<?php echo h($ad->title); ?>"/>
        </div>
      </div>
      <div class="form-group row pt-2">
        <label class="col-form-label col-2" for="description">Description</label>
        <div class="col-8">
          <textarea type="text" class="form-control" name="description" placeholder="Edit ad"
          /><?php echo h($ad->description); ?></textarea>
        </div>
      </div>
      <input type="hidden" name="author" value="<?php echo h($session->author); ?>" />
      <input type="hidden" name="created_at" value="<?php echo time(); ?>" />
      <div class="form-group pt-2">
        <div class="col-9 offset-2">
          <button type="submit" class="btn btn-primary" name="edit" value="Edit ad">Edit ad</button>
          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete ad</a>
        </div>
      </div>
    </fieldset>
  </form>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Ad?!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          You are about to delete an ad! Are you sure?!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white"
          href="<?php echo 'delId.php?id=' . h(u($ad->id)); ?>">Delete ad</a></button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php includeLayoutTemplate('footer.php'); ?>