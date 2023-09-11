<?php include 'include/header.php';
include 'config.php';
?>


<?php
$message = '';
$class = '';
if (isset($_GET['car'])) {
    // Sanitize and validate the input.
    $id = filter_var($_GET['car'], FILTER_VALIDATE_INT);
    if ($id === false) {
        die("Invalid car ID.");
    }

    // Ensure that $id is an integer; otherwise, it's unsafe for SQL.
    $id = (int) $id;

    // Establish a database connection (assuming $con is your connection).

    // Use the sanitized $id in your SQL query.
    $query = "SELECT * FROM cars WHERE id = '$id'";
    $results = mysqli_query($con, $query);
    $car = mysqli_fetch_assoc($results);
}

$today = date('Y-m-d');

// Bookings
if (isset($_POST['check'])) {
    $pickupDate = $_POST['pickupDate'];
    $returnDate = $_POST['returnDate'];

    // Sanitize and validate the dates.
    $pickupDate = filter_var($pickupDate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")));
    $returnDate = filter_var($returnDate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")));

    if ($pickupDate === false || $returnDate === false) {
        die("Invalid date format.");
    }

    // Establish a database connection (assuming $con is your connection).

    // Check if the car is available by querying existing bookings for the car.
    $query = "SELECT * FROM bookings WHERE car_id = '$id' AND ('$pickupDate' < return_date) AND ('$returnDate' > booking_date)";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) > 0) {
        $class = "alert alert-danger";
        $message = "Car is not available during the selected dates";
    } else {
        $class = 'alert alert-success';
        $message = "Car is available for the selected dates. <a class='fw-bold fs-6' href='stripe/index?car_id=".$id."'>Pay here</a>";
        // header("location:paying.php");
        // echo '<meta http-equiv="refresh" content="0; url=paying.php?car_id=">';
    }
}
?>
<style>
    /* Custom CSS for image */
    .form {
        background-color: #FE5B29;
    }

    .image-container {
        background-image: url('admin/uploads/check.png');
        background-size: cover;
        background-repeat: no-repeat;
        /* height: 100%; */
    }
</style>

<div class="container-fluid" style="height: 100%">
    <div class="row">
        <div class="col-md-6 p-2 pb-5">
            <div class="row">
                <p class="col-md-2 fw-bold text-dark mt-3">
                    <?= $car['brand']; ?>
                </p>
                <p class="col-md-2 text-white p-2 mt-2"
                    style="margin-left:25em; background-color:#FE5B29; border-radius:12px;">
                    <?= $car['daily_rental']; ?>
                </p>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                        aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height:30em; object-fit:cover; ">
                        <img src="admin/property/<?= $car['image']; ?>" class="d-block w-100"
                            alt="<?= $car['brand']; ?>">
                    </div>
                    <div class="carousel-item active" style="height:30em; object-fit:cover;">
                        <img src="admin/property/<?= $car['image2']; ?>" class="d-block w-100"
                            alt="<?= $car['brand']; ?>">
                    </div>
                    <div class="carousel-item active" style="height:30em; object-fit:cover;">
                        <img src="admin/property/<?= $car['image3']; ?>" class="d-block w-100"
                            alt="<?= $car['brand']; ?>">
                    </div>
                    <div class="carousel-item active" style="height:30em; object-fit:cover;">
                        <img src="admin/property/<?= $car['image4']; ?>" class="d-block w-100"
                            alt="<?= $car['brand']; ?>">
                    </div>
                    <div class="carousel-item active" style="height:30em; object-fit:cover;">
                        <img src="admin/property/<?= $car['image5']; ?>" class="d-block w-100"
                            alt="<?= $car['brand']; ?>">
                    </div>
                    <div class="carousel-item active" style="height:30em; object-fit:cover;">
                        <img src="admin/property/<?= $car['image6']; ?>" class="d-block w-100"
                            alt="<?= $car['brand']; ?>">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="col-md-6 p-2 pl-5 pb-5" style=" margin-top: 3%;">
            <p class="fs-1 fw-bold">
                <?= $car['features']; ?>
            </p>
        </div>
    </div>
</div>
</div>


<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-md-6">
            <?php if($message != '') { ?>
                <div class="<?= $class;?>" role="alert">
                    <p><?= $message;?></p>
                </div>
            <?php } ?>
            <form action="" class="form p-3" method="POST">
                <div class="mb-3">
                    <label for="pickupDate" class="form-label text-light">Pickup Date</label>
                    <input name="pickupDate" class="form-control" type="date" id="pickup" required min="<?= $today; ?>"
                        style="border-radius:15px;">
                </div>
                <div class="mb-3">
                    <label for="returnDate" class="form-label text-light">Return Date</label>
                    <input type="date" class="form-control" id="returnDate" name="returnDate" required
                        min="<?= $nextDate; ?>" style="border-radius:15px;">
                </div>
                <div class="text-center"> <!-- Center aligns the following content -->
                    <button type="submit" class="btn btn-md btn-dark text-light mb-5 mt-3" name="check">Check
                        availability</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 image-container">

        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script> -->
<script>
    const startDateInput = document.getElementById("pickup");
    const endDateInput = document.getElementById("returnDate");

    startDateInput.addEventListener("input", function () {
        const selectedDate = new Date(startDateInput.value);
        selectedDate.setDate(selectedDate.getDate() + 1);

        const minEndDate = selectedDate.toISOString().split("T")[0];
        endDateInput.min = minEndDate;

        // Reset end_date input if it's less than the new min value
        if (endDateInput.value < minEndDate) {
            endDateInput.value = minEndDate;
        }
    });

</script>
<?php include 'include/footer.php'; ?>
<script>
    function openDynamicModal() {
        let modal = document.querySelector("#exampleModal");
        let modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
    }
</script>