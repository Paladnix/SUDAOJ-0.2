
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>SUDA Online Judge</title>
        <meta charset="utf-8">
        <meta name="description" content="Soochow University Online Judge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <link rel="icon" href="<?php echo APP_URL ?>/images/logo.png" type="image/x-icon">

        <!-- main page styles -->

        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/bootstrap-theme.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/page.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/theme.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/google-code-prettify/prettify.css" />

        <script>window.PAGE_TYPE = "Guide"</script>
        <script src="<?php echo APP_URL ?>/js/jquery-3.2.1.min.js"></script>
    </head>

    <body class="docs" onload="prettyPrint()">

    <!-- Begin mobile bar -->
        <div id="mobile-bar"  >
            <a class="menu-button"></a>
            <a class="logo" href="<?php echo APP_URL ?>/"></a>
        </div>
    <!-- End mobile bar -->


    <!-- Begin  header -->
        <div id="header">
            <a id="logo" href="<?php echo APP_URL ?>/">
                <img src="<?php echo APP_URL ?>/images/logo.png">
                <span>Online Judge</span>
            </a>
            <ul id="nav">
                <li>
                    <form id="search-form">
                        <input type="text" id="search-query-nav" class="search-query st-default-search-input">
                    </form>
                </li>

                <li><a href="<?php echo APP_URL ?>/" class="nav-link <?php if($controller == "Index") echo "current";?>">Home</a></li>
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/contest/" class="nav-link <?php if($controller == "Contest") echo "current";?>">Contest<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="<?php if(isset($_SESSION['username'])) echo "#createConModal"; else echo "#loginModal"; ?>" class="nav-link" data-toggle="modal" role="button">New Contest</a></li>
                        <li><a href="<?php echo APP_URL ?>/contest/my/" class="nav-link" >My Contest</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/problem/" class="nav-link <?php if($controller == "Problem") echo "current";?>">Problem<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createProModal" class="nav-link" id="newPro" data-toggle="modal" data-target="#createProModal" role="button">New Problem</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo APP_URL ?>/guide/" class="nav-link <?php if($controller == "Guide") echo "current";?>">Guide</a></li>

            <?php if( isset( $_SESSION['username'] ) ) { ?>
                <li class="nav-dropdown-container">
                    <a class="nav-link <?php if($controller == "User") echo "current";?>"><?php echo $_SESSION['username'] ?><span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="<?php echo APP_URL ?>/user/profile" class="nav-link ">Your Profile</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/message/" class="nav-link" >Your Message</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/logout" class="nav-link" >Logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="#registerModal" class="nav-link" data-toggle="modal" data-target="#registerModal" role="button">Register</a></li>
                <li><a href="#loginModal" class="nav-link" data-toggle="modal" data-target="#loginModal" role="button" >Login</a></li>
            <?php } ?>


            </ul>
        </div>
        <!-- End  header -->

        <!-- Body 主体部分 -->
        <div id="main" class="fix-sidebar">

            <!-- Begin Left Side -->
            <div class="sidebar">

                <!-- mobile left bar of header -->
                <ul class="main-menu">
                
                <li>
                    <form id="search-form">
                        <input type="text" id="search-query-nav" class="search-query st-default-search-input">
                    </form>
                </li>

                <li><a href="<?php echo APP_URL ?>/" class="nav-link <?php if($controller == "Index") echo "current";?>">Home</a></li>
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/contest/" class="nav-link <?php if($controller == "Contest") echo "current";?>">Contest<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createConModal" class="nav-link" data-toggle="modal" data-target="#createConModal" role="button">New Contest</a></li>
                        <li><a href="<?php echo APP_URL ?>/contest/my/" class="nav-link" >My Contest</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/problem/" class="nav-link <?php if($controller == "Problem") echo "current";?>">Problem<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createProModal" class="nav-link" data-toggle="modal" data-target="#createProModal" role="button">New Problem</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo APP_URL ?>/guide/" class="nav-link <?php if($controller == "Guide") echo "current";?>">Guide</a></li>

            <?php if( isset( $_SESSION['username'] ) ) { ?>
                <li class="nav-dropdown-container">
                    <a class="nav-link <?php if($controller == "User") echo "current";?>"><?php echo $_SESSION['username'] ?><span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="<?php echo APP_URL ?>/user/profile" class="nav-link ">Your Profile</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/message/" class="nav-link" >Your Message</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/logout" class="nav-link" >Logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="#registerModal" class="nav-link" data-toggle="modal" data-target="#registerModal" role="button">Register</a></li>
                <li><a href="#loginModal" class="nav-link" data-toggle="modal" data-target="#loginModal" role="button" >Login</a></li>
            <?php } ?> 
 
                </ul>
