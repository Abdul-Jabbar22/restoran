<?php include "includes/header.php" ?>

<?php
$query = "SELECT * FROM bookings WHERE user_id= '$_SESSION[user_id]'";
$app = new App;

$bookings = $app->selectAll($query);

?>
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/booking.php?id=<?php echo $_SESSION['user_id']; ?>">Bookings</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">date_booking</th>
                    <th scope="col">num_people</th>
                    <th scope="col">special_request</th>
                    <th scope="col">status</th>


                    <th scope="col">rewiew</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?php echo $booking->name; ?></td>
                        <td><?php echo $booking->email; ?></td>
                        <td><?php echo $booking->date_booking; ?></td>
                        <td><?php echo $booking->num_people; ?></td>
                        <td><?php echo $booking->special_request; ?></td>
                        <td><?php echo $booking->status; ?></td>

                        <?php if ($booking->status == "confirmed") : ?>
                            <td><a href="<?php  echo APPURL;?>/review.php" class="btn btn-success text-white">review us</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>

<?php require "includes/footer.php" ?>