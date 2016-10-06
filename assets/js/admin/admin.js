// base url find for use in ajax
function base_url(ext)
{
    var url     = window.location.href,
    base    = url.substring(0, url.indexOf('/', 14)),
    ret_url = base + "/sinapooyesh/";
    //ret_url = base + "/";

    if(ext !== undefined && ext !== '') {
        ret_url += ext;
    }

    return ret_url;
}

function changeUrl(url)
{
    window.location = url;
}

function editPageContent(id)
{
    var load = $('#ajaxLoad');
    load.show();
    $('#editPageContentMsg').hide();
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/pageContetnt",
            cache: false,
            data: {pgId: id}
        }).done(function(Data){
            if(Data.havePage == 1)
            {
                $('#txtTitle').val(Data.page.title);
                $('#txtId').val(Data.page.id);
                $('#editPage').val(Data.page.content);
                CKEDITOR.config.height = 400;
                CKEDITOR.replace('editPage');
                $('#editPageContent').slideDown();
            }
            else
            {
                alert('خطایی رخ داده است، دوباره تلاش کنید.');
            }
            load.hide();

        });
        j--;
    }
}

function editPage()
{
    var load = $('#ajaxLoad');
    load.show();
    var id = $('#txtId');
    $('#editPageContentMsg').hide();
    var content = CKEDITOR.instances.editPage.getData();

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/editPageContent",
            cache: false,
            data: {pgId: id.val(), pgContent: content}
        }).done(function(Data){
            if(Data.success == 1)
            {
                $('#editPageContentMsg').show();
            }
            else
            {
                alert('خطایی رخ داده است، دوباره تلاش کنید.');
            }
            load.hide();

        });
        j--;
    }
}

function editCatContent()
{
    var load = $('#ajaxLoad');
    load.show();
    //$('#editPageContentMsg').hide();
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }

    var device = $('#deviceCont');
    var kit = $('#kitCont');
    var chemical = $('#chemicalCont');
    var consumable = $('#consumableCont');
    var noData = '<tr><td class="nazanin orang" style="text-align: center; width: 100%; font-size: 16px;" colspan="4">تا کنون دسته بندی اضافه نگردیده است.</td></tr>';
    var f1 = '<td class="nazanin" style="text-align: center; width: 10%; font-size: 16px;">';
    var f2 = '<td style="text-align: center; width: 35%; direction: rtl;">';
    var f3 = '<td class="nazanin" style="text-align: center; width: 25%; font-size: 16px;">';
    var f4 = '<td style="text-align: center; width: 30%;">';
    var fe = '</td>';
    var tr = '<tr>';
    var te = '</tr>';
    var img1 = '<img src="' + base_url() + 'assets/images/editIco.png" class="editIco" alt="ویرایش" title="ویرایش" onclick="editOneCat(';
    var img2 = '<img src="' + base_url() + 'assets/images/deleteIco.png" class="editIco" alt="حذف" title="حذف" onclick="deleteOneCat(';
    var imge = ');">';


    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/catContetnt",
            cache: false,
            data: {catCont: 1}
        }).done(function(Data){
            // device
            if(Data.haveDevice == 1)
            {
                var ht = '';
                var a = 1;
                $.each(Data.device, function(i, obj) {
                    ht += tr + f1 + a + fe + f2 + obj.title + fe + f3 + obj.pro + fe + f4 + img1 + obj.id + imge + img2 + obj.id + imge + fe + te;
                    a++;
                });
                device.html(ht);
            }
            else
            {
                device.html(noData);
            }

            // kit
            if(Data.haveKit == 1)
            {
                var ht = '';
                var a = 1;
                $.each(Data.kit, function(i, obj) {
                    ht += tr + f1 + a + fe + f2 + obj.title + fe + f3 + obj.pro + fe + f4 + img1 + obj.id + imge + img2 + obj.id + imge + fe + te;
                    a++;
                });
                kit.html(ht);
            }
            else
            {
                kit.html(noData);
            }

            // chemical
            if(Data.haveChemical == 1)
            {
                var ht = '';
                var a = 1;
                $.each(Data.chemical, function(i, obj) {
                    ht += tr + f1 + a + fe + f2 + obj.title + fe + f3 + obj.pro + fe + f4 + img1 + obj.id + imge + img2 + obj.id + imge + fe + te;
                    a++;
                });
                chemical.html(ht);
            }
            else
            {
                chemical.html(noData);
            }

            // consumable
            if(Data.haveConsumable == 1)
            {
                var ht = '';
                var a = 1;
                $.each(Data.consumable, function(i, obj) {
                    ht += tr + f1 + a + fe + f2 + obj.title + fe + f3 + obj.pro + fe + f4 + img1 + obj.id + imge + img2 + obj.id + imge + fe + te;
                    a++;
                });
                consumable.html(ht);
            }
            else
            {
                consumable.html(noData);
            }
            $('#editCatContent').slideDown();
            load.hide();

        });
        j--;
    }
}

