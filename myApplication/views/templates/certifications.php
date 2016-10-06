<title><?php echo $site_title; ?> | گواهینامه ها</title>     
    <div class="main-content-top">    
        <div class="main-wrapper">    
            <div class="row">
                <div class="large-6 columns" style="float: right; direction: rtl; text-align: right;">
                    <h2 class="yekan">گواهینامه ها</h2>
                </div>        
                <div class="large-6 columns" style="float: left; direction: rtl; text-align: left;">
                    <ul class="breadcrumbs left yekan">
                        <li>شما اینجا هستید</li>
                        <li><a href="<?php echo site_url(); ?>">خانه</a></li>
                        <li><a href="<?php echo site_url(); ?>/certifications">گواهینامه ها</a></li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>

<div class="main-wrapper">
    <!-- Main Content -->
    <div class="row main-content" style="margin-bottom: 40px;">
        <div class="large-12 columns" style="direction: rtl;">                            
            <div class="row">
                <div class="large-12 columns" style="direction: rtl;">
                    <h3 class="yekan" style="direction: rtl;">گواهینامه ها و مجوز ها</h3>
                    <div class="divider" style="direction: rtl;"><span></span></div>
                        <div style="font-family: Tahoma; font-size: 12px; direction: rtl; line-height: 16px;">
                        <?php
                            echo $content;
                        ?>
                        </div>
                        <br>
                        <span style="font-family: 'BNazanin'; direction: rtl; font-size: 14px; font-weight: bold;">آخرین بروزرسانی: <?php echo $update; ?></span>
                </div>
               
            </div>
        </div>
    </div>
    
</div>