<?php
    session_start();

    require_once '../config/mysql-connection.php';

    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location: ../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Home</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="home.css">
    <script src="Home.js" defer></script>
</head>
<body>  
    <div class="container">
        <div class="nav-bar">
            <i class="fa-solid fa-bars" id="menu-nav-btn"></i>
            <img src="../assets/images/Letter_Logo.png" alt="" width="150px">
            <nav>
                <ul class="nav-links">
                    <li class="in"><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
            <div class="nav-icon-btns">
                <i class="fa-solid fa-shopping-cart"></i>
                <i class="fa-solid fa-circle-user"></i>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <button type="submit" class="logout" name="logout">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </button>
                </form>
            </div>
        </div>

        <div class="mobile-nav">
            <nav>
                <ul class="nav-links">
                    <li class="in"><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
        </div>

        <div class="announcement">
            <p>Christmas Sale   •  Get 50% OFF for your first order! </p>
        </div>
        <div class="banner">
            <img src="../assets/images/HERO-BG.png" alt="" width="200">
            <div class="banner-txt">
                <img src="../assets/images/banner-text.png" alt="" width="100">
                <p class="sub-desc"><strong>Discover SuperPet, where adorable meets superhero.</strong> Elevate your pet's well-being with our whimsical, expert care!</p>
                <a href="../appointmentpage/appointment.php" class="appointment-btn">BOOK AN APPOINTMENT</a>
            </div>
        </div>
        <div class="stickers">
            <div class="sticker">
                <img src="../assets/images/dog.png" alt="" width="100px">
                <h1 class="sticker-title">Supercare for SuperPets</h1>
                <p class="sticker-desc">Passionate professionals ensuring your pet's well-being with personalized attention.</p>
            </div>
            <div class="sticker">
                <img src="../assets/images/duck.png" alt="" width="100px">
                <h1 class="sticker-title">Compassionate Service</h1>
                <p class="sticker-desc">Passionate professionals ensuring your pet's well-being with personalized attention.</p>
            </div>
            <div class="sticker">
                <img src="../assets/images/cat.png" alt="" width="100px">
                <h1 class="sticker-title">Top-Notch Facilities</h1>
                <p class="sticker-desc">Passionate professionals ensuring your pet's well-being with personalized attention.</p>
            </div>
            <div class="sticker">
                <img src="../assets/images/froggy.png" alt="" width="100px">
                <h1 class="sticker-title">Community Support</h1>
                <p class="sticker-desc">Passionate professionals ensuring your pet's well-being with personalized attention.</p>
            </div>
        </div>

        <div class="product-page">
            <div class="product-header">
                <img src="../assets/images/superpet-product.png" alt="" width="500">
                <p class="desc"><strong>Explore SuperPet's curated selection of premium products.</strong> tailored to enhance your pet's joy and well-being.</p>
                <a href="../product/product.php" class="show-now-btn">SHOP NOW!</a>
            </div>
            <div class="products-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <?php
                    $get_products = "SELECT * FROM products_tbl LIMIT 3";
                    $result = mysqli_query($conn, $get_products);
                    
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            if($row["product_category"] === "Limited Edition"){
                                echo "
                                <div class='product '>
                                    <div class='product-img limited-product'>
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
                                            <form action='shop.php' method='post'>
                                                <input type='hidden' id='product_id' name='product_id' value='" . $row['product_id'] . "'>
                                                <input type='submit' id='buy' name='buy' value='BUY NOW'>
                                                <input type='submit' id='add-to-cart' name='add-to-cart' value='ADD TO CART'>
                                            </form>
                                        </div>  
                                    </div>
                                </div>   
                                ";
                            } else {
                                echo "
                                <div class='product '>
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
                                            <form action='shop.php' method='post'>
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

        <div class="pet-adopt-page">
            <div class="adopt-banner">ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET</div>
            <div class="main-adopt-page">
                <img class="pets-bg" src="../assets/images/adopt-hero.webp" alt="">
                <div class="adopt-text">
                    <img src="../assets/images/ADOPT YOUR SUPERPET.png" alt="" width="300">
                    <p class="adopt-desc"><strong>Discover furry friends waiting to share love, joy, and companionship.</strong> Make a lifelong connection with your perfect match today!</p>
                    <a href="../adoptpage/adoptpage.php" class="adopt-now">LET'S ADOPT NOW!</a>
                </div>
            </div>
            <div class="adopt-banner">ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET</div>
        </div>            
        <footer>
            <img src="../assets/images/Letter_Logo.png" alt="" width="200">
            <p>©2023 SUPERPET by SUPERTEAM STUDIOS. All Rights Reserved.</p>
         </footer>
    </div>
</body>
</html>

<?php
    $userId = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $email =$_SESSION["email"];
    $address =$_SESSION["address"]; 
?>