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
		table{
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
$admin_ID = $_REQUEST['a_id']; 
$sql = "SELECT * FROM ADMIN WHERE ADMINID = '$admin_ID'";
$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn)); // Added $dbconn

$row = mysqli_num_rows($query);

if ($row == 0) {
    echo "No record found";
} else {
    $r = mysqli_fetch_assoc($query);
    $a_id = $r['adminID']; // Corrected to match potential database column name
    $a_pass = $r['admin_password'];
    $a_fn = $r['admin_firstName'];
    $a_ln = $r['admin_lastName'];
    $a_phone = $r['admin_phoneNum'];
    $a_age = $r['admin_age'];
    $a_gender = $r['admin_gender'];
    $a_email = $r['admin_email'];
}
?>
<form action="UpDelAttAdmin.php" method="post">
    <table border=0>
        <div class='center-text'>ADMIN DETAILS INFORMATION</div>
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input type="text" name="adminID" value="<?php echo $a_id; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="admin_password" value="<?php echo $a_pass; ?>"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td>:</td>
            <td><input type="text" name="admin_firstname" value="<?php echo $a_fn; ?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>:</td>
            <td><input type="text" name="admin_lastname" value="<?php echo $a_ln; ?>"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>:</td>
            <td><input type="text" name="admin_phonenum" value="<?php echo $a_phone; ?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td>:</td>
            <td><input type="text" name="admin_age" value="<?php echo $a_age; ?>"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td><input type="text" name="admin_gender" value="<?php echo $a_gender; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="admin_email" value="<?php echo $a_email; ?>"></td>
        </tr>
    </table>
    <br>
    <div style="width: 80%; margin: 0 auto; text-align: right;">
        <button class="oval-button" type="submit" name="update">Update</button>
    </div>
</form>
