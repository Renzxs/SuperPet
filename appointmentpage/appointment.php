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
    <title>SuperPet | Appointment</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="appointment.css">
    <script src="Appointment.js" defer></script>
</head>
<body>  
    <div class="container">
        <div class="nav-bar">
            <i class="fa-solid fa-bars" id="menu-nav-btn"></i>
            <img src="../assets/images/Letter_Logo.png" alt="" width="150px">
            <nav>
                <ul class="nav-links">
                    <li><a href="../homepage/home.php">Home</a></li>
                    <li class="in"><a href="#">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
            <div class="nav-icon-btns">
                <i class="fa-solid fa-shopping-cart"></i>
                <a href="../account/account.php" class="account-btn">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </div>
        </div>

        <div class="mobile-nav">
            <nav>
                <ul class="nav-links">
                    <li><a href="../homepage/home.php">Home</a></li>
                    <li class="in"><a href="#">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
        </div>

        <div class="main-appointment-container">
            <div class="appointment-title">
                <img src="../assets/images/appointment-title.png" alt="" class="con-header">
            </div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form">
                    <img src="../assets/images/your-info.png" alt="" width="200" class="img-header">
                    <div class="inputs">
                        <p class="input-label">First Name</p>
                        <input type="text" name="firstname" id="firstname" class="txt-input">
                        <p class="input-label">Last Name</p>
                        <input type="text" name="lastname" id="lastname" class="txt-input">
                        <p class="input-label">Phone</p>
                        <input type="phone" name="phone" id="phone" class="txt-input">
                        <p class="input-label">Email</p>
                        <input type="email" name="email" id="email" class="txt-input">
                        <p class="input-label">Pet's Name</p>
                        <input type="txt" name="pet-name" id="pet-name" class="txt-input">
                        <p class="input-label">Type of Pet</p>
                        <input type="txt" name="pet-type" id="pet-type" class="txt-input" placeholder="Ex. Dog, Cat">
                    </div>
                </div>

                <div class="form">
                    <img src="../assets/images/appointment-details.png" alt="" width="200" class="img-header">
                    <div class="inputs">
                        <p class="input-label">Appointment Date</p>
                        <input type="date" name="date" id="date" class="txt-input">
                        <div class="radio">
                            <div class="radio-time">
                                <input type="radio" name="time" id="morning" value="morning" checked>
                                <label for="morning">Morning</label>
                            </div>
                            <div class="radio-time">
                                <input type="radio" name="time" id="midday" value="midday">
                                <label for="midday">Midday</label>
                            </div>
                            <div class="radio-time">
                                <input type="radio" name="time" id="evening" value="evening">
                                <label for="evening">Evening</label>
                            </div>
                        </div>
                        <br>
                        <p class="input-label">Comments</p>
                        <input type="text" name="comments" id="comments">
                    </div>
                </div>

                <div class="submit-btn">
                    <input type="submit" value="SUBMIT" name="submit">
                </div>
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST["submit"]) && isset($userId)) {
                        if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["phone"]) || empty($_POST["email"]) || empty($_POST["date"]) || empty($_POST["time"]) || empty($_POST["comments"])) 
                        {
                            echo "<p class='error-msg'>Please do not leave textboxes empty.</p>";
                        } 
                        else {
                            $firstname = htmlentities($_POST["firstname"]);
                            $lastname = htmlentities($_POST["lastname"]);
                            $phone = htmlentities($_POST["phone"]);
                            $email = htmlentities($_POST["email"]);
                            $petname = htmlentities($_POST["pet-name"]);
                            $pet_type = htmlentities($_POST["pet-type"]);
                            $date = htmlentities($_POST["date"]);
                            $time = htmlentities($_POST["time"]);
                            $comments = htmlentities($_POST["comments"]);

                            $insert_query = "INSERT INTO appointment_tbl(user_id, first_name, last_name, phone, pet_name, type_of_pet, date, time, comments) 
                                             VALUES ($userId, '$firstname', '$lastname', $phone, '$petname', '$pet_type', '$date', '$time', '$comments')";

                            mysqli_query($conn, $insert_query);
                            echo "<p class='success-msg'>Thank you for booking an appointment, Just wait and we will reponse you as much as possible.</p>";
                            mysqli_close($conn);
                        } 
                    }
                }
            ?>
        </div>

        <footer>
            <img src="../assets/images/Letter_Logo.png" alt="" width="200">
            <p>©2023 SUPERPET by SUPERTEAM STUDIOS. All Rights Reserved.</p>
         </footer>
    </div>
</body>
</html>
