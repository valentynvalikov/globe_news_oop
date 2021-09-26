<?php require_once("../includes/initialize.php"); ?>
<?php if (empty($_GET['id'])) {
    $session->message("No Ad ID was provided.");
    redirectTo('index.php');
}
$ad = Ad::findById($_GET['id']);
if (!$ad) {
    $session->message("The Ad could not be located.");
    redirectTo('index.php');
}
// Instead of finding all records, just find the records
// for this page
$sql = "SELECT * FROM pages ";
$sql .= "WHERE author='$ad->author' ";
$sql .= "ORDER by created_at DESC";
$ads = Ad::findBySql($sql); ?>
<?php includeLayoutTemplate('header.php'); ?>

<div id="content">
  <div class="bg-success px-3 mt-2"><?php echo '<p class="text-white"><strong>' . $message . '</strong></p>'; ?></div>
  <a class="bg-primary text-white" href="index.php">&laquo; Back to Home Page</a>
  <div class="page show">
    <div class="attributes">
      <h1>Title: <?php echo h($ad->title); ?></h1>
      <p><strong>Description: <?php echo h($ad->description); ?></strong></p>
      <p><strong>Created at <?php echo date('H:i:s d-m-Y', h($ad->created_at)) . ' by ' . h($ad->author); ?></strong></p>
      <?php if ($session->author === $ad->author) {
            echo '<div class="col-4">
                    <a class="btn btn-primary" href="edit.php?id=' . h(u($ad->id)) . '">Edit ad</a>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete ad
                    </button>
                  </div>';
      }
        ?>
      <div>
        <h3 class="pt-3">Other ads by <?php echo h($ad->author); ?></h3>
        <table class="table table-hover table-sm">
        <tr class="table-primary">
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Created at</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($ads as $ad) : ?>
          <tr class="table-light">
            <td><h6><a class="action" href="ad.php?id=<?php echo h(u($ad->id)); ?>"><?php echo h($ad->title); ?>
            </a></h6></td>
            <td><?php echo h($ad->description); ?></td>
            <td><?php echo h($ad->author); ?></td>
            <td><?php echo date('H:i:s d-m-Y', h($ad->created_at)); ?></td>
            <td></td>
            <td></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
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
        <button type="button" class="btn btn-danger">
          <a style="text-decoration: none; color: white" href="<?php echo 'delId.php?id=' . h(u($_GET['id'])); ?>">
          Delete ad</a></button>
      </div>
    </div>
  </div>
</div>
</div>

<?php includeLayoutTemplate('footer.php'); ?>