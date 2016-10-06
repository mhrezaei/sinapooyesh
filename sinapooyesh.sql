-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2015 at 10:35 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sinapooyesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhr_categories`
--

CREATE TABLE IF NOT EXISTS `mhr_categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `pId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `res1` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res2` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_categories`
--

INSERT INTO `mhr_categories` (`id`, `title`, `pId`, `status`, `res1`, `res2`) VALUES
(1, 'مواد شیمیایی', 0, 1, NULL, NULL),
(2, 'مواد مصرفی', 0, 1, NULL, NULL),
(3, 'کیت', 0, 1, NULL, NULL),
(4, 'دستگاه', 0, 1, NULL, NULL),
(5, 'محصولات انیسان', 1, 1, NULL, NULL),
(6, 'محصولات ارگن تک (الایزا)', 1, 1, NULL, NULL),
(7, 'محصولات ترینیتی', 1, 1, NULL, NULL),
(8, 'محصولات بهار افشان', 1, 1, NULL, NULL),
(9, 'محصولات پادتن طب', 1, 1, NULL, NULL),
(10, 'محصولات بایورکسز', 2, 1, NULL, NULL),
(11, 'محصولات بیوسیستم', 2, 1, NULL, NULL),
(12, 'محصولات دارواش', 2, 1, NULL, NULL),
(13, 'محصولات کیمیا پژوهان', 2, 1, NULL, NULL),
(14, 'محصولات روز آزمون', 2, 1, NULL, NULL),
(15, 'محصولات سینا ژن', 3, 1, NULL, NULL),
(16, 'محصولات اروم تجهیز', 3, 1, NULL, NULL),
(17, 'محصولات صبا', 3, 1, NULL, NULL),
(18, 'محصولات زیست شیمی', 3, 1, NULL, NULL),
(19, 'محصولات دی آر جی', 3, 1, NULL, NULL),
(20, 'محصولات فیشر', 4, 1, NULL, NULL),
(21, 'محصولات پارس آزمون', 4, 1, NULL, NULL),
(22, 'محصولات دیا پلاس', 4, 1, NULL, NULL),
(23, 'محصولات پیشتاز طب', 4, 1, NULL, NULL),
(24, 'محصولات درمان کاو', 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhr_contact`
--

CREATE TABLE IF NOT EXISTS `mhr_contact` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `site` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `content` longtext COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `res1` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res2` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res3` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_contact`
--

INSERT INTO `mhr_contact` (`id`, `name`, `email`, `site`, `content`, `status`, `time`, `res1`, `res2`, `res3`) VALUES
(2, 'محمد هادی', 'mr.mhrezaei@gmail.com', '', 'سلام سایت بی خودی هست.', 1, 1432316273, NULL, NULL, NULL),
(3, 'محمد هادی رضایی', 'mr.mhrezaei@gmail.com', '', 'سلام سایت خیلی خوبیه این سایت.', 1, 1432316427, NULL, NULL, NULL),
(4, 'محمد هادی', 'mr.mhrezaei@gmail.com', '', 'سلام چطوری؟', 1, 1432319405, NULL, NULL, NULL),
(5, 'محمد هادی', 'mr.mhrezaei@gmail.com', '', 'سلام چه سایت جالبی دارید', 1, 1432319843, NULL, NULL, NULL),
(6, 'محمد هادی', 'mr.mhrezaei@gmail.com', '', 'سلام سلام سلام', 1, 1432319902, NULL, NULL, NULL),
(7, 'محمد هادی', 'mr.mhrezaei@gmail.com', '', 'یه سایت خیلی خوب', 1, 1432319939, NULL, NULL, NULL),
(9, 'محمد هادی رضایی', 'mr.mhrezaei@gmail.com', 'http://ainol.ir', 'سلام لطفاً لیست قیمت محصولات خود را ارسال نمائید.\nباتشکر', 1, 1432397991, NULL, NULL, NULL),
(16, 'محسن رضایی', 'boursbaz@gmail.com', 'www.google.com', 'لطفاً قیمت همکار محصول لوله PT-PTT را برای اینجانب ارسال نمائید.', 1, 1436630046, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhr_cooperator`
--

CREATE TABLE IF NOT EXISTS `mhr_cooperator` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `postalCode` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `lastOnline` bigint(20) DEFAULT NULL,
  `res1` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res2` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_cooperator`
--

