<?php
    session_start();

    // DATABASE CONFIG 
    require_once '../config/mysql-connection.php';

    // LOGOUT
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: admin-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupetPet | Pet Adoptions</title>
    <link rel="stylesheet" href="styles/users.css">
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="scripts/App.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="nav-sidebar">
            <div class="nav-header">
                <img src="../assets/images/admin_logo.png" alt="../assets/images/admin_logo.png" width="200">
            </div>
            <div class="main-nav">
                <a href="users.php" class="link">
                    <i class="fa-solid fa-users nav-icon"></i>
                    <p class="nav-txt">Manage Users</p>
                </a>
                <a href="appointments.php" class="link">
                    <i class="fa-solid fa-calendar nav-icon"></i>
                    <p class="nav-txt">Appointments</p>
                </a>
                <a href="#" class="link in">
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
            <div class="header">
                <h1 class="header-txt">Pet Store</h1>
                <div class="menu-nav">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</body>
</html>