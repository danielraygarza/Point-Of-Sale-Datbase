<?php
    include 'database.php';
    session_start(); //continues current session to keep user logged in
?>

<!DOCTYPE html>
<html>
<head>
    <title>POS Pizza</title>
    <link rel="stylesheet" href="menucss.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/pizza.ico" type="image/x-icon">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="menu.php">Order now</a>
        <!-- <a href="#">Profile</a> -->
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a href="logout.php">Logout</a>';
            }
        ?>
    </div>
        <main>
            <div class = "card">
                <div class = "image">
                    <img src="cheese_pizza.jpeg" alt="">
                </div>
                <p class = "pizza_name">Pizza Name</p>
                <p class = "description"> This is a placeholder description of the designated pizza. This is a placeholder description of the designated pizza. This is a placeholder description of the designated pizza.</p>
                <p class = "calories">1200 cals</p>
                <p class = "price"><b>$12.99</b></p>
                <div class = "add-to-cart">ADD TO ORDER</div>
            </div>
        </main>


    </body>
</html>