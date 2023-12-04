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

    if(isset($_POST["buy"]) && isset($_POST["product_id"]) && isset($userId)){
        $productId = $_POST["product_id"];
        $insert_query = "INSERT INTO orders_tbl(product_id, user_id) VALUES($productId, $userId)";
        mysqli_query($conn, $insert_query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Products</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="product.css">
    <script src="Product.js" defer></script>
</head>
<body>  
    <div class="container">
        <div class="nav-bar">
            <i class="fa-solid fa-bars" id="menu-nav-btn"></i>
            <img src="../assets/images/Letter_Logo.png" alt="" width="150px">
            <nav>
                <ul class="nav-links">
                    <li ><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li class="in"><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
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
                    <li ><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li class="in"><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
        </div>

        <div class="product-page">
            <div class="product-header">
                <img src="../assets/images/superpet-products.png" alt="" width="500">
            </div>
            <div class="products-list">
                <?php
                    $get_products = "SELECT * FROM products_tbl";
                    $result = mysqli_query($conn, $get_products);
                    
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            if($row["product_category"] === "Limited Edition"){
                                echo "
                                <div class='product'>
                                    <div class='limited-img'>
                                        <div class='limited-chip '>". $row["product_category"] ."</div>
                                        <div class='img'>
                                            <img src='../assets/upload/". $row["product_image_url"]."'width='250'>
                                        </div>
                                    </div>
                                    <div class='product-desc'>
                                        <h1 class='name'>".$row["product_name"]."</h1>
                                        <p class='price'>$ ".$row["product_price"]."</p>
                                        <p class='desc'>".$row["product_description"]."</p>
                                        <div class='product-button'>
                                            <form action='product.php' method='post'>
                                                <input type='hidden' id='product_id' name='product_id' value='" . $row['product_id'] . "'>
                                                <input type='submit' id='buy' name='buy' value='BUY NOW'>
                                                <input type='submit' id='add-to-cart' name='add-to-cart' value='ADD TO CART'>
                                            </form>
                                        </div>  
                                    </div>
                                </div>   
                                ";
                            }
                            else {
                                echo "
                                <div class='product'>
                                    <div class='product-img'>
                                        <div class='product-categ-chip'>". $row["product_category"] ."</div>
                                        <div class='img'>
                                            <img src='../assets/upload/". $row["product_image_url"]."'width='250'>
                                        </div>
                                    </div>
                                    <div class='product-desc'>
                                        <h1 class='name'>".$row["product_name"]."</h1>
                                        <p class='price'>$ ".$row["product_price"]."</p>
                                        <p class='desc'>".$row["product_description"]."</p>
                                        <div class='product-button'>
                                            <form action='product.php' method='post'>
                                                <input type='hidden' id='product_id' name='product_id' value='" . $row['product_id'] . "'>
                                                <input type='submit' id='buy' name='buy' value='BUY NOW'>
                                                <input type='submit' id='add-to-cart' name='add-to-cart' value='ADD TO CART'>
                                            </form>
                                        </div>  
                                    </div>
                                </div>   
                                ";   
                                
                            }
                            
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