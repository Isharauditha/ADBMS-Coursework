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
        
        h2{
            margin-top: 40px;
            margin-left: 60px;
        }

        .user-table{
            position: absolute;
            top: 20%;
            left: 5%;
        }

        .container {
            position: absolute;
            top: 10%;
            width: 80%;
            height: 66%;
            margin-left: 10%;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 5px;
            padding: 20px;
        }

        table {
            margin-left: 17%;
            border-collapse: collapse;
            width: 100%;
            background-color: transparent;
            border: 2px solid rgba(107, 109, 110, 0.2); 
            color: black; 
        }

        th, td {
            border: 2px solid rgba(107, 109, 110, 0.2); 
            padding: 8px;
            text-align: center;
            width: 170px;
        }

        th {
            background-color: rgba(0, 86, 179, 0.4); 
            color: black; 
        }

        td {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .btn{
            background-color: #0056b3;;
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
        }

        .btn:hover{
            background-color: rgb(0, 0, 100);
        }

        .btn-delete{
            background-color: red;;
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
        }

        .btn-delete:hover{
            background-color: rgb(200, 0, 0);
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
            <h2>Users</h2>
        </div>
        <div class="user-table">
        <?php
                include 'db_connection.php';

                if(isset($_POST['update_role'])) {

                    $userId = $_POST['user_id'];
                    $newRole = $_POST['new_role'];
                
                    // $updateSql = "UPDATE user_table SET isAdmin = ? WHERE user_id = ?";
                    $updateSql = "EXEC sp_update_admin_status @isAdmin = ?, @user_id = ?";


                    $params = array($newRole, $userId);
                    $stmt = sqlsrv_query($conn, $updateSql, $params);
                
                    if ($stmt === false) {
                        echo "Error updating user role: ".sqlsrv_errors();
                    } else {
                        // echo "User role updated successfully.";
                    }
                }

                if(isset($_POST['delete_user'])) {
                    $userIdToDelete = $_POST['user_id'];
                    
                    // $deleteSql = "DELETE FROM user_table WHERE user_id = ?";
                    $deleteSql = "EXEC sp_delete_user @user_id = ?";
                    
                    $deleteParams = array($userIdToDelete);
                    $deleteStmt = sqlsrv_query($conn, $deleteSql, $deleteParams);
                    
                    if ($deleteStmt === false) {
                        echo "Error deleting user: ".sqlsrv_errors();
                    } else {
                        echo "";
                    }
                }
            
                $sql = "SELECT * FROM user_view";
                $stmt = sqlsrv_query($conn, $sql);
            
                if ($stmt !== false) {
                    echo "<table border='1'>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Admin/User</th>
                                <th colspan='2'>Action</th>
                            </tr>";
                    // Output data of each row
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>
                                <td>".$row['user_id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['nic']."</td>
                                <td>".$row['isAdmin']."</td>
                                <td>
                                    <form action='manageUsers.php' method='POST'>
                                        <input type='hidden' name='user_id' value='".$row['user_id']."'>
                                        <input type='hidden' name='new_role' value='".($row['isAdmin'] == 'admin' ? 'user' : 'admin')."'>
                                        <input type='submit' class='btn' name='update_role' value='".($row['isAdmin'] == 'user' ? 'Promote to Admin' : 'Demote to User')."'>
                                    </form>
                                </td>
                                <td>
                                    <form action='manageUsers.php' method='POST'>
                                        <input type='hidden' name='user_id' value='".$row['user_id']."'>
                                        <input type='hidden' name='action' value='delete'>
                                        <input type='submit' name='delete_user' value='Delete User' class='btn-delete'>
                                    </form>
                                </td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No users found.";
                }
            ?> 
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