INSERT INTO `mhr_cooperator` (`id`, `name`, `tel`, `mobile`, `email`, `address`, `postalCode`, `username`, `password`, `status`, `lastOnline`, `res1`, `res2`) VALUES
(1, 'محمد هادی رضایی', '02122324472', '09126008615', 'mr.mhrezaei@gmail.com', 'تهران، بزرگراه رسالت، بعد از خ استاد حسن بنا جنوبی، پ1098، ط سوم', '1633695751', 'mhrezaei', 'd93a5def7511da3d0f2d171d9c344e91', 1, 1435911890, NULL, NULL),
(4, 'محسن رضایی', '02122505171', '09123011085', 'boursbaz@gmail.com', 'تهران، بزرگراه رسالت، خ استاد حسن بنا جنوبی، ک محمد نژاد، پ 15، ط اول', '1633644611', 'boursbaz', 'cfece859621f92fbe9279e3dadd503d9', 1, 1436635711, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhr_pages`
--

CREATE TABLE IF NOT EXISTS `mhr_pages` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `content` longtext COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `update` bigint(20) NOT NULL,
  `res1` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res2` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res3` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_pages`
--

INSERT INTO `mhr_pages` (`id`, `title`, `content`, `status`, `update`, `res1`, `res2`, `res3`) VALUES
(1, 'درباره ما', '&lt;p dir=&quot;rtl&quot; style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span style=&quot;font-family:tahoma,geneva,sans-serif&quot;&gt;شرط اوباما برای حمایت از نیروهای مردمی در نبرد رمادی، جنایات جدید داعش در عراق و سوریه، ادامه واکنش&amp;zwnj;های آمریکا به اعزام کشتی نجات ایران به یمن، ناکارآمدی سیاست تحریم&amp;zwnj;های آمریکا علیه ایران و روسیه و هشدار صدراعظم آلمان به مسکو، از جمله مهم&amp;zwnj;ترین موضوعاتی است که سرخط مطالب امروز مطبوعات جهان را به خود اختصاص داده است. به گزارش &amp;laquo;تابناک&amp;raquo;، در چهارچوب گزارش های مربوط به نبرد با داعش در استان انبار عراق، نشریه &amp;laquo;آتلانتیک&amp;raquo; مصاحبه ای را باراک اوباما انجام داده که وی در آن از شروط آمریکا برای حمایت از نیروهای شیعه سخن گفته است. در این مصاحبه، رئیس جمهور آمریکا گفته ایده حمایت جدی از نیروهای الحشد الشعبی وجود دارد؛ اما به طور مشروط. وی، یکی از شروط ابن حمایت را حضور همه طیف های قومی و طایفی و دیگری را انجام عملیات زیر نظر دولت مرکزی عنوان کرده است. این اظهارات در حالی مطرح می شود که در الحشد الشعبی از همه اقوام، شامل کرد، ترکمن و حتی مسیحی حضور دارند و این نیرو از ابتدا نیز زیر نظر نخست وزیر و فرماندهی کل قوا سازمان دهی شده و تحت امر وی وارد عمل می شود. ***** در همین حال، روزنامه انگلیسی &amp;laquo;دیلی میل&amp;raquo;، بخشی از جنایات داعش در عراق و سوریه را برملا کرده و از جنایات غیراخلاقی و شنیع تروریست های داعش علیه زنان عراقی ایزدی که به اسارتشان درآمده خبر داده است. به نوشته این روزنامه، &amp;laquo;زینب بنگورا&amp;raquo;، نماینده ویژه سازمان ملل در امور خشونت جنسی تأکید کرد، گروه تروریستی داعش زنان ایزدی را انتخاب و آنها را برای فروش به بازار بردگان در شهر رقه سوریه می&amp;zwnj;فرستد تا دختران به آن کسی تعلق بگیرد که مبلغ گزافی بپردازد. گروه تروریستی داعش برای دختران اسیر قیمت تعیین می&amp;zwnj;کند و سپس آنها را برای فروش به بازار بردگان می&amp;zwnj;فرستد. سازمان ملل پس از انجام تحقیقات و جمع آوری اطلاعات از مناطق سوریه، عراق، ترکیه، لبنان و اردن، جنایات شنیع داعش علیه زنان ایزدی را برملا کرد. ***** از سوی دیگر، در شرایطی که این روزها انتقادات به سیاست آمریکا در مبارزه با داعش افزایش یافته و اشاره به ناکارآمدی این سیاست از هر زمان دیگری بیشتر شده، یک مقام آمریکایی اذعان کرده که در جریان حملات هوایی ائتلاف تحت رهبری این کشور در عراق و سوریه، غیرنظامیان نیز کشته شده اند. به نوشته خبرگزاری فرانسه، ژنرال جیمز تری، فرمانده ارشد آمریکایی که فرماندهی حملات ائتلاف ضد داعش را بر عهده دارد، در بیانیه ای گفت: &amp;laquo;در بمباران های ائتلاف علیه مواضع داعش در نوامبر دو هزار و چهارده در منطقه حارم در مرکز سوریه، گروهی غیرنظامی از جمله دو کودک هم کشته شدند که ما بابت مرگ این افراد که اقدامی غیر تعمدی از جانب نیروهای ائتلاف بوده است متأسفیم&amp;raquo;. ***** اما در ادامه مطالب، توجه بین المللی به موضوع اعزام کشتی حامل کمک های ایران به یمن، سایت &amp;laquo;واشنگتن فری بیکن&amp;raquo; به نقل از مقامات آمریکایی از تحت نظر بودن این کشتی از سوی آمریکا سخن گفته است. به نوشته این سایت، چند تن از مقامات پنتاگون گفته اند واشنگتن &amp;laquo;به دقت&amp;raquo; کشتی امدادرسانی ایران را که راهی یمن است، تحت نظر دارد. یک مقام ارشد پنتاگون که نامش فاش نشده گفت: این وزارتخانه به دقت حرکات کشتی&amp;zwnj;ها در یمن را تحت نظر دارد. یک مقام دیگر پنتاگون هم به این رسانه آمریکایی گفته: &amp;laquo;آمریکا با توجه به حرکت کشتی امدادرسان ایرانی به سمت یمن به نظارت بر تحرکات در بندر عدن ادامه می&amp;zwnj;دهد&amp;raquo;. یک سخنگوی وزارت دفاع آمریکا نیز بار دیگر از حمایت واشنگتن از عملیات نظامی عربستان در یمن سخن گفته است. ***** در مطلب دیگری مربوط به ایران، خبرگزاری &amp;laquo;آسوشیتدپرس&amp;raquo; از تدوین طرحی در کنگره آمریکا برای مبارزه با آنچه نبرد تبلیغاتی و رسانه ای ایران، روسیه و داعش خوانده شده، خبر داده است. به نوشته این خبرگزای، یک کمیته در مجلس نمایندگان آمریکا به اتفاق آرا، لایحه&amp;zwnj;ای را روز پنجشنبه با هدف اصلاح رادیو تلویزیون&amp;zwnj;های آمریکا برای مقابله با نبرد اطلاعاتی از جانب روسیه، ایران و داعش تصویب کرد. بر اساس این لایحه، مأموریت صدای آمریکا اصلاح می&amp;zwnj;شود، طوری که در کنار پخش اخبار به توضیح سیاست خارجی آمریکا نیز می&amp;zwnj;پردازد. همچنین رادیو اروپای آزاد، رادیو آسیای آزاد و شبکه تلویزیونی خاورمیانه به منظور بهبود همکاری و صرفه&amp;zwnj;جویی با هم ادغام می&amp;zwnj;شوند. ***** خبرگزاری &amp;laquo;رویترز&amp;raquo; مطلبی را درباره تحریم های وضع شده طی سال های اخیر علیه ایران منتشر کرده و در آن، به ضعف ها و ناکارآمدی های سیاست تحریم ایران اشاره کرده است. این خبرگزاری می نویسد، سیاست&amp;zwnj;گذاران آمریکایی عادت کرده&amp;zwnj;اند دسترسی شرکت&amp;zwnj;ها به اقتصاد آمریکا را مزیتی تصور کنند که هر شرکت خارجی به دنبال آن است. این ذهنیت آمریکا را قادر ساخته است از اقتصاد خود سلاحی بسازد که تازه&amp;zwnj;ترین مورد آن در مقابله با ایران و روسیه ظهور کرد. اما به اعتقاد رویترز، درسی که سامانه تحریم&amp;zwnj;ها به ما می&amp;zwnj;دهد این است که شاید این تحریم&amp;zwnj;ها به شرکت&amp;zwnj;ها و بانک&amp;zwnj;های دولتهای دوست و متحد ما فشار وارد کند؛ بنابراین، استفاده بیش از حد از تحریم&amp;zwnj;ها ممکن است موجب تبعاتی برای خود تحریم&amp;zwnj;ها شود. بر این اساس، تحریم ها در هر شرایطی بهترین گزینه به شمار نمی روند. ***** در نهایت در میان دیگر مطالب، روزنامه &lt;span style=&quot;color:#800000&quot;&gt;&amp;laquo;آیریش ایندیپندنت&amp;raquo;&lt;/span&gt; از هشدار صدراعظم آلمان به روسیه خبر داده است. به نوشته این روزنامه، آنجلا مرکل در جریان اجلاس اتحادیه اروپایی در ریگا گفته سیاست مشارکت شرقی این اتحادیه، ابزاری برای پیگیری یک سیاست توسعه طلبانه نیست و علیه هیچ کشوری، از جمله روسیه جهت گیری نشده است. با این حال، به گفته وی، روسیه باید بداند تا زمانی که خود را با ارزش های اساسی مشترک همسو نکند، نخواهد توانست به گروه &amp;laquo;جی 7&amp;raquo; ملحق شود و در اوضاع کنونی، شکل گیری دوباره گروه &amp;laquo;جی 8&amp;raquo; غیرقابل تصور است. آیریش ایندیپدنت اشاره می کند در همین حال، روسیه در حال اعمال فشار بر کشورهای سابق اتحاد شوروی است تا به ساختار تحت رهبری خود با نام &amp;laquo;اتحادیه اوراسیایی&amp;raquo; ملحق شوند.شرط اوباما برای حمایت از نیروهای مردمی در نبرد رمادی، جنایات جدید داعش در عراق و سوریه، ادامه واکنش&amp;zwnj;های آمریکا به اعزام کشتی نجات ایران به یمن، ناکارآمدی سیاست تحریم&amp;zwnj;های آمریکا علیه ایران و روسیه و هشدار صدراعظم آلمان به مسکو، از جمله مهم&amp;zwnj;ترین موضوعاتی است که سرخط مطالب امروز مطبوعات جهان را به خود اختصاص داده است. به گزارش &amp;laquo;تابناک&amp;raquo;، در چهارچوب گزارش های مربوط به نبرد با داعش در استان انبار عراق، نشریه &amp;laquo;آتلانتیک&amp;raquo; مصاحبه ای را باراک اوباما انجام داده که وی در آن از شروط آمریکا برای حمایت از نیروهای شیعه سخن گفته است. در این مصاحبه، رئیس جمهور آمریکا گفته ایده حمایت جدی از نیروهای الحشد الشعبی وجود دارد؛ اما به طور مشروط. وی، یکی از شروط ابن حمایت را حضور همه طیف های قومی و طایفی و دیگری را انجام عملیات زیر نظر دولت مرکزی عنوان کرده است. این اظهارات در حالی مطرح می شود که در الحشد الشعبی از همه اقوام، شامل کرد، ترکمن و حتی مسیحی حضور دارند و این نیرو از ابتدا نیز زیر نظر نخست وزیر و فرماندهی کل قوا سازمان دهی شده و تحت امر وی وارد عمل می شود. ***** در همین حال، روزنامه انگلیسی &amp;laquo;دیلی میل&amp;raquo;، بخشی از جنایات داعش در عراق و سوریه را برملا کرده و از جنایات غیراخلاقی و شنیع تروریست های داعش علیه زنان عراقی ایزدی که به اسارتشان درآمده خبر داده است. به نوشته این روزنامه، &amp;laquo;زینب بنگورا&amp;raquo;، نماینده ویژه سازمان ملل در امور خشونت جنسی تأکید کرد، گروه تروریستی داعش زنان ایزدی را انتخاب و آنها را برای فروش به بازار بردگان در شهر رقه سوریه می&amp;zwnj;فرستد تا دختران به آن کسی تعلق بگیرد که مبلغ گزافی بپردازد. گروه تروریستی داعش برای دختران اسیر قیمت تعیین می&amp;zwnj;کند و سپس آنها را برای فروش به بازار بردگان می&amp;zwnj;فرستد. سازمان ملل پس از انجام تحقیقات و جمع آوری اطلاعات از مناطق سوریه، عراق، ترکیه، لبنان و اردن، جنایات شنیع داعش علیه زنان ایزدی را برملا کرد. ***** از سوی دیگر، در شرایطی که این روزها انتقادات به سیاست آمریکا در مبارزه با داعش افزایش یافته و اشاره به ناکارآمدی این سیاست از هر زمان دیگری بیشتر شده، یک مقام آمریکایی اذعان کرده که در جریان حملات هوایی ائتلاف تحت رهبری این کشور در عراق و سوریه، غیرنظامیان نیز کشته شده اند. به نوشته خبرگزاری فرانسه، ژنرال جیمز تری، فرمانده ارشد آمریکایی که فرماندهی حملات ائتلاف ضد داعش را بر عهده دارد، در بیانیه ای گفت: &amp;laquo;در بمباران های ائتلاف علیه مواضع داعش در نوامبر دو هزار و چهارده در منطقه حارم در مرکز سوریه، گروهی غیرنظامی از جمله دو کودک هم کشته شدند که ما بابت مرگ این افراد که اقدامی غیر تعمدی از جانب نیروهای ائتلاف بوده است متأسفیم&amp;raquo;. ***** اما در ادامه مطالب، توجه بین المللی به موضوع اعزام کشتی حامل کمک های ایران به یمن، سایت &amp;laquo;واشنگتن فری بیکن&amp;raquo; به نقل از مقامات آمریکایی از تحت نظر بودن این کشتی از سوی آمریکا سخن گفته است. به نوشته این سایت، چند تن از مقامات پنتاگون گفته اند واشنگتن &amp;laquo;به دقت&amp;raquo; کشتی امدادرسانی ایران را که راهی یمن است، تحت نظر دارد. یک مقام ارشد پنتاگون که نامش فاش نشده گفت: این وزارتخانه به دقت حرکات کشتی&amp;zwnj;ها در یمن را تحت نظر دارد. یک مقام دیگر پنتاگون هم به این رسانه آمریکایی گفته: &amp;laquo;آمریکا با توجه به حرکت کشتی امدادرسان ایرانی به سمت یمن به نظارت بر تحرکات در بندر عدن ادامه می&amp;zwnj;دهد&amp;raquo;. یک سخنگوی وزارت دفاع آمریکا نیز بار دیگر از حمایت واشنگتن از عملیات نظامی عربستان در یمن سخن گفته است. ***** در مطلب دیگری مربوط به ایران، خبرگزاری &amp;laquo;آسوشیتدپرس&amp;raquo; از تدوین طرحی در کنگره آمریکا برای مبارزه با آنچه نبرد تبلیغاتی و رسانه ای ایران، روسیه و داعش خوانده شده، خبر داده است. به نوشته این خبرگزای، یک کمیته در مجلس نمایندگان آمریکا به اتفاق آرا، لایحه&amp;zwnj;ای را روز پنجشنبه با هدف اصلاح رادیو تلویزیون&amp;zwnj;های آمریکا برای مقابله با نبرد اطلاعاتی از جانب روسیه، ایران و داعش تصویب کرد. بر اساس این لایحه، مأموریت صدای آمریکا اصلاح می&amp;zwnj;شود، طوری که در کنار پخش اخبار به توضیح سیاست خارجی آمریکا نیز می&amp;zwnj;پردازد. همچنین رادیو اروپای آزاد، رادیو آسیای آزاد و شبکه تلویزیونی خاورمیانه به منظور بهبود همکاری و صرفه&amp;zwnj;جویی با هم ادغام می&amp;zwnj;شوند. ***** خبرگزاری &amp;laquo;رویترز&amp;raquo; مطلبی را درباره تحریم های وضع شده طی سال های اخیر علیه ایران منتشر کرده و در آن، به ضعف ها و ناکارآمدی های سیاست تحریم ایران اشاره کرده است. این خبرگزاری می نویسد، سیاست&amp;zwnj;گذاران آمریکایی عادت کرده&amp;zwnj;اند دسترسی شرکت&amp;zwnj;ها به اقتصاد آمریکا را مزیتی تصور کنند که هر شرکت خارجی به دنبال آن است. این ذهنیت آمریکا را قادر ساخته است از اقتصاد خود سلاحی بسازد که تازه&amp;zwnj;ترین مورد آن در مقابله با ایران و روسیه ظهور کرد. اما به اعتقاد رویترز، درسی که سامانه تحریم&amp;zwnj;ها به ما می&amp;zwnj;دهد این است که شاید این تحریم&amp;zwnj;ها به شرکت&amp;zwnj;ها و بانک&amp;zwnj;های دولتهای دوست و متحد ما فشار وارد کند؛ بنابراین، استفاده بیش از حد از تحریم&amp;zwnj;ها ممکن است موجب تبعاتی برای خود تحریم&amp;zwnj;ها شود. بر این اساس، تحریم ها در هر شرایطی بهترین گزینه به شمار نمی روند. ***** در نهایت در میان دیگر مطالب، روزنامه &amp;laquo;آیریش ایندیپندنت&amp;raquo; از هشدار صدراعظم آلمان به روسیه خبر داده است. به نوشته این روزنامه، آنجلا مرکل در جریان اجلاس اتحادیه اروپایی در ریگا گفته سیاست مشارکت شرقی این اتحادیه، ابزاری برای پیگیری یک سیاست توسعه طلبانه نیست و علیه هیچ کشوری، از جمله روسیه جهت گیری نشده است. با این حال، به گفته وی، روسیه باید بداند تا زمانی که خود را با ارزش های اساسی مشترک همسو نکند، نخواهد توانست به گروه &amp;laquo;جی 7&amp;raquo; ملحق شود و در اوضاع کنونی، شکل گیری دوباره گروه &amp;laquo;جی 8&amp;raquo; غیرقابل تصور است. آیریش ایندیپدنت اشاره می کند در همین حال، روسیه در حال اعمال فشار بر کشورهای سابق اتحاد شوروی است تا به ساختار تحت رهبری خود با نام &amp;laquo;اتحادیه اوراسیایی&amp;raquo; ملحق شوند.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 1, 1436643557, NULL, NULL, NULL),
(2, 'گواهینامه ها', '&lt;p dir=&quot;rtl&quot; style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;color:#000000&quot;&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span style=&quot;font-family:tahoma,geneva,sans-serif&quot;&gt;بعد از اینکه محکمه&amp;zwnj;ای در سوئیس، یک شرکت نفتی وابسته به دولت اسرائیل را به پرداخت جریمه به ایران محکوم کرد، روز پنجشنبه اعلام شد پرداخت جریمه به ایران صورت نخواهد گرفت، زیرا قوانین داخلی رژیم اسرائیل، هر گونه پرداخت مالی به یک دولت متخاصم را ممنوع کرده است. به گزارش &amp;laquo;تابناک&amp;raquo; به نقل از آژانس فرانس پرس، اعلام این موضع از طرف رژیم اسرائیل، بعد از آن صورت می&amp;zwnj;گیرد که خبرگزاری جمهوری اسلامی ایران (ایرنا) روز چهارشنبه اعلام کرد، دادگاهی در سوئیس، رژیم اسرائیل را در ماجرای خط لوله نفت ترانس آسیایی (Trans-Asian Oil (TAO)) مجرم شناخته و به پرداخت ۱. ۱ میلیون دلار جریمه به شرکت ملی نفت ایران محکوم کرده است. شرکت ملی نفت ایران در سال ۱۹۶۸ و در دوره حکومت پهلوی، قراردادی را با رژیم اسرائیل برای انتقال نفت ایران به این رژیم از طریق دریای سرخ امضا کرده است، ولی پس از انقلاب اسلامی در ایران در سال ۱۳۵۷ (۱۹۷۹)، قرارداد فسخ شده و رژیم اسرائیل در آن زمان، ۴۵۰ میلیون دلار به ایران بدهکار شده است. وزارت دارایی رژیم اسرائیل روز پنجشنبه، بیانیه به دقت برنامه&amp;zwnj;ریزی شده&amp;zwnj;ای را منتشر کرده که در آن خبر رسانه&amp;zwnj;های ایران درباره محکومیت طرف اسرائیلی، نه تأیید و نه تکذیب شده است. در این بیانیه آمده است، &amp;laquo;بدون اظهار نظر درباره محتوای مسأله، باید یادآوری کنیم که مطابق قانون تجارت با دشمن، انتقال منابع مالی به دشمن ـ که از جمله شرکت ملی نفت ایران را شامل می&amp;zwnj;شود ـ ممنوع است&amp;raquo;. یوسی ملمن تحلیلگر مسائل نظامی به روزنامه اسرائیلی معاریو گفته است، &amp;laquo;در واقع بسیار بعید است که اسرائیل، بدهی خود را پرداخت کند&amp;raquo;. به نوشته روزنامه لبنانی دیلی استار، نکته مهم در این میان این است که رژیم اسرائیل، ایران را دشمن حیاتی خود تلقی می&amp;zwnj;کند و نتانیاهو نخست وزیر این رژیم، اصلی ترین مخالف تخفیف در تحریم&amp;zwnj;ها علیه ایران است. در ماه ژانویه، روزنامه اسرائیلی هاآرتص مقاله&amp;zwnj;ای را منتشر کرد که در آن درگیر بودن شدید مقامات ارشد رژیم اسرائیل در کارزار حقوقی بر سر پرونده شکایت ایران در سوئیس علنی شده بود و این در حالی است که اجازه داده نمی&amp;zwnj;شد، کمترین اطلاعاتی در این باره به رسانه&amp;zwnj;ها درز کند. هاآرتص این احتمال را مطرح کرده بود که سرسختی رژیم اسرائیل در ادامه یافتن تحریم&amp;zwnj;ها علیه ایران در کنار دلایل امنیتی و استراتژیک، می&amp;zwnj;تواند ناشی از تلاش برای پرداخت نکردن جریمه به ایران هم باشد. لازم به یادآوری است که حکم دادگاه سوئیس، پس از مدت&amp;zwnj;های طولانی جدال میان ایران و اسرائیل بر سر درآمدهای حاصل از سرمایه گذاری مشترک روی یک خط لوله نفتی پیش از پیروزی انقلاب ایران صادر شده است. این سرمایه گذاری مشترک که در زمان شاه و در سال ۱۹۶۸ آغاز شد، پروژه&amp;zwnj;ای بود که بر اساس آن قرار بود نفت ایران از مسیر اسرائیل به اروپا فروخته شود. نفت از ایران با کشتی به ایلات و پس از آن از طریق خط لوله تازه تأسیس به بندر اشکلون (عسقلان) منتقل می&amp;zwnj;شد. پس از پیروزی انقلاب ایران در سال ۱۹۷۹، زمانی که ایران از یک متحد نزدیک به دشمن اسرائیل تبدیل شد، اسرائیل این خط لوله مشترک را ملی و تمام دارایی&amp;zwnj;ها ایران را نیز مصادره کرد. ایران در دادگاه&amp;zwnj;های سوئیس و فرانسه سه شکایت بین المللی داشت تا بتواند سهم خود را از درآمدهای این سرمایه گذاری مشترک از اسرائیل که میلیارد&amp;zwnj;ها دلار می&amp;zwnj;شد و نیز دارایی&amp;zwnj;های مصادره شده خود را پس بگیرد. شکایت ایران از اسرائیل بابت درآمدهای تل آویو از فروش نفت ایران بود که هرگز به تهران پرداخت نشد. این حکم جدید بابت شکایت ایران برای تحویل ۱۴۰۷۵ میلیون متر مکعب نفت خام به شرکت تائو بود که بهای بخشی از این محموله به ارزش ۴۵۰ میلیون دلار به شرکت ملی نفت ایران پرداخت نشده است. در سال ۱۹۸۹ دادگاه سوئیس در حکمی شرکت تائو را به پرداخت غرامت پانصد میلیون دلاری به شرکت فیمارکو متعلق به شرکت ملی نفت ایران محکوم کرده بود. به نظر می&amp;zwnj;رسد، حکم اخیر دادگاه سوئیس در ادامه حکم سابق باشد و بر اساس گزارش ایرنا به نقل از منبع آگاه، شرکت تائو علاوه بر پرداخت غرامت یک میلیارد و یکصد میلیون دلاری باید هفت میلیون دلار هزینه دادرسی&amp;zwnj;های قانونی را نیز پرداخت کند. این منبع همچنین گفته، ایران برای اجرای حکم علیه شرکت تائو در دادگاه&amp;zwnj;های پاناما نیز شکایت کرده است. بر اساس گزارش&amp;zwnj;ها، دادگاه عالی فدرال سوئیس به مشتریان نفت ایران نیز اجازه داده است، علیه اسرائیل درباره ادعای اصلی ـ&amp;zwnj;&amp;zwnj; همان درآمدهای نفتی مشترک در خط لوله ایلات اشکول و نیز دو بندرگاه نفتی و تأسیسات انبار و تانکرهای نفت کشی که اسرائیل مصادره کرده است ـ به ارزش هفت میلیارد دلار شکایت کنند. در اسرائیل همه اطلاعات درباره این سرمایه گذاری مشترک و تأمین مالی آن محرمانه نگه داشته شده است.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 1, 1436540204, NULL, NULL, NULL),
(3, 'تماس باما', '&lt;p dir=&quot;rtl&quot; style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span style=&quot;font-family:tahoma,geneva,sans-serif&quot;&gt;از طریق مترو: با خط یک مترو می توانید در ایستگاه مصلی پیاده شده، سپس با بی آر تی در ایستگاه استاد حسن بنا پیاده شوید.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 1, 1436268685, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhr_product`
--

CREATE TABLE IF NOT EXISTS `mhr_product` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cPrice` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `detail` text COLLATE utf8_persian_ci NOT NULL,
  `categories` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `res1` int(11) DEFAULT NULL,
  `res2` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res3` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  `res4` text COLLATE utf8_persian_ci
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_product`
--

INSERT INTO `mhr_product` (`id`, `name`, `price`, `cPrice`, `detail`, `categories`, `status`, `res1`, `res2`, `res3`, `res4`) VALUES
(1, 'لوله CBC-k2', '1400', '1200', '-', 16, 1, NULL, NULL, NULL, NULL),
(2, 'لوله سدیمان', '1550', '1400', '-', 16, 1, NULL, NULL, NULL, NULL),
(3, 'لوله PT-PTT', '1550', '1400', '-', 16, 1, NULL, NULL, NULL, NULL),
(4, 'محصول تست', '1000', '950', '10CC', 10, 1, NULL, NULL, NULL, NULL),
(5, 'محصول 25', '45000', '42000', '-', 19, 1, NULL, NULL, NULL, NULL),
(6, 'محصول 3', '1200', '1000', '-', 9, 1, NULL, NULL, NULL, NULL),
(7, 'محصول جدید', '5000', '4000', '-', 18, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhr_setting`
--

CREATE TABLE IF NOT EXISTS `mhr_setting` (
  `id` int(10) unsigned NOT NULL,
  `site_title` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `site_email` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `admin_email` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `admin_pass` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `site_status` int(11) NOT NULL,
  `last_login` bigint(20) NOT NULL,
  `about_us` varchar(5000) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_setting`
--

INSERT INTO `mhr_setting` (`id`, `site_title`, `address`, `tel`, `site_email`, `admin_email`, `admin_pass`, `site_status`, `last_login`, `about_us`) VALUES
(1, 'شرکت تجهیزات آزمایشگاهی سینا پویش', 'ایران، تهران، بزرگراه رسالت، بعد از خ استاد حسن بنا جنوبی، پ 1098، سوم', '021-22324472, 021-22505661', 'info@sinapooyesh.com', 'mr.mhrezaei@gmail.com', '48382ac767744e3dd771a0c991bf4484', 2, 1431721698, 'درباره شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش شرکت سینا پویش');

-- --------------------------------------------------------

--
-- Table structure for table `mhr_slider`
--

CREATE TABLE IF NOT EXISTS `mhr_slider` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(20000) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `res1` text COLLATE utf8_persian_ci,
  `res2` text COLLATE utf8_persian_ci,
  `res3` text COLLATE utf8_persian_ci
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mhr_slider`
--

INSERT INTO `mhr_slider` (`id`, `title`, `picture`, `link`, `status`, `res1`, `res2`, `res3`) VALUES
(9, 'تصویر اول', '82978c9e524b41c31668f874b5de9d1a.jpg', '', 1, NULL, NULL, NULL),
(10, 'تصویر دوم', 'c16b4d0fef22fd2d162e27df646e8cc5.jpg', '', 1, NULL, NULL, NULL),
(11, 'تصویر سوم', 'bfb9aac3b167abf3fb7d764c30e87eee.jpg', '', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhr_categories`
--
ALTER TABLE `mhr_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhr_contact`
--
ALTER TABLE `mhr_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhr_cooperator`
--
ALTER TABLE `mhr_cooperator`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mhr_pages`
--
ALTER TABLE `mhr_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhr_product`
--
ALTER TABLE `mhr_product`
  ADD PRIMARY KEY (`id`), ADD KEY `name` (`name`(255));

--
-- Indexes for table `mhr_setting`
--
ALTER TABLE `mhr_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhr_slider`
--
ALTER TABLE `mhr_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mhr_categories`
--
ALTER TABLE `mhr_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `mhr_contact`
--
ALTER TABLE `mhr_contact`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mhr_cooperator`
--
ALTER TABLE `mhr_cooperator`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mhr_pages`
--
ALTER TABLE `mhr_pages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mhr_product`
--
ALTER TABLE `mhr_product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mhr_setting`
--
ALTER TABLE `mhr_setting`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mhr_slider`
--
ALTER TABLE `mhr_slider`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
