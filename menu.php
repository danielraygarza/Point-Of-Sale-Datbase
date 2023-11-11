<?php
include 'database.php';
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$sql = "SELECT * FROM pizza;";
$result = $mysqli->query($sql);

function addToCart($pizzaId, $size, $price) {
    $pizzaItem = [
        'pizza_id' => $pizzaId,
        'size' => $size,
        'price' => $price,
    ];
    $_SESSION['cart'][] = $pizzaItem;
}

function getCartItemCount() {
    return count($_SESSION['cart']);
}
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
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a href="update_customer.php">Profile</a>';
                echo '<a href="logout.php">Logout</a>';
            }
        ?>
         <a href="checkout.php" id="cart-button">Cart (<?php echo getCartItemCount(); ?>)</a>
    </div>

    <form action="" method="post">
        <h2>Menu</h2>
    </form>

    <main>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
            <div class="image">
                <img src=<?php echo $row["Image_Path"]; ?> alt="">
            </div>
            <p class="pizza_name"><?php echo $row["Name"]; ?> (<?php echo $row["Size_Option"]; ?>)</p>
            <p class="description"><?php echo $row["Description"]; ?></p>
            <p class="calories"><?php echo $row["Calories"]; ?> cals</p>
            <p class="price"><b>$<?php echo $row["Price"]; ?></b></p>
            <?php
            if ($row["Is_Pizza"] == 1) {
                echo '<div class="customize"><a href="customize_pizza.php?pizza_id=' . $row["Pizza_ID"] . '&size=' . $row["Size_Option"] . '&price=' . $row["Cost"] . '">CUSTOMIZE</a></div>';
            } else {
                echo '<div class="add-to-cart"><button onclick="addToCart(' . $row["Pizza_ID"] . ', \'' . $row["Size_Option"] . '\', ' . $row["Cost"] . ')">Add to Cart</button></div>';
            }
            ?>
        </div>
        <?php } ?>
    </main>
</body>
</html>
