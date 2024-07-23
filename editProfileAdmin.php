<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION["adminID"])) {
    header("Location: login.php");
    exit();
}

$a_id = $_SESSION['adminID'];

// Fetch the admin details 
$admin_sql = "SELECT * FROM admin WHERE adminID = '$a_id'";
$admin_result = $dbconn->query($admin_sql);

if ($admin_result->num_rows == 1) {
    $admin = $admin_result->fetch_assoc();
} else {
    echo '<p> admin not found. </p>';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
		header .navbar a{
			font-size: 2.3rem;
			padding: 0 2rem;
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
    <div class="container">
        <h2>USER PROFILE</h2>
        
        <form action="editProfileAdminUpdate.php" method="POST">
            <div class="form-group-row">
                <div class="form-group form-group-half">
                    <label for="custID">Username</label>
                    <input type="text" id="adminID" name="adminID" value="<?php echo htmlspecialchars($admin['adminID']); ?>" readonly>
                </div>
                <div class="form-group form-group-half">
                    <label for="cust_password">Password</label>
                    <input type="text" id="admin_password" name="admin_password" value="<?php echo htmlspecialchars($admin['admin_password']); ?>">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group form-group-half">
                    <label for="cust_firstName">First Name</label>
                    <input type="text" id="admin_firstName" name="admin_firstName" value="<?php echo htmlspecialchars($admin['admin_firstName']); ?>">
                </div>
                <div class="form-group form-group-half">
                    <label for="cust_lastName">Last Name</label>
                    <input type="text" id="admin_lastName" name="admin_lastName" value="<?php echo htmlspecialchars($admin['admin_lastName']); ?>">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group form-group-half">
                    <label for="cust_phoneNum">Phone Number</label>
                    <input type="text" id="admin_phoneNum" name="admin_phoneNum" value="<?php echo htmlspecialchars($admin['admin_phoneNum']); ?>">
                </div>
                <div class="form-group form-group-half">
                    <label for="cust_age">Age</label>
                    <input type="text" id="admin_age" name="admin_age" value="<?php echo htmlspecialchars($admin['admin_age']); ?>">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group form-group-half">
                    <label for="cust_gender">Gender</label>
                    <input type="text" id="admin_gender" name="admin_gender" value="<?php echo htmlspecialchars($admin['admin_gender']); ?>">
                </div>
                <div class="form-group form-group-half">
                    <label for="cust_email">Email</label>
                    <input type="email" id="admin_email" name="admin_email" value="<?php echo htmlspecialchars($admin['admin_email']); ?>">
                </div>
            </div>
            <div class="form-group form-group-full">
                <input type="submit" name="Update" value="Update Profile">
            </div>
        </form>
    </div>
    <footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</body>
</html>
