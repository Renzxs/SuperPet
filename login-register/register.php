<?php
    session_start();
    require_once '../config/mysql-connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SuperPet | Login</title>
        <link rel="stylesheet" href="styles/register.css">
        <link rel="icon" href="../assets/images/superpet_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <div class="super-pet-desc">
                <img src="../assets/images/superpet_logo.png" alt="">
                <p>Welcome to SuperPet. Register with SuperPet for exclusive access to pet care tips, promotions, and personalized services. Join us in celebrating your pet's well-being!</p>
            </div>
            <div class="container-login">
               <div class="login-form">
                    <div class="links">
                        <a href="#" class="link in-log">NEW USER</a>
                        <a href="login.php" class="link ">EXISTING USER</a>
                        <a href="../admin-side/admin-login.php" class="link">ADMIN</a>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <p class="input-label">USERNAME</p>
                        <input type="text" name="username" id="username" class="txt-input">
                        <p class="input-label">PASSWORD</p>
                        <input type="password" name="password" id="password" class="txt-input">
                        <p class="input-label">EMAIL</p>
                        <input type="email" name="email" id="email" class="txt-input">
                        <p class="input-label">ADDRESS</p>
                        <input type="text" name="address" id="address" class="txt-input">
                        <br>
                        <div class="login-btn-container">
                            <input type="submit" value="REGISTER" name="register">
                        </div>
                    </form>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            if(isset($_POST["register"])) {
                                if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"]) || empty($_POST["address"])) {
                                    echo "<p class='error-msg'>Please do not leave textboxes empty.</p>";
                                } 
                                else {
                                    $username = htmlentities($_POST["username"]);
                                    $password = htmlentities($_POST["password"]);
                                    $email = htmlentities($_POST["email"]);
                                    $address = htmlentities($_POST["address"]);

                                    $checkEmail = "SELECT email FROM users_tbl WHERE email = '$email'";
                                    $result = mysqli_query($conn, $checkEmail);

                                    if(mysqli_num_rows($result) === 1) {
                                        echo "<p class='error-msg'>Your email is already registered.</p>";
                                            mysqli_close($conn);
                                    } 
                                    else {
                                            $query = "INSERT INTO users_tbl (username, password, email, address, user_role) 
                                            VALUES ('$username', '$password', '$email', '$address', 'customer')";
                                            mysqli_query($conn, $query);
                                            echo "<p class='success-msg'>You successfully created your account!</p>";
                                            mysqli_close($conn);
                                    }
                                }
                            }
                        }
                    ?>
               </div>
            </div>
            <div class="banner top">WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE</div>
            <div class="banner bottom">WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE • WHERE SUPERPETS GET SUPERCARE</div>
        </div>
    </body>
</html>