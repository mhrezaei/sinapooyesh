<div style="width: 100%; height: 40px; margin: 0 auto; text-align: center; margin-top: 25px;">
    <span id="ajaxLoad" style="display: none;">
        شکیبا باشید...
        <br>
        <img src="<?php echo assets_url(); ?>images/load.gif" alt="load">
    </span>
</div>

<div class="contentModel" id="welcomeMsg">
    <h2>اطلاعات ورود</h2>

    <div class="mainDiv nazanin" style="text-align: right; min-height: 100px; font-size: 14px;">
        به بخش مدیریت خوش آمدید.
        <br>
        آخرین ورود موفق شما به سامانه: <span style="font-weight: bold;"><?php echo pdate('l، j F Y', time()); ?></span>
    </div>
</div>

<!-- edit page start -->
<div class="contentModel" id="editPageContent" style="display: none;">
    <h2>ویرایش صفحات اصلی</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">
        <input type="text" class="fild" name="txtTitle" id="txtTitle" style="width: 500px;" disabled="disabled">
        <input type="hidden" class="fild" name="txtId" id="txtId" value="">
        <br> <br>
        <textarea class="fild" rows="15" style="height: 800px;" id="editPage" name="txtContent"></textarea>
        <a xmlns="http://www.w3.org/1999/xhtml" onclick="window.open('<?php echo site_url() . 'admin/uploadImages'; ?>','popup','width=550,height=250,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=0'); return false" href="<?php echo site_url() . 'admin/uploadImages'; ?>" style="font-size:14px;">افزودن تصویر</a>
        <br><br>

        <button class="btn b4" type="button" name="submit" value="submit" style="float: left;" onclick="changeUrl('<?php echo site_url(); ?>admin');">انصراف</button>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" onclick="editPage();">ثبت اطلاعات</button>
        <span style="font-family: BYekan; color: green; display: none;" id="editPageContentMsg">اطلاعات با موفقیت ذخیره گردید.</span>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- edit page end -->

