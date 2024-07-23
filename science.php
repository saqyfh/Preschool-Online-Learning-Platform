<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap');
        
        body {
            background-color: #7AB2B2;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 0;
            padding: 0;
        }
        .center-text {
            color: white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif; /* Apply the League Spartan font */
            font-weight: 700; /* Make the text bold */
        }
		.title {
            color: white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif; /* Apply the League Spartan font */
            font-weight: 300; /* Make the text bold */
			border-style: double;
			border-background: #4D869C
			border-color: #4D869C
			
        }
        * {
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            transition: .2s linear;
        }
        html {
            font-size: 62.5%;
            scroll-behavior: smooth;
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

        .video-section {
            padding: 10rem 5%;
            background-color: #7AB2B2;
        }
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .video-card {
            background: #f0f8ff;
            border: 0.1rem solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .video-card iframe {
            width: 100%;
            height: 100%;
            border: none;
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
            color: white;
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
            font-size: 15px;
            text-align: center;
            padding: 15px;
            background-color: white;
            color: #4D869C;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Videos</title>
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
	<form action="Video.php"
    <div class="video-section">
    <div style="width: 80%; margin: 0 auto; text-align: right;">
        <button class="oval-button">Back</button>
    </div>
			<div class="center-text">SCIENCE</div>
			<br>
			<br>
			<div class="title">Light & Colors</div>
				<div class="video-grid">
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/SP3EY2tToQs?controls=1" allowfullscreen></iframe>
					</div>
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/igcoDFokKzU?controls=1" allowfullscreen></iframe>
					</div>
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/QEidB45W610?controls=1" allowfullscreen></iframe>
					</div>
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div class="title">Solar System</div>
				<div class="video-grid">
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/sePqPIXMsAc?controls=1" allowfullscreen></iframe>
					</div>
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/i_jiQzoQF5M?controls=1" allowfullscreen></iframe>
					</div>
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/ErUZVWUP0c4?controls=1" allowfullscreen></iframe>
					</div>
					<div class="video-card">
						<iframe src="https://www.youtube.com/embed/0YKzBG4ndCc?controls=1" allowfullscreen></iframe>
					</div>
				</div>

		</div>

	</form>
	
	<br>
	<br>
	<br>
	
    <footer>
        &copy; 2023 Kiddosmart. All rights reserved.
    </footer>
</body>
</html>