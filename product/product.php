<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Products</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="product.css">
    <script src="Home.js" defer></script>
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
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li><a href="#">Adopt your SuperPet</a></li>
                </ul>
            </nav>
        </div>

        <div class="product-page">
            <div class="product-header">
                <img src="../assets/images/superpet-products.png" alt="" width="500">
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

            <div class="products-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <div class="product">
                    <div class="product-img">
                        <div class="product-categ-chip">Best Seller</div>
                        <div class="img">
                            <img src="../assets/images/4.png" alt="" width="250">
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
                        <img src="../assets/images/5.png" alt="" width="250">
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
                        <img src="../assets/images/6.png" alt="" width="250">
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

            <div class="products-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <div class="product">
                    <div class="product-img">
                        <div class="product-categ-chip">Best Seller</div>
                        <div class="img">
                            <img src="../assets/images/7.png" alt="" width="250">
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
                        <img src="../assets/images/8.png" alt="" width="250">
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
                        <img src="../assets/images/9.png" alt="" width="250">
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
            
        <footer>
            <img src="../assets/images/Letter_Logo.png" alt="" width="200">
            <p>©2023 SUPERPET by SUPERTEAM STUDIOS. All Rights Reserved.</p>
         </footer>
    </div>
</body>
</html>