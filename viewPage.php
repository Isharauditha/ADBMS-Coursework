<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
        }

        .img-container{
            position: relative;
            display: flex;
        }

        img{
            position: relative;
            width: 100%;
            height: 100%;
            object-fit: contain;
        } 

        .logo-container{
            position: absolute;
            background-color: rgba(48, 47, 47, 0.2);
            width: 100%;
            height: 90px;
        }

        .logo{
            scale: 0.6;
        }

        .navbar{
            position: absolute;
            display: flex;
            flex-direction: row;
            left: 75%;
            top: 38%;
        }
        
        a{
            color:black;
            padding-right: 30px;
            text-decoration: none;
            font-size: 18px;
        }

        .logout{
            color: red;
        }

        .nav-link:hover {
            text-shadow: 0 0 4px rgba(0, 0, 0, 0.7);
        }   

        .nav-link.active {
            text-decoration: underline;
        }

        table{
            font-size: 12px;
            margin-top: 25px;
        }

        td{
            padding-right: 40px;
            padding-top: 5px;
        }

        .input-data{
            width: 200px;
            height: 35px;
            border-radius: 5px;
            padding-left: 5px;
        }

        .container{
            position: absolute;
            width: 98%;
            height: 53%;
            background-color: rgba(255, 255, 255, 0.8);
            margin-left: 15px;
            margin-top: 10%;
            border-radius: 5px;
        }

        .personal-information ul{
            list-style-type: none;
            justify-content: space-between;
            position: absolute;
            left: 8%;
            top: 27%;
        }

        .address-information ul{
            list-style-type: none;
            justify-content: space-between;
            position: absolute;
            left: 8%;
            top: 63%;
        }

        .personal-information ul li{
            padding-bottom: 10px;
        }

        .address-information ul li{
            padding-bottom: 10px;
        }

        .horizontal-line{
            position: absolute;
            width: 90%;
            height: 0.8px;
            left: 5%;
            top: 12%;
            background-color: black;
        }

        .virtical-line-1{
            position: absolute;
            width: 1px;
            height: 25%;
            left: 7%;
            top: 27%;
            background-color: black;
        }

        .virtical-line-2{
            position: absolute;
            width: 1px;
            height: 25%;
            left: 7%;
            top: 62%;
            background-color: black;
        }

        .personal-info{
            position: absolute;
            font-weight: bold;
            left: 5%;
            top: 20%;
        }   

        .address-info{
            position: absolute;
            font-weight: bold;
            left: 5%;
            top: 55%;
        } 

        .meterno{
            position: absolute;
            font-size: 15px;
            left: 10%;
            top: 5%;
        }

        .fileno{
            position: absolute;
            font-size: 15px;
            left: 45%;
            top: 5%;
        }

        .connectionType{
            position: absolute;
            font-size: 15px;
            left: 75%;
            top: 5%;
        }

        .pdf{
            position: absolute;
            object-fit: cover;
            width: 80px;
            height: 80px;
            left: 60%;
            top: 40%;
        }

        .pdf:hover img {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }


        .buttons{
            position: absolute;
            left: 84%;
            top: 90%;
        }

        .reject-btn{
            background-color: red;
            width: 100px;
            height: 35px;
            padding: 10px;
            color: white; 
            border: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        .reject-btn:hover {
            background-color: rgb(100, 0, 0); 
        }

        .accept-btn{
            background-color: green;
            width: 100px;
            height: 35px;
            padding: 10px;
            color: white; 
            border: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        .accept-btn:hover {
            background-color: rgb(0, 80, 0); 
        }

        .error-message{
            position: absolute;
            left: 40%;
            top: 50%;
            font-size: 20px;
        }

        .search-for-file-text{
            position: absolute;
            left: 40%;
            top: 50%;
            font-size: 20px;
        }

        .hidden {
            display: none;
        }

        .view-table{
            position: absolute;
        }
    </style>
</head>
<body>
    <div class="img-container">
        <!-- image -->
        <img src="images/img1.jpg" alt="">

        <!-- logo -->
        <div class="logo-container">
            <img src="images/logo.png" alt="" class="logo">
            <div class="navbar">
                <a href="adminHomePage.php" class="nav-link">Home</a>
                <a href="manageUsers.php" class="nav-link">Manage Users</a>
                <a href="index.php" class="nav-link logout">Log Out</a>
            </div>
        </div>
        <div class="container">
            <?php
                include 'db_connection.php';

                if(isset($_POST['fileNo'])) {

                    $fileNo = $_POST['fileNo'];
                
                    $sql = "SELECT * FROM register_table WHERE file_no = ?";
                    $params = array($fileNo);
                
                    $stmt = sqlsrv_query($conn, $sql, $params);
                
                    if ($stmt === false) {
                        die(print_r(sqlsrv_errors(), true));
                    }
                
                    if (sqlsrv_has_rows($stmt)) {
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo '<span class="meterno">Meter No: ' . $row['meter_no'] . '</span>';
                            echo '<span class="fileno">File No: ' . $row['file_no'] . '</span>';
                            echo '<span class="connectionType">Connection Type: ' . $row['connection_type'] . '</span>';
                            echo '<div class="horizontal-line"></div>';
                            echo '<label for="title" class="personal-info">Personal Information</label>';
                            echo '<div class="virtical-line-1"></div>';
                            echo '<div class="virtical-line-2"></div>';
                            echo '<div class="personal-information">';
                            echo '<ul>';
                            echo '<li>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $row['fname'] . '</li>';
                            echo '<li>NIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: ' . $row['nic'] . '</li>';
                            echo '<li>Phone No&nbsp;: ' . $row['contact_number'] . '</li>';
                            echo '<li>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $row['email'] . '</li>';
                            echo '</ul>';
                            echo '</div>';
                            echo '<label for="title" class="address-info">Address Information</label>';
                            echo '<div class="address-information">';
                            echo '<ul>';
                            echo '<li>Street&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $row['street'] . '</li>';
                            echo '<li>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: ' . $row['city'] . '</li>';
                            echo '<li>State/Province&nbsp;&nbsp;&nbsp;&nbsp;: ' . $row['province'] . '</li>';
                            echo '<li>Postal/Zip Code&nbsp;&nbsp;: ' . $row['zip'] . '</li>';
                            echo '</ul>';
                            echo '</div>';

                            if (!empty($row['pdf_content'])) {
                                echo '<div class="pdf">';
                                echo '<a href="uploads/' . $row['pdf_content'] . '" download><img src="images/pdf.png" alt=""></a><br>';
                                echo '<label for="download" style="font-size: 10px; left:7px; position:absolute;">Download PDF</label>';
                                echo '</div>';
                                echo '<div class="buttons">';
                                echo '<form method="post" action="viewPage.php">';
                                echo '<input type="hidden" name="fileNo" value="' . $fileNo . '">';
                                echo '<input type="submit" name="reject" value="Reject" class="reject-btn">&nbsp;&nbsp;&nbsp;';
                                echo '<input type="submit" name="accept" value="Accept" class="accept-btn">';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo '<div class="error-message">';
                        echo "No data found for the provided search term.";
                        echo '</div>';
                    }
                
                    sqlsrv_free_stmt($stmt);
                }
            ?>
        </div>    
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var currentPageUrl = window.location.href;
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                if (link.href === currentPageUrl) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>

<?php
    include 'db_connection.php';

    if(isset($_POST['fileNo']) && isset($_POST['accept'])) {

        $fileNo = $_POST['fileNo'];
    
        $sql_select = "SELECT * FROM register_table WHERE file_no = ?";
        $params_select = array($fileNo);
        $stmt_select = sqlsrv_query($conn, $sql_select, $params_select);
    
        if ($stmt_select === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_has_rows($stmt_select)) {
            while ($row = sqlsrv_fetch_array($stmt_select, SQLSRV_FETCH_ASSOC)) {

                $sql_insert = "INSERT INTO accept_table (meter_no, file_no, connection_type, fname, lname, nic, contact_number, email, street, city, province, zip, pdf_content) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $params_insert = array($row['meter_no'], $row['file_no'], $row['connection_type'],$row['fname'], $row['lname'], $row['nic'], $row['contact_number'], $row['email'], $row['street'], $row['city'], $row['province'], $row['zip'], $row['pdf_content']);
                $stmt_insert = sqlsrv_query($conn, $sql_insert, $params_insert);
    
                if ($stmt_insert === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
            }

            sqlsrv_free_stmt($stmt_select);

            echo '<script>alert("Data accepted successfully.");</script>';
            echo '<script>window.location.href = "adminHomePage.php";</script>';
        } else {
            echo '<div class="error-message">';
            echo "No data found for the provided search term.";
            echo '</div>';
        }
    }

    if(isset($_POST['fileNo']) && isset($_POST['reject'])) {

        $fileNo = $_POST['fileNo'];

        $sql_delete_register = "DELETE FROM register_table WHERE file_no = ?";
        $params_delete_register = array($fileNo);
        $stmt_delete_register = sqlsrv_query($conn, $sql_delete_register, $params_delete_register);

        if ($stmt_delete_register === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $sql_delete_view = "DELETE FROM view_table WHERE fileNo = ?";
        $params_delete_view = array($fileNo);
        $stmt_delete_view = sqlsrv_query($conn, $sql_delete_view, $params_delete_view);

        if ($stmt_delete_view === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        echo '<script>alert("Data rejected successfully.");</script>';
        echo '<script>window.location.href = "adminHomePage.php";</script>';
    }
?>