function editOneCat(id)
{
    //edit one cat
    var form = $('#catForm');
    var load = $('#ajaxLoad');
    load.show();

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/getOneCat",
            cache: false,
            data: {catId: id}
        }).done(function(Data){
            if(Data.success == 1)
            {
                $('#editCatTitle').val(Data.cat.title);
                form.show();
            }
            else
            {
                alert('خطایی رخ داده است، دوباره تلاش کنید.');
            }
            load.hide();

        });
        j--;
    }

    $('#editCatBtn').unbind('click').bind('click', function(){
        load.show();
        var limit = 1;
        if(limit > 0)
        {
            if($('#editCatTitle').val().length >= 3)
            {
                // ajax
                var x = 1;
                if(x > 0)
                {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: base_url() + "ajax/editOneCat",
                        cache: false,
                        data: {catId: id, catTitle: $('#editCatTitle').val()}
                    }).done(function(Data){
                        if(Data.success == 1)
                        {
                            $('#editCatTitle').val('');
                            form.hide();
                            $('#editCatMsg2').show();

                            setTimeout(function(){
                                $('#editCatMsg2').hide();
                                editCatContent();
                            }, 3000);
                        }
                        else
                        {
                            alert('خطایی رخ داده است، دوباره تلاش کنید.');
                        }
                        load.hide();

                    });
                    x--;
                }
            }
            else
            {
                alert('نام دسته بندی را وارد نمائید. (حداقل 3 کاراکتر)');
            }
            limit--;
        }
    });

}

function deleteOneCat(id)
{
    // delete one cat
    if(confirm('آیا مایل به حذف این دسته بندی می باشد؟ در صورت حذف، تمامی محصولات ثبت شده در این دسته بندی حذف می گردد.'))
    {
        var load = $('#ajaxLoad');
        $('#editCatMsg').hide();
        load.show();
        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/deleteOneCat",
                cache: false,
                data: {catId: id}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#editCatMsg').show();
                    setTimeout(function()
                    {
                        $('#editCatMsg').hide(); 
                        editCatContent();
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش کنید.');
                }
                load.hide();

            });
            j--;
        }
    }
}

function editClose()
{
    $('#editCatTitle').val('');
    $('#catForm').slideToggle();
}

function addClose()
{
    $('#addCatTitle').val('');
    $('#addCatForm').slideToggle();
}

function addNewCat()
{
    var load = $('#ajaxLoad');
    $('#editCatMsg3').hide();
    load.show();
    var title = $('#addCatTitle');
    var cat = $('#addCatSub');

    if(title.val().length >= 3 && cat.val() > 0)
    {
        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/addNewCat",
                cache: false,
                data: {catId: cat.val(), catTitle: title.val()}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#addCatForm').hide();
                    $('#editCatMsg3').show();
                    setTimeout(function()
                    {
                        $('#editCatMsg3').hide();
                        editCatContent();
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش کنید.');
                }
                load.hide();

            });
            j--;
        }
    }
    else
    {
        alert('تمامی گزینه ها را تکمیل نمائید.');
        load.hide();
    }
}

