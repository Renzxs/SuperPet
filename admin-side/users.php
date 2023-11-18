<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupetPet | Manage Users</title>
    <link rel="stylesheet" href="admin-dashboard-style.css">
    <link rel="icon" href="../assets/images/admin_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="nav-sidebar">
            <div class="nav-header">
                <img src="../assets/images/admin_logo.png" alt="../assets/images/admin_logo.png" width="200">
            </div>
            <div class="main-nav">
                <a href="#" class="link in">
                    <i class="fa-solid fa-users nav-icon"></i>
                    <p class="nav-txt">Manage Users</p>
                </a>
                <a href="#" class="link">
                    <i class="fa-solid fa-calendar nav-icon"></i>
                    <p class="nav-txt">Appointments</p>
                </a>
                <a href="#" class="link">
                    <i class="fa-solid fa-cart-shopping nav-icon"></i>
                    <p class="nav-txt">Orders/Products</p>
                </a>
                <a href="#" class="link">
                    <i class="fa-solid fa-paw nav-icon"></i>
                    <p class="nav-txt">Pet Adoptions</p>
                </a>
                <a href="#" class="link">
                    <i class="fa-solid fa-arrow-right-from-bracket nav-icon"></i>
                    <p class="nav-txt">Log out</p>
                </a>
            </div>
        </div>
        <div class="main-container">
            <h1 class="header-txt">Manage Users</h1>
            <table>
                <tr class="thead">
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>PASSWORD</td>
                    <td>ADDRESS</td>
                    <td>CONTACT NO.</td>
                    <td></td>
                </tr>
                <tr>
                    <!-- PHP MYSQL CONNECT HERE -->
                    <!-- <td>1</td>
                    <td>Lebron James</td>
                    <td>james132</td>
                    <td>#54 United Nations</td>
                    <td>0923242323</td>
                    <td class="table-modify">
                        <form action="users.php" method="post">
                            <input type="button" id="edit" name="edit" value="Edit"> 
                            <input type="button" id="delete" name="delete" value="Delete">
                        </form>
                    </td> -->
                </tr>
            </table>
        </div>
    </div>
</body>
</html>