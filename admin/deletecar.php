<?php include 'config.php' ?>
<?php
$db = new DBConnection();
$con = $db->con;
$id = $_GET['id'];
$query = "DELETE FROM cars WHERE id='$id'";
$query_run = mysqli_query($con, $query);
if ($query_run) {
    echo '<script> alert("Data deleted!"); </script>';
    header("location:cars.php");
} else {
    echo '<script>alert("Data Not deleted!"); </script>';
    header("location:cars.php");
}

?>