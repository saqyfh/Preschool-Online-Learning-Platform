<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION["adminID"])) {
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'League-Spartan', sans-serif;
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

        header .navbar a{
        font-size: 2.3rem;
        padding: 0 2rem;
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

        .packages-management {
            padding: 5rem 9%;
            margin-top: 10rem;
            text-align: center;
        }

        .packages-management h2 {
            font-size: 3rem;
            color: #fff;
            margin-bottom: 3rem;
        }

        .package-management-card {
            background: #fff;
            border: 0.1rem solid rgba(255, 255, 255, 0.7);
            border-radius: 0.5rem;
            margin: 1.5rem;
            padding: 2rem;
            text-align: center;
            width: 30rem;
            color: #4D869C;
            display: inline-block;
        }

        .package-management-card i {
            font-size: 10rem;
            margin-bottom: 1.5rem;
        }

        .package-label {
            font-size: 1.5rem;
            color: #4D869C;
            margin-top: 1rem;
            display: block;
        }

        .buttons-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .add-package-btn, .edit-package-btn {
            background: #fff;
            color: #7AB2B2;
            border: none;
            padding: 1rem 2rem;
            cursor: pointer;
            border-radius: 0.5rem;
            margin-left: 1rem;
        }

        .add-package-btn:hover, .edit-package-btn:hover {
            background: #eaeaea;
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
                background: black;
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

        img {
            width: 250px;
            height: 250px;
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

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <!-- header section starts -->
    <header>
        <input type="checkbox" id="toggler">
        

        <a href="#" class="logo">KIDDOSMART <span></span></a>

        <nav class="navbar">
            <a href="mainPageKs.php">HOME</a>
            <a href="ViewCustDetailsInfo.php">DETAILS</a>
            <a href="packageManagementLatest.php">PACKAGES</a>
        </nav>

        <div class="icons">
           
            <div class="dropdown">
                <a href="#" class="fas fa-user dropdown-toggle"></a>
                <div class="dropdown-content">
                    <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
                    <a href="editProfileAdmin.php" style="font-size: 1.4rem;">Edit Profile</a>
                </div>
        </div>
        </div>
    </header>
    <!-- header section ends -->

    <!-- packages management section starts -->
    <section class="packages-management">
        <h2>PACKAGES MANAGEMENT</h2>
        <div class="package-management-card">
            <img src="3.png" alt="Videos">
            <span class="package-label">Videos</span>
        </div>
        <div class="package-management-card">
            <img src="1.png" alt="Games">
            <span class="package-label">Games</span>
        </div>
        <div class="package-management-card">
            <img src="2.png" alt="Worksheets">
            <span class="package-label">Worksheets</span>
        </div>
        <div class="buttons-container">
		
			<form action="AddPackageLatest.php" method="POST">
				<button class="add-package-btn">+ Add Package</button>
			</form>
			<form action="ViewPackageDetails.php" method="POST">
				<button class="edit-package-btn">Edit Package</button>
			</form>
			<form action="dashboard.php" method="POST">
				<button class='edit-package-btn'>Back</button>
			</form>
			
        </div>
    </section>
    <!-- packages management section ends -->
</body>

<footer>
    &copy; 2023 Kiddosmart. All rights reserved.
</footer>

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
