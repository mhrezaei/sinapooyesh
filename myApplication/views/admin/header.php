<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت سامانه سینا پویش</title>
<link type="text/css" rel="stylesheet" href="<?php echo assets_url(); ?>css/admin/style.css">
<script type="text/javascript" src="<?php echo assets_url(); ?>js/admin/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>js/admin/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>js/admin/doc.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>js/admin/admin.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>ckeditor/ckeditor.js"></script>
</head>
<body>

<div class="body_style">
    <div class="menu">
    <a href="<?php echo site_url(); ?>admin" class="logo"></a>
    </div>
    <div class="nav">
        <ul>
            <li class="active" onclick="changeUrl('<?php echo site_url(); ?>admin');">
                <div class="fix">
                    <span class="ico"><img src="<?php echo assets_url(); ?>images/ico1.png"></span>
                    <span class="value">مدیریت</span>
                </div>
             </li>
            <li>
                <div class="fix">
                    <span class="ico"><img src="<?php echo assets_url(); ?>images/ico2.png"></span>
                    <span class="value">مدیریت صفحات اصلی</span>
                </div>
                <ul>
                    <li><a href="#" onclick="editPageContent(1);">درباره ما</a></li>
                    <li><a href="#" onclick="editPageContent(3);">تماس با ما</a></li>
                    <li><a href="#" onclick="editPageContent(2);">گواهینامه ها</a></li>
                </ul>
            </li>
            <li>
            <div class="fix">
                <span class="ico"><img src="<?php echo assets_url(); ?>images/ico3.png"></span>
                <span class="value">مدیریت محصولات</span>
            </div>
                <ul>
                    <li><a href="#" onclick="editCatContent();">دسته بندی ها</a></li>
                    <li><a href="#" onclick="productList(1, true);">محصولات</a></li>
                    <li><a href="#" onclick="addProductOpen();">افزودن محصول</a></li>
                </ul>
            </li>
            <li onclick="sliderList();">
            <div class="fix">
                <span class="ico"><img src="<?php echo assets_url(); ?>images/ico4.png"></span>
                <span class="value">اسلایدر</span>
            </div>
            </li>
            <li>
            <div class="fix">
                 <span class="ico"><img src="<?php echo assets_url(); ?>images/ico5.png"></span>
                <span class="value">پیام ها</span>
            </div>
                <ul>
                    <li><a href="#" onclick="contactList();">پیام های دریافتی</a></li>
                </ul>
            </li>
            <li>
            <div class="fix">
                 <span class="ico"><img src="<?php echo assets_url(); ?>images/ico6.png"></span>
                <span class="value">همکاران</span>
            </div>
                <ul>
                    <li><a href="#" onclick="cooperatorList();">لیست همکاران</a></li>
                    <li><a href="#" onclick="addNewCooperator();">افزودن همکار</a></li>
                </ul>
            </li>
            <li onclick="setting();">
            <div class="fix">
                <span class="ico"><img src="<?php echo assets_url(); ?>images/ico7.png"></span>
                <span class="value">تنظیمات</span>
            </div>
            </li>
        </ul>
    </div>
    
    <div class="content">
    
    
    <ul data-collapse="collapse" class="quick">
        <li>
            <a href="#" onclick="changeUrl('<?php echo site_url(); ?>admin');">
                <img alt="" src="<?php echo assets_url(); ?>images/order-149.png">
                <span class="nazanin" style="font-size: 14px; line-height: 20px; direction: rtl;">صفحه اصلی مدیریت</span>
            </a>
        </li>
        <li>
            <a href="#" onclick="setting();">
                <img alt="" src="<?php echo assets_url(); ?>images/my-account.png">
                <span class="nazanin" style="font-size: 14px; line-height: 20px; direction: rtl;">تنظیمات</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img alt="" src="<?php echo assets_url(); ?>images/full-time.png">
                <span class="nazanin" style="font-size: 14px; line-height: 20px; direction: rtl;"><?php echo pdate('H:i a'); ?></span>
            </a>
        </li>
        <li>
            <a href="#">
                <img alt="" src="<?php echo assets_url(); ?>images/date.png">
                <span class="nazanin" style="font-size: 14px; line-height: 20px; direction: rtl;"><?php echo pdate('l، d M Y'); ?></span>
            </a>
        </li>
        <li>
            <a href="#" onclick="changeUrl('<?php echo site_url(); ?>admin/log_out');">
                <img alt="" src="<?php echo assets_url(); ?>images/lock.png">
                <span>خروج</span>
            </a>
        </li>
    </ul>