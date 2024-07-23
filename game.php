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
		
		.game {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 1rem 9%;
            background-color: #7AB2B2;
            margin-top: 0rem;
        }

        .package-card {
            background: #f0f8ff;
            border: 0.1rem solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            margin: 1.5rem;
            padding: 5rem;
            text-align: center;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            width: 30rem;
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
            background: #7AB2B2;
            color: white;
            border: none;
            padding: 1rem 2rem;
            cursor: pointer;
            border-radius: 2.5rem;
        }



        .package-card button:hover {
            background: black ;
			font-color:#4D869C;
        }
		
		a{
			color: #fff;
		}
		
		a:hover{
		color:#4D869C;
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
		img {
		  width:200px;
		  height:170px;
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
		
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Videos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <header>
       
        <a href="#" class="logo"> KIDDOSMART </a>
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
    <br><br><br><br><br><br><br><br><br><br>
	<form action=""
	method = "post">
	<div class='center-text'>GAMES</div>
	<section class="game" id="game">
        <div class="package-card">
            <h3> MATH ADDITION QUIZ </h3>
            <img src="8.png" alt="Mathematics"> 
			<br>
			<br>
            <button> <a href="AdditionGames.php">Click</button>
        </div>
    </section>
	</form>
	<div>
	<p src="Jumping Animation.gif" alt="Jumping"> </p>
	</div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    
	 
</body>
<footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</html>