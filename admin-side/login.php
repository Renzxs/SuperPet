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
            <form action="login.php" method="post">
                <h1 class="h-text">Login</h1>
                <p class="h-subtext">Please log in to your account continue.</p> 
                <input type="text" id="username" placeholder="Username"> <br> 
                <input type="password" id="password" placeholder="Password"> <br>
                <div class="login-btn-container">
                    <input type="submit" id="login" value="Login">
                </div> 
            </form>
        </div>
    </div>
</body>
</html>