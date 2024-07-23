

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
                font-weight: bolder;
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
    <title>KiddoSmart Website</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

    <!-- header section starts -->
    <header>
        
 

        <a href="#" class="logo"> KIDDOSMART <span> </span></a>

        <nav class="navbar">
            <a href="mainPageKS.php">HOME</a>
            <a href="ViewCustDetailsInfo.php">DETAILS</a>
            <a href="ViewPackageDetails.php">PRODUCT</a>	
        </nav>

        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <div class="dropdown">
                <a href="#" class="fas fa-user dropdown-toggle"></a>
                <div class="dropdown-content">
                    <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
                    <a href="editProfileAdmin.php" style="font-size: 1.4rem;">Edit Profile</a>
            </div>
        </div>
        </div>
    </header>
    <br><br><br><br><br>

    <!-- header section ends -->

        <!-- Form --> 
         
        <?php
include("dbconn.php");

//$package = array(); // Initialize as an empty array

$packageID = $_GET['p_id'];

$sqlSel = "SELECT * FROM package WHERE packageID = '$packageID'";
$querySel = mysqli_query($dbconn, $sqlSel) or die ("Error: ". mysqli_error($dbconn));
$package = mysqli_fetch_assoc($querySel);

// Now you can use the $product array to populate the form fields

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $packageID = $_POST['packageID'];
        $packageName = $_POST['packageName'];
        $packagePrice = $_POST['packagePrice'];

        $sqlSel = "SELECT * FROM package WHERE packageID='$packageID'";
        $querySel = mysqli_query($dbconn, $sqlSel) or die ("Error: " . mysqli_error($dbconn));
        $rowSel = mysqli_num_rows ($querySel);
        if ($rowSel == 0) {
            echo "Record existed";
        }
        else {
            //execute sql update command
            if(isset($_FILES["packageImage"]) && $_FILES["packageImage"]["error"] == 0){
                $targetDir = "image/";
                $packageImage = basename($_FILES["packageImage"]["name"]);
                $targetFile = $targetDir . $packageImage;
    
                if (move_uploaded_file($_FILES["packageImage"]["tmp_name"], $targetFile)) {
                    $sqlSel = "SELECT * FROM package WHERE packageID = '$packageID'";
                    $querySel = mysqli_query($dbconn, $sqlSel) or die ("Error: " . mysqli_error($dbconn));
                    $rowSel = mysqli_num_rows($querySel);
    
                    if ($rowSel == 0) {
                        echo "Record does not exist.";
                    } else {
                        $sqlUpdate = "UPDATE package SET packageName='$packageName', packagePrice='$packagePrice', packageImage='$targetFile' WHERE packageID='$packageID'";
                        mysqli_query($dbconn, $sqlUpdate) or die ("Error: " . mysqli_error($dbconn));
                        echo "<center>Data has been updated</center><br>";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            //$sqlUpdate = "UPDATE product SET productName='". $productName . "', productPrice ='" . $productPrice . "' WHERE productID='".$productID."' "
        }
        // Handle file upload
        
    } elseif (isset($_POST['delete'])) {
        $packageID = $_POST['packageID'];
        $sqlDelete = "DELETE FROM package WHERE packageID = '" . $packageID . "'";
        mysqli_query($dbconn, $sqlDelete) or die ("Error: " . mysqli_error($dbconn));
        echo "<center>Data has been deleted </center><br>";
    }
//}

// Fetch product details if a productID is provided
//if (isset($_GET['productID'])) {
    //$productID = $_GET['productID'];
   // $sqlSel = "SELECT * FROM product WHERE productID = '$productID'";
   // $querySel = mysqli_query($dbconn, $sqlSel) or die ("Error: " . mysqli_error($dbconn));
   // $package = mysqli_fetch_assoc($querySel);
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
</head>
<body>
    
    <br><br><br><br><br>
    <form action="UpDelAttPackage.php" method="post" enctype="multipart/form-data">
    <table border=0>
        <div class='center-text'>PRODUCT INFORMATION</div>
        <tr>
            <td>Product ID</td>
            <td>:</td>
            <td><input type="text" name="packageID" value="<?php echo $package['packageID'];?>"></td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td>:</td>
            <td><input type="text" name="packageName" value="<?php echo $package['packageName'];?>"></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td>:</td>
            <td><input type="text" name="packagePrice" value="<?php echo $package['packagePrice'];?>"></td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td>:</td>
            <td>
                <?php if (!empty($package['packageImage'])):?>
                    <!--<img src="<?php echo htmlspecialchars($package['packageImage']);?>" ><br>-->
                <?php else:?>
                    <p>No image uploaded.</p>
                <?php endif;?>
                <input type="file" name="packageImage">
            </td>
        </tr>
    </table>
    <br>
    <div style="width: 80%; margin: 0 auto; text-align: right;">
        <button class="oval-button" type="submit" name="update">Update</button>
        <button class="oval-button" type="submit" name="delete">Delete</button>
    </div>
</form>

</body>
<footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</html>
