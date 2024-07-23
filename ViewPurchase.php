<?php
session_start();
include('dbconn.php'); // Adjust path as per your file structure

// Check if user is logged in and is a customer
if (!isset($_SESSION['custID']) || $_SESSION['user_role'] != 'customer') {
    header('Location: loginFormLatest.php');
    exit();
}

$c_id = $_SESSION['custID'];

// Retrieve package data from the database
$sql = "SELECT * FROM orderpackage";

$result = $dbconn->query($sql);

// Fetch user's orderpackage data
$sql = "SELECT * FROM orderpackage WHERE custID =?";
$stmt = $dbconn->prepare($sql);
$stmt->bind_param("s", $c_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Include your stylesheet if needed -->
    <style>
        body {
            background-color: #7ab2b2;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }

        header h1 {
            text-align: center;
            color: #4D869C;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #4D869C;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #4D869C;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border: 1px solid #4D869C;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 0;
        }

        a:hover {
            background-color: #4D869C;
            color: white;
        }

        .action-links a {
            margin-right: 10px;
        }

        .button {
            text-align: center;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }
        footer {
            text-align: center;
            padding: 1em;
            background-color: #64C5B1;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        footer {
            font-size: 15px;
            text-align: center;
            padding: 15px;
            background-color: white;
            color: #4D869C;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Your Purchase</h1>
        </header>
        <?php
        

$stmt = $dbconn->prepare($sql);
$stmt->bind_param("s", $c_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Order ID</th><th>Order Date</th><th>Total Price</th><th>Packages</th><th>Customer Username</th><th>Status</th><th>Action</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['orderID']}</td>
            <td>{$row['orderDate']}</td>
            <td>RM " . number_format($row['totalPrice'], 2) . "</td>
            <td>{$row['packageID']}</td>
            <td>{$row['custID']}</td>
            <td>{$row['statusPayment']}</td>
            <td class=\"action-links\"><a href=\"payment.php?orderID={$row['orderID']}\">Make Payment</a></td>
        </tr>";
    }
    echo '</table>';
} else {
    echo '<p>No purchase found.</p>';
}
        ?>
        
        <div class="logout">
            <a href="addToCart.php">Back</a>
        </div>
    </div>
</body>

</html>

<?php
$dbconn->close();
?>
