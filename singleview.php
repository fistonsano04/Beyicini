<?php include 'include/header.php';
include 'config.php'; ?>


<?php

if (isset($_GET['car'])) {
    $id = $_GET['car'];
    $query = "SELECT * FROM cars WHERE id= '$id'";
    $results = mysqli_query($con, $query);
    $car = mysqli_fetch_assoc($results);
}

?>

<div class="container-fluid" style="height: 100%">
    <div class="row">
        <div class="col-md-6 p-2 pb-5">
            <div class="row">
                <p class="col-md-2 fw-bold fs-1 mt-3">
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
 <div class="container-fluid">
<div class="row text-light" style="background:#FE5B29;">
  <label class="control-label fs-3" for="textinput">Pick up Date: </label>  
  <div class="col-md-6 p-2 pb-5">
  	<input id="textinput" name="textinput" type="date" placeholder="placeholder" class="form-control input-md">
  </div>
              
  <label class="control-label fs-3" for="textinput">Return Date: </label>  
  <div class="col-md-6 p-2 pb-5">
  	<input id="textinput" name="textinput" type="date" placeholder="placeholder" class="form-control input-md">
  </div>
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn mb-3"style="color:#FE5B29;background:#fff;">Book Now</button>
  </div>
 </div>

</fieldset>
</form>
		</div>
		
	</div>
</div>
<?php include 'include/footer.php'; ?>