function loadCat(id)
{
    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            type: "POST",
            url: base_url() + "ajax/loadCat",
            cache: false,
            data: {ld: 1}
        }).done(function(Data){
            $('#' + id).html(Data);
        });
        j--;
    }
}

function addNewProduct()
{
    var load = $('#ajaxLoad');
    $('#addProMsg').hide();
    load.show();

    var txtProName = $('#txtProName');
    var txtProPrice = $('#txtProPrice');
    var txtProCPrice = $('#txtProCPrice');
    var txtProDetail = $('#txtProDetail');
    var txtProCat = $('#txtProCat');

    if(txtProDetail.val().length < 1)
    {
        txtProDetail.val('-');
    }

    if(txtProName.val().length >= 1 && txtProCat.val() > 0 && txtProDetail.val().length > 0)
    {
        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/addNewPro",
                cache: false,
                data: {txtProName: txtProName.val(), txtProCat: txtProCat.val(), txtProPrice: txtProPrice.val(), txtProCPrice: txtProCPrice.val(), txtProDetail: txtProDetail.val()}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#addProMsg').show();
                    txtProName.val('');
                    txtProPrice.val('');
                    txtProCPrice.val('');
                    txtProDetail.val('');
                    txtProCat.val(0);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش کنید.');
                }
                load.hide();

            });
            j--;
        }
    }
    else
    {
        alert('تمامی گزینه ها را تکمیل نمائید.');
        load.hide();
    }
}

function addProductOpen()
{
    loadCat('txtProCat');
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#addProductContent').slideToggle();
}

function productList(page, reload)
{
    var load = $('#ajaxLoad');
    load.show();
    if(reload)
    {
        $('#txtCatFilter').val(0);
    }
    $('.contentModel').slideUp();
    $('#productListPageNumber').html('');
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#proListMsg').hide();
    var cats = $('#txtCatFilter').val();
    var pageN = '<button class="btn" type="button" style="padding: 4px; margin: 1px;" onclick="productList(';
    var pageNe = ',false);">';
    var pageNee = '</button>';
    var dataNo = '<tr><td style="text-align: center; width: 100%;" colspan="7" class="orang">تا کنون محصولی اضافه نگردیده است.</td></tr>';
    loadCat('txtCatFilter');

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/productList",
            cache: false,
            data: {cat: cats, page: page}
        }).done(function(Data){
            if(Data.success == 1)
            {
                var ht = '';
                var a = (page * 100) - 99;
                $.each(Data.pro, function(i, obj) {
                    ht += returnTrBody(a, obj.name, obj.price, obj.cPrice, obj.cat, obj.detail, obj.id);
                    a++;
                });
                $('#productListContentBody').html(ht);

                if(Data.total > 1)
                {
                    var bt = '';
                    for(var i = 1; i <= Data.total; i++)
                    {
                        bt += pageN + i + pageNe + i + pageNee;
                    }
                    $('#productListPageNumber').html(bt);
                }
            }
            else
            {
                $('#productListContentBody').html(dataNo);
            }
            load.hide();
            $('#productListContent').slideToggle();

        });
        j--;
    }
    if(cats > 0)
    {
        setTimeout(function(){
            $('#txtCatFilter').val(cats);
        }, 3000);
    }
}

