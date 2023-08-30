<?php include 'include/header.php'; ?>
<?php
require 'config.php';

$db = new DBConnection();
$con = $db->con;

$msg = ""; // Initialize message variable
$error = ""; // Initialize error variable

if (isset($_POST['addcontent'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

    // Handle uploaded image
    $aimage = $_FILES['aimage']['name'];
    $temp_name = $_FILES['aimage']['tmp_name'];
    $image_path = "property/" . $aimage;
    
    if (move_uploaded_file($temp_name, $image_path)) {
        $sql = "INSERT INTO `about_page`(`title`, `image`, `content`) VALUES ('$title','$aimage','$content')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $msg = "<p class='alert alert-success'>Content Inserted Successfully</p>";
        } else {
            $error = "<p class='alert alert-warning'>Something went wrong. Please try again</p>";
        }
    } else {
        $error = "<p class='alert alert-warning'>Failed to upload image. Please try again</p>";
    }
}

$query = "SELECT * FROM about_page";
$result = mysqli_query($con, $query);
?>
<!-- Rest of your HTML and form -->

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
<div id="page-content-wrapper" style="background:#fff;">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">About Us view</h2>
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

        <h5>About Us View Management</h5>
        <button type="button" class="btn btn-primary mb-5 mt-3" data-bs-toggle="modal" data-bs-target="#newcarModal">
            Add about content
        </button>
        <div class="modal col-md-8 fade" id="newcarModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="newcarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newcarModalLabel">ADD ABOUT CONTENT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Title</label>
                                        <input type="text" class="form-control" name="title" required
                                            placeholder="Enter title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Content</label>
                                    <textarea class="tinymce form-control" name="content" rows="10" cols="35" placeholder="add here some about content">
                                </textarea>

                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-form-label">Image</label>
                                            <input class="form-control" name="aimage" type="file">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <input type="submit" value="Submit" class="btn btn-primary" name="addcontent"
                                    style="margin-left:200px;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal col-md-8 fade" id="newcarModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="newcarModalLabel" aria-hidden="true">
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Banner</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <?php 
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo $row['banner']?></td>
                    <td><?php echo $row['content']?></td>
                    <td>
                            <a class="button inlineIcon edit" href="aboutviewedit.php?id=<?php echo $row['id'] ?>"></a>
                            <a class="button inlineIcon delete" href="aboutviewdelete.php?id=<?php echo $row['id'] ?>"></a>
                        </td>
                
                </tr>
                <?php 
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
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