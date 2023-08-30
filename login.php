<?php
    include('config.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Login & Signup</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  html,
  body {
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background: -webkit-linear-gradient(left, #da520e, #fe5b29, #fe5b29, #fe5b29);
  }

  ::selection {
    background: #fe5b29;
    color: #fff;
  }
</style>

<body>

  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="#" class="login" method="post" autocomplete="off">
          <?php
              if (isset($_POST['login_submit'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
        
                $sql = "SELECT * FROM users WHERE email = '$email'";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
                
                if ($row && $row['pass'] == $pass) {
                  header("Location: index.php");
              } else {
                  echo '<script>
                      alert("Login failed. Invalid username or password!!");
                  </script>';
              }
            
            }
          ?>
          <div class="field">
            <input type="email" name="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="password" name="pass" placeholder="Password" required>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="login_submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>
        <form action="#" class="signup" method="post" autocomplete="off">
          <?php
           if (isset($_POST['signup_submit'])) {
            $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone_number = mysqli_real_escape_string($con, $_POST['phone']);
            $country = mysqli_real_escape_string($con, $_POST['country']);
            $pass = $_POST['pass'];
            $confirmpass = $_POST['confirmpass'];
    
            
            
            $sql = "SELECT * from users where email='$email'";
            $result = mysqli_query($con, $sql);        
            $count_user = mysqli_num_rows($result);  
    
            $sql = "SELECT * from users where email='$email'";
            $result = mysqli_query($con, $sql);        
            $count_email = mysqli_num_rows($result);  
            
            if($count_user == 0 && $count_email==0){  
                
                if($pass == $confirmpass) {
                        
                    // Password Hashing is used here. 
                    $sql = "INSERT INTO users(fullName, email,phone_number,country, pass) VALUES('$fullname', '$email','$phone_number','$country','$pass')";
            
                    $result = mysqli_query($con, $sql);
            
                    if ($result) {
                        header("Location: login.php");
                    }
                } 
                else { 
                    echo  '<script>
                            alert("Passwords do not match")
                        </script>';
                }      
            }  
            else{  
                if($count_user>0){
                    echo  '<script>
                            alert("User name already exists!!")
                        </script>';
                }
                if($count_email>0){
                    echo  '<script>
                            alert("Email already exists!!")
                        </script>';
                }
            }     
        }
          ?>
          <div class="field">
            <input type="email" name="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="text" name="fullname" placeholder="Full Name" required>
          </div>
          <div class="field">
            <input type="tel" name="phone_number" placeholder="phone number with country code" required>
          </div>
          <div class="field">
            <input type="text" name="country" placeholder="country" required>
          </div>
          <div class="field">
            <input type="password" name="pass" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" name="confirmpass" placeholder="Confirm password" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="signup_submit" value="Signup">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
      signupBtn.click();
      return false;
    });

  </script>
</body>

</html>