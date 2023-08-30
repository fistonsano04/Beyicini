<?php include 'include/header.php'; ?>
<?php
require 'config.php'; 
$db = new DBConnection();
$con = $db->con;
?>
	<link rel="stylesheet" href="./assets/css/bootstrap2.css">
<style>
    .editable{
        display:none;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  </div>
</nav>
<div class="container py-3" style="background:#fff;">
    <h2 class="border-bottom border-dark">Table Inline Form</h2>
    <span>Inline Table row cells adding and editing data using PHP and jQuery</span>

    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Member List</h3>
        </div>
        <hr>
        <div class="col-12">
            <!-- Table Form start -->
            <form action="" id="form-data">
                <input type="hidden" name="id" value="">
                <table class='table table-hovered table-stripped table-bordered' id="form-tbl">
                    <colgroup>
                        <col width="20%">
                        <col width="25%">
                        <col width="15%">
                        <col width="25%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center p-1">Name</th>
                            <th class="text-center p-1">Email</th>
                            <th class="text-center p-1">Contact</th>
                            <th class="text-center p-1">Country</th>
                            <th class="text-center p-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = $con->query("SELECT * FROM `users` order by id asc");
                    while($row = $query->fetch_assoc()):
                    ?>
                    <tr data-id='<?php echo $row['id'] ?>'>
                        <td name="name"><?php echo $row['fullName'] ?></td>
                        <td name="email"><?php echo $row['email'] ?></td>
                        <td name="phone_number"><?php echo $row['Phone_number'] ?></td>
                        <td name="country"><?php echo $row['Country'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0 py-0 edit_data noneditable" type="button">Edit</button>
                            <button class="btn btn-danger btn-sm rounded-0 py-0 delete_data noneditable" type="button">Delete</button>
                            <button class="btn btn-sm btn-primary btn-flat rounded-0 px-2 py-0 editable">Save</button>
                            <button class="btn btn-sm btn-dark btn-flat rounded-0 px-2 py-0 editable" onclick="cancel_button($(this))" type="button">Cancel</button></td>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
            <!-- Table Form end -->
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="./assets/js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap.js"></script>
<script type="text/javascript" src="./assets/js/script2.js"></script>


<?php include 'include/footer.php'; ?>