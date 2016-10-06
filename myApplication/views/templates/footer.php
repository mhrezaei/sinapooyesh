<footer class="footer_wrapper">
    <div class="row footer-part">
        <div class="large-12 columns">
            <div class="row">
                <div class="large-6 columns">
                    <h4 class="footer-title yekan" style="direction: rtl; text-align: right;">درباره ما</h4>
                    <div class="divdott"></div>
                    <img class="botlogo" src="<?php echo assets_url(); ?>images/botlogo.png" alt="" style="direction: rtl; float: right;" />
                    <div style="clear: both;"></div>
                    <div class="footer_part_content">
                        <p class="yekan" style="direction: rtl; text-align: justify;"><span class="yekan"><?php echo $about_us; ?></span></p>
                    </div>
                </div>


                <div class="large-3 columns">
                    <h4 class="footer-title yekan" style="direction: rtl; text-align: right;">اطلاعات تماس</h4>
                    <div class="divdott"></div>
                    <div class="footer_part_content">
                        <ul class="about-info" style="direction: rtl; text-align: right;">
                            <li><i class="icon-home" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><span class="yekan" style="direction: rtl; text-align: right;"><?php echo $address; ?></span></li>
                            <li><i class="icon-phone" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><span style="font-family: 'BNazanin'; font-size: 16px; direction: rtl; text-align: right;"><?php echo $tel; ?></span></li>
                            <li><i class="icon-print" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><span style="font-family: 'BNazanin'; font-size: 16px; direction: rtl; text-align: right;"><?php echo $fax; ?></span></li>
                            <li><i class="icon-envelope" style="float: right; padding-right: 5px; padding-top: 5px; padding-left: 5px;"></i><a href="mailto:<?php echo $site_email; ?>"><?php echo $site_email; ?></a></li>
                        </ul>
                    </div>
                </div>


                <div class="large-3 columns"> 
                        <h4 class="footer-title yekan" style="direction: rtl; text-align: right;">ارتباط سریع</h4>
                        <div class="divdott"></div>

                        <form method="POST" action="#" id="footer-contact-form" name="footer-contact-form">
                            <div class="footer_part_content">
                                <div class="row">
                                    <div class="large-6 columns yekan">
                                        <input type="text" placeholder="E-mail" name="txtEmail" id="txtEmail" class="yekan radiusInput" tabindex="11" />
                                    </div>
                                    <div class="large-6 columns yekan">
                                        <input type="text" placeholder="نام"  name="txtName" id="txtName" class="yekan radiusInput" style="direction: rtl;" tabindex="10" />
                                    </div>
                                    <div class="large-12 columns yekan">
                                        <textarea cols="10" rows="15"  name="txtContent" id="txtContent" placeholder="پیغام" class="yekan radiusInput" tabindex="12" style="direction: rtl; text-align: justify;"></textarea>
                                    </div>
                                    <div class="large-5 columns yekan">
                                        <?php
                                            $qs = securityQuestion('y', NULL, FALSE, 'conFooter1');
                                        ?>
                                        <input type="text" placeholder="پاسخ"  name="txtQs" id="txtQs" class="yekan radiusInput" style="direction: rtl; text-align: center;" tabindex="13" />
                                        <input type="hidden"  name="txtQsKey" id="txtQsKey" value="<?php echo $qs['key']; ?>" />
                                    </div>
                                    <div class="large-7 columns yekan" style="text-align: right;">
                                        <span style="line-height: 30px; direction: rtl; text-align: right; color: #2B2B2B; font-size: 12px;">حاصل عبارت <?php echo $qs['value']; ?>؟</span>
                                    </div>
                                    <div class="large-12 columns text-right yekan radiusInput">
                                        <input type="button" class="button radiusInput" value="ارسال" name="send" style="float: right;" onclick="footerContact();" tabindex="14" />
                                        <img src="<?php echo assets_url(); ?>images/load1.gif" alt="loading" style="float: right; margin-right: 10px; margin-top: 15px; display: none;" id="footerContactLoading" >
                                        <span style="float: right; margin-right: 10px; margin-top: 15px; direction: rtl; display: none;" id="footerContactStr"></span>
                                    </div>    
                                </div>
                            </div>
                        </form>
                </div>

            </div>
        </div>
    </div>

    <div class="privacy footer_bottom">
        <div class="footer-part">
            <div class="row">
                <div class="large-10 columns copyright">
                    <p style="font-size: 14px;">&copy; 2013 - <?php echo date('Y'); ?> Sina Pooyesh Co, All Rights Reserved. | Designed & Programming By <a href="http://yasnateam.com" target="_blank" style="color: #fff2db;">Yasnateam.Com</a></p>
                </div>
                <div class="large-2 columns">
                    <div id="back-to-top"><a href="#top"></a></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- carouFredSel plugin -->
<script src=<?php echo assets_url(); ?>"plugins/carouFredSel/jquery.carouFredSel-6.2.0-packed.js"></script>
<script src="<?php echo assets_url(); ?>plugins/carouFredSel/helper-plugins/jquery.touchSwipe.min.js"></script>

<!-- Scripts Initialize -->
<script type="text/javascript" src="<?php echo assets_url(); ?>js/app-head-calls.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>js/jquery.nivo.slider.pack.js"></script>    
<script src="<?php echo assets_url(); ?>js/foundation.min.js"></script>
<script>$(document).foundation();</script>  
<!-- Smallipop JS - Tooltips -->
<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/smallipop/lib/contrib/prettify.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/smallipop/lib/jquery.smallipop.js"></script>
<script>
    /*jshint jquery:true */
    jQuery.noConflict();

    jQuery(window).load(function() {
        "use strict";
        jQuery('#slider').nivoSlider({ controlNav: false});    
    });
    /*jQuery(document).ready(function() {
    "use strict";
    // Carousel
    jQuery("#carousel-type1").carouFredSel({
    responsive: true,
    width: '100%',
    auto: false,
    circular : false,
    infinite : false, 
    items: {visible: {min: 1,max: 4},
    },
    scroll: {
    items: 1,
    pauseOnHover: true
    },
    prev: {
    button: "#prev2",
    key: "left"
    },
    next: {
    button: "#next2",
    key: "right"
    },
    swipe: true
    });

    jQuery(".work_slide ul").carouFredSel({
    circular: false,
    infinite: true,
    auto: false,
    scroll:{items:1},
    items: {visible: {min: 3,max: 3}},
    prev: {    button: "#slide_prev", key: "left"},
    next: { button: "#slide_next",key: "right"}
    });
    jQuery("#testimonial_slide").carouFredSel({
    circular: false,
    infinite: true,
    auto: false,
    scroll:{items:1},
    prev: {    button: "#slide_prev1", key: "left"},
    next: { button: "#slide_next1",key: "right"}
    });


    });*/  

</script>
<!-- Initialize JS Plugins -->
<script src="<?php echo assets_url(); ?>js/app-bottom-calls.js"></script>  
<script src="<?php echo assets_url(); ?>js/myScript.js"></script>  

<?php
    if($this->router->fetch_class() == 'contact')
    {
    ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTSJ4nigiCUcS_KdUEvTfegUWC2EPbP_Q&amp;sensor=false"></script>
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(35.7262983 , 51.4320155),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                mapOptions);
            var myLatlng = new google.maps.LatLng(35.7262983 , 51.4320155);
            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Address"
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        }

        jQuery(document).ready(function(){
            initialize();
        });

    </script>
    <?php
    }
?>

<!-- End Main Wrapper -->
</body>
</html>

<?php
    if($site_status == 1)
    {
        $this->output->enable_profiler(TRUE);
    }
?>