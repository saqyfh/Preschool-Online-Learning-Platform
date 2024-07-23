<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap');

        body {
            background-color: #7AB2B2;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .center-text {
			color:white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif; /* Apply the League Spartan font */
            font-weight: 700; /* Make the text bold */
        }
        table.center {
            border: 15px solid #CDE8E5;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
			font-size: 15px;
        }
        th, td {
            padding: 8px;
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
			color:white
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        header .navbar a {
            font-size: 2rem;
            padding: 0 1.5rem;
            color: #4D869C;
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
		body{
			text-align: center;
			}
			
			
		img {
			display: block;
			margin-left: auto; 
			margin-right: auto;
			width:700px; 
			height:300px;
			}
			
		table, th, td {
			border: 0px solid black; 
			border-collapse: collapse; 
			text-align: auto;
			vertical-align: center;
			margin-left: auto;
			margin-right: auto;
			
		}
		
		.right{
			text-align: right;
			vertical-align: center;
			}
			
		
		.center{
			margin-left: auto; 
			margin-right: auto; 
			}	
		footer {
		font-size: 15px;
		text-align: center;
		padding: 15px;
		background-color: white;
		color: #4D869C;
		}
    </style>
    <meta charset="UTF-8">
    <title>Registration Form</title>
	<style>
	table.center{
	margin-left: auto;
	margin-right:auto;
	}
	</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <header>
        <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo"> KIDDOSMART </a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">details</a>
            <a href="#package">package</a>
            <a href="#login">login</a>
        </nav>
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
        </div>
    </header>
    <br>
    <br>
    <form name="register" method="POST" action="">
        <div class='center-text'>REGISTRATION FORM</div>
        <table class="center">
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
            </tr>
            <tr>
                <td><input type="text" name="cust_firstName" required></td>
                <td><input type="text" name="cust_lastName" required></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td>Phone Number</td>
            </tr>
            <tr>
                <td><input type="email" name="cust_email" required></td>
                <td><input type="text" name="cust_phoneNum" required></td>
            </tr>
            <tr>
                <td>Create Username</td>
                <td>Gender</td>
            </tr>
            <tr>
                <td><input type="text" name="custID" required></td>
                <td>
                    <input type="radio" name="cust_gender" value="Boy" required> Boy
                    <input type="radio" name="cust_gender" value="Girl" required> Girl
                </td>
            </tr>
            <tr>
                <td>Create Password</td>
                <td>Child Age</td>
            </tr>
            <tr>
                <td><input type="password" name="cust_pass" minlength="8" required></td>
                <td>
                    <select name="cust_age" required>
                        <option value="4 Years Old">4 Years Old</option>
                        <option value="5 Years Old">5 Years Old</option>
                        <option value="6 Years Old">6 Years Old</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">Confirm Password</td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" name="confirm_pass" minlength="8" required></td>
            </tr>
        </table>
        <br>
        <div style="width: 50%; margin: 0 auto; text-align: right;">
            <button class="oval-button" type="submit" name="register">Register</button>
        </div>
        <br>
        <br>
        <footer>
            &copy; 2024 KiddoSmart-Online Learning Platform
        </footer>
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "kiddosmart4";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	
    $a_fn = $_POST['admin_firstName'];
    $a_ln = $_POST['admin_lastName'];
    $a_email = $_POST['admin_email'];
    $a_phone = $_POST['admin_phoneNum'];
    $a_id = $_POST['adminID'];
    $a_pass = password_hash($_POST['admin_pass'], PASSWORD_DEFAULT);
    $a_gender = $_POST['admin_gender'];
    $a_age = $_POST['admin_age'];

    $stmt = $conn->prepare("INSERT INTO admin (admin_firstname, admin_lastname, admin_email, admin_phone, adminID, admin_password, admin_gender, admin_age) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $a_fn, $a_ln, $a_email, $a_phone, $a_id, $a_pass, $a_gender, $a_age);

    if ($stmt->execute()) {
        header("Location: viewAdminDetailsInfo.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>