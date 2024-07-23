<?php
session_start();
include("dbconn.php"); // Include your database connection 

// Check if the customer is logged in 
if (!isset($_SESSION['custID']) || !isset($_SESSION['user_role'])) {
    header("Location: editProfile.php");
    exit();
}

// Retrieve the customer ID from the session 
$c_id = $_SESSION['custID']; 

// Fetch user's orderpackage details
$sql = "SELECT * FROM orderpackage WHERE custID = ? AND statusPayment != 'completed'";
$stmt = $dbconn->prepare($sql);
$stmt->bind_param("s", $c_id);
$stmt->execute();
$order_result = $stmt->get_result();

$orderpackage = $order_result->fetch_assoc(); // Fetch the first result as an associative array
$stmt->close();

// Handle receipt upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['orderpackage'])) {
    $orderpackageFile = $_FILES['orderpackage'];
    
    // Validate the uploaded file
    $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
    if (!in_array($orderpackageFile['type'], $allowed_types)) {
        echo "Invalid file type.";
        exit();   
    } 

    $target_dir = "image/";
    $target_file = $target_dir . basename($orderpackageFile["name"]);
    if (move_uploaded_file($orderpackageFile["tmp_name"], $target_file)) {
        // Update receipt information into the database
        $sql = "UPDATE orderpackage SET paymentImage = ?, statusPayment = 'completed' WHERE orderID = ?";
        $stmt = $dbconn->prepare($sql);
        $stmt->bind_param("si", $target_file, $orderpackage['orderID']);

        if ($stmt->execute()) {
            echo '<script>
                    alert("Thank you for purchasing!");
                    window.location.href = "invoice.php?orderID=' .$_GET['orderID'] . '";
                  </script>'; // Redirect to invoice page
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
    exit(); // Exit to prevent further output
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap');

        body {
            background-color: #7AB2B2;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .center-text {
            color: white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif;
            font-weight: 700;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .row {
            display: flex;
            justify-content: center;
            margin: 0 auto;
        }

        .column {
            flex: 50%;
            padding: 5px;
        }

        table {
            border: 15px solid #CDE8E5;
            border-collapse: collapse;
            width: 30%;
            font-size: 15px;
            margin: auto;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #EEF7FF;
        }

        tr:nth-child(odd) {
            background-color: white;
        }

        tr:hover {
            background-color: #CDE8E5;
        }

        .oval-button {
            padding: 10px 20px;
            background-color: white;
            color: #7AB2B2;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 25px;
        }

        .oval-button:hover {
            background-color: #4D869C;
            color: white;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            transition: .2s linear;
        }

        html {
            font-size: 62.5%;
            scroll-behavior: smooth;
            scroll-padding-top: 6rem;
            overflow-x: hidden;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #fff;
            padding: 2rem 9%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        header .logo {
            font-size: 3rem;
            color: #4D869C;
            font-weight: bolder;
        }

        header .navbar a {
            font-size: 2rem;
            padding: 0 1.5rem;
            color: #4D869C;
            font-weight: bolder;
        }

        header .icons a {
            font-size: 2.5rem;
            color: #4D869C;
            margin-left: 1.5rem;
        }

        header #toggler {
            display: none;
        }

        header .fa-bars {
            font-size: 3rem;
            border-radius: .5rem;
            padding: .5rem 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 991px) {
            html {
                font-size: 55%;
            }

            header {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            header .fa-bars {
                display: block;
            }

            header .navbar {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #eee;
                border-top: .1rem solid rgba(0, 0, 0, .1);
                clip-path: polygon(0 0, 100% 0, 0 0);
            }

            header #toggler:checked ~ .navbar {
                clip-path: polygon(0 0, 100% 0, 0 0);
            }

            header .navbar a {
                margin: 1.5rem;
                padding: 1.5rem;
                background: #fff;
                border: .1rem solid rgba(0, 0, 0, .1);
                display: block;
            }
        }

        @media (max-width: 450px) {
            html {
                font-size: 50%;
            }
        }
        
        table.center {
            margin-left: auto;
            margin-right: auto;
        }

        .button-container {
            text-align: right;
            margin-top: 10px;
            width: 95%;
        }
        
        footer {
            font-size: 15px;
            text-align: center;
            padding: 15px;
            background-color: white;
            color: #4D869C;
        }
        
        .table-container {
            display: flex;
            justify-content: center;
            margin: 0 auto;
        }

        .table-container > div {
            margin: 1 10px; /* Adjust spacing between tables */
            text-align: center; /* Center align contents */
        }

        .total-price-table {
            width: 350px; /* Adjust the width as needed */
        }

        .button-container {
            margin-top: 10px;
        }

        .upload-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin: 0 auto;
            text-align: center;
        }

        .upload-container h2 {
            font-family: 'League Spartan', sans-serif;
            font-weight: 700;
            color: #4D869C;
            margin-bottom: 20px;
        }

        .upload-container input[type="file"] {
            display: block;
            margin: 0 auto 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .upload-container button {
            padding: 10px 20px;
            background-color: #4D869C;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 25px;
        }

        .upload-container button:hover {
            background-color: #7AB2B2;
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
        .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
			
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-toggle {
        cursor: pointer;
    }
	
	
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector("form[name='submit']").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText.trim() === "success") {
                        alert("Thank you for purchasing!");
                        window.location.href = "invoice.php" // Redirect to ViewPackage.php
                    } else {
                        alert("There was an error: " + xhr.responseText);
                    }
                }
            };
            xhr.send(formData);
        });
    });
