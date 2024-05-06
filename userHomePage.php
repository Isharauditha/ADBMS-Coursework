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

        .form-container{
            position: absolute;
            width: 80%;
            height: 66%;
            margin-top: 7%;
            padding-left: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        h2{
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }

        .titles{
            font-weight: bold;
        }

        .form-data{
            position: relative;
            right: -22%;
            top: 5%;
        }

        input{
            padding: 5px;
            height: 30px;
            width: 200px;
            border-radius: 5px
        }

        table{
            margin-top: 10px;
            font-size: 12px;
            margin-bottom: 15px;
        }

        td{
            padding-right: 60px;
            padding-bottom: 5px;
        }

        .address{
            width: 462px;
        }

        .last{
            position: relative;
            top: -10px;
        }

        .email{
            position: relative;
            top: -8px;
        }

        .btn{
            margin-top: 20px;
        }

        input[type="submit"] {
            width: 730px;
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

        input[type="submit"]:hover {
            background-color: #0056b3; 
        }

        .pdf{
            margin-top: 10px;
        }

        .logout-link{
            position: absolute;
            left: 94%;
            top: 38%;
        }
        
        a{
            text-decoration: none;
            color: red;
            font-size: 18px;
        }

        form{
            margin-top: 30px;
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
            <div class="logout-link">
                <a href="index.php">Log Out</a>
            </div>
        </div>

        <div class="form-container">
            <div class="container">
                <h2>Registration Form</h2>
                <form action="userHomePage.php" method="post" enctype="multipart/form-data">
                    <div class="form-data">
                        <label for="customer info" class="titles">Customer Info</label>
                        <table>
                            <tr>
                                <td>Meter No</td>
                                <td>File No</td>
                                <td>Connection Type</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="meterNo" id="" placeholder="meter no" required></td>
                                <td><input type="text" name="fileNo" id="" placeholder="file no" required></td>
                                <td><input type="text" name="connectionType" id="" placeholder="connection type" required></td>
                            </tr>
                        </table>
                        <label for="personal info" class="titles">Personal Info</label>
                        <table>
                            <tr>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Phone</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="firstName" id="" placeholder="first name" required></td>
                                <td><input type="text" name="lastName" id="" placeholder="last name" required></td>
                                <td><input type="text" name="phone" id="" placeholder="phone" required></td>
                            </tr>
                        </table>
                        <table class="email">
                            <tr>
                                <td>Email Address</td>
                                <td>NIC</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="email" id="" placeholder="email" required></td>
                                <td><input type="text" name="nic" id="" placeholder="NIC" required></td>
                            </tr>
                        </table>
                        <label for="addres" class="titles">Address</label><br>
                        <table>
                            <tr>
                                <td>Street</td>
                                <td>City</td>
                            </tr>
                            <tr>
                                <td><input type="text" placeholder="street" name="street" id="" class="street" required></td>
                                <td><input type="text" placeholder="city" name="city" id="" required></td>
                            </tr>
                        </table>
                        <table class="last">
                            <tr>
                                <td>State/Province</td>
                                <td>Postal/Zip code</td>
                            </tr>
                            <tr>
                                <td><input type="text" placeholder="State/province" name="state" required></td>
                                <td><input type="text" placeholder="postal/zip" name="zip" required></td>
                            </tr>
                        </table>
                        <label for="pdf" class="titles">Upload PDF</label><br>
                        <input type="file" name="pdf" id="" class="pdf"><br>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    include 'db_connection.php';

    if(isset($_POST['submit'])) {

        $fileNo = $_POST['fileNo'];
        $meterNumber = $_POST['meterNo'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $connectionType = $_POST['connectionType'];
        $contactNumber = $_POST['phone'];
        $email = $_POST['email'];
        $nic = $_POST['nic'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $province = $_POST['state'];
        $zip = $_POST['zip'];
        $pdfName = $_FILES["pdf"]["name"];
        $uploads_dir = './uploads';
    
        if(move_uploaded_file($_FILES["pdf"]["tmp_name"], $uploads_dir.'/'.$pdfName)){
            echo "File moved successfully.";
        } else {
            echo "Failed to move the file.";
            exit; 
        }
    
        $sql = "EXEC sp_insert_to_register ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
        $params = array($meterNumber, $fileNo, $firstName, $lastName, $connectionType, $contactNumber, $email, $nic, $street, $city, $province, $zip, $pdfName);
    
        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);
    
        // Check if the query executed successfully
        if ($stmt) {
            // Success message
            echo '<script>alert("Data inserted successfully.");</script>';
        } else {
            // Error message
            echo '<script>alert("Error inserting data.");</script>';
            // Log and display SQL error
            echo '<script>alert("Error: ' . print_r(sqlsrv_errors(), true) . '");</script>';
        }
    }
?>