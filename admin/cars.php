<?php include 'include/header.php' ?>
<?php
include 'config.php';
$db = new DBConnection();
$con = $db->con;
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $aimage = $_FILES['aimage']['name'];
    $aimage1 = $_FILES['aimage2']['name'];
    $aimage2 = $_FILES['aimage3']['name'];
    $aimage3 = $_FILES['aimage4']['name'];
    $aimage4 = $_FILES['aimage5']['name'];
    $aimage5 = $_FILES['aimage6']['name'];
    $feature = $_POST['feature'];
    $status = $_POST['status'];

    $temp_name = $_FILES['aimage']['tmp_name'];
	$temp_name1 = $_FILES['aimage2']['tmp_name'];
	$temp_name2 = $_FILES['aimage3']['tmp_name'];
	$temp_name3 = $_FILES['aimage4']['tmp_name'];
	$temp_name4 = $_FILES['aimage5']['tmp_name'];
	$temp_name5 = $_FILES['aimage6']['tmp_name'];

    move_uploaded_file($temp_name, "property/$aimage");
    move_uploaded_file($temp_name1, "property/$aimage1");
    move_uploaded_file($temp_name2, "property/$aimage2");
    move_uploaded_file($temp_name3, "property/$aimage3");
    move_uploaded_file($temp_name4, "property/$aimage4");
    move_uploaded_file($temp_name5, "property/$aimage5");

    $sql = "INSERT INTO `cars`(`brand`, `daily_rental`, `features`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `availability`) VALUES ('$title','$price','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$aimage5','$status')";
    
    $result = mysqli_query($con, $sql);
    // echo $result;
    // die();
    if ($result) {
        $msg = "<p class='alert alert-success'>Car Inserted Successfully</p>";

    } else {
        $error = "<p class='alert alert-warning'>Something went wrong. Please try again</p>";
    }
}

$query = 'SELECT * FROM cars';
$result = mysqli_query($con, $query);

?>
<style></style>
<style>
    @charset "UTF-8";

    .button {
        font-family: "Open Sans";
        font-size: 16px;
        font-weight: 400;
        display: inline-block;
        color: #fff;
        border-radius: 0.25em;
        text-shadow: -1px -1px 0px rgba(0, 0, 0, 0.4);
    }

    .primary {
        line-height: 40px;
        transition: ease-in-out 0.2s;
        padding: 0 16px;
    }

    .primary:hover,
    .condensed:hover,
    .touch:hover {
        transform: scale(1.02);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), inset 0 0 0 99999px rgba(0, 0, 0, 0.2);
    }

    .condensed {
        transition: ease-in-out 0.2s;
        line-height: 24px;
        padding: 0 8px;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
    }

    .touch {
        transition: ease-in-out 0.2s;
        line-height: 40px;
        width: 40px;
        padding: 0px;
        text-align: center;
    }

    .edit:before,
    .save:before,
    .new:before,
    .cancel:before,
    .delete:before {
        font-family: FontAwesome;
        display: inline-block;
        font-size: 1rem;
        padding-right: 12px;
        background: none;
        color: #fff;
    }

    .condensed.edit:before,
    .condensed.save:before,
    .condensed.new:before,
    .condensed.cancel:before,
    .condensed.delete:before {
        content: none;
    }

    .touch.edit:before,
    .touch.save:before,
    .touch.new:before,
    .touch.cancel:before,
    .touch.delete:before {
        width: 100%;
        text-align: center;
        font-size: 1.25rem;
    }

    .inlineIcon.edit,
    .inlineIcon.save,
    .inlineIcon.new,
    .inlineIcon.cancel,
    .inlineIcon.delete {
        background: transparent;
    }

    .inlineIcon.edit:before,
    .inlineIcon.save:before,
    .inlineIcon.new:before,
    .inlineIcon.cancel:before,
    .inlineIcon.delete:before {
        line-height: 32px;
        font-size: 32px;
        padding: 4px 0px;
    }

    .edit {
        background: #3498db;
        cursor: pointer;
    }

    .edit:before {
        content: "";
        cursor: pointer;
    }

    .inlineIcon.edit:before {
        color: #3498db;
    }

    .new {
        background: #2ecc71;
    }

    .new:before {
        content: "";
    }

    .inlineIcon.new:before {
        color: #2ecc71;
    }


    .delete {
        background: #c0392b;
        cursor: pointer;
    }

    .delete:before {
        content: "";
    }

    .inlineIcon.delete:before {
        color: #c0392b;
    }
