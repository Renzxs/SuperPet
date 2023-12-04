<?php
    session_start();
    $userId;
    $username;
    $password;
    $email;
    $address;

    if(empty($_SESSION["user_id"]) || empty($_SESSION["username"]) || empty($_SESSION["password"]) || empty($_SESSION["email"]) || empty($_SESSION["address"])){
        // Let unregister users see the home page
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Adopt</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adopt.css">
    <script src="Adopt.js" defer></script>
</head>
<body>  
    <div class="container">
        <div class="nav-bar">
            <i class="fa-solid fa-bars" id="menu-nav-btn"></i>
            <img src="../assets/images/Letter_Logo.png" alt="" width="150px">
            <nav>
                <ul class="nav-links">
                    <li><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li class="in"><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
            <div class="nav-icon-btns">
                <i class="fa-solid fa-shopping-cart"></i>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>

        <div class="mobile-nav">
            <nav>
                <ul class="nav-links">
                    <li><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li class="in"><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
        </div>

        <div class="pet-page">
            <div class="pet-header">
                <img src="../assets/images/adopt-header.png" alt="" width="500">
            </div>
            <div class="pets-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <?php
                    $get_pets = "SELECT * FROM pets_tbl";
                    $result = mysqli_query($conn, $get_pets);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='pet'>
                                    <div class='pet-img'>
                                        <div class='img'>
                                            <img src='../assets/upload/".$row['pet_photo_url']."'  width='250'>
                                        </div>
                                    </div>
                                    <div class='pet-desc'>
                                        <h1 class='name'>".$row['pet_name']."</h1>
                                        <p class='breed'>".$row['pet_age']." • ".$row['pet_breed']. "</p>
                                        <p class='desc'>".$row['pet_desc']."</p>
                                        <div class='pet-button'>
                                            <form action='adoptpage.php' method='post'>
                                                <input type='hidden' id='pet_id' name='pet_id' value='" . $row['pet_id'] . "'>
                                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
                                            </form>
                                        </div>  
                                    </div>
                                </div>";
                                }
                    }
                ?>
            </div>
        </div>
            
        <footer>
            <img src="../assets/images/Letter_Logo.png" alt="" width="200">
            <p>©2023 SUPERPET by SUPERTEAM STUDIOS. All Rights Reserved.</p>
         </footer>
    </div>
</body>
</html>

<?php
    if(isset($_POST["adopt"]) && isset($_POST["pet_id"]) && isset($userId)){
        // SEND THESE FOREIGN KEY INTO THE ADOPTION TABLE
        $petId = $_POST["pet_id"];
        $insert_query = "INSERT INTO adoption_tbl(user_id, pet_id)
                         VALUES ($userId, $petId)";
        mysqli_query($conn, $insert_query);
    }
?>
