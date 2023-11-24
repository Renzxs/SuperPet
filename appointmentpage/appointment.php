<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Products</title>
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
                    <li><a href="#">Adopt your SuperPet</a></li>
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
                    <li class="in"><a href="#">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="#">Adopt your SuperPet</a></li>
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
                        <input type="date" name="firstname" id="firstname" class="txt-input">
                        <div class="radio">
                            <div class="radio-time">
                                <input type="radio" name="time" id="morning" value="morning">
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
        </div>

        <footer>
            <img src="../assets/images/Letter_Logo.png" alt="" width="200">
            <p>©2023 SUPERPET by SUPERTEAM STUDIOS. All Rights Reserved.</p>
         </footer>
    </div>
</body>
</html>