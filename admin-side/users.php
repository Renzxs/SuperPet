<?php
    session_start();

    // DATABASE CONFIG 
    require_once '../config/mysql-connection.php';

     // DELETE USER
     if(isset($_POST['delete']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $delete_query = "DELETE FROM users_tbl WHERE id = '$user_id'";
        mysqli_query($conn, $delete_query);
    }

    // EDIT USER
    if(isset($_POST['edit']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        // TO-DO: EDIT USER INFORMATION
        echo "<div> </div>";
    }

    // LOGOUT
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupetPet | Manage Users</title>
    <link rel="stylesheet" href="admin-dashboard-style.css">
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="nav-sidebar">
            <div class="nav-header">
                <img src="../assets/images/admin_logo.png" alt="../assets/images/admin_logo.png" width="200">
            </div>
            <div class="main-nav">
                <a href="#" class="link in">
                    <i class="fa-solid fa-users nav-icon"></i>
                    <p class="nav-txt">Manage Users</p>
                </a>
                <a href="appointments.php" class="link">
                    <i class="fa-solid fa-calendar nav-icon"></i>
                    <p class="nav-txt">Appointments</p>
                </a>
                <a href="shop.php" class="link">
                    <i class="fa-solid fa-cart-shopping nav-icon"></i>
                    <p class="nav-txt">Orders/Products</p>
                </a>
                <a href="pet-adoption.php" class="link">
                    <i class="fa-solid fa-paw nav-icon"></i>
                    <p class="nav-txt">Pet Adoptions</p>
                </a>
                <form action="users.php" method="post" class="link">
                    <label for="logout"><i class="fa-solid fa-arrow-right-from-bracket nav-icon"></i></label>
                    <input id="logout" name="logout" type="submit" value="Log out">
                </form>
            </div>
        </div>
        <div class="main-container">
            <h1 class="header-txt">Manage Users</h1>
            <table>
                <tr class="thead">
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>PASSWORD</td>
                    <td>EMAIL</td>
                    <td>CONTACT NO.</td>
                    <td></td>
                </tr>
                <?php
                    $query = "SELECT * FROM users_tbl;";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['user_role'] == "admin") {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['password'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['contact_no'] . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['password'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['contact_no'] . "</td>";
                                echo "<td class='table-modify'>
                                        <form action='users.php' method='post'>
                                            <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                                            <input type='submit' id='edit' name='edit' value='Edit'> 
                                            <input type='submit' id='delete' name='delete' value='Delete'>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }

                        }
                    }
                    else {
                        echo "<tr><td colspan='6'>No users found</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
