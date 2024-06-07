<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login Page</title>
</head> 
<body>
    <div class="img-container">
        <!-- image -->
        <img src="images/img1.jpg" alt="">
        
        <!-- logo -->
        <div class="logo">
            <img src="images/logo.png" alt="logo">
        </div>

        <div class="container">
            <h1>Please Login</h1>
            <form action="index.php" method="post">
                <div class="input-container">
                    <input type="text" id="username" placeholder="* Username" name="username" required>
                </div>
                <div class="input-container">
                    <input type="password" id="password" placeholder="* Password"  name="password" required>
                </div>
                    <div class="forgetpassword">
                        <input type="checkbox">&nbsp;
                        <label for="remember-me" class="text">Remember me</label>
                        <div>
                            <a href="resetPassword.php" class="forgot-password">Forgot password?</a>
                        </div>
                    </div>
               
                <div class="btn">
                    <input type="submit" value="Login" name="login">
                </div>
                <div class="signuptext">
                    <label>Not a User?</label>&nbsp;
                    <div>
                        <a href="signUp.php" class="link">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>

<?php
    include 'db_connection.php';

    if (isset($_POST['login'])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * from func_login(?, ?)";
        
        $params = array($username, $password);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_has_rows($stmt)) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $isAdmin = $row['isAdmin'];

            if ($isAdmin == 'admin') {
                echo '<script>window.location.href = "adminHomePage.php";</script>';
            } else {
                echo '<script>window.location.href = "userHomePage.php";</script>';
            }
        } else {
            echo '<script>alert("Invalid username or password.");</script>';
            echo "<script>document.getElementById('password').value = '';</script>";
        }

        sqlsrv_free_stmt($stmt);
    }
?>