function returnTrBody(row, name, price, cPrice, cat, detail, id)
{
    var ht = '<tr>';
    ht += '<td style="text-align: center; width: 5%; font-size: 14px;" class="nazanin">' + row + '</td>';
    ht += '<td style="text-align: center; width: 25%;">' + name + '</td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl; font-size: 14px;" class="nazanin">' + price + '</td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl; font-size: 14px;" class="nazanin">' + cPrice + '</td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl;">' + cat + '</td>';
    ht += '<td style="text-align: center; width: 20%; direction: rtl;">' + detail + '</td>';
    ht += '<td style="text-align: center; width: 5%; direction: rtl;">';
    ht += '<img class="editIco" onclick="editOnePro(' + id + ');" title="ویرایش" alt="ویرایش" src="' + base_url() + 'assets/images/editIco.png">';
    ht += '<img class="editIco" onclick="deleteOnePro(' + id + ');" title="حذف" alt="حذف" src="' + base_url() + 'assets/images/deleteIco.png">';
    ht += '</td>';
    ht += '</tr>';
    return ht;
}

function editOnePro(id)
{
    var load = $('#ajaxLoad');
    load.show();
    $('.contentModel').slideUp();
    loadCat('txtProCatEdit');

    var name = $('#txtProNameEdit');
    var price = $('#txtProPriceEdit');
    var cPrice = $('#txtProCPriceEdit');
    var detail = $('#txtProDetailEdit');
    var cat = $('#txtProCatEdit');

    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#editProMsg').hide();

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/loadOnePro",
            cache: false,
            data: {pId: id}
        }).done(function(Data){
            if(Data.success == 1)
            {
                name.val(Data.pro.name);
                price.val(Data.pro.price);
                cPrice.val(Data.pro.cPrice);
                detail.val(Data.pro.detail);
                setTimeout(function(){
                    cat.val(Data.pro.categories);
                }, 3000);
                $('#editProductContent').slideToggle();
            }
            else
            {
                alert('خطایی رخ داده است، دوباره تلاش کنید.');
            }
            load.hide();
        });
        j--;
    }

    $('#proEdit').unbind('click').bind('click', function(){
        var x = 1;
        if(x > 0)
        {
            if(detail.val().length < 1)
            {
                detail.val('-');
            }
            if(name.val().length > 1 && detail.val().length > 0 && cat.val() > 0)
            {
                // ajax
                var j = 1;
                if(j > 0)
                {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: base_url() + "ajax/editOnePro",
                        cache: false,
                        data: {pId: id, name: name.val(), price: price.val(), cPrice: cPrice.val(), detail: detail.val(), cat: cat.val()}
                    }).done(function(Data){
                        if(Data.success == 1)
                        {
                            $('#editProMsg').show();
                            name.val('');
                            price.val('');
                            cPrice.val('');
                            detail.val('');
                            cat.val(0);
                            productList(1, false);
                        }
                        else
                        {
                            alert('خطایی رخ داده است، دوباره تلاش کنید.');
                        }
                        load.hide();
                    });
                    j--;
                }
            }
            else
            {
                alert('تمامی گزینه ها را تکمیل نمائید.');
            }
            x--;
        }
        //$(this).unbind('click');
    });
}

function deleteOnePro(id)
{
    if(confirm('آیا مایل به حذف این محصول می باشد؟'))
    {
        var load = $('#ajaxLoad');
        $('#proListMsg').hide();
        load.show();

        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/deleteOnePro",
                cache: false,
                data: {delId: id}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#proListMsg').show();
                    setTimeout(function(){
                        $('#proListMsg').hide();
                        productList(1, false);
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش نمائید.');
                }
            });
            j--;
            load.hide();
        }
    }
}

