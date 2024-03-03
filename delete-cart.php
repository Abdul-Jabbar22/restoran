<?php require "includes/header.php" ?>
<?php  
  

  if(!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href = '".APPURL."';</script>";
    exit();
  }


?>
<?php


    // Corrected DELETE query syntax
    $query = "DELETE FROM cart WHERE user_id= '$_SESSION[user_id]' ";

    $app = new App;

    $path = "cart.php";

    $app->delete($query, $path);

?>

<?php require "includes/footer.php" ?>
