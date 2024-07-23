   <!-- ADMIN NAVBAR HEADER -->

<header class="headerMenu сlearfix sb-page-header">   
    <div class="nav-header">
        <a class="navbar-brand" href="#">
            Admin Panel
        </a> 
    </div>

    <div class="nav-controls top-nav">
        <ul class="nav top-menu">
            <li class="main-li webpage-btn">
                <a class="nav-item-button" href="MainPageKS.php" target="_blank">
                    <i class="fas fa-eye"></i>
                    <span>View website</span>
                </a>
            </li>
        </ul>
    </div>
</header>

<!-- VERTICAL NAVBAR -->

<aside class="vertical-menu" id="vertical-menu">
    <div>
        <ul class="menu-bar">
            <div class="sidenav-menu-heading">
                Core
            </div>

            <div class="dropdown-divider"></div>

            <li>
                <a href="dashboard.php" class="a-verMenu dashboard_link">
                    <i class="fas fa-tachometer-alt icon-ver"></i>
                    <span style="padding-left:6px;">Dashboard</span>
                </a>
            </li>

            <div class="dropdown-divider"></div> 

            <div class="sidenav-menu-heading">
                Menus
            </div>

            <div class="dropdown-divider"></div>

            <li>
                <a href="ViewPackageDetails.php" class="a-verMenu content_categories_link">
                    <i class="fas fa-list icon-ver"></i>
                    <span style="padding-left:6px;">Product</span>
                </a>
            </li>
    
            
            <div class="dropdown-divider"></div>
          
            <li>
                <a href="viewCustDetailsInfo.php" class="a-verMenu customer_link">
                    <i class="far fa-address-card icon-ver"></i>
                    <span style="padding-left:6px;">Customer</span>
                </a>
            </li>
			<li>
                <a href="viewAdminDetailsInfo.php" class="a-verMenu admin_link">
                    <i class="far fa-user icon-ver"></i>
                    <span style="padding-left:6px;">Admin</span>
                </a>
            </li>
			
			
			<div class="sidenav-menu-heading">
                Settings
            </div>
            <li>
                <a   href="editProfileAdmin.php?do=Edit&admin_id"=<?php echo $_SESSION['adminID'] ?> class="a-verMenu admin_link">
                    <i class="fas fa-user-cog"></i>
                    <span style="padding-left:6px">Edit Profile</span>
                </a>
            </li>
            <li>
                <a   href="logout.php" class="a-verMenu admin_link">
                <i class="fas fa-sign-out-alt"></i>
                <span style="padding-left:6px">Logout</span>
                </a>
            </li>
            <div class="dropdown-divider"></div>

        </ul>
    </div>
</aside>

<!-- START BODY CONTENT  -->

<div id="content" style="margin-left:240px;"> 
    <section class="content-wrapper" style="width: 100%;padding: 70px 0 0;">
        <div class="inside-page" style="padding:20px">
            <div class="page_title_top" style="margin-bottom: 1.5rem !important;">
                <h1 style="color: #5a5c69!important;font-size: 3rem;font-weight: 400;line-height: 0; ;">
                    <?php echo $pageTitle; ?>
                </h1>
            </div>