function setting()
{
    var load = $('#ajaxLoad');
    load.show();
    $('#settingProMsg').hide();
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/setting",
            cache: false,
            data: {ld: 1}
        }).done(function(Data){
            if(Data.success == 1)
            {
                $('#txtSite').val(Data.setting.site_title);
                $('#txtEmail').val(Data.setting.site_email);
                $('#txtAdminEmail').val(Data.setting.admin_email);
                $('#txtAddress').val(Data.setting.address);
                $('#txtTel').val(Data.setting.tel);
                $('#txtFax').val(Data.setting.fax);
                $('#txtAbout').val(Data.setting.about_us);
                $('#settingContent').slideDown();
            }
            else
            {
                alert('خطایی رخ داده است، دوباره تلاش کنید.');
            }
            load.hide();

        });
        j--;
    }

    $('#settingBtn').unbind('click').bind('click', function(){
        var x = 1;
        load.show();
        if(x > 0)
        {
            var site = $('#txtSite').val();
            var email = $('#txtEmail').val();
            var aEmail = $('#txtAdminEmail').val();
            var address = $('#txtAddress').val();
            var tel = $('#txtTel').val();
            var fax = $('#txtFax').val();
            var about = $('#txtAbout').val();
            var pass = $('#txtPass').val();
            var passV = $('#txtPassA').val();
            if(site.length > 3 && email.length > 3 && aEmail.length > 3 && address.length > 3 && tel.length > 3 && about.length > 3 && fax.length > 3)
            {
                var con;
                if(pass.length > 0)
                {
                    if(pass.length > 5 && pass == passV)
                    {
                        con = 1;
                    }
                    else
                    {
                        con = 2;
                        alert('رمزعبور و تکرار آن صحیح نمی باشد.')
                        load.hide();
                    }
                }
                else
                {
                    con = 1;
                }
                if(con == 1)
                {
                    // ajax
                    var j = 1;
                    if(j > 0)
                    {
                        $.ajax({
                            dataType: "json",
                            type: "POST",
                            url: base_url() + "ajax/editSetting",
                            cache: false,
                            data: {site: site, email: email, aEmail: aEmail, address: address, tel: tel, about: about, pass: pass, passV: passV, fax: fax}
                        }).done(function(Data){
                            if(Data.success == 1)
                            {
                                $('#settingProMsg').show();
                                setTimeout(function(){
                                    $('#settingProMsg').hide();
                                    setting();
                                }, 3000);
                            }
                            else
                            {
                                alert('خطایی رخ داده است، دوباره تلاش کنید.');
                            }
                            load.hide();

                        });
                        j--;
                    }
                }
            }
            else
            {
                alert('تمامی گزینه ها را تکمیل نمائید.');
            }
            x--;
        }
    });
}

function contactList()
{
    var load = $('#ajaxLoad');
    load.show();
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#contactListMsg').hide();
    var dataNo = '<tr><td style="text-align: center; width: 100%;" colspan="7" class="orang">تا کنون تماسی دریافت نگردیده است.</td></tr>';

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/contactList",
            cache: false,
            data: {ld: 1}
        }).done(function(Data){
            if(Data.success == 1)
            {
                var ht = '';
                var a = 1; //
                $.each(Data.contact, function(i, obj) {
                    ht += returnTrContactBody(a, obj.name, obj.email, obj.site, obj.time, obj.content, obj.id);
                    a++;
                });
                $('#contactListContentBody').html(ht);
            }
            else
            {
                $('#contactListContentBody').html(dataNo);
            }
            load.hide();
            $('#contactListContent').slideToggle();

        });
        j--;
    }
}

function returnTrContactBody(row, name, email, site, time, content, id)
{
    var ht = '<tr>';
    ht += '<td style="text-align: center; width: 5%; font-size: 14px;" class="nazanin">' + row + '</td>';
    ht += '<td style="text-align: center; width: 15%;">' + name + '</td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl;" class="yekan">' + email + '</td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl;" class="yekan">' + site + '</td>';
    ht += '<td style="text-align: center; width: 10%; direction: rtl; font-size: 14px;" class="nazanin">' + time + '</td>';
    ht += '<td style="text-align: center; width: 35%; direction: rtl; text-align: right;">' + content + '</td>';
    ht += '<td style="text-align: center; width: 5%; direction: rtl;">';
    ht += '<img class="editIco" onclick="deleteOneContact(' + id + ');" title="حذف" alt="حذف" src="' + base_url() + 'assets/images/deleteIco.png">';
    ht += '</td>';
    ht += '</tr>';
    return ht;
}

