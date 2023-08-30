<?php include 'include/header.php' ?>
<?php
include 'config.php';
$db = new DBConnection();
$con = $db->con;

$query =  'SELECT * FROM feedback';
$result = mysqli_query($con,$query);
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
                    <h2 class="fs-2 m-0">Feedback</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown"
                                role="button">
                                <i class="fas fa-user me-2"></i>Admin</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
<div class="container-fluid px-4">

    <h5>Feedback Management</h5>
    <table id="example" class="table table-striped mt-5" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Message</th>
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
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone_number']?></td>
                    <td><?php echo $row['messages']?></td>
                    <td>
                    <a class="button inlineIcon delete" href="deletefeedback.php?id=<?php echo $row['id'] ?>"></a>
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

<?php include 'include/footer.php' ?>


<!-- Modal -->