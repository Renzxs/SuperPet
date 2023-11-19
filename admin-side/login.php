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
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="../assets/images/admin_logo.png">
</head>
<body>
    <div class="container">
        <div class="side-header">
            <img src="../assets/images/admin_logo.png" alt="../assets/images/admin_logo.png" width="300">
        </div>
        <div class="login-container">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h1 class="h-text">Login</h1>
                <p class="h-subtext">Please log in to your account continue.</p> 
                <input type="text" id="username" name="username" placeholder="Username"> <br> 
                <input type="password" id="password" name="password" placeholder="Password"> <br>
                <div class="login-btn-container">
                    <input type="submit" id="login" name="login" value="Login">
                </div> 
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST["login"])) {
                        if(empty($_POST["username"]) || empty($_POST["password"])) {
                            echo "<p class='error-msg'>Please do not leave textboxes empty</p>";
                        } 
                        else {
                            $username = htmlentities($_POST["username"]);
                            $password = htmlentities($_POST["password"]);
                            
                            $query = "SELECT * FROM users_tbl WHERE username = '$username' AND password = '$password' AND user_role = 'admin'";
                            $result = mysqli_query($conn, $query);

                            if(mysqli_num_rows($result) === 1) {
                                $row = mysqli_fetch_assoc($result);
                                if($row['username'] === $username && $row['password'] === $password && $row['user_role'] === "admin"){
                                    // NAVIGATE TO THE NEXT PAGE
                                    $_SESSION["username"] = $username;
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
</body>
</html>
