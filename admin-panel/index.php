<?php require "layouts/header.php"; ?>

<?php

$app = new App;
$app->validateSessionAdminInside();

$query = "SELECT COUNT(*) AS count_foods FROM foods";
$count_foods_result = $app->selectOne($query);
$count_foods_value = $count_foods_result->count_foods;

$query = "SELECT COUNT(*) AS count_orders FROM orders";
$count_orders_result = $app->selectOne($query);
$count_orders_value = $count_orders_result->count_orders;

$query = "SELECT COUNT(*) AS count_bookings FROM orders";
$count_bookings_result = $app->selectOne($query);
$count_bookings_value = $count_bookings_result->count_bookings;

$query = "SELECT COUNT(*) AS count_admins FROM admins";
$count_admins_result = $app->selectOne($query);
$count_admins_value = $count_admins_result->count_admins;

?>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Foods</h5>
        <p class="card-text">Number of foods: <?php echo $count_foods_value; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Orders</h5>
        <p class="card-text">Number of orders: <?php echo $count_orders_value; ?> </p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bookings</h5>
        <p class="card-text">Number of bookings: <?php echo $count_bookings_value; ?> </p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>
        <p class="card-text">Number of admins: <?php echo $count_admins_value; ?></p>
      </div>
    </div>
  </div>
</div>

<?php require "layouts/footer.php"; ?>