<!-- edit categories start -->
<div class="contentModel" id="editCatContent" style="display: none;">
    <h2>دسته بندی ها</h2>

    <div class="mainDiv" style="text-align: center; min-height: 100px;">

        <span style="color: green; display: none;" class="yekan" id="editCatMsg">دسته بندی مورد نظر با موفقیت حذف گردید.</span>
        <span style="color: green; display: none;" class="yekan" id="editCatMsg2">دسته بندی مورد نظر با موفقیت ویرایش گردید.</span>
        <span style="color: green; display: none;" class="yekan" id="editCatMsg3">دسته بندی مورد نظر با موفقیت اضافه گردید.</span>

        <div style="width: 100%; height: 80px; margin: 0 auto; text-align: center; margin-top: 25px; display: none;" id="catForm">
            <input type="text" class="fild" style="width: 300px; height: 26px;" name="editCatTitle" id="editCatTitle" placeholder="نام دسته بندی">
            <button class="btn b3" type="button" name="submit" value="submit" style="" id="editCatBtn">ثبت اطلاعات</button>
            <button class="btn b4" type="button" name="submit" value="submit" style="" onclick="editClose();">انصراف</button>
        </div>

        <div style="width: 100%; height: 80px; margin: 0 auto; text-align: center; margin-top: 25px; display: none;" id="addCatForm">
            <input type="text" class="fild" style="width: 260px; height: 26px;" name="addCatTitle" id="addCatTitle" placeholder="نام دسته بندی">
            <select class="fild" style="width: 150px; height: 36px;" id="addCatSub">
                <option value="0">دسته بندی...</option>
                <option value="4">دستگاه</option>
                <option value="3">کیت</option>
                <option value="2">مواد مصرفی</option>
                <option value="1">مواد شیمیایی</option>
            </select>
            <button class="btn b3" type="button" name="submit" value="submit" style="" id="addCatBtn" onclick="addNewCat();">افزودن دسته بندی</button>
            <button class="btn b4" type="button" name="submit" value="submit" style="" onclick="addClose();">انصراف</button>
        </div>
        
        <table style="direction: rtl; font-size: 12px; margin: 0 auto; width: 600px;" class="yekan">
            <thead>
                <tr>
                    <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="4">دستگاه</th>
                </tr>
                <tr>
                    <th style="text-align: center; width: 10%;">ردیف</th>
                    <th style="text-align: center; width: 35%;">نام دسته بندی</th>
                    <th style="text-align: center; width: 25%; direction: rtl;">تعداد محصولات</th>
                    <th style="text-align: center; width: 30%; direction: rtl;">عملیات</th>
                </tr>
            </thead>
            <tbody id="deviceCont">
            
            </tbody>
        </table>
        
        <table style="direction: rtl; font-size: 12px; margin: 0 auto; margin-top: 15px; width: 600px;" class="yekan">
            <thead>
                <tr>
                    <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="4">کیت</th>
                </tr>
                <tr>
                    <th style="text-align: center; width: 10%;">ردیف</th>
                    <th style="text-align: center; width: 35%;">نام دسته بندی</th>
                    <th style="text-align: center; width: 25%; direction: rtl;">تعداد محصولات</th>
                    <th style="text-align: center; width: 30%; direction: rtl;">عملیات</th>
                </tr>
            </thead>
            <tbody id="kitCont">

            </tbody>
        </table>
        
        <table style="direction: rtl; font-size: 12px; margin: 0 auto; margin-top: 15px; width: 600px;" class="yekan">
            <thead>
                <tr>
                    <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="4">مواد مصرفی</th>
                </tr>
                <tr>
                    <th style="text-align: center; width: 10%;">ردیف</th>
                    <th style="text-align: center; width: 35%;">نام دسته بندی</th>
                    <th style="text-align: center; width: 25%; direction: rtl;">تعداد محصولات</th>
                    <th style="text-align: center; width: 30%; direction: rtl;">عملیات</th>
                </tr>
            </thead>
            <tbody id="consumableCont">

            </tbody>
        </table>
        
        <table style="direction: rtl; font-size: 12px; margin: 0 auto; margin-top: 15px; width: 600px;" class="yekan">
            <thead>
                <tr>
                    <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="4">مواد شیمیایی</th>
                </tr>
                <tr>
                    <th style="text-align: center; width: 10%;">ردیف</th>
                    <th style="text-align: center; width: 35%;">نام دسته بندی</th>
                    <th style="text-align: center; width: 25%; direction: rtl;">تعداد محصولات</th>
                    <th style="text-align: center; width: 30%; direction: rtl;">عملیات</th>
                </tr>
            </thead>
            <tbody id="chemicalCont">

            </tbody>
        </table>

        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" onclick="addClose();">دسته بندی جدید</button>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- edit categories stop -->

<!-- add product start -->
<div class="contentModel" id="addProductContent" style="display: none;">
    <h2>افزودن محصول</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center; padding-bottom: 10px;">
            <span style="color: green; display: none;" class="yekan" id="addProMsg">محصول مورد نظر با موفقیت ثبت گردید.</span><br>
        </div>

        <div style="width: 100px; float: right;">
            <label for="txtProName" style="line-height: 28px;">نام محصول:</label>
        </div>
        <input type="text" class="fild" name="txtProName" id="txtProName" style="width: 500px; float: right;" placeholder="نام محصول"><small style="line-height: 30px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProPrice" style="line-height: 28px;">قیمت مصرف کننده:</label>
        </div>
        <input type="text" class="fild" name="txtProPrice" id="txtProPrice" style="width: 500px;" placeholder="قیمت مصرف کننده (ریال)"><small style="line-height: 20px; color: #D13939;"></small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProCPrice" style="line-height: 28px;">قیمت همکار:</label>
        </div>
        <input type="text" class="fild" name="txtProCPrice" id="txtProCPrice" style="width: 500px;" placeholder="قیمت همکار (ریال)"><small style="line-height: 20px; color: #D13939;"></small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProDetail" style="line-height: 28px;">توضیحات:</label>
        </div>
        <input type="text" class="fild" name="txtProDetail" id="txtProDetail" style="width: 500px;" placeholder="توضیحات محصول">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProCat" style="line-height: 28px;">دسته بندی:</label>
        </div>
        <select class="fild" name="txtProCat" id="txtProCat" style="width: 510px;">
            <option value="0" >انتخاب کنید...</option>
        </select><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>


        <button class="btn b4" type="button" name="submit" value="submit" style="float: left;" onclick="changeUrl('<?php echo site_url(); ?>admin');">انصراف</button>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" onclick="addNewProduct();">افزودن محصول</button>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- add product end -->


