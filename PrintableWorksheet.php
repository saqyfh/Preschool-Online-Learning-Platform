<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: #7AB2B2;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
		
		.center-text {
            color: white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 0px;
            font-family: 'League Spartan', sans-serif;
            font-weight: 700;
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

        header .logo span {
            color: #4D869C;
        }

        header .navbar a {
            font-size: 2rem;
            padding: 0 1.5rem;
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

        .packages {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 1.5rem 9%;
            background-color: #7AB2B2;
            margin-top: 4rem;
        }

        .package-card {
            background: #f0f8ff;
            border: 0.1rem solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            margin: 1.5rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            width: 30rem;
        }

        .package-card i {
            font-size: 10rem;
            color: #4D869C;
            margin-bottom: 1.5rem;
        }

        .package-card h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .package-card p {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .package-card span {
            font-size: 2rem;
            color: #4D869C;
            display: block;
            margin-bottom: 1.5rem;
        }

        .package-card button {
            background: #4D869C;
            color: #fff;
            border: none;
            padding: 1rem 2rem;
            cursor: pointer;
            border-radius: 0.5rem;
        }

        .package-card button:hover {
            background: #3b6d7f;
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
			width:250px;
			height:250px;
		}
		
		a{
			color: #fff;
		}
		
		
		
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiddoSmart Website</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body> 

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<div class="center-text">PRINTABLE WORKSHEETS</div> 
	
	
    <!-- header section starts -->
    <header>
        

        <a href="#" class="logo">KIDDOSMART <span></span></a>

        <nav class="navbar">
                <a href="MainPageKS.php"> HOME</a>
                <a href="about.php"> ABOUT</a>
                <a href="packageLatest.php"> PACKAGES</a>
                <a href="loginFormLatest.php"> LOGIN</a>
        </nav>

        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
        </div>
    </header>
    <!-- header section ends -->
   
    <!-- packages section starts -->
    <section class="packages" id="packages">
		
        <div class="package-card">
            <h3>ANIMALS</h3>
            <img src="Animal.png" alt="Animals">
            <p>Click button below to print</p>
			<button> <a href="WorksheetAnimals.pdf" target="_blank" >Print</a></button>
        </div>
        <div class="package-card">
            <h3>ALPHABET</h3>
            <img src="Alphabet.png" alt="Alphabet"> 
            <p>Click button below to print</p>
			<button> <a href="WorksheetAlphabet.pdf" target="_blank" >Print</a></button>
        </div>
        <div class="package-card">
            <h3>NUMBER</h3>
            <img src="Number.png" alt="Number"> 
            <p>Click button below to print</p>
			<button> <a href="WorksheetNumber.pdf" target="_blank" >Print</a></button>
        </div>
        <div class="package-card">
            <h3>MATHS</h3>
            <img src="Maths.png" alt="Maths"> 
            <p>Click button below to print</p>
		    <button> <a href="WorksheetMaths.pdf" target="_blank" >Print</a></button>
        </div>
        <div class="package-card">
            <h3>THINGS</h3>
            <img src="Things.png" alt="Things"> 
            <p>Click button below to print</p>
			<button> <a href="WorksheetThings.pdf" target="_blank">Print</a></button>
			
        </div>
        
    </section>
    <!-- packages section ends -->
    <br> <br> <br> <br> <br> <br> <br> <br>
	<footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</body>
</html>
