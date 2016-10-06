function base_url(ext)
{
    var url     = window.location.href,
    base    = url.substring(0, url.indexOf('/', 14)),
    //ret_url = base + "/sinapooyesh/";
    ret_url = base + "/";

    if(ext !== undefined && ext !== '') {
        ret_url += ext;
    }

    return ret_url;
}
function checkEmail(email)
{

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function footerContact()
{
    var load = jQuery('#footerContactLoading');
    var str = jQuery('#footerContactStr');
    var i = 1;
    load.show();
    str.hide();

    var name = jQuery('#txtName').val();
    var email = jQuery('#txtEmail').val();
    var content = jQuery('#txtContent').val();
    var qs = jQuery('#txtQs').val();
    var qsKey = jQuery('#txtQsKey').val();

    if(name.length > 3)
    {
        if(checkEmail(email))
        {
            if(content.length > 10)
            {
                if(qs.length > 0)
                {
                    // Ajax
                    if(i > 0)
                    {
                        i--;
                        jQuery.ajax({
                            dataType: "json",
                            type: "POST",
                            url: base_url() + "ajax/contactCom",
                            cache: false,
                            data: {txtName: name, txtEmail: email, txtContent: content, txtSite: '', txtQs: qs, txtQsKey: qsKey, txtQsTarget: 'conFooter1'}
                        }).done(function(Data){
                            load.hide();
                            if(Data.contactStatus == 1)
                            {
                                str.addClass('green').text('پیغام شما با موفقیت ذخیره شد.').show();
                                jQuery('#txtName').val('');
                                jQuery('#txtEmail').val('');
                                jQuery('#txtContent').val('');
                                jQuery('#txtQs').val('');
                                setTimeout(function(){
                                    window.location.reload(1);
                                    }, 5000);
                                return false;

                            }
                            else if(Data.contactStatus == 2)
                            {
                                str.addClass('orang').text('خطایی رخ داده است، دوباره سعی کنید.').show();
                                return false;
                            }
                            else if(Data.contactStatus == 3)
                            {
                                str.addClass('orang').text('در ورود اطلاعات دقت نمائید.').show();
                                return false;
                            }
                        });
                    }
                }
                else
                {
                    load.hide();
                    str.addClass('orang').text('پاسخ سوال امنیتی را وارد نمائید.').show();
                    jQuery('#txtQs').focus();
                    return false;
                }

            }
            else
            {
                load.hide();
                str.addClass('orang').text('پیغام خود را وارد نمائید.').show();
                jQuery('#txtContent').focus();
                return false;
            }
        }
        else
        {
            load.hide();
            str.addClass('orang').text('ایمیل صحیح وارد نمائید.').show();
            jQuery('#txtEmail').focus();
            return false;
        }
    }
    else
    {
        load.hide();
        str.addClass('orang').text('نام را وارد نمائید.').show();
        jQuery('#txtName').focus();
        return false;
    }

}
function contactFormQu()
{
    var load = jQuery('#contactFormLoad');
    var str = jQuery('#ContactFormStr');
    var i = 1;
    load.show();
    str.hide();

    var name = jQuery('#txtContactName').val();
    var email = jQuery('#txtContactEmail').val();
    var site = jQuery('#txtContactSite').val();
    var content = jQuery('#txtContactMsg').val();
    var qs = jQuery('#txtContactQs').val();
    var qsKey = jQuery('#txtContactQsKey').val();

    if(name.length > 3)
    {
        if(checkEmail(email))
        {
            if(content.length > 10)
            {
                if(qs.length > 0)
                {
                    // Ajax
                    if(i > 0)
                    {
                        i--;
                        jQuery.ajax({
                            dataType: "json",
                            type: "POST",
                            url: base_url() + "ajax/contactCom",
                            cache: false,
                            data: {txtName: name, txtEmail: email, txtContent: content, txtSite: site, txtQs: qs, txtQsKey: qsKey, txtQsTarget: 'conPage1'}
                        }).done(function(Data){
                            load.hide();
                            if(Data.contactStatus == 1)
                            {
                                str.addClass('green').text('پیغام شما با موفقیت ذخیره شد.').show();
                                jQuery('#txtContactName').val('');
                                jQuery('#txtContactEmail').val('');
                                jQuery('#txtContactSite').val('');
                                jQuery('#txtContactMsg').val('');
                                jQuery('#txtContactQs').val('');
                                setTimeout(function(){
                                    window.location.reload(1);
                                    }, 5000);
                                return false;

                            }
                            else if(Data.contactStatus == 2)
                            {
                                str.addClass('orang').text('خطایی رخ داده است، دوباره سعی کنید.').show();
                                return false;
                            }
                            else if(Data.contactStatus == 3)
                            {
                                str.addClass('orang').text('در ورود اطلاعات دقت نمائید.').show();
                                return false;
                            }
                        });
                    }
                }
                else
                {
                    load.hide();
                    str.addClass('orang').text('پاسخ سوال امنیتی را وارد نمائید.').show();
                    jQuery('#txtContactQs').focus();
                    return false;
                }

            }
            else
            {
                load.hide();
                str.addClass('orang').text('پیغام خود را وارد نمائید.').show();
                jQuery('#txtContactMsg').focus();
                return false;
            }
        }
        else
        {
            load.hide();
            str.addClass('orang').text('ایمیل صحیح وارد نمائید.').show();
            jQuery('#txtContactEmail').focus();
            return false;
        }
    }
    else
    {
        load.hide();
        str.addClass('orang').text('نام را وارد نمائید.').show();
        jQuery('#txtContactName').focus();
        return false;
    }

}
function loginFormDo()
{
    var str = jQuery('#loginFormStr');
    var load = jQuery('#loginFormLoad');

    var i = 1;
    load.show();
    str.hide();

    var user = jQuery('#txtUsername').val();
    var pass = jQuery('#txtPassword').val();

    if(user.length > 4)
    {
        if(pass.length > 5)
        {
            // Ajax
            if(i > 0)
            {
                i--;
                jQuery.ajax({
                    dataType: "json",
                    type: "POST",
                    url: base_url() + "ajax/loginFormDo",
                    cache: false,
                    data: {txtUser: user, txtPass: pass}
                }).done(function(Data){
                    load.hide();
                    if(Data.doLogin == 1)
                    {
                        str.addClass('green').text('تبریک! با موفقیت وارد شدید.').show();
                        jQuery('#txtUsername').val('');
                        jQuery('#txtPassword').val('');
                        setTimeout(function(){
                            window.location.reload(1);
                            }, 2000);
                        return false;

                    }
                    else if(Data.doLogin == 2)
                    {
                        str.addClass('orang').text('نام کاربری یا رمز عبور صحیح نیست.').show();
                        return false;
                    }
                    else if(Data.doLogin == 3)
                    {
                        str.addClass('orang').text('در ورود اطلاعات دقت نمائید.').show();
                        return false;
                    }
                });
            }
        }
        else
        {
            load.hide();
            str.addClass('orang').text('رمز ورود را وارد کنید.').show();
            jQuery('#txtPassword').focus();
            return false;
        }
    }
    else
    {
        load.hide();
        str.addClass('orang').text('نام کاربری را وارد کنید.').show();
        jQuery('#txtUsername').focus();
        return false;
    }
}
function userEdit()
{
    var str = jQuery('#userStr');
    var load = jQuery('#userLoad');

    var i = 1;
    load.show();
    str.hide();

    var name = jQuery('#txtUserName').val();
    var tel = jQuery('#txtUserTel').val();
    var mob = jQuery('#txtUserMob').val();
    var email = jQuery('#txtUserEmail').val();
    var address = jQuery('#txtUserAddress').val();
    var postal = jQuery('#txtUserPostalCode').val();
    var pass1 = jQuery('#txtUserPass').val();
    var pass2 = jQuery('#txtUserVerifyPass').val();

    if(name.length > 5)
    {
        if(tel.length == 11)
        {
            if(mob.length == 11)
            {
                if(checkEmail(email))
                {
                    if(address.length > 10)
                    {
                        if(postal.length == 10)
                        {
                            if(pass1.length > 0)
                            {
                                if(pass1.length > 5 && pass1 == pass2)
                                {
                                    i = 1;
                                }
                                else
                                {
                                    i = 0;
                                    load.hide();
                                    str.addClass('orang').text('رمز عبور و تکرار آن را به صورت صحیح وارد نمائید.').show();
                                    jQuery('#txtUserPass').focus();
                                    return false;
                                }
                            }
                            else
                            {
                                i = 1;
                                var pass1 = 'notChange';
                            }
                            // Ajax
                            if(i > 0)
                            {
                                i--;
                                jQuery.ajax({
                                    dataType: "json",
                                    type: "POST",
                                    url: base_url() + "ajax/userEditInfo",
                                    cache: false,
                                    data: {txtName: name, txtTel: tel, txtMob: mob, txtEmail: email, txtAddress: address, txtPostal: postal, txtPass: pass1, txtPassVerify: pass2}
                                }).done(function(Data){
                                    load.hide();
                                    if(Data.updateUserData == 1)
                                    {
                                        str.addClass('green').text('اطلاعات شما با موفقیت ذخیره شد.').show();
                                        setTimeout(function(){
                                            window.location.reload(1);
                                            }, 4000);
                                        return false;

                                    }
                                    else if(Data.updateUserData == 2)
                                    {
                                        str.addClass('orang').text('خطایی در ثبت اطلاعات رخ داده است، دوباره تلاش کنید.').show();
                                        return false;
                                    }
                                    else if(Data.updateUserData == 3)
                                    {
                                        str.addClass('orang').text('فرم را به دقت تکمیل نمائید.').show();
                                        return false;
                                    }
                                });
                            }
                        }
                        else
                        {
                            load.hide();
                            str.addClass('orang').text('کدپستی 10 رقمی خود را به صورت صحیح وارد نمائید.').show();
                            jQuery('#txtUserPostalCode').focus();
                            return false;
                        }
                    }
                    else
                    {
                        load.hide();
                        str.addClass('orang').text('آدرس خود را وارد نمائید.').show();
                        jQuery('#txtUserAddress').focus();
                        return false;
                    }
                }
                else
                {
                    load.hide();
                    str.addClass('orang').text('ایمیل را به صورت صحیح وارد نمائید.').show();
                    jQuery('#txtUserEmail').focus();
                    return false;
                }
            }
            else
            {
                load.hide();
                str.addClass('orang').text('شماره موبایل را به صورت 11 رقم وارد نمائید.').show();
                jQuery('#txtUserMob').focus();
                return false;
            }
        }
        else
        {
            load.hide();
            str.addClass('orang').text('شماره تماس را 11 رقم همراه با کد شهر خود وارد نمائید.').show();
            jQuery('#txtUserTel').focus();
            return false;
        }
    }
    else
    {
        load.hide();
        str.addClass('orang').text('نام را وارد نمایید.').show();
        jQuery('#txtUserName').focus();
        return false;
    }
}