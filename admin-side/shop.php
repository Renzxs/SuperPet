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
    if(isset($_POST['delete']) && isset($_POST['product_id']) && isset($_POST["product_img"])) {
        $product_id = $_POST['product_id'];
        $product_img = $_POST["product_img"];
    
        unlink("../assets/upload/".$product_img."");
    
        $delete_query = "DELETE FROM products_tbl WHERE product_id = '$product_id'";
        mysqli_query($conn, $delete_query);
            
    
        // DELETE THE PHOTO IN THE DATABASE AND ALSO IN THE PATH FOLDER
    
    }

    if(isset($_POST["status"]) && isset($_POST["update"]) && isset($_POST["order_id"])){
        $status = $_POST["status"];
        $order_id = $_POST["order_id"];
        $update_status = "UPDATE orders_tbl SET order_status = '$status' WHERE order_id = $order_id";
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
    <script src="scripts/Store.js" defer></script>
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
                <a href="#" class="link in">
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
                <h1 class="header-txt">Pet Store</h1>
                <div class="menu-nav">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

        <!-- ADD PRODUCT MODAL -->
        <div class="add-new-product-modal">
            <div class="header">
                <i class="fa-solid fa-arrow-left" id="productModalback"></i>
                <h2>ADD A PRODUCT</h2>
            </div>
            <form action="shop.php" method="post" enctype="multipart/form-data">
                <p class="input-label">Product Name</p>
                <input type="text" name="product-name">

                <p class="input-label">Product Price</p>
                <input type="number" name="product-price" placeholder="$">

                <p class="input-label">Product Image</p>
                <br>
                <input type="file" name="product-photo">
                <br>
                <p class="input-label">Product Category</p>
                <select name="category" id="category">
                    <option value="Best Seller">Best Seller</option>
                    <option value="On Sale">On Sale</option>
                    <option value="Limited Edition">Limited Edition</option>
                </select>

                <p class="input-label">Description</p>
                <input type="text" name="product-desc">
                
                <input type="submit" value="Add" id="add-btn" name="add-product-btn">
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST["add-product-btn"]) && isset($email)) {
                        if(empty($_POST["product-name"]) || empty($_POST["product-price"]) || empty($_FILES["product-photo"]) || empty($_POST["category"]) || empty($_POST["product-desc"])){
                            echo "<p class='error-msg'>Please do not leave textboxes empty.</p>";
                        }
                        else {
                            $product_name = htmlentities($_POST["product-name"]);
                            $product_price = htmlentities($_POST["product-price"]);
                            $category = htmlentities($_POST["category"]);
                            $product_desc = htmlentities($_POST["product-desc"]);

                            // PRODUCT IMAGE
                            $imgname = $_FILES["product-photo"]["name"];
                            $imgsize = $_FILES["product-photo"]["size"];
                            $img_tmp_name = $_FILES["product-photo"]["tmp_name"];
                            $img_error = $_FILES["product-photo"]["error"];

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

                                        $insert_query = "INSERT INTO products_tbl(product_name, product_price, product_image_url, product_category, product_description)
                                                        VALUES ('$product_name', '$product_price', '$new_img_name', '$category', '$product_desc')";
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

            <button id="add-new-product-btn">ADD PRODUCT</button>

            
            <div class="orders-list">
                <?php
                    $get_orders = "SELECT * FROM orders_tbl WHERE order_status <> 'Delivered' AND order_status <> 'Cancelled Order' ORDER BY order_id DESC";
                    $result = mysqli_query($conn, $get_orders);
                                    
                    if(mysqli_num_rows($result) > 0 && isset($email)) {
                        while($row = mysqli_fetch_assoc($result)){
                            $product_id = $row["product_id"];
                            $user_id = $row["user_id"];

                            $get_product = "SELECT * FROM products_tbl WHERE product_id = $product_id";
                            $product_result = mysqli_query($conn, $get_product);

                            if(mysqli_num_rows($product_result) > 0) {
                                while($product_row = mysqli_fetch_assoc($product_result)){
                                    $get_user = "SELECT * FROM users_tbl WHERE id = $user_id";
                                    $user_result = mysqli_query($conn, $get_user);

                                    if(mysqli_num_rows($user_result) > 0) {
                                        while($user_row = mysqli_fetch_assoc($user_result)){
                                            echo "
                                            <div class='order-container'>
                                                <div class='product-info'>
                                                    <img src='../assets/upload/".$product_row["product_image_url"]."' width='200'>
                                                    <h1>".$product_row["product_name"]."</h1>
                                                    <p>$".$product_row["product_price"]."</p>
                                                </div>
                                                <div class='order-status'>
                                                    <h1>".$user_row["username"]."</h1>
                                                    <p>".$user_row["address"]."</p>
                                                    <form action='shop.php' method='post'>
                                                        <h3>Order Status :</h3>
                                                        <br>
                                                        <div class='status-radios'>
                                                            <div class='status-radio'>
                                                                <input type='radio' name='status' value='Packaging'>
                                                                <p>Packaging</p>
                                                            </div>
                                                            <div class='status-radio'>
                                                                <input type='radio' name='status' value='Ready for Delivery'>
                                                                <p>Ready for Delivery</p>
                                                            </div>
                                                            <div class='status-radio'>
                                                                <input type='radio' name='status' value='On the way'>
                                                                <p>On the way</p>
                                                            </div>
                                                            <div class='status-radio'>
                                                                <input type='radio' name='status' value='Delivered'>
                                                                <p>Delivered</p>
                                                            </div>
                                                            <div class='status-radio'>
                                                                <input type='radio' name='status' value='Cancelled Order'>
                                                                <p>Cancel Order</p>
                                                            </div>
                                                        </div>  
                                                        <input type='hidden' name='order_id' value='".$row["order_id"]."'>  
                                                        <input type='submit' name='update' class='update-btn' value='Update'>
                                                    </form>
                                                </div>
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

            <div class="products-list">
                <!-- USE PHP TO SHOW PRODUCTS HERE -->
                <?php
                    $get_products = "SELECT * FROM products_tbl";
                    $products_result = mysqli_query($conn, $get_products);

                    if(mysqli_num_rows($products_result) > 0 && isset($email)){
                        while($row = mysqli_fetch_assoc($products_result)){
                            if($row["product_category"] === "Limited Edition"){
                            echo "
                                <div class='product'>
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
                                                <input type='hidden' id='product_img' name='product_img' value='" . $row['product_image_url'] . "'>
                                                <input type='submit' id='delete' name='delete' value='Delete'>
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
                                            <form action='shop.php' method='post'>
                                                <input type='hidden' id='product_id' name='product_id' value='" . $row['product_id'] . "'>
                                                <input type='hidden' id='product_img' name='product_img' value='" . $row['product_image_url'] . "'>
                                                <input type='submit' id='delete' name='delete' value='Delete'>
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
    </div>
</body>
</html>