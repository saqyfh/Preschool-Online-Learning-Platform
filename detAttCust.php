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
        table {
            border: 15px solid #CDE8E5;
            border-collapse: collapse;
            width: 80%;
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
            margin-right: 10px;
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
    <title>Admin Details Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
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
    <br><br><br><br><br>
</body>
</html>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include("dbconn.php");
	$cust_ID = $_REQUEST ['c_id']; 
	$sql= "SELECT * FROM CUSTOMER WHERE CUSTID= '$cust_ID' ";
	$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);
	
	if($row == 0){
		echo "No record found";
	}
	else{ 
		$r = mysqli_fetch_assoc($query);
		$c_id = $r['custID']; 
		$c_pass = $r['cust_password']; 
		$c_fn = $r['cust_firstName']; 
		$c_ln = $r['cust_lastName']; 
		$c_phone = $r['cust_phoneNum']; 
		$c_age = $r['cust_age']; 
		$c_gender = $r['cust_gender']; 
		$c_email = $r['cust_email']; 
	}
?>
	<form action= "UpDelAttCust.php" 
 method = "post">
	<table border=0>
		<div class='center-text'>CUSTOMER DETAILS INFORMATION</div>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td><input type="text" name="custID" value="<?php echo $c_id; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="text" name="cust_password" value="<?php echo $c_pass; ?>"></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>:</td>
			<td><input type="text" name="cust_firstname" value="<?php echo $c_fn; ?>"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>:</td>
			<td><input type="text" name="cust_lastname" value="<?php echo $c_ln; ?>"></td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td>:</td>
			<td><input type="text" name="cust_phonenum" value="<?php echo $c_phone; ?>"></td>
		</tr>
		<tr>
			<td>Age</td>
			<td>:</td>
			<td><input type="text" name="cust_age" value="<?php echo $c_age; ?>"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td><input type="text" name="cust_gender" value="<?php echo $c_gender; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><input type="text" name="cust_email" value="<?php echo $c_email; ?>"></td>
		</tr>
	
	</table>
	 <br>
    <div style="width: 80%; margin: 0 auto; text-align: right;">
        <button class="oval-button" type="submit" name="update">Update</button>
        <button class="oval-button" type="submit" name="delete">Delete</button>
    </div>
</form>