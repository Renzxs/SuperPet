<?php
    session_start();
    require_once '../config/mysql-connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SuperPet | Admin Login</title>
        <link rel="stylesheet" href="styles/admin-login.css">
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
                        <a href="../login-register/register.php" class="link">NEW USER</a>
                        <a href="../index.php" class="link">EXISTING USER</a>
                        <a href="#" class="link in-log">ADMIN</a>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <p class="input-label">EMAIL</p>
                        <input type="email" name="email" id="email" class="txt-input">
                        <p class="input-label">PASSWORD</p>
                        <input type="password" name="password" id="password" class="txt-input">
                        <br>
                        <div class="login-btn-container">
                            <input type="submit" value="LOG IN" name="login">
                        </div>
                    </form>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            if(isset($_POST["login"])) {
                                if(empty($_POST["email"]) || empty($_POST["password"])) {
                                    echo "<p class='error-msg'>Please do not leave textboxes empty.</p>";
                                } 
                                else {
                                    $email = htmlentities($_POST["email"]);
                                    $password = htmlentities($_POST["password"]);
                                    
                                    $query = "SELECT * FROM users_tbl WHERE email = '$email' AND password = '$password' AND user_role = 'admin'";
                                    $result = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($result) === 1) {
                                        $row = mysqli_fetch_assoc($result);
                                        if($row['email'] === $email && $row['password'] === $password && $row['user_role'] === "admin"){
                                            // NAVIGATE TO THE NEXT PAGE
                                            $_SESSION["email"] = $email;
                                            $_SESSION["password"] = $password;
                                            header("Location: users.php");
                                            mysqli_close($conn);
                                            exit; 
                                        } else {
                                            echo "<p class='error-msg'>Invalid username or password.</p>";
                                        }
                                    }
                                    else {
                                        echo "<p class='error-msg'>Invalid username or password.</p>";
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