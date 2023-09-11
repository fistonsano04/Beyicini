<?php
require 'config.php';
?>
<?php
$query = "SELECT * FROM cars ORDER BY id DESC";
$results = mysqli_query($con, $query);
$perPage = 8;
$totalImagesQuery = "SELECT COUNT(*) AS total FROM cars";
$totalImagesResult = mysqli_query($con, $totalImagesQuery);
$totalImagesRow = mysqli_fetch_assoc($totalImagesResult);
$totalImages = $totalImagesRow['total'];

// Get the current page number from the URL, default to 1
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
   $currentPage = intval($_GET['page']);
} else {
   $currentPage = 1;
}

// Calculate the starting image index for the current page
$startIndex = ($currentPage - 1) * $perPage;

// Retrieve image data from the database for the current page
$currentPageQuery = "SELECT * FROM cars LIMIT $startIndex, $perPage";
$currentPageResult = mysqli_query($con, $currentPageQuery);

?>
<style>
   /* Gallery image */
   .row img {
      height: 200px;
      object-fit: cover;
      display: block;
      border-radius: .5rem;
      border: 1px solid #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      transition: transform 0.2s, box-shadow 0.2s;
      cursor: pointer;
   }

   /* Image hover effect */
   .row img:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
   }
</style>
<?php include 'include/header.php'; ?>
<div class="row d-flex justify-content-evenly">
   <?php while ($row = mysqli_fetch_assoc($currentPageResult)): ?>
      <div class="card col-md-3 mt-5 mb-2 ml-2 mr-2" style="max-width: 18rem;">
         <img src="admin/property/<?= $row['image']; ?>" class="card-img-top w-100 mt-3" alt="">
         <div class="card-body">
            <h5 class="card-title text-center">
               <?= $row['brand']; ?>
            </h5>
            <h2 class="fw-bold card-subtitle mb-2 text-muted text-center">
               <?= $row['daily_rental']; ?>
            </h2>
         </div>
         <div class="card-footer text-center">
            <a style="background-color: #fe5b29;" href="singleview.php?car=<?= $row['id']; ?>"
               class="btn btn-sm text-white">Book Now</a>
         </div>
      </div>
   <?php endwhile; ?>
</div>
<nav aria-label="Page navigation example">
   <ul class="pagination pagination-sm">
      <?php if ($currentPage > 1): ?>
         <li class="page-item m-2">
            <a class="page-link" aria-label="Previous" href="?page=<?= $currentPage - 1 ?>">Previous</a>
         </li>
      <?php endif; ?>

      <?php for ($i = max(1, $currentPage - 1); $i <= min($currentPage + 1, ceil($totalImages / $perPage)); $i++): ?>
         <li class="page-item m-2">
            <a class="page-link" href="?page=<?= $i ?>" <?= ($i === $currentPage) ? 'class="active"' : '' ?>>
               <?= $i ?></a>
         </li>
      <?php endfor; ?>

      <?php if ($currentPage < ceil($totalImages / $perPage)): ?>
         <li class="page-item m-2">
            <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
               <span aria-hidden="true">Next</span>
            </a>
         </li>
      <?php endif; ?>
   </ul>
</nav>

<?php
require_once "include/footer.php";
?>