</script> -->
</head>
<body>
    <!---header section started -->
<header>
   <a href="#" class="logo">KIDDOSMART</a>

   <nav class="navbar">
       <a href="MainPageKS.php"> HOME</a>
       <a href="about.php"> ABOUT</a>
       <a href="packageLatest.php"> PRODUCTS</a>
       <a href="loginFormLatest.php"> LOGIN</a>
   </nav>

   <div class="icons">
       <a href="addToCart.php" class="fa fa-shopping-cart"></a>
       <div class="dropdown">
           
           <a href="#" class="fas fa-user dropdown-toggle"></a>
           <?php echo $_SESSION['custID']; ?>
           <div class="dropdown-content">
               <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
               <a href="editProfile.php" style="font-size: 1.4rem;">Edit Profile</a>
               <a href="ViewPurchase.php" style="font-size: 1.4rem;">Purchase</a>

           </div>
       </div>
   </div>
</header>
<!---header section ended -->

    <br><br><br><br><br><br><br><br><br>
    
    <form name="submit" method="POST" enctype="multipart/form-data">
        <div class="center-text">PAYMENT FORM</div>
        <div class="table-container">
            <div>
                <table>
                    <tr>
                        <td><img src="qr.jpg" style="width:300px; height:300px;" class="center"></td>
                    </tr>
                    <tr>
                        <td>Please scan the QR code to proceed with the payment.</td>
                    </tr>
                </table>
            </div>
            <div>
                <div class="upload-container">
                    <h2>Upload Payment Receipt</h2>
                    <input type="file" name="orderpackage" required>
                    <button type="submit">Upload</button>
                </div>
            </div>
        </div>
        <br>
        
    </form>
</body>
<script>
        // JavaScript to handle the dropdown toggle
        document.addEventListener('DOMContentLoaded', function () {
            const userIcon = document.querySelector('.dropdown-toggle');
            const dropdownContent = document.querySelector('.dropdown-content');

            userIcon.addEventListener('click', function (event) {
                event.preventDefault();
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });

            // Close the dropdown if the user clicks outside of it
            window.addEventListener('click', function (event) {
                if (!event.target.matches('.dropdown-toggle')) {
                    if (dropdownContent.style.display === 'block') {
                        dropdownContent.style.display = 'none';
                    }
                }
            });
        });
    </script>
<footer>
        &copy; 2023 Kiddosmart. All rights reserved.
</footer>
</html>