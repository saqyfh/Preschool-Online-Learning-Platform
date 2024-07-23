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
        table, th, td {
            border: 0px solid black; 
            border-collapse: collapse; 
            text-align: auto;
            vertical-align: center;
            margin-left: auto;
            margin-right: auto;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
        }
        
        table.center {
            width: auto;
            margin-left: auto;
            margin-right: auto;
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
        
        header .navbar a {
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
            padding-top: 10rem; /* Ensures the form is not hidden behind the fixed header */
        }

        .addPackage form {
            background: #7AB2B2;
            padding: 5rem;
            border-radius: 0.5rem;
            box-shadow: none;
            max-width: 40rem;
            margin: auto; 
            color: #fff;
        }

        .addPackage form input[type="text"]
        {
            width: 100%;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: none;
            border: 0.1rem solid #ccc;
            font-size: 2rem;
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
        
        .button-container {
            width: 100%;
            text-align: center; /* Centering the button */
            margin-top: 2rem;
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
    
    <!-- home section starts -->
    <section class="addPackage" id="addPackage">
        <form action="addPackageProcess.php" method="POST" enctype="multipart/form-data" onsubmit="showPopup()">
            <table class="center">
                <tr>
                    <td colspan="2">
                        <h1 align="center"> Add Package </h1><br><br>
                    </td>
                </tr>
                <tr>
                    <td> <br><h2>Package Name</h2></td>
                </tr>
                <tr>
                    <td><input type="text" name="packageName"><br></td>
                </tr>
                <tr>
                    <td><br> <h2>Package Price </h2></td>
                </tr>
                <tr>
                    <td><input type="text" name="packagePrice"><br></td>
                </tr>
                <tr>
                    <td><br> <h2>Package Image </h2></td>
                </tr>
                <tr>
                    <td><input type="file" name="packageImage" id="packageImage" accept="image/*" required><br></td>
                </tr>            
            </table> 
            
            <div class="button-container">
                <button class='oval-button' type="submit" name="submit">Add</button>
            </div>
        </form>
    </section>
    <!-- home section ends -->
    
    <!-- header section starts -->
    <header>
       
       <a href="#" class="logo"> KIDDOSMART </a>
       <nav class="navbar">
            <a href="mainPageKS.php">HOME</a>
            <a href="#">DETAILS</a>
            <a href="packageLatest.php">PRODUCTS</a>
            <a href="loginFormLatest.php">LOGIN</a>
        </nav>
        <div class="icons">
           <div class="dropdown">
               <a href="#" class="fas fa-user dropdown-toggle"></a>
               <?php echo $_SESSION['adminID']; ?>
               <div class="dropdown-content">
                   <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
                   <a href="editProfileAdmin.php" style="font-size: 1.4rem;">Edit Profile</a>
               </div>
       </div>
   </header>
    <!-- header section ends -->
    
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

        // JavaScript to show the popup message on form submission
        function showPopup() {
            alert("The new data is added");
        }
    </script>
</body>
</html>
