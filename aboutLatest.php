<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> About KIddoSmart </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <style>
            :root{
        --blue:#4D869C;
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



    /* media queries buat later*/
    @media (max-width: 991px){

        html{
            font-size: 55%;
        }

        header{
            padding: 2rem;
        }

        section{
            padding: 2rem;
        }

        .home{
            background-position: center;
        }

    }

    @media (max-width: 768px) {

        header .fa-bars{
            display: block;
        }

        header .navbar{
            position: absolute;
            top: 0; left: 0; right: 0;
            background: #4D869C;
            border-top: .1rem solid rgba(0, 0, 0,.1) ;
            clip-path: polygon(0 0, 100% 0, 100% 0,0 0);
        }

        header #toggler:checked ~ .navbar {
            clip-path: polygon(0 0, 100% 0, 100% 0,0 0);
        }

        header .navbar a{
            margin: 1.5rem;
            padding: 1.5rem;
            background: #ffffff;
            border: .1rem solid rgba(0, 0, 0,.1) ;
            display: block;
        }

        @media (max-width: 450px){

            html{
                font-size: 50%;
            }
        
            header{
                padding: 2rem;
            }
        
        }

    }



    .startbtn{
        display: inline-block;
        margin-top: 1rem;
        border-radius: 5rem;
        background: #fff;
        padding: .9rem 3.5rem;
        cursor: pointer;
        font-size: 1.7rem;
    }

    .startbtn:hover {
        color:var(--black);
    }

    .about{
        display: flex;
        align-items: center;
        min-height: 100vh;
        background: url(background.png);
        background-size: cover;
        background-position: center;
        left: 40px;
        justify-items: center;
    }

    .detail{
        text-align: center;
        font-size: 2rem;
        color: #fff;
        display: center;
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
                <a href="MainPageKS.html"> HOME</a>
                <a href="about"> ABOUT</a>
                <a href="Package.php"> PACKAGES</a>
                <a href="loginForm.php"> LOGIN</a>
            </nav>

            <div class="icons">
                <a href="cart.php" class="fa fa-shopping-cart"></a>
                <a href="" class="fa fa-user"></a>
            </div>


        </header>
        <!---header section ended -->

        <!--  ABOUT SECTION START-->
        <section class="about" id="about" align="center"> 

            <div class="detail">
                
                <h1> ABOUT US</h1><br>
                <p> Welcome to KiddoSmart, where the joy of<br>
                learning meets the power of technology</p>

                <br>
                <h1> CONTACT US</h1><br>
                    <p> Have questions or need support? Visit our <br> feedback section to reach out to us.</p>
                    <br><i class="fa fa-phone"></i> 017-3588741 (ADMIN MUN) <br>
                    <i class="fa fa-facebook"></i> Kiddo Smart <br>
                    <i class="fa fa-instagram"></i> @kiddosmart
            </div>

        </section>

        <!--  ABOUT SECTION END-->
    </body>
</html>