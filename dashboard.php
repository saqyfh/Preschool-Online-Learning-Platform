<?php
// Start session
session_start();
include("dbconn.php");
include("functions.php");
include("header.php");

// Set page title
$pageTitle = 'Dashboard';

// TEST IF THE SESSION HAS BEEN CREATED BEFORE
if (isset($_SESSION['adminID']) && $_SESSION['user_role'] === 'admin') {
    include 'navbar.php';
?>

<script type="text/javascript">
    var vertical_menu = document.getElementById("vertical-menu");
    var current = vertical_menu.getElementsByClassName("active_link");
    if (current.length > 0) {
        current[0].classList.remove("active_link");
    }
    vertical_menu.getElementsByClassName('dashboard_link')[0].className += " active_link";
</script>

<!-- TOP 4 CARDS -->
<div class="row">

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-green ">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fa fa-users fa-4x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div>Total Customer</div>
                        <div>
                        <?php
                        $sql = "SELECT COUNT(custID) FROM customer";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row[0];
                        ?>
                        </div>    
                    </div>
                </div>
            </div>
            <a href="ViewCustDetailsInfo.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fas fa-user fa-4x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div>Total Admin</div>
                        <div>
                        <?php
                        $sql = "SELECT COUNT(adminID) FROM admin";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row[0];
                        ?>
                        </div>    
                    </div>
                </div>
            </div>
            <a href="viewAdminDetailsInfo.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="far fa-calendar-alt fa-4x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div>Total Product</div>
                        <div>
                        <?php
                        $sql = "SELECT COUNT(packageID) FROM package";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row[0];
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <a href="ViewPackageDetails.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fas fa-shopping-cart fa-4x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div>Total Orders</div>
                        <div>
                        <?php
                        $sql = "SELECT COUNT(orderID) FROM orderpackage";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row[0];
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <a href="ViewOrderDetails.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div>
<?php
        include("dbconn.php");
        $sql = "SELECT * FROM ORDERPACKAGE";
        $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
        $row = mysqli_num_rows($query);

        if ($row == 0) {
            echo "No record found";
        } else {
            echo "<div class='center-text'>ORDER DETAILS INFORMATION</div>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Order ID</th>";
            echo "<th>Date</th>";
            echo "<th>Total Price</th>";
            echo "<th>Package ID</th>";
            echo "<th>Customer ID</th>";
            echo "<th>Status Payment</th>";
            echo "<th>Proof Payment</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>".$row["orderID"]."</td>"; 
                echo "<td>".$row["orderDate"]."</td>";
                echo "<td>".$row["totalPrice"]."</td>"; 
                echo "<td>".$row["packageID"]."</td>"; 
                echo "<td>".$row["custID"]."</td>"; 
                echo "<td>".$row["statusPayment"]."</td>";
                $paymentImage = $row["paymentImage"];
                $fileExtension = pathinfo($paymentImage, PATHINFO_EXTENSION);
                if (strtolower($fileExtension) == 'pdf') {
                    echo "<td>";
                    echo "<embed src='".$paymentImage."' width='100' height='100' type='application/pdf'>";
                    echo "<br><a href='".$paymentImage."' target='_blank'>View PDF</a>";
                    echo "</td>";
                } else {
                    echo "<td><img src='".$paymentImage."' alt='Payment Image' width='100'></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
?>
</div>

<?php
} else {
    header('Location: loginFormLatest.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="path/to/your/custom.css" rel="stylesheet">
</head>
<style>

ul 
{
    display: block;
    list-style: none;
    padding: 0;
    margin: 0;
}


/*** END COMMON STYLES ***/

/*** START HTML PAGE STYLE ***/

html
{
	scroll-behavior: smooth;
}

/*** END HTML PAGE STYLE ****/

/*** START BODY STYLE ***/

body
{
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    line-height: 28px;
    font-weight: 300;
}

/*** END BODY STYLE ****/

/****** START ADMIN NAVBAR *****/

.headerMenu
{
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    z-index: 1002;
    background: #7ab2b2;
    min-height: 60px;
    padding: 10px 15px;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
}

.nav-item-button
{
    padding: 10px;
    line-height: 1;display: block;
    border: 1px solid #7ab2b2;
    background-color: #fff;
    text-decoration: none;
    border-radius: 3px;
    color: #7ab2b2;
}

.dropdown .nav-item-button:hover,.dropdown .nav-item-button:focus
{
    color: white;
    background-color: #7ab2b2 !important;
    border-color: #7ab2b2 !important;
}

.navbar-brand 
{
    font-family: inherit;
    color: #fff;
    height: inherit;
    padding: 0px;
    line-height: 0px;
    font-weight: lighter;
    font-size: 25px;
}

.sidenav-menu-heading
{
    padding: 1.25rem 1rem 0.75rem;
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #4D869C;
}

.active_link 
{
    text-decoration: none;
    background: #4D869C;
    color: #fff !important;
}

.active_link i
{
    color: #fff !important;
}

.angleBottom
{
    position:absolute;
    right:0;    
    padding-right: 20px;
    font-size: large;
}

.nav .open>a, .nav .open>a:focus, .nav .open>a:hover 
{
    background-color: #7ab2b2;
    border-color: #7ab2b2;
}

.sub
{
    display: none; 
    color:white;
    overflow:hidden; 
    padding:0
}

.sub-nav-item>.a-verMenu
{
    padding-left: 35px;
    color: rgba(255,255,255,.8);
}

.vertical-menu
{
    width:240px;
    float: left;
    height: 100%;
    position: fixed;
    background: #fff;
    top: 0;
    bottom: 0;
    z-index: 300;
    -moz-box-shadow: -3px 0 10px 0 #555;
    -webkit-box-shadow: -3px 0 10px 0 #555;
    box-shadow: -3px 0 10px 0 #555;
    overflow-y: scroll;
}

.vertical-menu .menu-bar
{
    padding:0px;
    margin:0px;
    margin-top: 75px;
    position: relative;
}

.a-verMenu 
{
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    line-height: normal;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    position: relative;
    color: #4D869C;
    padding: 0.75rem 1rem;
}

.icon-ver 
{
    width: 25px;
    height: 18px;
    text-align: center;
    font-size: 15px;
    background: none;
    margin: 0;
    padding: 0;
    color: #4D869C;
    font-weight: 900;
    display: block;
}

.top-menu 
{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

.webpage-btn .nav-item-button 
{
    font-weight: 700;
    color: #fff;
    background: #7ab2b2;
    border: 1px solid #7ab2b2;
}

.top-nav .top-menu .main-li 
{
    float: left;
    margin-left: 10px;
}

.a-verMenu:hover 
{
    text-decoration: none;
    background: #7ab2b2;
    color: #fff;
}

.a-verMenu:hover i 
{
    color: #fff !important;
}


/**** END ADMIN NAVBAR  ***/





/** START DASHBOARD STYLE **/

.panel 
{
    margin-bottom: 20px;
    background-color: #7ab2b2;
    border: 0px;
    border-radius: 0px;
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}

.panel-heading
{
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}


.panel-footer 
{
    padding: 10px 15px;
    background-color: #7ab2b2;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}

.huge > span 
{
    font-size: 30px;
}

.pull-left 
{
    float: left!important;
}

.pull-right 
{
    float: right!important;
}

.panel-primary 
{
    border-color: #7ab2b2;
}

.panel-primary>.panel-heading 
{
    color: #fff;
    background-color: #7ab2b2;
    border-color: #7ab2b2;
}

.panel-green > .panel-heading 
{
    border-color: #5cb85c;
    color: white;
    background-color: #5cb85c;
}

.panel-primary>.panel-heading 
{
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}

.panel-red > .panel-heading 
{
    border-color: #d9534f;
    color: white;
    background-color: #d9534f;
}

.panel-yellow > .panel-heading 
{
    border-color: #f0ad4e;
    color: white;
    background-color: #f0ad4e;
}

.panel-primary > a
{
	color:#337ab7;
}


.panel-green > a 
{
    color: #5cb85c;
}

.panel-red > a 
{
    color: #d9534f;
}

.panel-yellow > a 
{
    color: #f0ad4e;
}

.tab button 
{
    background: inherit;
    color: #ffffff9c;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    border-bottom: 4px solid transparent;
}

/* Change background color of buttons on hover */

.tab button:hover 
{
    color: #fff;
}

/* Create an active/current tablink class */

.tab button.active 
{
    color: #fff;
    border-bottom: 4px solid #ffd943;
}

.tab
{
    padding: 0px;
    background: #06adef;
    border: 0px;
}

/* Style the tab content */

.tabcontent_orders, .tabcontent_reservations
{
    display: none;
}

/* Three buttons (Edit, Delete, View) */

.list-inline
{
    display: flex;
}
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
        table {
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
		header .navbar a:hover{
				color:var(--#7AB2B2);
			}
        header .icons a {
            font-size: 2.5rem;
            color: #4D869C;
            margin-left: 1.5rem;
        }
		header .icons a:hover{
				color:var(--#7ab2b2);
			}
		header #toggler {
            display: none;
		}
        header .fa-bars {
            font-size: 3rem;
			color: #7ab2b2;
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
		footer {
		font-size: 15px;
		text-align: center;
		padding: 15px;
		background-color: white;
		color: #4D869C;
		}


/** END DASHBOARD STYLE ***/


/** PANEL-X START STYLE **/

.panel-X
{
    border: 0;
    -webkit-box-shadow: 0 1px 3px 0 rgba(0,0,0,.25);
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.25);
    border-radius: .25rem;
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    margin: auto;
    width: 600px;
}

.panel-header-X 
{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    border-bottom: 1px solid rgb(226, 226, 226);
}

.save-header-X 
{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    min-height: 65px;
    padding: 0 1.25rem;
    background-color: #f1fafd;
}

.panel-header-X>.main-title 
{
    font-size: 18px;
    font-weight: 600;
    color: #313e54;
    padding: 15px 0;
}

.panel-body-X
{
    padding: 1rem 1.25rem;
}

.save-header-X .icon
{
    width: 20px;
    text-align: center;
    font-size: 20px;
    color: #5b6e84;
    margin-right: 1.25rem;
}


/** PANEL-X END STYLE **/

/*** START FOOTER BOTTOM STYLE ***/


.footer_section 
{
    display: block;
    background-color: #222227;
    border-top: 1px solid #333;
    padding: 30px 0;
}

.footer_section .copyright 
{
    font-size: 14px;
    color: #ddd;
}

.footer_social 
{
    display: block;
    text-align: right;
}

.footer_social li 
{
    display: inline-block;
}
.footer_social li a 
{
    font-family: "Work Sans",sans-serif;
    color: #ddd;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    margin-left: 20px;
}

/*** END FOOTER BOTTOM STYLE ***/






/** START DASHBOARD STYLE **/

.panel 
{
    margin-bottom: 20px;
    background-color: #fff;
    border: 0px;
    border-radius: 0px;
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}

.panel-heading
{
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}


.panel-footer 
{
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}

.huge > span 
{
    font-size: 30px;
}

.pull-left 
{
    float: left!important;
}

.pull-right 
{
    float: right!important;
}

.panel-primary 
{
    border-color: #4D869C;
}

.panel-primary>.panel-heading 
{
    color: #fff;
    background-color: #4D869C;
    border-color: #4D869C;
}

.panel-green > .panel-heading 
{
    border-color: #51829b;
    color: white;
    background-color:#51829b;
}

.panel-primary>.panel-heading 
{
    color: #fff;
    background-color: #4D869C;
    border-color: #4D869C;
}

.panel-red > .panel-heading 
{
    border-color: #7ab2b2;
    color: white;
    background-color: #7ab2b2;
}

.panel-yellow > .panel-heading 
{
    border-color: #9AC8CD;
    color: white;
    background-color: #9AC8CD;
}

.panel-green > a 
{
    color: #51829b;
}

.panel-red > a 
{
    color: #4D869C;
}

.panel-yellow > a 
{
    color: #9AC8CD;
}

.tab button 
{
    background: inherit;
    color: #ffffff9c;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    border-bottom: 4px solid transparent;
}

/* Change background color of buttons on hover */

.tab button:hover 
{
    color: #fff;
}

/* Create an active/current tablink class */

.tab button.active 
{
    color: #fff;
    border-bottom: 4px solid #ffd943;
}

.tab
{
    padding: 0px;
    background: #06adef;
    border: 0px;
}

/* Style the tab content */

.tabcontent_orders, .tabcontent_reservations
{
    display: none;
}

/* Three buttons (Edit, Delete, View) */

.list-inline
{
    display: flex;
}

body {
            background-color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .center-text {
			color:#4D869C;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: 'League Spartan', sans-serif; /* Apply the League Spartan font */
            font-weight: 700; /* Make the text bold */
        }
        table {
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
		


/** END DASHBOARD STYLE ***/

	</style>
	
</body>

</html>








