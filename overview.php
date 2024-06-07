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
            left: 70%;
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

        .container{
            position: absolute;
            width: 98%;
            height: 60%;
            background-color: rgba(255, 255, 255, 0.8);
            margin-left: 15px;
            margin-top: 9%;
            border-radius: 5px;
            padding-left: 400px;
            padding-right: 400px;
            padding-top: 50px;
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


        .hidden {
            display: none;
        }
        table {
            width: 30%; 
            border-collapse: collapse;
            margin: 10px auto; 
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 4px;
            text-align: center;
            word-wrap: break-word;
            height: 30px; 
        }
        .view-table th{
            background-color: rgba(0, 86, 179, 0.4); 
        }

        .table-title-1{
            position: absolute;
            top: 20px;
            left: 600px;
            font-weight: bold;
            font-size: 20px;
        }

        .table-title-2{
            position: relative;
            top: 20px;
            left: 260px;
            font-weight: bold;
            font-size: 20px;
            padding-bottom: 30px;
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
                <a href="overview.php" class="nav-link">Overview</a>
                <a href="index.php" class="nav-link logout">Log Out</a>
            </div>
        </div>
        
        <div class="container">
                <div class='table-title-1'>
                    Connection Type Counts
                </div>
                
                <?php
                    include 'db_connection.php';

                    $sql = "SELECT connection_type, COUNT(connection_type) AS connection_count FROM register_table GROUP BY connection_type";
                    $stmt = sqlsrv_query($conn, $sql);

                    if ($stmt) {
                        echo "<table border='1' class='view-table'>";
                        echo "<tr><th class='header'>Connection Type</th><th class='header'>Count</th></tr>";
    
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo "<tr>";
                            
                            echo "<td>" . htmlspecialchars($row['connection_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['connection_count']) . "</td>";
                            echo "</tr>";
                        }
    
                        echo "</table>";
                    } else {
                        echo "Error executing query: " . print_r(sqlsrv_errors(), true);
                    }
                ?>

                <div class='table-title-2'>
                    City Counts
                </div>
                
                <?php
                  include 'db_connection.php';

                  $sql = "SELECT connection_type, COUNT(distinct city) AS connection_count FROM register_table GROUP BY connection_type";
                  $stmt = sqlsrv_query($conn, $sql);

                  if ($stmt) {
                      echo "<table border='1' class='view-table'>";
                      echo "<tr><th class='header'>Connection Type</th><th class='header'>Count</th></tr>";
  
                      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                          echo "<tr>";
                          
                          echo "<td>" . htmlspecialchars($row['connection_type']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['connection_count']) . "</td>";
                          echo "</tr>";
                      }
  
                      echo "</table>";
                  } else {
                      echo "Error executing query: " . print_r(sqlsrv_errors(), true);
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

