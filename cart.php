
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>


<?php 
session_start();
include("dbconn.php");

if (!isset($_SESSION['custID']) || !isset($_SESSION['user_role'])) {
    header("Location: editProfile.php");
    exit();
}

$c_id = $_SESSION['custID'];

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'add' && isset($_POST['packageName']) && isset($_POST['packagePrice'])) {
        $packageID = $_GET['id']; 
        $packageName = $_POST['packageName'];
        $packagePrice = $_POST['packagePrice'];
        $quantity = 1; // Default quantity is 1

        $item_array = array(
            'packageID' => $packageID,
            'packageName' => $packageName,
            'packagePrice' => $packagePrice,
            'quantity' => $quantity
        );

        if (isset($_SESSION['cart'])) {
            $package_ids = array_column($_SESSION['cart'], 'packageID');
            if (!in_array($packageID, $package_ids)) {
                $_SESSION['cart'][] = $item_array;
            } else {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['packageID'] == $packageID) {
                        $_SESSION['cart'][$key]['quantity'] += $quantity;
                    }
                }
            }
        } else {
            $_SESSION['cart'][] = $item_array;
        }
    }

    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['packageID'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                // Reindex the array
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiddoSmart Website Cart</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="cart.css">

    
</head>
<body>
    <!-- header section starts -->
    <header>
        <input type="checkbox" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">KIDDOSMART <span></span></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#packages">packages</a>
            <a href="#login">login</a>
        </nav>

        <div class="icons">
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
        </div>
    </header>
    <!--header section ends-->

    <?php
    if (!empty($_SESSION['cart'])) {
        $total = 0; 
        foreach ($_SESSION['cart'] as $key => $package) {
            echo '<div class="cart-item">';
            echo '<h4>' . $package['packageName'] . '</h4>';
            echo '<p>RM ' . number_format($package['packagePrice'], 2) . ' x ' . $package['quantity'] . '</p>';
            echo '<p>RM ' . number_format($package['packagePrice'] * $package['quantity'], 2) . '</p>';
            echo '<a href="cart.php?action=remove&id=' . $package['packageID'] . '" class="btn">Remove</a>';
            echo '</div>';
            $total += $package['packagePrice'] * $package['quantity'];
        }
        echo '<h3>Total: RM ' . number_format($total, 2) . '</h3>';
        echo '<a href="Payment.php" class="btn">Checkout</a>';
    } else {
        echo '<p>Your cart is empty.</p>';
    }
