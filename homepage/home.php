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
                    <li class="in"><a href="#">Home</a></li>
                    <li><a href="#">Book an Appointment</a></li>
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
                    <li class="in"><a href="#">Home</a></li>
                    <li><a href="#">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="#">Adopt your SuperPet</a></li>
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
                <a href="#" class="appointment-btn">BOOK AN APPOINTMENT</a>
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
                <a href="#" class="show-now-btn">SHOP NOW!</a>
            </div>
            <div class="products-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <div class="product">
                    <div class="product-img">
                        <div class="product-categ-chip">Best Seller</div>
                        <div class="img">
                            <img src="../assets/images/1.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Woofy</h1>
                        <p class="price">$ 29.00</p>
                        <p class="desc">WOOFY: Nourish your adult dog with wholesome, flavorful goodness daily.</p>
                        <div class="product-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='buy' name='buy' value='BUY NOW'>
                                <input type='submit' id='add-to-cart' name='add-to-cart' value='ADD TO CART'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="product">
                    <div class="product-img">
                        <div class="product-categ-chip ">Best Seller</div>
                        <img src="../assets/images/2.png" alt="" width="250">
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Woofy</h1>
                        <p class="price">$ 29.00</p>
                        <p class="desc">WOOFY: Nourish your adult dog with wholesome, flavorful goodness daily.</p>
                        <div class="product-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='buy' name='buy' value='BUY NOW'>
                                <input type='submit' id='add-to-cart' name='add-to-cart' value='ADD TO CART'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="product">
                    <div class="product-img">
                        <div class="product-categ-chip">On Sale</div>
                        <img src="../assets/images/3.png" alt="" width="250">
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Woofy</h1>
                        <p class="price">$ 29.00</p>
                        <p class="desc">WOOFY: Nourish your adult dog with wholesome, flavorful goodness daily.</p>
                        <div class="product-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='buy' name='buy' value='BUY NOW'>
                                <input type='submit' id='add-to-cart' name='add-to-cart' value='ADD TO CART'>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <div class="pet-adopt-page">
            <div class="adopt-banner">ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET</div>
            <div class="main-adopt-page">
                <img class="pets-bg" src="../assets/images/adopt-hero.webp" alt="">
                <div class="adopt-text">
                    <img src="../assets/images/ADOPT YOUR SUPERPET.png" alt="" width="300">
                    <p class="adopt-desc"><strong>Discover furry friends waiting to share love, joy, and companionship.</strong> Make a lifelong connection with your perfect match today!</p>
                    <a href="#" class="adopt-now">LET'S ADOPT NOW!</a>
                </div>
            </div>
            <div class="adopt-banner">ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET • ADOPT YOUR SUPERPET</div>
        </div>            
        <footer>
            <img src="../assets/images/Letter_Logo.png" alt="" width="200">
            <p>©2023 SUPERPET by SUPERTEAM STUDIO. All Rights Reserved.</p>
         </footer>
    </div>
</body>
</html>