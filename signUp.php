<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up Page</title>
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
            <h1>Register New User</h1>
            <form action="signUp.php" method="post">
                <div class="input-container">
                    <input type="text" id="name" placeholder="* Enter Name" name="name" required>
                </div>
                <div class="input-container">
                    <input type="text" id="nic" placeholder="* Enter NIC" name="nic" required>
                </div>
                <div class="input-container">
                    <input type="text" id="username" placeholder="* Enter Username" name="username" required>
                </div>
                <div class="input-container">
                    <input type="password" id="password" placeholder="* Enter Password" name="password" required>
                </div>
                <div class="backtologin">
                    <a href="index.php" class="login-link">Back to Login Page</a>
                </div>
               
                <div class="btn">
                    <input type="submit" value="Sign Up" name="signUp">
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>

<?php
    include 'db_connection.php';

    if(isset($_POST['signUp'])) {

        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isAdmin = 'user';

        $sql = "EXEC sp_insert_to_user_table ?, ?, ?, ?, ?";
        $params = array($name, $nic, $username, $password, $isAdmin);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt) {
            echo '<script>alert("User registered successfully.");</script>';
            echo '<script>window.location.href = "userHomePage.php";</script>';
        } else {
            echo '<script>alert("Error: ' . print_r(sqlsrv_errors(), true) . '");</script>';
        }
    }
?>

