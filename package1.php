<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION["custID"])) {
    header("Location: loginFormLatest.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: #7AB2B2;
        }
		
		.center-text {
			color:white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif; /* Apply the League Spartan font */
            font-weight: 700; /* Make the text bold */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
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

        header .logo span {
            color: #4D869C;
        }

        header .navbar a {
            font-size: 2rem;
            padding: 0 1.5rem;
            color: #4D869C;
            font-weight: bolder;
        }

        header .navbar a:hover {
            color: #4D869C;
        }

        header .icons a {
            font-size: 2.5rem;
            color: #4D869C;
            margin-left: 1.5rem;
        }

        header .icons a:hover {
            color: #4D869C;
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

        .packages {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 0rem 5%;
            background-color: #7AB2B2;
            margin-top: 1rem;
        }

        .package-card {
            background: #f0f8ff;
            border: 0.1rem solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            margin: 1.5rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            width: 50rem;
        }

        .package-card i {
            font-size: 10rem;
            color: #4D869C;
            margin-bottom: 1.5rem;
        }

        .package-card h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .package-card p {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .package-card span {
            font-size: 2rem;
            color: #4D869C;
            display: block;
            margin-bottom: 1.5rem;
        }

        .package-card button {
            background: #4D869C;
            color: #7AB2B2;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 25px;
			font-size:16px;
        }

        .package-card button:hover {
            background: white;
			color:#4D869C
        }

        .package-image {
            position: absolute;
            width: 400px;
            height: 400px;
        }

          .package-image.left {
            left: 150px; /* Adjust this value to position the image correctly */
            top: 68%;
            transform: translateY(-50%);
        }

        .package-image.right {
            right: 150px;
            top: 68%;
            transform: translateY(-50%);
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

        /* media queries */
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
                border-top: 0.1rem solid rgba(0, 0, 0, 0.1);
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
                transition: clip-path 0.5s ease-in-out;
            }

            header #toggler:checked ~ .navbar {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            header .navbar a {
                margin: 1.5rem;
                padding: 1.5rem;
                background: #fff;
                border: 0.1rem solid rgba(0, 0, 0, 0.1);
                display: block;
            }
        }

        @media (max-width: 450px) {
            html {
                font-size: 50%;
            }
        }
		img.pic {
            width:250px;
            height:250px;
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
    <title>KiddoSmart Website</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <!-- header section starts -->
    <header>
        <a href="#" class="logo">KIDDOSMART <span></span></a>

        <nav class="navbar">
        <a href="MainPageKS.php"> HOME</a>
        <a href="aboutLatest.php"> ABOUT</a>
        <a href="packageLatest.php"> PACKAGES</a>
        <a href="loginFormLatest.php"> LOGIN</a>
    </nav>

    <div class="icons">
        <a href="addToCart.php" class="fa fa-shopping-cart"></a>
        <div class="dropdown">
            <?php echo $_SESSION['custID']; ?>
            <a href="#" class="fas fa-user dropdown-toggle"></a>
            <div class="dropdown-content">
                <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
                <a href="editProfile.php" style="font-size: 1.4rem;">Edit Profile</a>
            </div>
        </div>
    </div>
    </header>
    <!-- header section ends -->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<div class='center-text'>PACKAGE 1</div>
    <!-- packages section starts -->
    <section class="packages" id="packages">
        <div class="package-card">
            <h3>Educational Video</h3>
            <img src="3.png" alt="3" class="pic">
			<br>
			<br>
            <button><a href="Video.php">Click here</a></button>
        </div>
        <div class="package-image left">
            <img src="member4.png" alt="member3">
        </div>
        <div class="package-image right">
            <img src="member5.png" alt="member1">
        </div>
    </section>
    <!-- packages section ends -->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    
</body>
<!-- footer section starts -->
<footer>
    &copy; 2023 Kiddosmart. All rights reserved.
</footer>
    <!-- footer section ends -->
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
</html>