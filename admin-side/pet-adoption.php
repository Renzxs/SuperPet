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

    // DELETE
    if(isset($_POST['delete']) && isset($_POST['pet_id']) && isset($_POST["pet_img"])) {
        $pet_id = $_POST['pet_id'];
        $pet_img = $_POST["pet_img"];

        unlink("../assets/upload/".$pet_img."");

        $delete_query = "DELETE FROM adoption_tbl WHERE pet_id = '$pet_id'";
        mysqli_query($conn, $delete_query);

        $delete_query = "DELETE FROM pets_tbl WHERE pet_id = '$pet_id'";
        mysqli_query($conn, $delete_query);
        

        // DELETE THE PHOTO IN THE DATABASE AND ALSO IN THE PATH FOLDER

    }

    if(isset($_POST['reject']) && isset($_POST["adoption_id"])){
        $adoptionId = $_POST["adoption_id"];
        $update_status = "UPDATE adoption_tbl SET status = 'Rejected' WHERE adoption_id = $adoptionId";
        mysqli_query($conn, $update_status);
    }

    if(isset($_POST['approve']) && isset($_POST["adoption_id"])){
        $adoptionId = $_POST["adoption_id"];
        $update_status = "UPDATE adoption_tbl SET status = 'Approved' WHERE adoption_id = $adoptionId";
        mysqli_query($conn, $update_status);
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
                <a href="shop.php" class="link">
                    <i class="fa-solid fa-cart-shopping nav-icon"></i>
                    <p class="nav-txt">Orders/Products</p>
                </a>
                <a href="#" class="link in">
                    <i class="fa-solid fa-paw nav-icon"></i>
                    <p class="nav-txt">Pet Adoptions</p>
                </a>
                <form action="users.php" method="post" class="link">
                    <label for="logout"><i class="fa-solid fa-arrow-right-from-bracket nav-icon"></i></label>
                    <input id="logout" name="logout" type="submit" value="Log out">
                </form>
            </div>
        </div>

        <div class="add-new-pet-modal">
            <div class="header">
                <i class="fa-solid fa-arrow-left" id="petModalback"></i>
                <h2>ADD A PET</h2>
            </div>
            <form action="pet-adoption.php" method="post" enctype="multipart/form-data">
                <p class="input-label">Pet's Name</p>
                <input type="text" name="pet-name">
                <div class="radio-btns-age">
                    <div class="radio-age">
                        <input type="radio" name="age" id="young" value="Young" checked>
                        <p>Young</p>
                    </div>
                    <div class="radio-age">
                        <input type="radio" name="age" id="adult" value="Adult">
                        <p>Adult</p>
                    </div>
                    <div class="radio-age">
                        <input type="radio" name="age" id="old" value="Old">
                        <p>Old</p>
                    </div>
                </div>
                <p class="input-label">Pet's Breed</p>
                <input type="text" name="pet-breed">
                <p class="input-label">Pet's Photo</p>
                <input type="file" name="pet-photo">
                <p class="input-label">Description</p>
                <input type="text" name="pet-desc">
                <input type="submit" value="Add" id="add-btn" name="add-btn">
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST["add-btn"]) && isset($email)){
                        if(empty($_POST["pet-name"]) || empty($_POST["age"]) || empty($_POST["pet-breed"]) || empty($_FILES["pet-photo"]) || empty($_POST["pet-desc"])){
                            echo "<p class='error-msg'>Please do not leave textboxes empty.</p>";
                        }
                        else {
                            $pet_name = htmlentities($_POST["pet-name"]);
                            $pet_age = htmlentities($_POST["age"]);
                            $pet_breed = htmlentities($_POST["pet-breed"]);
                            $pet_desc = htmlentities($_POST["pet-desc"]);

                            // PET IMAGE
                            $imgname = $_FILES["pet-photo"]["name"];
                            $imgsize = $_FILES["pet-photo"]["size"];
                            $img_tmp_name = $_FILES["pet-photo"]["tmp_name"];
                            $img_error = $_FILES["pet-photo"]["error"];

                            if($img_error === 0) {
                                if($imgsize > 625000){
                                    echo "<p class='error-msg'>The file size is too big.</p>";
                                }   
                                else {
                                    $img_ex = pathinfo($imgname, PATHINFO_EXTENSION);
                                    $img_ex_lc = strtolower($img_ex);
                                    $allowed_exs = array("jpg", "jpeg", "png");
                                    if(in_array($img_ex_lc, $allowed_exs)) {
                                        $new_img_name = uniqid("IMG-",true). "." . $img_ex_lc;
                                        $image_path = "../assets/upload/". $new_img_name;
                                        move_uploaded_file($img_tmp_name, $image_path);

                                        $insert_query = "INSERT INTO pets_tbl(pet_name, pet_age, pet_breed, pet_photo_url, pet_desc)
                                                        VALUES ('$pet_name', '$pet_age', '$pet_breed', '$new_img_name', '$pet_desc')";
                                        mysqli_query($conn, $insert_query);
                                        echo "<p class='success-msg'>Successfully Uploaded</p>";
                                    }
                                    else {
                                        echo "<p class='error-msg'>Can't Upload files of this type.</p>";
                                    }
                                }
                            } 
                            else {
                                echo "<p class='error-msg'>Something went wrong.</p>";
                            }

                            
                        }
                    }
                }
            ?>
        </div>

        <div class="main-container">
            <div class="header">
                <h1 class="header-txt">Pet Adoption</h1>
                <div class="menu-nav">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <button id="add-new-pet-btn">ADD NEW PET</button>

            <div class="adopt-notification">
                <?php
                    $get_adoption = "SELECT * FROM adoption_tbl WHERE status IS NULL ORDER BY adoption_id DESC";
                    $adoption_result = mysqli_query($conn, $get_adoption);

                    if(mysqli_num_rows($adoption_result) > 0 && isset($email)){
                        while($row = mysqli_fetch_assoc($adoption_result)){
                            $userId = $row["user_id"];
                            $petId = $row["pet_id"];
                            $get_user = "SELECT * FROM users_tbl WHERE id = $userId";
                            $user_result = mysqli_query($conn, $get_user);
                            
                            if(mysqli_num_rows($user_result) > 0){
                                while($userRow = mysqli_fetch_assoc($user_result)){
                                    $get_pet = "SELECT * FROM pets_tbl WHERE pet_id = $petId";
                                    $pet_result = mysqli_query($conn, $get_pet);

                                    if(mysqli_num_rows($pet_result) > 0){
                                        while($petRow = mysqli_fetch_assoc($pet_result)){
                                            echo "
                                            <div class='notification-container'>
                                                <h1>". $userRow["username"] ." wants to adopt " . $petRow["pet_name"] . "</h1>
                                                <form action='pet-adoption.php' method='post'>
                                                    <input type='hidden' id='adoption_id' name='adoption_id' value='" . $row['adoption_id'] . "'>
                                                    <input type='submit' value='Reject' name='reject'>
                                                    <input type='submit' value='Approve' name='approve'>
                                                </form>
                                            </div>
                                            ";
                                        }
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>
            <div class="pets-container-body">
                <?php
                    $get_pets = "SELECT * FROM pets_tbl ORDER BY pet_id DESC";
                    $result = mysqli_query($conn, $get_pets);

                    if(mysqli_num_rows($result) > 0 && isset($email)) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='pet-container'>
                                    <div class='pet-info'>
                                        <img src='../assets/upload/".$row['pet_photo_url']."' width='200'>
                                        <div class='info'>
                                            <h2 class='title'>" . $row["pet_name"] . "</h2>
                                            <p class='sub-title'>" . $row['pet_age'] . " • " . $row['pet_breed'] . "</p>
                                            <p class='desc'>" .$row['pet_desc']. "</p>
                                        </div>
                                        <form action='pet-adoption.php' method='post'>
                                            <input type='hidden' id='pet_id' name='pet_id' value='" . $row['pet_id'] . "'>
                                            <input type='hidden' id='pet_img' name='pet_img' value='" . $row['pet_photo_url'] . "'>
                                            <input type='submit' value='Delete' name='delete' id='delete-pet'>
                                        </form>
                                    </div>
                                </div> ";
                        }
                    }                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>