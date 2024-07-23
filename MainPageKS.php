<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> KIddoSmart </title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <style>
        :root{
            --blue:#7ab2b2;
            background:#7ab2b2 ;
            background-image: url(background.png);
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
            box-shadow: 0.5rem 0.5rem rgba(14, 58, 78, 0.1); 
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
            margin-top: 10rem;
            margin-bottom: 100px; /* Ensure it stays above the footer */
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

        /* Centering text inside homepage */
		.homepage {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 30%;
    transform: translate(-50%, -50%);
    width: 80%; /* Adjust width as needed */
	font-size : 15px;
	
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
        
    </style>

    <body>

        <!---header section started -->
        <header>
            
            <!-- toggler part-->
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>

            <a href="#" class="logo">KIDDOSMART</a>

            <nav class="navbar">
                <a href="MainPageKS.php"> HOME</a>
                <a href="about.php"> ABOUT</a>
                <a href="packageLatest.php"> PRODUCTS</a>
                <a href="loginFormLatest.php"> LOGIN</a>
            </nav>

            <div class="icons">
                <a href="cart.php" class="fa fa-shopping-cart"></a>
                <a href="" class="fa fa-user"></a>
            </div>
        </header>
        <!---header section ended -->

        <!--  HOME SECTION START-->

        <section class="home" id="home">

            <div class="homepage" >
                <h1>MALAYSIA #1<br>TODDLER ONLINE<br> EDUCATION PLATFORM</h1><br>
                <br><h2>YOUR LITTLE FUTURE SPARKS HERE</h2>
                <br> <br><br><a href="loginFormLatest.php" class="startbtn"> START NOW</a> <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h3>LITTLE LEARNERS BIG DREAMS</h3> 
            </div>

        </section>

        <!--  HOME SECTION END-->        
    </body>
</html>