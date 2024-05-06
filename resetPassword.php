<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Reset Password Page</title>
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
            <h1>Reset Password</h1>
            <form action="resetPassword.php" method="post">
                <div class="input-container">
                    <input type="text" id="nic" placeholder="* Enter NIC" name="nic" required>
                </div>
                <div class="input-container">
                    <input type="password" id="newPassword" placeholder="* Enter New Password" name="newPassword" required>
                </div>
                <div class="input-container">
                    <input type="password" id="confirmNewPassword" placeholder="* Re-Enter New Password"  name="confirmPassword" required>
                </div>
                <div class="backtologin">
                    <a href="index.php" class="login-link">Back to Login Page</a>
                </div>
               
                <div class="btn">
                    <input type="submit" value="Reset" name="reset">
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>

<?php
    include 'db_connection.php';

    if(isset($_POST['reset'])) {
        $nic = $_POST['nic'];
        $newpass = $_POST['newPassword'];
        $repass = $_POST['confirmPassword'];

        $sql = "UPDATE user_table SET password = ? WHERE nic = ?";

        $stmt = sqlsrv_prepare($conn, $sql, array(&$newpass, &$nic));

        if ($stmt) {
            if (sqlsrv_execute($stmt)) {
                if($newpass == $repass) {
                    echo '<script>alert("Password reset successfully.");</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    echo '<script>alert("Passwords don\'t match.");</script>';
                    echo '<script>window.location.href = "resetPassword.php";</script>';
                }
            } else {
                echo '<script>alert("Error executing statement: ' . print_r(sqlsrv_errors(), true) . '");</script>';
            }
        } else {
            echo '<script>alert("Error preparing statement: ' . print_r(sqlsrv_errors(), true) . '");</script>';
        }
    }
?>

