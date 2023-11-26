<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperPet | Adopt</title>
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adopt.css">
    <script src="Adopt.js" defer></script>
</head>
<body>  
    <div class="container">
        <div class="nav-bar">
            <i class="fa-solid fa-bars" id="menu-nav-btn"></i>
            <img src="../assets/images/Letter_Logo.png" alt="" width="150px">
            <nav>
                <ul class="nav-links">
                    <li><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li class="in"><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
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
                    <li><a href="../homepage/home.php">Home</a></li>
                    <li><a href="../appointmentpage/appointment.php">Book an Appointment</a></li>
                    <li><a href="../product/product.php">SuperPet Products</a></li>
                    <li class="in"><a href="../adoptpage/adoptpage.php">Adopt your SuperPet</a></li>
                </ul>
            </nav>
        </div>

        <div class="pet-page">
            <div class="pet-header">
                <img src="../assets/images/adopt-header.png" alt="" width="500">
            </div>
            <div class="pets-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <div class="pet">
                    <div class="pet-img">
                        <div class="img">
                            <img src="../assets/images/pet1.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="pet-desc">
                        <h1 class="name">Whisker</h1>
                        <p class="breed">Young • Corgi</p>
                        <p class="desc">Adopt a charming Corgi: joy, loyalty, and endless tail wiggles.</p>
                        <div class="pet-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="pet">
                    <div class="pet-img">
                        <div class="img">
                            <img src="../assets/images/pet2.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="pet-desc">
                        <h1 class="name">Luna</h1>
                        <p class="breed">Young • Persian</p>
                        <p class="desc">Embrace elegance with a Persian cat: grace, charm, and furry sophistication.</p>
                        <div class="pet-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="pet">
                    <div class="pet-img">
                        <div class="img">
                            <img src="../assets/images/pet3.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="pet-desc">
                        <h1 class="name">Max</h1>
                        <p class="breed">Young • Hamster</p>
                        <p class="desc">Tiny ball of fur, big heart. Adopt a hamster today!</p>
                        <div class="pet-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="pet">
                    <div class="pet-img">
                        <div class="img">
                            <img src="../assets/images/pet4.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="pet-desc">
                        <h1 class="name">Bella</h1>
                        <p class="breed">Young • Pug</p>
                        <p class="desc">wrinkles, snuggles, and boundless canine charm awaits your heart.</p>
                        <div class="pet-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="pet">
                    <div class="pet-img">
                        <div class="img">
                            <img src="../assets/images/pet5.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="pet-desc">
                        <h1 class="name">Oliver</h1>
                        <p class="breed">Young • Golden Retriever</p>
                        <p class="desc">Embrace joy with a golden retriever pup—love, loyalty, and playfulness await.</p>
                        <div class="pet-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
                            </form>
                        </div>  
                    </div>
                </div>

                <div class="pet">
                    <div class="pet-img">
                        <div class="img">
                            <img src="../assets/images/pet6.png" alt="" width="250">
                        </div>
                    </div>
                    <div class="pet-desc">
                        <h1 class="name">Nala</h1>
                        <p class="breed">Young • Siamese</p>
                        <p class="desc">Siamese charm: Adopt grace, intelligence, and a purrfect companion today.</p>
                        <div class="pet-button">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <input type='submit' id='adopt' name='adopt' value='ADOPT NOW'>
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