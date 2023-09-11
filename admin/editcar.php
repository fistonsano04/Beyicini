<?php include 'include/header.php'; ?>
<?php include 'config.php'; ?>
<?php
$db = new DBConnection();
$con = $db->con;
$msg = ""; // Initialize a message variable to hold success messages
$error = ""; // Initialize an error variable to hold error messages

if (isset($_POST['edit'])) {
    $id = $_GET['id']; // Retrieve the ID from the query parameter
    $title = $_POST['title'];
    $price = $_POST['price'];
    $feature = $_POST['feature'];
    $is_active = $_POST['is_active'];
    $is_featured = $_POST['is_featured'];

    // Initialize an array to hold image names
    $imageNames = [];

    // Loop through the image fields and handle uploads
    for ($i = 1; $i <= 6; $i++) {
        $fieldName = "aimage" . $i;
        if (isset($_FILES[$fieldName]['name']) && $_FILES[$fieldName]['name'] != '') {
            $imageName = $_FILES[$fieldName]['name'];
            $temp_name = $_FILES[$fieldName]['tmp_name'];
            $imageNames[$i - 1] = $imageName; // Store image names in the array
            move_uploaded_file($temp_name, "property/$imageName");
        }
    }

    // Build the SQL query to update car information
    $updateQuery = "UPDATE `cars` SET ";
    $updateQuery .= "`brand`='$title', ";
    $updateQuery .= "`daily_rental`='$price', ";
    $updateQuery .= "`features`='$feature', ";
    $updateQuery .= "`is_active`='$is_active', ";
    $updateQuery .= "`is_featured`='$is_featured', ";

    // Update image paths if provided
    for ($i = 1; $i <= 6; $i++) {
        $imageColumn = "image" . $i;
        if (isset($imageNames[$i - 1])) {
            $updateQuery .= "`$imageColumn`='" . $imageNames[$i - 1] . "', ";
        }
    }

    $updateQuery .= "`is_active`='$is_active' ";
    $updateQuery .= "WHERE `id`='$id'";

    $result = mysqli_query($con, $updateQuery);

    if ($result) {
        $msg = "<p class='alert alert-success'>Car Updated Successfully</p>";
        header("location:cars.php");
    } else {
        $error = "<p class='alert alert-warning'>Something went wrong. Please try again</p>";
        header("location:editcar.php");
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cars WHERE id= '$id'";
    $results = mysqli_query($con, $query);
    $car = mysqli_fetch_assoc($results);
}
?>
<div class="container">
    <div class="modal-header">
        <h5 class="fs-3" id="newcarModalLabel">Edit CAR</h5>
    </div>

    <form method="post" enctype="multipart/form-data">

        <div class="col-xl-12">
            <div class="form-group">
                <label class="col-form-label">Brand Name</label>
                <input type="text" class="form-control" name="title" required value="<?= $car['brand']; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label">price</label>
                <input type="text" class="form-control" name="price" required value="<?= $car['daily_rental']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label">Features</label>
            <p class="alert alert-danger">* Important Please Do Not Remove Below Content
                Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details
            </p>
            <textarea class="tinymce form-control" name="feature" rows="10"
                cols="35"><?= $car['features']; ?></textarea>


        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group row">
                    <label class="col-form-label">Image</label>
                    <input class="form-control" name="aimage" type="file" value="image">
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
                    <label class="col-form-label">is featured?</label>
                    <select name="is_active" class="form-control" style="width:auto;">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

            </div>
        </div>
        <hr>

        <input type="submit" value="Submit" class="btn btn-primary" name="edit" style="margin-left:200px;">

    </form>


</div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
<?php include 'include/footer.php'; ?>