<?php 
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order Menu</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<h1>Welcome! <?php echo $_SESSION['username'];?></h1>
    <h1>Here are the prices</h1>
        <ul>
            <li>Netflix  - 250/month</li>
            <li>Amazon Prime - 190/month</li>
            <li>Disney+ - 150/month</li>
        </ul>
        <?php
    // Define the menu
    $menu = array(
        "Netflix" => 250,
        "Amazon Prime" => 190,
        "Disney+" => 150
    );

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // User input
        $order = $_POST["order"];
        $month = $_POST["month"];
        $cash = $_POST["cash"];

        // Check if the user has enough cash
        if ($menu[$order] * $month <= $cash) {
            echo "       Order confirmed! You will receive " . $month . " month/s of " . $order . " and have " . ($cash - $menu[$order] * $month) . " PHP left.";
        } else {
            echo "Insufficient funds. Please insert more cash.";
        }

        exit;
    }

    // Display the order form
    ?>
     <div class="form-container">
        <form method="post" action="">
            <label for="order">Choose your order:</label>
            <select name="order" id="order">    
                <option value="Netflix">Netflix</option>
                <option value="Amazon Prime">Amazon Prime</option>
                <option value="Disney+">Disney+</option>
            </select>
            <label for="month">Month:</label>
            <input type="number" name="month" id="month" value="1" min="1">
            <label for="cash">Cash:</label>
            <input type="number" name="cash" id="cash" value="190" min="1">
            <input type="submit" value="Submit">
        </form> 
    </div>   
	<a href="logout.php">Logout</a>
</body>
</html>