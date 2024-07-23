<?php
// cartProcess.php
session_start();
include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    if (isset($_POST['cartPackageID']) && !empty($_POST['cartPackageID'])) {
        $totalPrice = $_POST['totalPrice'];
        $custID = $_SESSION['custID'];
        $adminID = $_SESSION['adminID']; // Fetch adminID from session
        $orderTime = date('H:i:s'); //set the current time as orderTime 
        $orderDate = date('Y-m-d'); // Set the current date as orderDate

        $products = $_POST['products'];

        foreach ($products as $product) {
            // Process each product
            $productId = $product['id'];
            $quantity = $product['quantity'];

            // Save the product to the database or do whatever you need to do
        }

        foreach ($_POST['cartPackageID'] as $packageID) {
            $sql = "INSERT INTO orderpackage (orderDate, packageID, custID, totalPrice, adminID) VALUES (?, ?, ?, ?, ?)";
            $stmt = $dbconn->prepare($sql);

            if ($stmt === false) {
                die("Error preparing the SQL statement: " . $dbconn->error);
            }

            $stmt->bind_param("sisds", $orderDate, $packageID, $custID, $totalPrice, $adminID);

            if ($stmt->execute() === false) {
                die("Error executing the SQL statement: " . $stmt->error);
            }
        }

        header("Location: ViewPurchase.php");
        exit();
    } else {
        echo '<div class="empty-cart-message">';
        echo '<p>No items in cart.</p>';
        echo '<button onclick="window.location.href=\'addToCart.php\'">Back to Add to Cart</button>';
        echo '</div>';
    }
}
?>

<!-- CSS for the empty cart message -->
<style>
.empty-cart-message {
    text-align: center;
    margin-top: 50px;
}
.empty-cart-message p {
    font-size: 20px;
    color: red;
}
.empty-cart-message button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #7ab2b2;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
.empty-cart-message button:hover {
    background-color: #0056b3;
}
</style>
