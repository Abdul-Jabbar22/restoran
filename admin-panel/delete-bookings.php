<?php require "layouts/header.php"; ?>
<?php


if (!isset($_SERVER['HTTP_REFERER'])) {

    echo "<script>window.location.href = '" . ADMINURL . "';</script>";
    exit();
}


?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Corrected DELETE query syntax
    $query = "DELETE FROM bookings WHERE id= '$id' ";

    $app = new App;

    $path = "show-bookings.php";

    $app->delete($query, $path);
}
?>


