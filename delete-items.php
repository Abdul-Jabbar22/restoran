<?php require "includes/header.php" ?>
<?php  
  

  if(!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href = '".APPURL."';</script>";
    exit();
  }


?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Corrected DELETE query syntax
    $query = "DELETE FROM cart WHERE id= '$id' ";

    $app = new App;

    $path = "cart.php";

    $app->delete($query, $path);
}else{

  echo "<script>window.location.href='".APPURL."/404.php'</script>";
}
?>

<?php require "includes/footer.php" ?>
