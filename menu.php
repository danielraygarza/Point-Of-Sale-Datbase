<?php
    include 'database.php';
    session_start();

    $sql = "SELECT * FROM pizza;";
    $result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>POS Pizza</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/menu.css">
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
    
    <form action="" method="post">
            <h2>Menu</h2>  
    </form>

    <main>
        <?php 
            while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class = "card">
                <div class = "image">
                    <img src= <?php echo $row["Image_Path"]; ?> alt="">
                </div>
                <p class = "pizza_name"><?php echo $row["Name"]; ?> (<?php echo $row["Size_Option"];?>)</p>
                <p class = "description"><?php echo $row["Description"]; ?></p>
                <p class = "calories"><?php echo $row["Calories"]; ?> cals</p>
                <p class = "price"><b>$<?php echo $row["Cost"]; ?></b></p>
                <div class = "customize"> <a href = "customize_pizza.php">CUSTOMIZE</a></div>
            </div>
        <?php } ?>
    </main>
    


</body>
</html>