<!DOCTYPE html>
<!--[if IE 8]>     <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
    <!-- Smallipop CSS - Tooltips -->
    <link rel="stylesheet" href="<?php echo assets_url(); ?>plugins/smallipop/css/contrib/animate.min.css" type="text/css" media="all" title="Screen" />
    <link rel="stylesheet" href="<?php echo assets_url(); ?>plugins/smallipop/css/jquery.smallipop.css" type="text/css" media="all" title="Screen" />

    <!-- Default CSS -->
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/normalize.css" />
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/fgx-foundation.css" />
    <!--[if IE 8]>
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/ie8-grid-foundation-4.css" />

    <![endif]-->

    <!-- Font Awesome - Retina Icons -->
    <link rel="stylesheet" href="<?php echo assets_url(); ?>plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/nivo-slider.css" />
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/themes/default/default.css" />
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/datepicker/metallic.css" />
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/style.css" />
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/myStyle.css" />

    <!-- Included JS Files -->
    <script src="<?php echo assets_url(); ?>js/vendor/jquery.js"></script>
    <script src="<?php echo assets_url(); ?>js/vendor/custom.modernizr.js"></script>
</head>
<body>

<!-- Begin Main Wrapper -->
<div class="main-wrapper">
    <!-- Main Navigation -->  
    <header class="row main-navigation">
        <div class="large-3 columns">    
            <a href="<?php echo base_url(); ?>" id="logo"><img src="<?php echo assets_url(); ?>images/logo.png" alt="Medico Logo" /></a>
        </div>
        <div class="large-9 columns">            
            <nav class="top-bar">
                <ul class="title-area">
                    <!-- Title Area -->
                    <li class="name"></li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span class="yekan">فهرست اصلی</span></a></li>
                </ul>

                <section class="top-bar-section">
                    <!-- Left Nav Section -->
                    <ul class="right">
                        <li><a href="<?php echo site_url(); ?>" <?php if($this->router->fetch_class() == 'home'){echo 'class="active"';} ?>><span class="yekan">صحفه نخست</span></a></li>
                        <li><a href="<?php echo site_url(); ?>#Product" <?php if($this->router->fetch_class() == 'product'){echo 'class="active"';} ?>><span class="yekan">محصولات</span></a>
                        <li><a href="<?php echo site_url(); ?>certifications" <?php if($this->router->fetch_class() == 'certifications'){echo 'class="active"';} ?>><span class="yekan">گواهینامه ها</span></a></li>
                        <li><a href="<?php echo site_url(); ?>about" <?php if($this->router->fetch_class() == 'about'){echo 'class="active"';} ?>><span class="yekan">درباره ما</span></a></li>
                        <li><a href="<?php echo site_url(); ?>contact" <?php if($this->router->fetch_class() == 'contact'){echo 'class="active"';} ?>><span class="yekan">تماس باما</span></a></li>
                        <?php
                             $cooperator = $this->user_auth_model->is_user();
                             if( ! $cooperator)
                             {
                         ?>
                        <li class="has-dropdown" id="cooperatorEl"><a href="#"><span class="yekan">ورود همکاران</span></a>
                            <ul class="dropdown">
                                <li style="width: 290px; height: 220px; direction: rtl; float: right;">
                                    <div class="large-3 columns"> 
                                        <form method="POST" action="#" id="footer-contact-form" autocomplete="off">
                                            <div style="width: 280px; margin: 0 auto;">
                                                <div class="large-12 columns" style="width: 250px; margin-bottom: 25px;">
                                                        <input type="text" placeholder="Username"  name="txtUsername" id="txtUsername" class="yekan radiusInput" autocomplete="off" />
                                                    </div>
                                                    <div class="large-12 columns" style="width: 250px; margin-bottom: 25px;">
                                                        <input type="password" placeholder="Password" name="txtPassword" id="txtPassword" class="yekan radiusInput" autocomplete="off" />
                                                    </div>
                                                    <div class="large-12 columns text-right" style="width: 250px; margin-bottom: 25px;">
                                                        <input type="button" class="button yekan radiusInput" value="ارسال" name="send" style="float: right;" onclick="loginFormDo();" />
                                                        <img src="<?php echo assets_url(); ?>images/load1.gif" id="loginFormLoad" alt="loading" style="float: right; margin-right: 10px; margin-top: 17px; display: none;">
                                                    </div>
                                                    <div class="large-12 columns text-right" style="width: 250px; direction: rtl; font-size: 12px; margin: 0 auto; text-align: center;">
                                                        <span class="yekan" style="padding-right: 30px; display: none;" id="loginFormStr">نام کاربری یا رمزعبور صحیح نمی باشد.</span>
                                                    </div>
                                            </div>    
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php
                             }
                             else
                             {
                        ?>
                        
                        <li class="has-dropdown" id="cooperatorEl" style="direction: rtl;"><a href="#"><span class="yekan"><?php echo $cooperator['name']; ?> خوش آمدید!</span></a>
                          <ul class="dropdown">
                            <li style="direction: rtl; text-align: right;"><a href="<?php echo base_url(); ?>users"><span class="yekan" style="font-size: 12px;">ویرایش مشخصات</span></a></li>
                            <li style="direction: rtl; text-align: right;"><a href="<?php echo base_url(); ?>home/logOut"><span class="yekan" style="font-size: 12px;">خروج</span></a></li>
                          </ul>
                        </li>
                        
                        <?php
                             }
                        ?>

                    </ul>
                    <!-- End Left Nav Section -->                   
                </section>
            </nav>
        </div>
    </header>
    <!-- Start Main Slider -->
</div>