<!-- product list start -->
<div class="contentModel" id="productListContent" style="display: none;">
    <h2>لیست محصولات</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center;">
            <span style="color: green; display: none;" class="yekan" id="proListMsg">محصول مورد نظر با موفقیت حذف گردید.</span><br>
        </div>

        <div style="width: 60px; float: right; line-height: 35px;">
            <label for="txtCatFilter" style="line-height: 28px;">فیلتر کردن:</label>
        </div>
        <select class="fild" name="txtCatFilter" id="txtCatFilter" style="width: 250px;" onchange="productList(1, false);">
            <option value="0" >انتخاب کنید...</option>
        </select>

        <div style="clear: both; margin-bottom: 20px;"></div>

        <table style="direction: rtl; font-size: 12px; margin: 0 auto; width: 95%;" class="yekan">
            <thead>
            <tr>
                <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="7">لیست محصولات</th>
            </tr>
            <tr>
                <th style="text-align: center; width: 5%;">ردیف</th>
                <th style="text-align: center; width: 25%;">نام محصول</th>
                <th style="text-align: center; width: 15%; direction: rtl;">قیمت مصرف کننده <small>(ريال)</small></th>
                <th style="text-align: center; width: 15%; direction: rtl;">قیمت همکار<small>(ريال)</small></th>
                <th style="text-align: center; width: 15%; direction: rtl;">دسته بندی</th>
                <th style="text-align: center; width: 20%; direction: rtl;">توضیحات</th>
                <th style="text-align: center; width: 5%; direction: rtl;">عملیات</th>
            </tr>
            </thead>
            <tbody id="productListContentBody">
                <tr>
                    <td style="text-align: center; width: 100%;" colspan="7" class="orang">تا کنون محصولی اضافه نگردیده است.</td>
                </tr>
            </tbody>
        </table>

        <div style="clear: both; margin-bottom: 20px;"></div>

        <div style="width: 100%; margin: 0 auto; text-align: center" id="productListPageNumber">

        </div>

    </div>
</div>
<!-- product list end -->

