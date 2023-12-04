<?php
    session_start();

    $userId;
    $username;
    $password;
    $email;
    $address;

    if(empty($_SESSION["user_id"]) || empty( $_SESSION["username"]) || empty( $_SESSION["password"]) || empty($_SESSION["email"]) || empty($_SESSION["address"])){
        header("Location: ../index.php");
    } 
    else{
        $userId = $_SESSION["user_id"];
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
        $email =$_SESSION["email"];
        $address =$_SESSION["address"];
    }

    require_once '../config/mysql-connection.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["edit-account"])) {
            if(isset($_POST["username"]) || isset($_POST["password"]) || isset($_POST["address"])){
                $username = htmlentities($_POST["username"]);
                $address = htmlentities($_POST["address"]);
                $password = htmlentities($_POST["password"]);

                $update_query = "UPDATE users_tbl SET username = '$username', address = '$address', password = '$password' WHERE id = $userId";
                mysqli_query($conn, $update_query);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | My Account</title>
    <link rel="stylesheet" href="account.css">
    <link rel="icon" href="../assets/images/superpet_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="../homepage/home.php">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1>My Account</h1>
        </div>
        <form action="account.php" method="post" class="info-form">
            <div class="user-info">
                    <?php
                        $query = "SELECT * FROM users_tbl WHERE id = $userId LIMIT 1";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "
                                <div class='input-box'>
                                    <p>Username</p>
                                    <input type='text' name='username' id='username' class='txt-input' value='".$row["username"]."'>
                                    <p>Email</p>
                                    <input type='email' name='email' id='email' class='txt-input' disabled value='".$row["email"]."'>
                                </div>
                                <div class='input-box'>
                                    <p>Address</p>
                                    <input type='text' name='address' id='address' class='txt-input' value='".$row["address"]."'>
                                    <p>Password</p>
                                    <input type='text' name='password' id='password' class='txt-input' value='".$row["password"]."'>
                                </div>
                                ";
                            }
                        }
                    ?>
            </div>

            <div class="edit-btn-container">
                <input type="submit" value="Edit Account Info" name="edit-account">
            </div>
        </form>

        <div class="notification-container">
            <div class="header">
                <h1>Notifications</h1>
            </div>

            <div class="store-notifications-container">
                <h3 class="notify-title">Orders</h3>
                <div class="orders-list">
                    <!-- GET APPOINTMENT STATUS -->
                    <?php 
                        $get_orders = "SELECT * FROM orders_tbl WHERE order_status <> 'Cancelled Order' AND user_id = $userId ORDER BY order_id DESC";
                        $result = mysqli_query($conn, $get_orders);
                                                        
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                $product_id = $row["product_id"];
                                $user_id = $row["user_id"];
                    
                                $get_product = "SELECT * FROM products_tbl WHERE product_id = $product_id";
                                $product_result = mysqli_query($conn, $get_product);
                    
                                if(mysqli_num_rows($product_result) > 0) {
                                    while($product_row = mysqli_fetch_assoc($product_result)){
                                        $get_user = "SELECT * FROM users_tbl WHERE id = $userId";
                                        $user_result = mysqli_query($conn, $get_user);
                    
                                        if(mysqli_num_rows($user_result) > 0) {
                                            while($user_row = mysqli_fetch_assoc($user_result)){
                                                if($row["order_status"] == ""){
                                                    echo "
                                                    <div class='order-notif'>
                                                        <div class='status'>
                                                            <h1>".$product_row["product_name"]." - PENDING</h1>
                                                            <p>Total: $".$product_row["product_price"]."</p>
                                                        </div>
                                                        <form action='account.php' method='post'>
                                                            <input type='submit' name='cancel-order' value='Cancel Order'>
                                                        </form>
                                                    </div>
                                                    ";    
                                                }
                                                else {
                                                    echo "
                                                    <div class='order-notif'>
                                                        <div class='status'>
                                                            <h1>".$product_row["product_name"]." - ".$row["order_status"]."</h1>
                                                            <p>Total: $".$product_row["product_price"]."</p>
                                                        </div>
                                                        <form action='account.php' method='post'>
                                                            <input type='submit' name='cancel-order' value='Cancel Order'>
                                                        </form>
                                                    </div>
                                                    ";
                                                }

                                                }
                                            }
                                        }
                                    }
                                }
                            }
                    ?>
            
                </div>
            </div>

            
            <div class="adoption-notifications-container">
                <h3 class="notify-title">Pet Adoption</h3>
                <div class="orders-list">

                    <?php
                        $get_adoption = "SELECT * FROM adoption_tbl WHERE user_id = $userId AND status IS NOT NULL";
                        $result = mysqli_query($conn, $get_adoption);
                                                        
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                $pet_id = $row["pet_id"];

                                $get_pet = "SELECT * FROM pets_tbl WHERE pet_id = $pet_id";
                                $pet_result = mysqli_query($conn, $get_pet);

                                if(mysqli_num_rows($pet_result) > 0){
                                    while($pet_row = mysqli_fetch_assoc($pet_result)){

                                        echo "
                                        <div class='order-notif'>
                                            <div class='status small-txt'>
                                                <h1>Your Request to Adopt ".$pet_row["pet_name"]." was ".$row["status"]."</h1>
                                            </div>
                                            <form action='account.php' method='post'>
                                                <button type='submit' name='delete-adoption-notification' class='delete'>
                                                    <i class='fa-solid fa-x'></i>
                                                </button>
                                            </form>
                                        </div>
                                        ";

                                    }
                                }
                            }
                        }
                    ?>


                </div>
            </div>

            
            <div class="appointment-notifications-container">
                <h3 class="notify-title">Appointment</h3>
                <div class="orders-list">
                    <?php
                        $get_appointment = "SELECT * FROM appointment_tbl WHERE user_id = $userId AND isApproved IS NOT NULL";
                        $result = mysqli_query($conn, $get_appointment);
                                                        
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo "
                                <div class='order-notif'>
                                    <div class='status small-txt'>
                                        <h1>Your appointment is ".$row["isApproved"]."</h1>
                                        <p>COMMENT: ".$row["status_msg"]."</p>
                                    </div>
                                    <form action='account.php' method='post'>
                                        <button type='submit' name='delete-appointment-notification' class='delete'>
                                            <i class='fa-solid fa-x'></i>
                                        </button>
                                    </form>
                                </div>
                                ";

                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>