function deleteOneContact(id)
{
    if(confirm('آیا مایل به حذف این تماس می باشید؟'))
    {
        var load = $('#ajaxLoad');
        $('#contactListMsg').hide();
        load.show();

        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/deleteOneContact",
                cache: false,
                data: {delId: id}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#contactListMsg').show();
                    setTimeout(function(){
                        $('#contactListMsg').hide();
                        contactList();
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش نمائید.');
                }
            });
            j--;
            load.hide();
        }
    }
}

function addNewCooperator()
{
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#addCooperatorContent').slideToggle();

    $('#addCooBtn').unbind('click').bind('click', function(){
        var x = 1;
        if(x > 0)
        {
            var load = $('#ajaxLoad');
            $('#addCooMsg').hide();
            load.show();

            var txtCooName = $('#txtCooName');
            var txtCooTel = $('#txtCooTel');
            var txtCooMob = $('#txtCooMob');
            var txtCooEmail = $('#txtCooEmail');
            var txtCooAddress = $('#txtCooAddress');
            var txtCooPostal = $('#txtCooPostal');
            var txtCooUser = $('#txtCooUser');
            var txtCooPass = $('#txtCooPass');

            if(txtCooName.val().length >= 3 && txtCooMob.val().length == 11 && txtCooUser.val().length > 5 && txtCooPass.val().length > 5)
            {
                // ajax
                var j = 1;
                if(j > 0)
                {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: base_url() + "ajax/addNewCooperator",
                        cache: false,
                        data: {txtCooName: txtCooName.val(), txtCooTel: txtCooTel.val(), txtCooMob: txtCooMob.val(),
                                txtCooEmail: txtCooEmail.val(), txtCooAddress: txtCooAddress.val(), txtCooPostal: txtCooPostal.val(),
                                txtCooUser: txtCooUser.val(), txtCooPass: txtCooPass.val()
                                }
                    }).done(function(Data){
                        if(Data.success == 1)
                        {
                            $('#addCooMsg').show();
                        }
                        else
                        {
                            alert('خطایی رخ داده است، دوباره تلاش کنید.');
                        }
                        load.hide();

                    });
                    j--;
                }
            }
            else
            {
                alert('تمامی گزینه ها را تکمیل نمائید.');
                load.hide();
            }
            x--;
        }
    });
}

function cooperatorList()
{
    var load = $('#ajaxLoad');
    load.show();
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#cooListMsg').hide();
    var dataNo = '<tr><td style="text-align: center; width: 100%;" colspan="7" class="orang">همکار مورد نظر با موفقیت حذف گردید.</td></tr>';

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/cooperatorList",
            cache: false,
            data: {ld: 1}
        }).done(function(Data){
            if(Data.success == 1)
            {
                var ht = '';
                var a = 1; //
                $.each(Data.cooperator, function(i, obj) {
                    ht += returnTrCooperatorBody(a, obj.name, obj.mobile, obj.tel, obj.email, obj.username, obj.address, obj.postalCode, obj.id);
                    a++;
                });
                $('#cooListContentBody').html(ht);
            }
            else
            {
                $('#cooListContentBody').html(dataNo);
            }
            load.hide();
            $('#cooperatorListContent').slideToggle();

        });
        j--;
    }
}

function returnTrCooperatorBody(row, name, mobile, tel, email, user, address, postal, id)
{
    var ht = '<tr>';
    ht += '<td style="text-align: center; width: 5%; font-size: 14px;" class="nazanin">' + row + '</td>';
    ht += '<td style="text-align: center; width: 15%;">' + name + '</td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl; text-align: right;" class="yekan">موبایل: <span class="nazanin" style="font-size: 14px;">' + mobile + '</span><br>تلفن: <span class="nazanin" style="font-size: 14px;">' + tel + '</span></td>';
    ht += '<td style="text-align: center; width: 15%; direction: rtl;" class="yekan">' + email + '</td>';
    ht += '<td style="text-align: center; width: 10%; direction: rtl;" class="yekan">' + user + '</td>';
    ht += '<td style="text-align: center; width: 35%; direction: rtl; text-align: right;">آدرس: ' + address + '<br>کدپستی:<span class="nazanin" style="font-size: 14px;">' + postal + '</span></td>';
    ht += '<td style="text-align: center; width: 5%; direction: rtl;">';
    ht += '<img class="editIco" onclick="editOneCoo(' + id + ');" title="ویرایش" alt="ویرایش" src="' + base_url() + 'assets/images/editIco.png">';
    ht += '<img class="editIco" onclick="deleteOneCoo(' + id + ');" title="حذف" alt="حذف" src="' + base_url() + 'assets/images/deleteIco.png">';
    ht += '</td>';
    ht += '</tr>';
    return ht;
}

