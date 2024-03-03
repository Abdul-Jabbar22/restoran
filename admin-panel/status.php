<?php require "layouts/header.php"; ?>

<?php
$app = new App;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        // Sanitize and validate input
        $status = isset($_POST['status']) ? $_POST['status'] : ''; // Prevent undefined index notice

        // Use prepared statement to prevent SQL injection
        $query = "UPDATE orders SET status = :status WHERE id = :id";
        $arr = [
            ":status" => $status,
            ":id" => $id
        ];

        $path = "show-orders.php";
        $app->update($query, $arr, $path);
    }
}
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update status</h5>
                <form method="POST" action="status.php?id=<?php echo htmlspecialchars($id); ?>" enctype="multipart/form-data">
                    <!-- Status select input -->
                    <div class="form-outline mb-4 mt-4">
                        <select name="status" class="form-select form-control" aria-label="Default select example">
                            <option selected disabled>Choose Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <br>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "layouts/footer.php"; ?>