</style>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>tinymce.init({ selector: 'textarea' });</script>
<div id="page-content-wrapper" style="background:#fff;">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Cars</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button">
                        <i class="fas fa-user me-2"></i>Admin</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid px-4">

        <h5>Cars Management</h5>
        <button type="button" class="btn btn-primary mb-5 mt-3" data-bs-toggle="modal" data-bs-target="#newcarModal">
            Add new car
        </button>
        <div class="modal col-md-8 fade" id="newcarModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="newcarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newcarModalLabel">ADD NEW CAR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Brand Name</label>
                                        <input type="text" class="form-control" name="title" required
                                            placeholder="Enter Brand Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">price</label>
                                        <input type="text" class="form-control" name="price" required
                                            placeholder="Enter daily price">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Features</label>
                                    <p class="alert alert-danger">* Important Please Do Not Remove Below Content
                                        Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details
                                    </p>
                                    <textarea class="tinymce form-control" name="feature" rows="10" cols="35">
                                                <div class="col-md-4">
                                                        <ul>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Brand : </span> Hyundai </li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Color : </span> Black</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Steering Wheel Side : </span>Left</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Model : </span> Santafe</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Year : </span> 2020</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Transmission Type : </span>Automatic</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Car Condition : </span>New</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Engine Type : </span>V8</li>
                                                        <li class="mb-3"><span class="text-secondary font-weight-bold">Fuel Type  : </span>Diesel</li>
                                                        
                                                        </ul>
                                                    </div>
                                </textarea>

                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-form-label">Image</label>
                                            <input class="form-control" name="aimage" type="file">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">Image 2</label>
                                            <input class="form-control" name="aimage2" type="file">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">Image 3</label>
                                            <input class="form-control" name="aimage3" type="file">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">Image 4</label>

                                            <input class="form-control" name="aimage4" type="file">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">Image 5</label>
                                            <input class="form-control" name="aimage5" type="file">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">image 6</label>
                                            <input class="form-control" name="aimage6" type="file">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-form-label">Check Availability</label>
                                            <select class="form-control" required name="status">
                                                <option value="">Select Status</option>
                                                <option value="available">Available</option>
                                                <option value="sold out">Booked Out</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <hr>

                                <input type="submit" value="Submit" class="btn btn-primary" name="add"
                                    style="margin-left:200px;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brand</th>
                    <th>Daily Rental</th>
                    <th>Image profile</th>
                    <th>Availability</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <td>
                            <?php echo $row['id'] ?>
                        </td>
                        <td>
                            <?php echo $row['brand'] ?>
                        </td>
                        <td>
                            <?php echo $row['daily_rental'] ?>
                        </td>
                        <td>
                            <?php echo $row['image'] ?>
                        </td>
                        <td>
                            <?php echo $row['availability'] ?>
                        </td>
                        <td>
                            <a class="button inlineIcon edit" href="editcar.php?id=<?php echo $row['id'] ?>"></a>
                            <a class="button inlineIcon delete" href="deletecar.php?id=<?php echo $row['id'] ?>"></a>
                        </td>
                    </tr>
                    <?php
                    }

                    ?>
            </tbody>
        </table>
    </div>
</div>
 <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
  </script>
</div>
<!-- /#page-content-wrapper -->
</div>

<?php include 'include/footer.php' ?>


<!-- Modal -->