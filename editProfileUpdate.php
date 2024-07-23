<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION["custID"])) {
    header("Location: loginFormLatest.php");
    exit();
}
?>


<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap');
        
        body {
            background-color: #7AB2B2;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
		center{
			color:white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif; /* Apply the League Spartan font */
            font-weight: 700; /* Make the text bold */
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
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiddoSmart Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
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

if(isset($_POST['Update'])){
	
	$custID = $_POST['custID'];
	$cust_password = $_POST['cust_password'];
    $cust_firstName = $_POST['cust_firstName'];
    $cust_lastName = $_POST['cust_lastName'];
    $cust_phoneNum = $_POST['cust_phoneNum'];
    $cust_age = $_POST['cust_age'];
    $cust_gender = $_POST['cust_gender'];
    $cust_email = $_POST['cust_email'];

	
	
	$sqlSelCust = "SELECT * FROM customer WHERE custID= '$custID' "; 
	$querySel = mysqli_query($dbconn, $sqlSelCust) or die ("Error: " . mysqli_error($dbconn));
	$rowSel = mysqli_num_rows($querySel);
	
	if($rowSel == 0){
	echo "<script>alert('Record does not exist.');</script>";
	}
	else{
		$sqlUpdate = "UPDATE customer SET cust_password = '" . $cust_password. "', cust_firstName= '" . $cust_firstName. "' , cust_lastName= '" . $cust_lastName. "' , cust_phoneNum= '" .$cust_phoneNum. "' , cust_age= '" .$cust_age. "' , cust_gender= '" .$cust_gender. "' , cust_email= '" .$cust_email. "' where custID = '" . $custID . "' ";
		echo"<br>";
		mysqli_query($dbconn, $sqlUpdate) or die ("Error: " . mysqli_error($dbconn));

		 echo "<script>alert('Profile updated successfully.'); 
				window.location.href='editProfile.php'; 
			   </script>";
	}
	
	
}

echo "<br>";
        echo "<div style='width: 80%; margin: 0 auto; text-align: center;'>";
echo"<button class='oval-button' onclick=\"window.location.href='PakageManagement.php'\">Main page<button>";
echo "</div>";
?>

