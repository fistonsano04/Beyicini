<?php include '../include/header.php';
include 'config.php';
?>
<?php
if (isset($_GET['car'])) {
    $id = filter_var($_GET['car'], FILTER_VALIDATE_INT);
    if ($id === false) {
        die("Invalid car ID.");
    }
    $id = (int) $id;
    $query = "SELECT * FROM cars WHERE id = '$id'";
    $results = mysqli_query($con, $query);
    $car = mysqli_fetch_assoc($results);
}
?>
<form action="action.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js"
    class="stripe-button"
    data-key="pk_test_51No4opDWHHHv90chFa4Zl0T2gdPG5LB7s4JODKGEZ5HWeU0Psec0I3gg11mQz47Yur73iz1uQBZN5ZICxWRQkYKI00g10HzeZ1"
    data-name="<?= $car['brand']; ?>"
    data-description="Order ID <?= $car['id']; ?>"
    data-amount="<?= $car['daily_rental']; ?>"
    data-image="../images/lo.png"
    data-currency="usd"
    data-label="Paynow">
  </script>
</form>
<?php include '../include/footer.php';?>