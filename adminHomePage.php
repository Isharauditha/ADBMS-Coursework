<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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

        .search-container{
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 10%;
            width: 98%;
            height: 10%;
            margin-left: 15px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
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

        .search{
            position: relative;
            top: -36px;
            left: 95%;
        }

        .search {
            width: 100px;
            height: 35px;
            padding: 10px;
            background-color: #007bff;
            color: white; 
            border: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        .search:hover {
            background-color: #0056b3; 
        }

        .or{
            position: relative;
            font-size: 10px;
            right: -23%;
            top: -38px;
        }

        .container{
            position: absolute;
            width: 98%;
            height: 53%;
            background-color: rgba(255, 255, 255, 0.8);
            margin-left: 15px;
            margin-top: 15%;
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
            left: 35%;
            top: 20%;
            font-size: 20px;
        }

        .hidden {
            display: none;
        }

        .view-table {
            border-collapse: collapse;
            width: 100%;
        }

        .header, .table-data {
            padding: 8px; 
            text-align: center;
            width: 250px;
        }

        .header {
            background-color: #cccccc; 
        }

        .view-button{
            width: 105px;
            height: 27px;
            padding: 10px;
            color: white; 
            border: none;
            font-size: 10px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
            background-color: #007bff;
            
        }

        .view-button:hover{
            background-color: rgb(0, 0, 200);
        }

        .table-title{
            position: absolute;
            left: 45%;
            top: 10%;
            font-size: 30px;
            font-weight: bold;
        }

        .hidden {
            display: none;
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
        <div class="search-container">
            <form action="adminHomePage.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Meter No</td>
                        <td>File No</td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Meter No" class="input-data" name="meterNo"></td>
                        <td><input type="text" placeholder="File No" class="input-data" name="fileNo"></td>
                    </tr>
                </table>
                <input type="submit" name="search" class="search" value="Search">
                <label class="or">Or</label>
            </form>
        </div>
        <div class="container">
            <?php
                include 'db_connection.php';

                if(isset($_POST['search'])) {
                    $searchButtonClicked = true;
                    $meterno = $_POST["meterNo"];
                    $fileno = $_POST["fileNo"];
                
                    // $sql = "SELECT * FROM accept_table WHERE meter_no = ? OR file_no = ?";
                    $sql = "SELECT * from get_accept_data(?, ?)";
                    $params = array($meterno, $fileno);
                
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
                            }
                        }
                    } else {
                        echo '<div class="error-message">';
                        echo "No data found for the provided search term.";
                        echo '</div>';
                    }
                
                    sqlsrv_free_stmt($stmt);
                } else{
                    $searchButtonClicked = false;
                }
            ?>

            <div class="table-title <?php echo $searchButtonClicked ? 'hidden' : ''; ?>">
                    Approvals
            </div>

            <!-- <div class="<?php echo $searchButtonClicked ? 'search-for-file-text hidden' : 'search-for-file-text'; ?>">Please Enter Meter No or File No</div> -->
            <div class="<?php echo $searchButtonClicked ? 'search-for-file-text hidden' : 'search-for-file-text'; ?>">
                
                <?php
                    include 'db_connection.php';

                    $sql = "SELECT * FROM fileNo_view;";
                    $stmt = sqlsrv_query($conn, $sql);

                    if ($stmt) {
                        echo "<table border='1' class='view-table'>";
                        echo "<tr><th class='header'>File Number</th><th class='header'></th></tr>";
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td class='table-data'>".$row['fileNo']."</td>";
                            echo "<td class='table-data'>
                        <form action='viewPage.php' method='post'>
                            <input type='hidden' name='fileNo' value='".$row['fileNo']."'>
                            <input type='submit' name='view' value='View' class='view-button'>
                        </form>
                      </td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Error executing query: " . sqlsrv_errors();
                    }
                ?>
            </div>
        </div>    
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the current page URL
            var currentPageUrl = window.location.href;
            // Get all navigation links
            var navLinks = document.querySelectorAll('.nav-link');

            // Loop through each navigation link
            navLinks.forEach(function(link) {
                // Check if the link's href matches the current page URL
                if (link.href === currentPageUrl) {
                    // Add the active class to the link
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>

