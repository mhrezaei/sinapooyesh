<title><?php echo $site_title; ?> | ویرایش اطلاعات</title>     
<div class="main-content-top">    
    <div class="main-wrapper">    
        <div class="row">
            <div class="large-6 columns" style="float: right; direction: rtl; text-align: right;">
                <h2 class="yekan"></h2>
            </div>        
            <div class="large-6 columns" style="float: left; direction: rtl; text-align: left;">
                <ul class="breadcrumbs left yekan">
                    <li>شما اینجا هستید</li>
                    <li><a href="<?php echo site_url(); ?>">خانه</a></li>
                    <li><a href="<?php echo site_url(); ?>user">ویرایش اطلاعات</a></li>
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
                    <h3 class="yekan" style="direction: rtl;">ویرایش اطلاعات</h3>
                    <div class="divider" style="direction: rtl;"><span></span></div>
                    <div class="large-12 columns">
                        <p style="direction: rtl; text-align: right; font-size: 16px;" class="nazanin">
                        با استفاده از فرم زیر می توانید اطلاعات مربوط به خود را ویرایش نمائید.
                        <br>
                        تاریخ آخرین ورود به سایت: <?php echo pdate('y/m/d', $lastOnline); ?>
                        </p>
                        <form>
                            <fieldset style="direction: rtl;" class="yekan">
                                <legend>اطلاعات شخصی</legend>
                                <div class="row">
                                    <div class="large-12 columns" style="direction: rtl;">
                                        <label>نام و نام خانوادگی:</label>
                                        <input type="text" placeholder="حروف فارسی وارد نمائید" id="txtUserName" value="<?php echo $name; ?>" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-4 columns right" style="direction: rtl;">
                                        <label>شماره تماس:</label>
                                        <input type="text" placeholder="فقط عدد وارد نمائید" id="txtUserTel" value="<?php echo $tel; ?>" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-4 columns right" style="direction: rtl;">
                                        <label>شماره همراه:</label>
                                        <input type="text" placeholder="فقط عدد وارد نمائید" id="txtUserMob" value="<?php echo $mobile; ?>" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-4 columns" style="direction: rtl;">
                                        <label>ایمیل:</label>
                                        <input type="text" placeholder="ایمیل را بدون www وارد نمائید." id="txtUserEmail" value="<?php echo $email; ?>" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-9 columns right" style="direction: rtl;">
                                        <label>آدرس:</label>
                                        <input type="text" placeholder="حروف فارسی وارد نمائید" id="txtUserAddress" value="<?php echo $address; ?>" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-3 columns" style="direction: rtl;">
                                        <label>کدپستی:</label>
                                        <input type="text" placeholder="فقط عدد وارد نمائید" id="txtUserPostalCode" value="<?php echo $postalCode; ?>" class="radiusInput">
                                    </div>
                                </div>
                            </fieldset>
                            
                            <fieldset style="direction: rtl;" class="yekan">
                                <legend>اطلاعات ورود</legend>
                                <div class="row">
                                    
                                    <div class="large-12 columns right" style="direction: rtl;">
                                        <label>نام کاربری(غیر قابل تغییر):</label>
                                        <input type="text" readonly="readonly" value="<?php echo $username; ?>" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-6 columns right" style="direction: rtl;">
                                        <label>رمز عبور:</label>
                                        <input type="password" placeholder="حداقل 6 کاراکتر" id="txtUserPass" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-6 columns" style="direction: rtl;">
                                        <label>تکرار رمز عبور:</label>
                                        <input type="password" placeholder="حداقل 6 کاراکتر" id="txtUserVerifyPass" class="radiusInput">
                                    </div>
                                    
                                    <div class="large-12 columns right" style="direction: rtl;">
                                        <label>* رمز وارد شده جایگزین رمز قبلی می گردد.</label>
                                    </div>
                                    
                                </div>
                            </fieldset>
                            
                            <button type="button" class="button radius yekan" onclick="userEdit();">ذخیره اطلاعات</button>
                            <img src="<?php echo assets_url(); ?>images/load1.gif" alt="loading" style="float: right; margin-right: 10px; margin-top: 15px; display: none;" id="userLoad" >
                            <span style="float: right; margin-right: 10px; margin-top: 15px; direction: rtl; display: none;" id="userStr" class="yekan"></span>
                            
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>