<!-- edit product start -->
<div class="contentModel" id="editProductContent" style="display: none;">
    <h2>ویرایش محصول</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center; padding-bottom: 10px;">
            <span style="color: green; display: none;" class="yekan" id="editProMsg">محصول مورد نظر با موفقیت ویرایش گردید.</span><br>
        </div>

        <div style="width: 100px; float: right;">
            <label for="txtProNameEdit" style="line-height: 28px;">نام محصول:</label>
        </div>
        <input type="text" class="fild" name="txtProNameEdit" id="txtProNameEdit" style="width: 500px; float: right;" placeholder="نام محصول"><small style="line-height: 30px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProPriceEdit" style="line-height: 28px;">قیمت مصرف کننده:</label>
        </div>
        <input type="text" class="fild" name="txtProPriceEdit" id="txtProPriceEdit" style="width: 500px;" placeholder="قیمت مصرف کننده (ریال)"><small style="line-height: 20px; color: #D13939;"></small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProCPriceEdit" style="line-height: 28px;">قیمت همکار:</label>
        </div>
        <input type="text" class="fild" name="txtProCPriceEdit" id="txtProCPriceEdit" style="width: 500px;" placeholder="قیمت همکار (ریال)"><small style="line-height: 20px; color: #D13939;"></small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProDetailEdit" style="line-height: 28px;">توضیحات:</label>
        </div>
        <input type="text" class="fild" name="txtProDetailEdit" id="txtProDetailEdit" style="width: 500px;" placeholder="توضیحات محصول">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtProCatEdit" style="line-height: 28px;">دسته بندی:</label>
        </div>
        <select class="fild" name="txtProCatEdit" id="txtProCatEdit" style="width: 510px;">
            <option value="0" >انتخاب کنید...</option>
        </select><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>


        <button class="btn b4" type="button" name="submit" value="submit" style="float: left;" onclick="productList(1, false);">انصراف</button>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" id="proEdit">ویرایش محصول</button>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- edit product end -->

<!-- setting start -->
<div class="contentModel" id="settingContent" style="display: none;">
    <h2>تنظیمات</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center; padding-bottom: 10px;">
            <span style="color: green; display: none;" class="yekan" id="settingProMsg">تنظیمات جدید با موفقیت ذخیره گردید.</span><br>
        </div>

        <div style="width: 100px; float: right;">
            <label for="txtSite" style="line-height: 28px;">عنوان سایت:</label>
        </div>
        <input type="text" class="fild" name="txtSite" id="txtSite" style="width: 500px; float: right;" placeholder="عنوان سایت"><small style="line-height: 30px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtEmail" style="line-height: 28px;">ایمیل سایت:</label>
        </div>
        <input type="text" class="fild" name="txtEmail" id="txtEmail" style="width: 500px; direction: ltr;" placeholder="E-mail"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtAdminEmail" style="line-height: 28px;">ایمیل مدیریت:</label>
        </div>
        <input type="text" class="fild" name="txtAdminEmail" id="txtAdminEmail" style="width: 500px; direction: ltr;" placeholder="E-mail"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtAddress" style="line-height: 28px;">آدرس:</label>
        </div>
        <input type="text" class="fild" name="txtAddress" id="txtAddress" style="width: 500px;" placeholder="آدرس"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtTel" style="line-height: 28px;">شماره تماس:</label>
        </div>
        <input type="text" class="fild" name="txtTel" id="txtTel" style="width: 500px;" placeholder="شماره تماس"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtFax" style="line-height: 28px;">شماره فکس:</label>
        </div>
        <input type="text" class="fild" name="txtFax" id="txtFax" style="width: 500px;" placeholder="شماره فکس"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtAbout" style="line-height: 28px;">درباره ما:</label>
        </div>
        <input type="text" class="fild" name="txtAbout" id="txtAbout" style="width: 500px;" placeholder="درباره ما"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtPass" style="line-height: 28px;">رمزعبور:</label>
        </div>
        <input type="password" class="fild" name="txtPass" id="txtPass" style="width: 500px;" placeholder="رمز عبور"><small style="line-height: 20px;">(درصورت وارد نمودن رمز، جایگزین رمز عبور قبلی می گردد.)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtPassA" style="line-height: 28px;">تکرار رمزعبور:</label>
        </div>
        <input type="password" class="fild" name="txtPassA" id="txtPassA" style="width: 500px;" placeholder="تکرار رمز عبور">

        <div style="clear: both;"></div>


        <button class="btn b4" type="button" name="submit" value="submit" style="float: left;" onclick="changeUrl('<?php echo site_url(); ?>admin');">انصراف</button>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" id="settingBtn">ذخیره تنظیمات</button>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- setting end -->

