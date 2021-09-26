<?php

require_once('../includes/initialize.php');
if (!$session->isLoggedIn()) {
    redirectTo("index.php");
}

?>

<?php includeLayoutTemplate('header.php'); ?>

<div id="content">
  <div class="bg-danger px-3"><?php echo '<p class="text-white"><strong>' . $message . '</strong></p>'; ?></div>
  <a class="bg-primary text-white" href="index.php">&laquo; Back to Home Page</a>
    <h1 class="pt-2">Create Ad</h1>
    <h3>Hello, <?php echo h($session->author); ?>!!! Feel free to tell something to the world!</h3>
    <form id="new_ad" action="pageId.php" method="post">
      <fieldset class="form-group">
        <div class="form-group row">
          <label class="col-form-label col-2" for="title">Ad title</label>
          <div class="col-8">
            <input type="text" class="form-control item d-inline" id="title" name="title" placeholder="Ad title"
            value="<?php if (isset($_SESSION['title'])) {
                       echo $_SESSION['title'];
                   } ?>"/>
          </div>
        </div>
        <div class="form-group row pt-2">
          <label class="col-form-label col-2" for="description">Description</label>
          <div class="col-8">
            <textarea type="text" class="form-control" name="description" placeholder="Tell something to the world"
            /><?php if (isset($_SESSION['description'])) {
                echo $_SESSION['description'];
              } ?></textarea>
          </div>
        </div>
        <input type="hidden" name="author" value="<?php echo h($session->author); ?>" />
        <input type="hidden" name="created_at" value="<?php echo time(); ?>" />
        <div class="form-group pt-2">
          <div class="col-9 offset-2">
            <input type="submit" class="btn btn-primary" name="new" value="Create ad" />
          </div>
        </div>
      </fieldset>
    </form>
 </div>

<?php includeLayoutTemplate('footer.php'); ?>