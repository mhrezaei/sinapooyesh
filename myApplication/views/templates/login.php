<!DOCTYPE html>
<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>ورود به سامانه مدیریت سینا پویش</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.78, max-scale=0.78">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->

        <link href="<?php echo assets_url(); ?>css/bootstrap.login.css" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>css/main.css" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script src="<?php echo assets_url(); ?>js/ga.js" async="" type="text/javascript"></script>
        <script src="<?php echo assets_url(); ?>js/jquery.js"></script>
        <script src="<?php echo assets_url(); ?>js/main.js"></script>

    </head>

    <body>
        <img src="<?php echo assets_url(); ?>images/login-bg.jpg" class="bg" alt="background">
        <div style="opacity: 1; top: 0px;" id="login-view">
            <h1 class="center">
                <!--<img src="images/login-logo.png" alt="">-->
                <span style="font-size: 18px;">ورود به سامانه مدیریت سینا پویش</span>
                <br>
            </h1>
            <form method="post" action="<?php echo site_url(); ?>login/index">
                <div class="control-group">
                    <div class="indicator"></div>
                    <label class="control-label" for="username">نام کاربری شما :</label>
                    <div class="controls">
                        <input id="username" name="username" class="span3 icon ltr input-icon-username" placeholder="Username" type="text">
                    </div>
                </div>


                <div class="control-group">
                    <div class="indicator"></div>
                    <label class="control-label" for="password">رمز عبور :</label>
                    <div class="controls">
                        <input id="password" class="span3 icon ltr input-icon-password" name="password" type="password" placeholder="Password">
                    </div>
                </div>


                <div class="control-group">
                    <?php
                        $contactQs = securityQuestion('y', NULL, FALSE, 'loginPage');
                    ?>
                    <div class="indicator"></div>
                    <label class="control-label" for="password">حاصل عبارت <?php echo $contactQs['value']; ?>؟</label>
                    <div class="controls">
                        <input id="question" class="span3 icon ltr input-icon-password" name="question" type="text" placeholder="Security Question" autocomplete="off">
                        <input type="hidden"  name="txtContactQsKey" id="txtContactQsKey" value="<?php echo $contactQs['key']; ?>" />
                    </div>
                </div>


                <?php if($err == 1){ ?>
                    <div class="alert alert-error">
                        <i class="icon-ban-circle"></i> لطفاً تمامی گزینه هارا تکمیل نمائید.
                    </div>
                    <?php }elseif($err == 2){ ?>
                    <div class="alert alert-error">
                        <i class="icon-ban-circle"></i> پاسخ سوال امنیتی صحیح نمی باشد.
                    </div>
                    <?php }elseif($err == 3){ ?>
                    <div class="alert alert-error">
                        <i class="icon-ban-circle"></i> نام کاربری / رمز عبور صحیح نمی باشد.
                    </div>
                    <?php } ?>


                <div class="form-actions">
                    <!--<label class="checkbox pull-right right w150">
                    مرا به خاطر بسپار
                    <input name="remember" id="remember" value="true" type="checkbox">
                    </label>-->
                    <button class="btn btn-success sliced" type="submit"><a><i class="icon-off icon-white"></i></a>ورود به سیستم</button>
                </div>
            </form>
        </div>

        <script>
            setTimeout(function(){
                window.location.reload(1);
                }, 1800000);
        </script>

    </body></html>