<!-- contact start -->
<div class="contentModel" id="contactListContent" style="display: none;">
    <h2>لیست تماس ها</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center;">
            <span style="color: green; display: none;" class="yekan" id="contactListMsg">تماس دریافتی با موفقیت حذف گردید.</span><br>
        </div>

        <table style="direction: rtl; font-size: 12px; margin: 0 auto; width: 95%;" class="yekan">
            <thead>
            <tr>
                <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="7">لیست تماس ها</th>
            </tr>
            <tr>
                <th style="text-align: center; width: 5%;">ردیف</th>
                <th style="text-align: center; width: 15%;">نام </th>
                <th style="text-align: center; width: 15%; direction: rtl;">ایمیل</th>
                <th style="text-align: center; width: 15%; direction: rtl;">سایت</th>
                <th style="text-align: center; width: 10%; direction: rtl;">تاریخ</th>
                <th style="text-align: center; width: 35%; direction: rtl; text-align: right;">متن</th>
                <th style="text-align: center; width: 5%; direction: rtl;">عملیات</th>
            </tr>
            </thead>
            <tbody id="contactListContentBody">
            <tr>
                <td style="text-align: center; width: 100%;" colspan="7" class="orang">تا کنون تماسی دریافت نگردیده است.</td>
            </tr>
            </tbody>
        </table>

        <div style="clear: both; margin-bottom: 20px;"></div>

    </div>
</div>
<!-- contact end -->

<!-- add cooperator start -->
<div class="contentModel" id="addCooperatorContent" style="display: none;">
    <h2>افزودن همکار</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center; padding-bottom: 10px;">
            <span style="color: green; display: none;" class="yekan" id="addCooMsg">همکار جدید با موفقیت اضافه گردید.</span><br>
        </div>

        <div style="width: 100px; float: right;">
            <label for="txtCooName" style="line-height: 28px;">نام:</label>
        </div>
        <input type="text" class="fild" name="txtCooName" id="txtCooName" style="width: 500px; float: right;" placeholder="نام همکار"><small style="line-height: 30px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooTel" style="line-height: 28px;">شماره تماس:</label>
        </div>
        <input type="text" class="fild" name="txtCooTel" id="txtCooTel" style="width: 500px;" placeholder="شماره تماس">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooMob" style="line-height: 28px;">موبایل:</label>
        </div>
        <input type="text" class="fild" name="txtCooMob" id="txtCooMob" style="width: 500px;" placeholder="موبایل"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooEmail" style="line-height: 28px;">ایمیل:</label>
        </div>
        <input type="text" class="fild" name="txtCooEmail" id="txtCooEmail" style="width: 500px; text-align: left;" placeholder="ایمیل">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooAddress" style="line-height: 28px;">آدرس:</label>
        </div>
        <input type="text" class="fild" name="txtCooAddress" id="txtCooAddress" style="width: 500px;" placeholder="آدرس">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooPostal" style="line-height: 28px;">کدپستی:</label>
        </div>
        <input type="text" class="fild" name="txtCooPostal" id="txtCooPostal" style="width: 500px;" placeholder="کدپستی">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooUser" style="line-height: 28px;">نام کاربری:</label>
        </div>
        <input type="text" class="fild" name="txtCooUser" id="txtCooUser" style="width: 500px; text-align: left;" placeholder="نام کاربری (با حروف انگلیسی)"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooPass" style="line-height: 28px;">رمز عبور:</label>
        </div>
        <input type="text" class="fild" name="txtCooPass" id="txtCooPass" style="width: 500px; text-align: left;" placeholder="رمز عبور"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>


        <button class="btn b4" type="button" name="submit" value="submit" style="float: left;" onclick="changeUrl('<?php echo site_url(); ?>admin');">انصراف</button>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" id="addCooBtn">افزودن همکار جدید</button>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- add cooperator end -->