function editOneCoo(id)
{
    var load = $('#ajaxLoad');
    load.show();
    $('.contentModel').slideUp();

    var txtCooNameEdit = $('#txtCooNameEdit');
    var txtCooTelEdit = $('#txtCooTelEdit');
    var txtCooMobEdit = $('#txtCooMobEdit');
    var txtCooEmailEdit = $('#txtCooEmailEdit');
    var txtCooAddressEdit = $('#txtCooAddressEdit');
    var txtCooPostalEdit = $('#txtCooPostalEdit');
    var txtCooUserEdit = $('#txtCooUserEdit');
    var txtCooPassEdit = $('#txtCooPassEdit');

    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#editCooMsg').hide();

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/loadOneCooperator",
            cache: false,
            data: {cId: id}
        }).done(function(Data){
            if(Data.success == 1)
            {
                txtCooNameEdit.val(Data.cooperator.name);
                txtCooTelEdit.val(Data.cooperator.tel);
                txtCooMobEdit.val(Data.cooperator.mobile);
                txtCooEmailEdit.val(Data.cooperator.email);
                txtCooAddressEdit.val(Data.cooperator.address);
                txtCooPostalEdit.val(Data.cooperator.postalCode);
                txtCooUserEdit.val(Data.cooperator.username);

                $('#editCooperatorContent').slideToggle();
            }
            else
            {
                alert('خطایی رخ داده است، دوباره تلاش کنید.');
            }
            load.hide();
        });
        j--;
    }

    $('#editCooBtn').unbind('click').bind('click', function(){
        var x = 1;
        if(x > 0)
        {
            if(txtCooNameEdit.val().length >= 3 && txtCooMobEdit.val().length == 11)
            {
                // ajax
                var j = 1;
                if(j > 0)
                {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: base_url() + "ajax/editOneCooperator",
                        cache: false,
                        data: {
                            txtCooNameEdit: txtCooNameEdit.val(),
                            txtCooTelEdit: txtCooTelEdit.val(),
                            txtCooMobEdit: txtCooMobEdit.val(),
                            txtCooEmailEdit: txtCooEmailEdit.val(),
                            txtCooAddressEdit: txtCooAddressEdit.val(),
                            txtCooPostalEdit: txtCooPostalEdit.val(),
                            txtCooPassEdit: txtCooPassEdit.val(),
                            cId: id
                        }
                    }).done(function(Data){
                        if(Data.success == 1)
                        {
                            $('#editCooMsg').show();
                        }
                        else
                        {
                            alert('خطایی رخ داده است، دوباره تلاش کنید.');
                        }
                        load.hide();
                    });
                    j--;
                }
            }
            else
            {
                alert('تمامی گزینه ها را تکمیل نمائید.');
            }
            x--;
        }
    });
}

function deleteOneCoo(id)
{
    if(confirm('آیا مایل به حذف این همکار می باشید؟'))
    {
        var load = $('#ajaxLoad');
        $('#cooListMsg').hide();
        load.show();

        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/deleteOneCooperator",
                cache: false,
                data: {delId: id}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#cooListMsg').show();
                    setTimeout(function(){
                        $('#cooListMsg').hide();
                        cooperatorList();
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش نمائید.');
                }
            });
            j--;
            load.hide();
        }
    }
}

