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
            echo '<a href="edit.php?id=' . h(u($ad->id)) . '" class="btn btn-primary text-nowrap" >Edit ad</a>';
            } ?></td>
        <td><?php if ($session->author === $ad->author) {
            echo '<a href="delete.php?id=' . h(u($ad->id)) . '" class="btn btn-danger text-nowrap">Delete ad</a>';
            } ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<div id="pagination">
    <ul class="pagination">
    <?php if ($pagination->totalPages() > 1) {
        if ($pagination->hasPreviousPage()) {
            echo "<li class=\"page-item\">
                <a class=\"page-link\" href=\"index.php?page=" . $pagination->previousPage() . "\">&laquo; Prev</a>
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
                <a class=\"page-link\" href=\"index.php?page=" . $pagination->nextPage() . "\">Next &raquo;</a>
            </li> ";
        }
    }
    ?>
    </ul>
</div>
<?php includeLayoutTemplate('footer.php'); ?>