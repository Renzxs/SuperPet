<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Products</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="product.css">
</head>
<body>  
    <div class="container">
        <div class="nav-bar">
            <i class="fa-solid fa-bars" id="menu-nav-btn"></i>
            <img src="../assets/images/Letter_Logo.png" alt="" width="150px">
            <nav>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Book an Appointment</a></li>
                    <li class="in"><a href="#">SuperPet Products</a></li>
                    <li><a href="#">Adopt your SuperPet</a></li>
                </ul>
            </nav>
            <div class="nav-icon-btns">
                <i class="fa-solid fa-shopping-cart"></i>
                <i class="fa-solid fa-circle-user"></i>
            </div>
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
                        <div class="product-categ-chip ">Limited Edition</div>
                        <img src="../assets/images/2.png" alt="" width="250">
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Wagg (Puppy)</h1>
                        <p class="price">$ 49.00</p>
                        <p class="desc">Tail-wagging nutrition tailored for your growing and playful puppy.</p>
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
                        <h1 class="name">Whole Life</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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
                        <div class="product-categ-chip">On Sale</div>
                        <div class="img">
                            <img src="../assets/images/1.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="product-desc">
                        <h1 class="name">IS Chewies</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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
                        <div class="product-categ-chip ">On Sale</div>
                        <img src="../assets/images/2.png" alt="" width="250">
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Eagle Mountain</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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
                        <h1 class="name">Percuro</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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
                        <div class="product-categ-chip">On Sale</div>
                        <div class="img">
                            <img src="../assets/images/1.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Dinovite</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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
                        <div class="product-categ-chip ">On Sale</div>
                        <img src="../assets/images/2.png" alt="" width="250">
                    </div>
                    <div class="product-desc">
                        <h1 class="name">Lifetime</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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
                        <h1 class="name">More</h1>
                        <p class="price">$ 39.00</p>
                        <p class="desc">WHOLE LIFE: Tasty dog biscuits for a tail-wagging, lifelong delight.</p>
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

    </div>
</body>
</html>