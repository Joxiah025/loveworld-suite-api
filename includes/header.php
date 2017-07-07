<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Gogie Petroleum</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--Favicon-->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"><div class="loader"><div class="cssload-container"><div class="cssload-speeding-wheel"></div></div></div></div>
 	
    <!-- Main Header-->
    <header class="main-header header-style-two">
        <!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container clearfix">
				<!--Top Left-->
				<div class="top-left pull-left">
					
				</div>
				
				<!--Top Right-->
				<div class="top-right pull-right">
					<ul class="links-nav clearfix">
						<li><span class="fa fa-envelope"></span> support@gogiepetroleum.com</li>
						<li><span class="fa fa-phone"></span> +234 - 80543 - 890 - 455</li>
					</ul>
				</div>
			</div>
        </div>
        <!-- Header Top End -->
        
        <!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-outer">
                    	<div class="logo"><a href="home"><img src="images/gogie.png" alt="Gogie Petroleum" title="Gogie Petroleum"></a></div>
                    </div>
                    
                    <div class="pull-right upper-right clearfix">
                    	
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->    	
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                <li <?php if($page == '' || $page == 'home'){?> class="current" <?php }?>><a href="home">Home</a></li>
                                <li <?php if($page == 'about-us'){?> class="current" <?php }?>><a href="about-us">About</a></li>
                                <li class="dropdown <?php if($page == 'maintenance' || $page == 'procurement' || $page == 'training' || $page == 'consultancy' ){?> current <?php }?> "><a href="#">Services</a>
                                    <ul>
                                        <li><a href="maintenance">Maintenance</a></li>
                                        <li><a href="procurement">Procurement</a></li>
                                        <li><a href="training">Training</a></li>
                                        <li><a href="consultancy">Consultancy</a></li>
                                    </ul>
                                </li>
                                <li <?php if($page == 'portfolio'){?> class="current" <?php }?> ><a href="portfolio">Portfolio</a></li>
                                <li <?php if($page == 'contact-us'){?> class="current" <?php }?> ><a href="contact-us">Contact</a></li>
                            </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                            
                            <!--Quote Button-->
                            <div class="btn-outer"><a href="contact-us" class="theme-btn quote-btn btn-style-four"><span class="fa fa-mail-reply-all"></span> Get a Quote</a></div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="home" class="img-responsive"><img src="images/gogie-small.png" alt="Gogie" title="Gogie"></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li <?php if($page == '' || $page == 'home'){?> class="current" <?php }?> ><a href="home">Home</a></li>
                                <li <?php if($page == 'about-us'){?> class="current" <?php }?> ><a href="about-us">About</a></li>
                                <li class="dropdown <?php if($page == 'maintenance' || $page == 'procurement' || $page == 'training' || $page == 'consultancy' ){?> current <?php }?> "><a href="#">Services</a>
                                    <ul>
                                        <li><a href="maintenance">Maintenance</a></li>
                                        <li><a href="procurement">Procurement</a></li>
                                        <li><a href="training">Training</a></li>
                                        <li><a href="consultancy">Consultancy</a></li>
                                    </ul>
                                </li>
                               <li <?php if($page == 'portfolio'){?> class="current" <?php }?>><a href="portfolio">Portfolio</a></li>
                               <li <?php if($page == 'contact-us'){?> class="current" <?php }?> ><a href="contact-us">Contact</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->