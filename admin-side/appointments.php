<?php
    session_start();

    // DATABASE CONFIG 
    require_once '../config/mysql-connection.php';

    $email;
    $password;

    if(empty( $_SESSION["email"]) || empty( $_SESSION["password"])){
        
    } else {
        $email = $_SESSION["email"];
        $password = $_SESSION["password"];
    }


    // LOGOUT
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: index.php");
    }

    if(isset($_POST["reject"]) && isset($_POST['appointment_id']) && isset($_POST['comments'])) {
        $appointment_id = $_POST['appointment_id'];
        $comments = htmlentities($_POST['comments']);
        $query = "UPDATE appointment_tbl SET isApproved = 'Declined', status_msg = '$comments' WHERE appointment_id = $appointment_id";
        mysqli_query($conn, $query);
    }

    if(isset($_POST["approve"]) && isset($_POST['appointment_id']) && isset($_POST['comments'])) {
        $appointment_id = $_POST['appointment_id'];
        $comments = htmlentities($_POST['comments']);
        $query = "UPDATE appointment_tbl SET isApproved = 'Approved', status_msg = '$comments' WHERE appointment_id = $appointment_id";
        mysqli_query($conn, $query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupetPet | Appointments</title>
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
                <a href="#" class="link in">
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
                <div class="header">
                    <h1 class="header-txt">Appointments</h1>
                    <div class="menu-nav">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>

                <div class="appointments">
                    <?php
                        $getAppointments = "SELECT * FROM appointment_tbl WHERE isApproved IS NULL ORDER BY appointment_id DESC";
                        $result = mysqli_query($conn, $getAppointments);

                        if(mysqli_num_rows($result) > 0 && isset($email)) {
                            while($row = mysqli_fetch_assoc($result)){
                                $userid = $row['user_id'];

                                $getUser = "SELECT * FROM users_tbl WHERE id = $userid LIMIT 1";
                                $result2 = mysqli_query($conn, $getUser);

                                if(mysqli_num_rows($result2) > 0) {
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        echo "<div class='appoint'>
                                                    <div class='appoint-info'>
                                                        <div class='schedule'>
                                                            <h1>" .$row['date']. "</h1>
                                                            <h3> " .$row['time']. "</h3>
                                                        </div>
                                                        <div class='user-info'>
                                                            <h3>" . $row2['username'] . "</h3>
                                                            <p><strong>FULLNAME: </strong>" .$row['first_name']. " ". $row['last_name'] . "</p>
                                                            <p><strong>PHONE: </strong> ". $row['phone'] . "</p>
                                                            <p><strong>EMAIL: </strong>" . $row2['email'] . "</p>
                                                            <p><strong>PET'S NAME: </strong> ". $row['pet_name'] . "</p>
                                                            <p><strong>TYPE OF PET: </strong>". $row['type_of_pet'] . "</p>
                                                            <p><strong>COMMENTS: </strong>". $row['comments'] . "</p>
                                                        </div>
                                                    </div>
                                                    <div class='input'>
                                                        <form action='appointments.php' method=\"post\">
                                                            <p class='input-label'>Comments</p>
                                                            <input type='text' name='comments' id='comments'>
                                                            <div class='btns'>
                                                                <input type='hidden' id='appointment_id' name='appointment_id' value='" . $row['appointment_id'] . "'>
                                                                <input type='submit' value='Reject' name='reject' id='reject'>
                                                                <input type='submit' value='Approve' name='approve' id='approve'>
                                                            </div>
                                                        </form>
                                                    </div>
                                            </div>";
                                    }
                                }
                            }
                        }
                    ?>
                </div>
        </div>
    </div>
</body>
</html>
