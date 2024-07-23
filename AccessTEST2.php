<?php
session_start();  

error_reporting(E_ALL);
ini_set('display_errors', 1);
include("dbconn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get packageID from the form
    $packageID = $_POST['packageID'];

    // Set the appropriate redirect location based on packageID
    switch ($packageID) {
        case 101:
            header("Location: package1.php");
            break;
        case 102:
            header("Location: package2.php");
            break;
        case 103:
            header("Location: package3.php");
            break;
		case 104:
            header("Location: package4.php");
            break;
		case 105:
            header("Location: package5.php");
            break;
		case 106:
            header("Location: package6.php");
            break;
		case 107:
            header("Location: package7.php");
            break;
        default:
            header("Location: error.php");
            break;
    }
    
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<script>
		function validatePackageID() {
			var packageID = document.getElementById("packageID").value;
			var validPackageIDs = [101, 102, 103, 104, 105, 106, 107]; // Define valid package IDs here

			if (!validPackageIDs.includes(parseInt(packageID))) {
				alert("Please insert another package ID.");
				return false; // Prevent form submission
			}

			return true; // Allow form submission
		}
	</script>
    <style>
      
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap');
        body {
            background-color: #7AB2B2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
        }

        .container h2 {
            margin-bottom: 50px;
            color: #4D869C;
            text-align: center;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
            color: #4D869C;
            flex: 1;
            padding-right: 10px;
            font-size: 16px;
        }

        .form-group input, .form-group select {
            flex: 2;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input[type="submit"] {
            background-color: #4D869C;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #CDE8E5;
        }

        .form-group-half {
            width: 48%;
			
        }

        .form-group-full {
            width: 100%;
        }

        .form-group-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
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
    <header>
        <a href="#" class="logo"> KIDDOSMART </a>
        <nav class="navbar">
                <a href="MainPageKS.php"> HOME</a>
                <a href="about.php"> ABOUT</a>
                <a href="packageLatest.php"> PACKAGES</a>
                <a href="loginFormLatest.php"> LOGIN</a>
        </nav>
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
        </div>
    </header>
    <div class="container">
        <h2>Please Insert Your Package ID</h2>
        
        <form action="#" method="POST" onsubmit="return validatePackageID()">
            <div class="form-group-row">
               
                <div class="form-group form-group-half">
                    <label for="cust_password">Package ID: </label>
                    <input type="text" id="packageID" name="packageID" >
                </div>
            </div>
               
            <div class="form-group form-group-full">
                <input type="submit" name="Update" value="Enter">
            </div>
        </form>
    </div>
    <footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</body>
</html>