<!-- cooperator list start -->
<div class="contentModel" id="cooperatorListContent" style="display: none;">
    <h2>لیست همکاران</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center;">
            <span style="color: green; display: none;" class="yekan" id="cooListMsg">همکار مورد نظر با موفقیت حذف گردید.</span><br>
        </div>

        <table style="direction: rtl; font-size: 12px; margin: 0 auto; width: 95%;" class="yekan">
            <thead>
            <tr>
                <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="7">لیست همکاران</th>
            </tr>
            <tr>
                <th style="text-align: center; width: 5%;">ردیف</th>
                <th style="text-align: center; width: 15%;">نام </th>
                <th style="text-align: center; width: 15%; direction: rtl; text-align: right;">شماره تماس</th>
                <th style="text-align: center; width: 15%; direction: rtl;">ایمیل</th>
                <th style="text-align: center; width: 10%; direction: rtl;">نام کاربری</th>
                <th style="text-align: center; width: 35%; direction: rtl; text-align: right;">آدرس</th>
                <th style="text-align: center; width: 5%; direction: rtl;">عملیات</th>
            </tr>
            </thead>
            <tbody id="cooListContentBody">
            <tr>
                <td style="text-align: center; width: 100%;" colspan="7" class="orang">تا کنون همکاری اضافه نگردیده است.</td>
            </tr>
            </tbody>
        </table>

        <div style="clear: both; margin-bottom: 20px;"></div>

    </div>
</div>
<!-- cooperator list end -->

<!-- edit cooperator start -->
<div class="contentModel" id="editCooperatorContent" style="display: none;">
    <h2>ویرایش همکار</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center; padding-bottom: 10px;">
            <span style="color: green; display: none;" class="yekan" id="editCooMsg">همکار مورد نظر با موفقیت ویرایش گردید.</span><br>
        </div>

        <div style="width: 100px; float: right;">
            <label for="txtCooNameEdit" style="line-height: 28px;">نام:</label>
        </div>
        <input type="text" class="fild" name="txtCooNameEdit" id="txtCooNameEdit" style="width: 500px; float: right;" placeholder="نام همکار"><small style="line-height: 30px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooTelEdit" style="line-height: 28px;">شماره تماس:</label>
        </div>
        <input type="text" class="fild" name="txtCooTelEdit" id="txtCooTelEdit" style="width: 500px;" placeholder="شماره تماس">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooMobEdit" style="line-height: 28px;">موبایل:</label>
        </div>
        <input type="text" class="fild" name="txtCooMobEdit" id="txtCooMobEdit" style="width: 500px;" placeholder="موبایل"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooEmailEdit" style="line-height: 28px;">ایمیل:</label>
        </div>
        <input type="text" class="fild" name="txtCooEmailEdit" id="txtCooEmailEdit" style="width: 500px; text-align: left;" placeholder="ایمیل">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooAddressEdit" style="line-height: 28px;">آدرس:</label>
        </div>
        <input type="text" class="fild" name="txtCooAddressEdit" id="txtCooAddressEdit" style="width: 500px;" placeholder="آدرس">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooPostalEdit" style="line-height: 28px;">کدپستی:</label>
        </div>
        <input type="text" class="fild" name="txtCooPostalEdit" id="txtCooPostalEdit" style="width: 500px;" placeholder="کدپستی">

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooUserEdit" style="line-height: 28px;">نام کاربری:</label>
        </div>
        <input type="text" class="fild" name="txtCooUserEdit" id="txtCooUserEdit" style="width: 500px; text-align: left;" disabled="disabled" placeholder="نام کاربری (با حروف انگلیسی)"><small style="line-height: 20px; color: #D13939;">(غیر قابل تغییر)</small>

        <div style="clear: both;"></div>

        <div style="width: 100px; float: right;">
            <label for="txtCooPassEdit" style="line-height: 28px;">رمز عبور:</label>
        </div>
        <input type="text" class="fild" name="txtCooPassEdit" id="txtCooPassEdit" style="width: 500px; text-align: left;" placeholder="رمز عبور"><small style="line-height: 20px; color: #D13939;">(در صورت وارد نمودن، جایگزین رمز قبلی می گردد.)</small>

        <div style="clear: both;"></div>


        <button class="btn b4" type="button" name="submit" value="submit" style="float: left;" onclick="cooperatorList();">انصراف</button>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" id="editCooBtn">ویرایش همکار</button>

        <div style="clear: both;"></div>
    </div>
