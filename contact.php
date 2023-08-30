<?php
require "include/header.php";
require "config.php";
?>
<style>
    .form-container {
        text-align: center;
    }

    .send-btn {
        display: block;
        margin: 0 auto;
        background-color: #FE5B29;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.5),0px 0px 10px rgba(0,0,0,0.5);
        color:#fff;
        font-size: 1.5em;
        margin-top: 1.2em;
        border-radius: 12px;

    }
textarea{
   resize: none;
}
</style>
<div class="call_text_main">
   <div class="container">
      <div class="call_taital">
         <div class="call_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span
                  class="padding_left_15">Location</span></a></div>
         <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span
                  class="padding_left_15">0620317715 / 0187362257</span></a></div>
         <div class="call_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span
                  class="padding_left_15">picland05@gmail.com</span></a></div>
      </div>
   </div>
</div>
<!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="contact_taital">Get In Touch</h1>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="contact_section_2">
         <div class="row">
            <div class="col-md-12">
               <div class="mail_section_1">
                  <form action="#" method="POST" autocomplete="off">
                     <?php
                     if (isset($_POST['sending'])) {
                        $username = mysqli_real_escape_string($con, $_POST['Name']);
                        $email = mysqli_real_escape_string($con, $_POST['Email']);
                        $phone_number = mysqli_real_escape_string($con, $_POST['Phone_number']);
                        $messages = mysqli_real_escape_string($con, $_POST['Massage']);

                        // Password Hashing is used here.
                        $sql = "INSERT INTO feedback(username, email, phone_number, messages) VALUES('$username', '$email', '$phone_number', '$messages')";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                           echo '<script>
                    alert("Thank you for Your Concern!!");
                </script>';
                        } else {
                           echo '<script>
                    alert("Error occurred while submitting feedback.");
                </script>';
                        }
                     }
                     ?>

                     <input type="text" class="mail_text" placeholder="Name" name="Name">
                     <input type="text" class="mail_text" placeholder="Email" name="Email">
                     <input type="text" class="mail_text" placeholder="Phone Number" name="Phone_number">
                     <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="Massage"></textarea>
                     <button type="submit" class="send_bt send-btn p-2" name="sending">Send</button>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
require "include/footer.php";
?>