<?php
session_start();
include("dbconn.php");

include 'session_check.php'; // Include session check file
checkLoggedIn(); // Call session check function

if (!isset($_SESSION["custID"])) {
    header("Location: loginFormLatest.php");
    exit();
	}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, th, td {
            border: 10px solid black; 
            border-collapse: collapse; 
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
            border-color: #cde8e5;
            font-size: 2rem;
        }

        table {
            width: 90%; 
            margin-left: 5rem; /* Center table */
            margin-right: 5rem;
            background-color: #fff; 
        }

        body {
            background-color: #7AB2B2;
        }

        * {
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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
            color: #4D869;
        }

        header .icons a {
            font-size: 2.5rem;
            color: #4D869C;
            margin-left: 1.5rem;
        }

        header .icons a:hover {
            color: #4D869;
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
                border-top: .1rem solid rgba(0, 0, 0, .1);
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
                transition: clip-path 0.2s linear;
            }

            header #toggler:checked ~ .navbar {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
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

        .addPackage {
            padding-top: 14rem; /* Ensures the form is not hidden behind the fixed header */
            padding-left: 2rem; 
            padding-right: 2rem; 
        }

        .addPackage form {
            background: #7AB2B2;
            padding: 5rem;
            border-radius: 0.5rem;
            box-shadow: none;
            max-width: 100%;
            color: #fff;
        }

        .addPackage form textarea {
            width: 100%;
            height: 100%; /* Make textarea cover the cell */
            padding: 1.5rem;
            margin: 1.5rem 0;
            border-radius: none;
            border: 0.1rem solid #ccc;
            font-size: 1.8rem;
            background-color: #f0f8f8;
            color: #333;
            resize: none;
        }

        .addPackage form textarea::placeholder {
            color: #aaa;
        }

        .oval-button {
            padding: 10px 20px;
            background-color: white;
            color: #7AB2B2;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: none;
        }

        .oval-button:hover {
            background-color: #4D869C;
            color: white;
        }

        .button-container {
            width: 90%;
            justify-content: flex-end;
            text-align: right;
            margin-top: 5rem;
            margin-right: 5rem; 
            margin-left: 5rem;
        }

        section .h1 {
            font-size: 4rem;
            color: #fff;
            font-weight: bolder;
            margin-left: 10rem; /* align with the table */
        }

        section .p1 {
            font-size: 2rem;
            color: #fff;
            margin-left: 10rem; /* align with the table */
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
    
    <script>
        function handleSubmit(event) {
            event.preventDefault();
            alert("Thank you for your feedback, We will consider it :)");
            window.location.href = "customerFeedback.php" 
        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiddoSmart Website</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- header section starts -->
    <header>
      

        <a href="#" class="logo"> KIDDOSMART <span> </span></a>

        <nav class="navbar">
            <a href="mainPageKS.php">HOME</a>
            <a href="#about">ABOUT</a>
            <a href="packageLatest.php">PACKAGES</a>
            <a href="loginFormLatest.php">LOGIN</a>
        </nav>

        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <div class="dropdown">
                <a href="cart.php" class="fas fa-user dropdown-toggle"></a>
                <div class="dropdown-content">
                    <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
                    <a href="editProfile.php" style="font-size: 1.4rem;">Edit Profile</a>
                </div>
        </div>
        </div>
    </header>
    <!-- header section ends -->

    <!-- home section starts -->
    <section class="addPackage" id="addPackage">
        <h1 class="h1">Platform Feedback Form</h1>
        <p class="p1"> Please help us evaluate our event by completing this short survey.</p>
        <form name="addPackage" onsubmit="handleSubmit(event)">
            <table>
                <tr>
                    <td style="color: #4D869C;"> 1. How did you hear about this platform ? </td>
                    <td style="color: #4D869C;"> 3. What parts did you find the least useful or enjoyable ? </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="no1" rows="8" cols="90" placeholder="Enter your response here..."></textarea>
                    </td>
                    <td>
                        <textarea name="no3" rows="8" cols="90" placeholder="Enter your response here..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="color: #4D869C;"> 2. What did you find most useful or enjoyable ? </td>
                    <td colspan="2" style="color: #4D869C;"> 4. Comments and recommendations : </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="no2" rows="8" cols="90" placeholder="Enter your response here..."></textarea>
                    </td>
                    <td>
                        <textarea name="no4" rows="8" cols="90" placeholder="Enter your response here..."></textarea>
                    </td>
                </tr>
            </table>
            
            <div class="button-container">
                <button id="submit-button" class='oval-button' type="submit">Submit</button>
            </div>
        </form>
    </section>
    <!-- home section ends -->
	<footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</body>
</html>