</div>
<!-- edit cooperator end -->

<!-- slider list start -->
<div class="contentModel" id="sliderListContent" style="display: none;">
    <h2>تصاویر اسلایدر</h2>

    <div class="mainDiv" style="text-align: right; min-height: 100px;">

        <div style="width: 100%; margin: 0 auto; text-align: center;">
            <span style="color: green; display: none;" class="yekan" id="sliderListMsg">تصویر مورد نظر با موفقیت حذف گردید.</span><br>
            <span style="color: green; display: none;" class="yekan" id="sliderAddMsg">تصویر مورد نظر با موفقیت اضافه گردید.</span><br>
        </div>

        <div style="width: 100%; height: 180px; margin: 0 auto; text-align: center; margin-top: 25px; display: none; margin-bottom: 25px;" id="addSlideForm">
            <input type="text" class="fild" style="width: 400px; height: 26px;" name="addSlideFile" id="addSlideFile" placeholder="نام فایل"><small style="line-height: 20px; color: #D13939;">(اجباری)</small>

            <br>

            <input type="text" class="fild" style="width: 400px; height: 26px;" name="addSlideTitle" id="addSlideTitle" placeholder="توضیحات کوتاه"><small style="line-height: 20px; color: #D13939;">(اختیاری)</small>

            <br>

            <input type="text" class="fild" style="width: 400px; height: 26px;" name="addSlideLink" id="addSlideLink" placeholder="لینک تصویر"><small style="line-height: 20px; color: #D13939;">(اختیاری)</small>

            <br>

            <span class="yekan" style="color: #ad6704;" >توجه: سایز تصویر اسلاید می بایست 1920x690 px باشد.</span>

            <br style="margin-bottom: 20px;">

            <button class="btn b3" type="button" name="submit" value="submit" style="" id="addCatBtn" onclick="addNewSlide();">افزودن تصویر</button>
            <button class="btn" type="button" name="submit" value="submit" style="" xmlns="http://www.w3.org/1999/xhtml" onclick="window.open('<?php echo site_url() . 'admin/uploadImages'; ?>','popup','width=550,height=250,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=0'); return false">آپلود تصویر</button>
            <button class="btn b4" type="button" name="submit" value="submit" style="" onclick="closeAddSlide();">انصراف</button>
        </div>

        <table style="direction: rtl; font-size: 12px; margin: 0 auto; width: 95%;" class="yekan">
            <thead>
            <tr>
                <th style="text-align: center; background: #cecece; font-size: 14px; direction: rtl;" colspan="5">تصاویر اسلایدر</th>
            </tr>
            <tr>
                <th style="text-align: center; width: 5%;">ردیف</th>
                <th style="text-align: center; width: 20%;">تصویر </th>
                <th style="text-align: center; width: 40%; direction: rtl; text-align: right;">توضیحات</th>
                <th style="text-align: center; width: 25%; direction: ltr;">لینک</th>
                <th style="text-align: center; width: 10%;">عملیات</th>
            </tr>
            </thead>
            <tbody id="sliderListContentBody">
            <tr>
                <td style="text-align: center; width: 100%;" colspan="5" class="orang">تا کنون تصویری درج نشده است.</td>
            </tr>
            </tbody>
        </table>

        <div style="clear: both; margin-bottom: 20px;"></div>
        <button class="btn b3" type="button" name="submit" value="submit" style="float: left;" onclick="closeAddSlide();">افزودن اسلاید</button>
        <div style="clear: both; margin-bottom: 20px;"></div>

    </div>
</div>
<!-- slider list end -->
