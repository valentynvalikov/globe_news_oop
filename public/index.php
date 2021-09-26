<?php require_once("../includes/initialize.php"); ?>
<?php
    // the current page number ($current_page)
    // номер текущей страницы ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // records per page ($per_page)
    // записей на странице ($per_page)
    $per_page = 5;

    // total record count ($total_count)
    // всего записей ($total_count)
    $total_count = Ad::countAll();

    $pagination = new Pagination($page, $per_page, $total_count);

    // Finding the records for this page
    // Находим записи для этой страницы
    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER by created_at DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()} ";
    $ads = Ad::findBySql($sql);

?>

<?php includeLayoutTemplate('header.php'); ?>
  <div id="content">
    <div class="bg-success px-3 mt-2"><?php echo '<p class="text-white"><strong>' . $message . '</strong></p>'; ?></div>
    <div style="float: left" class="col-9">
      <h1>Ads</h1>
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
          <td><h5><a href="ad.php?id=<?php echo h(u($ad->id)); ?>"><?php echo h($ad->title); ?></a></h5></td>
          <td><?php echo h($ad->description); ?></td>
          <td><?php echo h($ad->author); ?></td>
          <td><?php echo date('H:i:s d-m-Y', h($ad->created_at)); ?></td>
          <td><?php if ($session->author === $ad->author) {
                  echo '<a class="btn btn-primary" href="edit.php?id=' . h(u($ad->id)) . '">Edit ad</a>';
              } ?></td>
          <td><?php if ($session->author === $ad->author) {
                  echo '<a href="delete.php?id=' . h(u($ad->id)) . '" class="btn btn-danger">Delete ad</a>';
              } ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <div style="float: right" class="actions col-3 px-4 mt-2">
    <?php if ($session->isLoggedIn()) {
        echo '
        <h4>Hi, ' . h($session->author) . '!</h4>
          <div class="col-12">
            <a class="action" href="create.php">
              <button type="submit" class="btn btn-primary" name="create" value="create">Create ad</button></a>
            <a class="action" href="logout.php">
              <button type="submit" class="btn btn-primary" name="logout" value="Logout">Logout</button></a>
  	      </div>';
    } else {
        echo '
        <h4 class="px-1">Please, login</h4>
          <form id="login" action="login.php" method="post">
            <div class="col-10 pb-2">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
            </div>
            <div class="col-10 pb-2">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            </div>
              <input type="submit" class="btn btn-primary" name="submit" value="Login" />
              <a class="btn btn-primary" href="create_user.php">Or, register</a>
          </form>';
    }
    ?>
    </div>

    <div id="pagination" style="clear: both;">
      <ul class="pagination">
        <?php if ($pagination->totalPages() > 1) {
            if ($pagination->hasPreviousPage()) {
                echo "<li class=\"page-item\">
                        <a class=\"page-link\" href=\"index.php?page=" . $pagination->previousPage() . "\">
                        &laquo; Prev</a>
                      </li> ";
            }
            for ($i = 1; $i <= $pagination->totalPages(); $i++) {
                echo " <li class=\"page-item ";
                if ($i == $page) {
                    echo "active";
                }
                echo "\"><a class=\"page-link\" href=\"index.php?page=" . $i . "\">" . $i . "</a></li>";
            }
            if ($pagination->hasNextPage()) {
                echo " <li class=\"page-item\">
                         <a class=\"page-link\" href=\"index.php?page=" . $pagination->nextPage() . "\">
                         Next &raquo;</a>
                       </li> ";
            }
        }
        ?>
      </ul>
    </div>
  </div>
<?php includeLayoutTemplate('footer.php'); ?>