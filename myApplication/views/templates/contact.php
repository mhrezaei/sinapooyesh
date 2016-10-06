<title><?php echo $site_title; ?> | تماس باما</title>     
    <div class="main-content-top">    
        <div class="main-wrapper">    
            <div class="row">
                <div class="large-6 columns" style="float: right; direction: rtl; text-align: right;">
                    <h2 class="yekan">تماس باما</h2>
                </div>        
                <div class="large-6 columns" style="float: left; direction: rtl; text-align: left;">
                    <ul class="breadcrumbs left yekan">
                        <li>شما اینجا هستید</li>
                        <li><a href="<?php echo site_url(); ?>">خانه</a></li>
                        <li><a href="<?php echo site_url(); ?>contact">تماس باما</a></li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>

<div id="map_canvas"></div> 
    <div class="main-wrapper">       
    <div class="content_wrapper">
        <div class="row">
            <div class="large-3 columns">
                <h3 class="contact_title yekan" style="direction: rtl; text-align: right;">اطلاعات تماس</h3>
                <div class="divider" style="direction: rtl;"><span></span></div>
                <div class="contact_info">
                    <ul class="about-info garnik" style="direction: rtl; text-align: right; ">
                        <li><i class="icon-home" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><span class="yekan" style="direction: rtl; text-align: right;"><?php echo $address; ?></span></li>
                        <li><i class="icon-phone" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><span style="font-family: 'BNazanin'; font-size: 16px; direction: rtl; text-align: right;"><?php echo $tel; ?></span></li>
                        <li><i class="icon-print" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><span style="font-family: 'BNazanin'; font-size: 16px; direction: rtl; text-align: right;"><?php echo $fax; ?></span></li>
                        <li><i class="icon-envelope" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><a href="mailto:<?php echo $site_email; ?>"><?php echo $site_email; ?></a></li>
                    </ul>
                </div>
            </div>
                        <div class="large-3 columns">
                
                <h3 class="contact_title yekan" style="direction: rtl; text-align: right;">چگونه مارا پیدا کنید!</h3>
                <div class="divider" style="direction: rtl;"><span></span></div>
                <p style="direction: rtl; text-align: justify;">
                    <span class="yekan">
                    <?php
                        echo $page['content'];
                    ?>
                    </span>
                </p>
            </div>

            <div class="large-6 columns">
                <h3 class="contact_title yekan" style="direction: rtl; text-align: right;" id="inquiry">ارسال پیام</h3>
                <div class="divider" style="direction: rtl;"><span></span></div>
                    <div id="status"></div>
                    <div class="contact_form">
                        <div class="row">
                            <form method="POST" class="contactForm" name="contactForm" id="contactForm">
                                <div class="small-4 columns">
                                    <input type="text" placeholder="E-mail" id="txtContactEmail" class="radiusInput" tabindex="3" />
                                </div>
                                <div class="small-4 columns">
                                    <input type="text" placeholder="Website" id="txtContactSite" class="radiusInput" tabindex="2" />
                                </div>
                                <div class="small-4 columns yekan">
                                    <input type="text" placeholder="نام" id="txtContactName" class="yekan radiusInput" style="direction: rtl;" tabindex="1" />
                                </div>
                                <div class="small-12 columns">
                                    <textarea cols="10" rows="15" placeholder="پیغام" id="txtContactMsg" name="message" class="yekan radiusInput" style="direction: rtl; text-align: justify;" tabindex="4"><?php if(strlen($product['name']) > 0){echo 'لطفاً قیمت همکار محصول ' . $product['name'] . ' را برای اینجانب ارسال نمائید.';} ?></textarea>
                                </div>
                                <div class="small-4 columns yekan" style="margin: 0 auto; padding-right: 0px; padding-left: 15px;">
                                    <?php
                                        $contactQs = securityQuestion('y', NULL, FALSE, 'conPage1');
                                    ?>
                                    <input type="text" placeholder="پاسخ سوال امنیتی" id="txtContactQs" class="yekan radiusInput" style="direction: rtl; text-align: center;" tabindex="5" />
                                    <input type="hidden"  name="txtContactQsKey" id="txtContactQsKey" value="<?php echo $contactQs['key']; ?>" />
                                </div>
                                <div class="small-8 columns yekan" style="text-align: right;">
                                    <span style="direction: rtl; text-align: right; color: #2B2B2B; font-size: 12px; line-height: 30px;">حاصل عبارت <?php echo $contactQs['value']; ?>؟</span>
                                </div>
                                <div class="small-12 columns yekan">
                                    <input type="button" class="button right yekan radiusInput" value="ارسال پیغام" name="send" id="contactSendBtn" style="float: right;" tabindex="6" onclick="contactFormQu();" />
                                    <img src="<?php echo assets_url(); ?>images/load1.gif" alt="loading" id="contactFormLoad" style="float: right; margin-right: 10px; margin-top: 30px; display: none;" >
                                    <span style="float: right; margin-right: 10px; margin-top: 27px; direction: rtl; display: none;" id="ContactFormStr"></span>
                                </div> 
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>