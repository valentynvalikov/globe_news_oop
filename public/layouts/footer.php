<footer class="mt-4">
  &copy; <?php echo date('Y'); ?> <h6><a href="index.php">Globe News</a></h6>
</footer>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/form.js"></script>
</div>
</body>
</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>