function sliderList()
{
    var load = $('#ajaxLoad');
    load.show();
    $('.contentModel').slideUp();
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy()
    }
    $('#sliderListMsg').hide();
    $('#addSlideForm').hide();
    $('#sliderAddMsg').hide();
    var dataNo = '<tr><td style="text-align: center; width: 100%;" colspan="5" class="orang">تا کنون تصویری درج نشده است.</td></tr>';

    // ajax
    var j = 1;
    if(j > 0)
    {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url() + "ajax/sliderList",
            cache: false,
            data: {ld: 1}
        }).done(function(Data){
            if(Data.success == 1)
            {
                var ht = '';
                var a = 1; //
                $.each(Data.slider, function(i, obj) {
                    ht += returnTrSliderBody(a, obj.picture, obj.title, obj.link, obj.id);
                    a++;
                });
                $('#sliderListContentBody').html(ht);
            }
            else
            {
                $('#sliderListContentBody').html(dataNo);
            }
            load.hide();
            $('#sliderListContent').slideToggle();

        });
        j--;
    }
}

function returnTrSliderBody(row, picture, title, link, id)
{
    var ht = '<tr>';
    ht += '<td style="text-align: center; width: 5%; font-size: 14px;" class="nazanin">' + row + '</td>';
    ht += '<td style="text-align: center; width: 20%;"><img style="width: 200px;" src="' + base_url() + 'assets/images/upload/thumb/' + picture + '"></td>';
    ht += '<td style="text-align: center; width: 40%; direction: rtl; text-align: right;" class="yekan">' + title + '</td>';
    ht += '<td style="text-align: center; width: 25%; direction: ltr;" class="yekan">' + link + '</td>';
    ht += '<td style="text-align: center; width: 10%; direction: rtl;">';
    ht += '<img class="editIco" onclick="deleteOneSlide(' + id + ');" title="حذف" alt="حذف" src="' + base_url() + 'assets/images/deleteIco.png">';
    ht += '</td>';
    ht += '</tr>';
    return ht;
}

function deleteOneSlide(id)
{
    if(confirm('آیا مایل به حذف این تصویر می باشد؟'))
    {
        var load = $('#ajaxLoad');
        $('#sliderListMsg').hide();
        load.show();

        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/deleteOneSlide",
                cache: false,
                data: {delId: id}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#sliderListMsg').show();
                    setTimeout(function(){
                        $('#sliderListMsg').hide();
                        sliderList();
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش نمائید.');
                }
            });
            j--;
            load.hide();
        }
    }
}

function closeAddSlide()
{
    $('#addSlideFile').val('');
    $('#addSlideTitle').val('');
    $('#addSlideLink').val('');
    $('#addSlideForm').slideToggle('slow');
}

function addNewSlide()
{
    var load = $('#ajaxLoad');
    $('#sliderAddMsg').hide();
    load.show();

    var addSlideFile = $('#addSlideFile');
    var addSlideTitle = $('#addSlideTitle');
    var addSlideLink = $('#addSlideLink');

    if(addSlideFile.val().length >= 10)
    {
        // ajax
        var j = 1;
        if(j > 0)
        {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url() + "ajax/addNewSlide",
                cache: false,
                data: {addSlideFile: addSlideFile.val(), addSlideTitle: addSlideTitle.val(), addSlideLink: addSlideLink.val()}
            }).done(function(Data){
                if(Data.success == 1)
                {
                    $('#sliderAddMsg').show();
                    setTimeout(function () {
                        closeAddSlide();
                        $('#sliderAddMsg').hide();
                        sliderList();
                    }, 3000);
                }
                else
                {
                    alert('خطایی رخ داده است، دوباره تلاش کنید.');
                }
                load.hide();

            });
            j--;
        }
    }
    else
    {
        alert('تمامی گزینه ها را تکمیل نمائید.');
        load.hide();
    }
}
