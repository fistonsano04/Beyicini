<?php include 'include/header.php'; ?>
<?php include 'config.php'; ?>
<?php
$db = new DBConnection();
$con = $db->con;
$msg = ""; // Initialize a message variable to hold success messages
$error = ""; // Initialize an error variable to hold error messages

if (isset($_POST['edit'])) {
    $id = $_GET['id']; // Retrieve the ID from the query parameter
    $title = $_POST['banner'];
    $feature = $_POST['content'];

    // Initialize an array to hold image names
    $imageNames = [];

    // Loop through the image fields and handle uploads
    for ($i = 1; $i <= 1; $i++) {
        $fieldName = "aimage" . $i;
        if (isset($_FILES[$fieldName]['name']) && $_FILES[$fieldName]['name'] != '') {
            $imageName = $_FILES[$fieldName]['name'];
            $temp_name = $_FILES[$fieldName]['tmp_name'];
            $imageNames[$i - 1] = $imageName; // Store image names in the array
            move_uploaded_file($temp_name, "property/$imageName");
        }
    }

    // Build the SQL query to update car information
    $updateQuery = "UPDATE `about_page` SET ";
    $updateQuery .= "`banner`='$banner', ";
    $updateQuery .= "`about_page`='$about_page', ";

    // Update image paths if provided
    for ($i = 1; $i <= 6; $i++) {
        $imageColumn = "image" . $i;
        if (isset($imageNames[$i - 1])) {
            $updateQuery .= "`$imageColumn`='" . $imageNames[$i - 1] . "', ";
        }
    }

    $result = mysqli_query($con, $updateQuery);

    if ($result) {
        $msg = "<p class='alert alert-success'>Updated Successfully</p>";
        header("location:aboutview.php");
    } else {
        $error = "<p class='alert alert-warning'>Something went wrong. Please try again</p>";
        header("location:aboutviewedit.php");
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM about_page WHERE id= '$id'";
    $results = mysqli_query($con, $query);
    $car = mysqli_fetch_assoc($results);
}
?>
<div class="container">
    <div class="modal-header">
        <h5 class="fs-3" id="newcarModalLabel">Edit about us view</h5>
    </div>

    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <div class="row">
                <div class="col-xl-12">
                    <div class="form-group row">
                        <label class="col-form-label">Image</label>
                        <input class="form-control" name="aimage" type="file" value="image">
                    </div>
                </div>
            </div>


        </div>

        <label class="col-form-label">Features</label>
        <p class="alert alert-danger">* Important Please Do Not Remove Below Content
            Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details
        </p>
        <textarea class="tinymce form-control" name="content" rows="10"
            cols="35"><?= $about_page['content']; ?></textarea>
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