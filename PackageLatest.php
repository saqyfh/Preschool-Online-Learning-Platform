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
    :root{
        --blue:#7ab2b2;
        background:#7ab2b2 ;
    }
    
    *{
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

    html{
        font-size: 62.5%;
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
        overflow-x: hidden;
    }

    header{
        position:fixed;
        top: 0; left: 0;right: 0;
        background: #fff;
        padding: 2rem 9%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 1000;
        box-shadow: 0.5rem 0.5rem rgba(14, 58, 78, 0.1) ; 
    }

    header .logo {
        font-size: 3rem;
        color: #4D869C;
        font-weight: bolder;
        margin-right: 5rem;
    }


    header .navbar a{
        font-size: 2.3rem;
        padding: 0 2rem;
        color: #4D869C;
        font-weight: bolder;
    }

    header .navbar a:hover{
        color:var(--black);
    }

    header .icons a{
        font-size: 3rem;
        color: #4D869C;
        margin-left: 3.5rem;
    }
    
    header .icons a:hover{
        color:var(--black);
    }

    header #toggler{
        display: none;
    }

    header .fa-bars{
        font-size: 3rem;
        color: #4D869C;
        border-radius: .5rem;
        padding: .5rem 1.5rem;
        cursor: pointer;
        border: .1rem solid rgba(14, 58, 78, 0.1);
        display: none;
    }

    .packages {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        padding: 3rem 5%;
        background-color: #7AB2B2;
        margin-top: 10rem;
		margin-bottom: 100px; /* Ensure it stays above the footer */

    }

    .package-card {
        background: #f0f8ff;
        border: 0.1rem solid rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
        margin: 1.5rem;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        width: 30rem;
        transition: transform 0.3s ease;
    }

    
    .package-card:hover {
        transform: translateY(-0.5rem);
    }

    .package-card img {
        max-width: 90%;
        max-height: 90;
        object-fit: cover;
        object-position: center;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .package-card h3 {
        font-size: 2rem;
        color: #4D869C;
        margin-bottom: 1rem;
    }

    .package-card span {
        font-size: 2rem;
        color: #4D869C;
        display: block;
        margin-bottom: 1.5rem;
    }

    button a {
        color: white;
    }

    .package-card button,
    .packages button {
        background: #4D869C;
        color: #fff;
        border: none;
        padding: 1rem 2rem;
        cursor: pointer;
        border-radius: 0.5rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .package-card button:hover,
    .packages button:hover {
        background: #17272d;
    }

    .buy-now {
        background: #4D869C;
        color: #fff;
        border: none;
        padding: 1.5rem 3rem;
        cursor: pointer;
        border-radius: 0.5rem;
        font-size: 2rem;
        display: block;
        margin: 1.5rem auto 0 auto;
    }

    .buy-now:hover {
        background: #17272d;
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

    .buy-now {
        background: #4D869C;
        color: #fff;
        border: none;
        padding: 1.5rem 3rem;
        cursor: pointer;
        border-radius: 0.5rem;
        font-size: 2rem;
        display: block;
        margin: 1.5rem auto 0 auto;
        text-align: center;
        position: relative;
    }

    .buy-now-container {
        text-align: center;
        margin-bottom: 10rem;
    }

    .buy-now:hover {
        background: #17272d;
    }

</style>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KiddoSmart Website</title>

<!-- font awesome cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
 <!---header section started -->
 <header>
   
    

   <a href="#" class="logo">KIDDOSMART</a>

   <nav class="navbar">
       <a href="MainPageKS.php"> HOME</a>
       <a href="about.php"> ABOUT</a>
       <a href="packageLatest.php"> PRODUCTS</a>
       <a href="loginFormLatest.php"> LOGIN</a>
   </nav>

   <div class="icons">
       <a href="addToCart.php" class="fa fa-shopping-cart"></a>
       <div class="dropdown">
           
           <a href="#" class="fas fa-user dropdown-toggle"></a>
           <?php echo $_SESSION['custID']; ?>
           <div class="dropdown-content">
               <a href="logOut.php" style="font-size: 1.4rem;">Log out</a>
               <a href="editProfile.php" style="font-size: 1.4rem;">Edit Profile</a>
               <a href="ViewPurchase.php" style="font-size: 1.4rem;">Purchase</a>

           </div>
       </div>
   </div>
</header>
<!---header section ended -->

<!-- packages section starts -->
<section class="packages" id="packages">
<?php
    include("dbconn.php");
    $sql = "SELECT * FROM package";
    $result = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "No packages available at the moment.";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='package-card'>";
            echo "<img src= '" . $row["packageImage"] . "' alt='" . $row["packageName"] . " ' style= width:230px; height:230px;' >";
            echo "<h3>" . $row["packageName"] . "</h3>";
            // echo "<p>" . $row["packageDesc"] . "</p>"; // Uncomment if you want to display package description
            echo "<span>RM" . $row["packagePrice"] . "</span>";
            echo "</div>";
            
        }
       
    } 
   
    mysqli_close($dbconn);
?>

</section>
<div class="buy-now-container">
    <button class="buy-now"><a href="addToCart.php">Buy Now</a></button>
</div>
<!-- packages section ends -->

<footer>
    <p>&copy; 2024 KiddoSmart. All rights reserved.</p>
</footer>
</body>
</html>
