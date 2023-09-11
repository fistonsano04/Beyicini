<?php
session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
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
        </div>
        <div class="form-container">
            <div class="form-inner">
                <form action="#" class="login" method="post" autocomplete="off">
                    <?php
                    if (isset($_POST['login_submit'])) {
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];

                        $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = '$pass'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if (mysqli_num_rows($result) > 0) {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['email'] = $row['email'];
                            header("Location: dashboard");
                        } else {
                            echo '
                  <script>
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
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");

        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });

    </script>
</body>

</html>