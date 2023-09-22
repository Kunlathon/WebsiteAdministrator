<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
?>
<?php
include("config/connect.ini.php");
include("config/fnc.php");

$modules = isset($_GET['modules']) ? $_GET['modules'] : '';

?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content=""/>
    <meta name="theme-color" content=""/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <link rel="icon" href="dist/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="dist/img/favicon.ico" type="image/x-icon"/>
    <meta name="description" content="ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่"/>
    <meta name="canonical" content="https://preview.tabler.io/layout-navbar-sticky.html">

    <meta property="og:image" content="https://preview.tabler.io/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่">
    <meta property="og:type" content="object">
    <meta property="og:title" content="ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่">
    <meta property="og:url" content="https://preview.tabler.io/static/og.png">
    <meta property="og:description" content="ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่">

<?php 
  if($modules=="temples-detail" || $modules=="travel-detail" || $modules=="tradition-detail" || $modules=="culture-detail"){
	$id = isset($_GET['id']) ? $_GET['id'] : '';

	//$sqlTravel = "SELECT * FROM tb_travel WHERE travel_id = '$id'";
    //$rowTravel = row_array($sqlTravel);
?>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $rowTravel['travel_topic']; ?>"/>
	<meta property="og:description" content="<?php echo $rowTravel['travel_topic']; ?>" />
	<meta property="og:image" content="https://www.phothitech.net/languagecenter/Uploads/travel/<?php echo $rowTravel['travel_image0']; ?>" />

<?php 
	}
?>

<!---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<!---->    
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1685973381" rel="stylesheet"/>



    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>

    <style>
      /* Make the image fully responsive */
      .carousel-inner img {
        width: 100%;
        height: 100%;
      }
    </style>

    <!---->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!---->

  </head>
  <body class="col-md-12">
    <script src="./dist/js/demo-theme.min.js?1685973381"></script>
    <div class="page">
<!-- Navbar -->
<!--no head lock-->
        <!--<header class="navbar navbar-expand-md d-print-none"  data-bs-theme="dark">-->
        <header class="navbar navbar-expand-md d-print-none"  style="background-color: #FF9933;">
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              <a href=".">
                <img src="dist/img/LCM1.png" width="100%" height="32" alt="LCM" class="">
              </a>
             
            </h1>
            <div class="navbar-nav flex-row order-md-last">
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
              <div class="d-none d-md-flex">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                      <img src="dist/img/icon-th-removal.png" alt="TH" style="background-color: #FF9933;" width="32" height="32">
                      <img src="dist/img/icon-en-removal.png" alt="EN" style="background-color: #FF9933;" width="32" height="32">
                      <!--<img src="dist/img/icon-cn-removal.png" alt="CN" style="background-color: #FF9933;" width="32" height="32">-->
                      <!--<span class="flag flag-country-th" style="border-radius: 50%;"></span>-->
                      <!--<span class="flag flag-country-us" style="border-radius: 50%;"></span>-->
                    </div>
                </div>
              </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            </div>
          </div>
        </header>
<!--no head lock End-->
<!--head lock -->
      <div class="sticky-top">
        <header class="navbar-expand-md">
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
              <div class="container-xl">
                <ul class="navbar-nav">

                  <li class="nav-item active">
                    <a class="nav-link" href="index.php" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      </span>
                      <span class="nav-link-title">
                        หน้าแรก
                      </span>
                    </a>
                  </li>
				  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                      </span>
                      <span class="nav-link-title">
                        เกี่ยวกับเรา
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="?modules=history">
                        ประวัติศูนย์ภาษา
                      </a>
                      <a class="dropdown-item" href="?modules=resolution">
                        ปณิธาน & วิสัยทัศน์ & พันธกิจ & วัตถุประสงค์
                      </a>
                      <a class="dropdown-item" href="?modules=strategic_plan">
                        แผนยุทธศาสตร์ & เป้าประสงค์
                      </a>
                      <a class="dropdown-item" href="?modules=management_message">
                        สารจากผู้บริหาร
                      </a>
                      <a class="dropdown-item" href="?modules=structure">
                        โครงสร้างองค์กร และคณะกรรมการ
                      </a>
                      <a class="dropdown-item" href="?modules=management_team">
                        คณะผู้บริหาร
                      </a>
                    </div>
                  </li>
				  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						   <path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
						   <path d="M9 7l6 0"></path>
						   <path d="M9 11l6 0"></path>
						   <path d="M9 15l4 0"></path>
						</svg>
                      </span>
                      <span class="nav-link-title">
                        ข่าวสาร
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="?modules=news_announcement">
                        ข่าวประกาศ
                      </a>
                      <a class="dropdown-item" href="?modules=news_public">
                        ข่าวประชาสัมพันธ์
                      </a>
                      <a class="dropdown-item" href="?modules=news_procurement">
                        ข่าวจัดซื้อจัดจ้าง
                      </a>
                      <a class="dropdown-item" href="?modules=news_recruitment">
                        ข่าวรับสมัครงาน
                      </a>
                    </div>
                  </li>

				 <li class="nav-item false">
                    <a class="nav-link" href="?modules=course" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						   <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
						   <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
						   <path d="M9 15l2 2l4 -4"></path>
						</svg>
                      </span>
                      <span class="nav-link-title">
                        หลักสูตร
                      </span>
                    </a>
                  </li>

				  				  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						   <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
						   <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
						   <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
						   <path d="M11 6l9 0"></path>
						   <path d="M11 12l9 0"></path>
						   <path d="M11 18l9 0"></path>
						</svg>
                      </span>
                      <span class="nav-link-title">
                        สมัครออนไลน์
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="?modules=register">
                        รับสมัครออนไลน์
                      </a>
                      <a class="dropdown-item" href="?modules=verify_registration">
                        ค้นหาข้อมูลผู้สมัคร
                      </a>
                    </div>
                  </li>
					  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						   <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
						   <path d="M4 12l8 4l8 -4"></path>
						   <path d="M4 16l8 4l8 -4"></path>
						</svg>
                      </span>
                      <span class="nav-link-title">
                        บริการออนไลน์
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="?modules=request_card">
                        ยื่นเอกสารขอบัตร
                      </a>
                      <a class="dropdown-item" href="?modules=request_card_list">
                        ค้นหาผู้ขอเอกสารขอบัตร
                      </a>
                      <a class="dropdown-item" href="?modules=request_certified">
                        ยื่นเรื่องขอเอกสารรับรอง
                      </a>
                      <a class="dropdown-item" href="?modules=request_certified_list">
                         ค้นหาผู้ขอเอกสารรับรอง
                      </a>
                    </div>
                  </li>

				 <li class="nav-item false">
                    <a class="nav-link" href="?modules=download" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						   <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
						   <path d="M3.6 9h16.8"></path>
						   <path d="M3.6 15h16.8"></path>
						   <path d="M11.5 3a17 17 0 0 0 0 18"></path>
						   <path d="M12.5 3a17 17 0 0 1 0 18"></path>
						</svg>
                      </span>
                      <span class="nav-link-title">
                        ดาวน์โหลด
                      </span>
                    </a>
                  </li>

				 <li class="nav-item false">
                    <a class="nav-link" href="?modules=contactus" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="128" height="128" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						  <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
						  <path d="M15 7a2 2 0 0 1 2 2"></path>
						  <path d="M15 3a6 6 0 0 1 6 6"></path>
						</svg>
                      </span>
                      <span class="nav-link-title">
                        ติดต่อ
                      </span>
                    </a>
                  </li>

                </ul>

              </div>
            </div>
          </div>
        </header>
      </div>
<!--head lock End--->    

      <?php

	  if($modules=="history") {
		  include("information/history.php");
	  } else if($modules=="resolution") {
		  include("information/resolution.php");
	  } else if($modules=="strategic_plan") {
		  include("information/strategic_plan.php");
	  } else if($modules=="management_message") {
		  include("information/management_message.php");
	  } else if($modules=="structure") {
		  include("information/structure.php");
	  } else if($modules=="management_team") {
		  include("information/management_team.php");
	  } else if($modules=="map") {
		  include("information/map.php");
	  } else if($modules=="contactus") {
		  include("information/contactus.php");
	  } else if($modules=="register") {
		  include("information/register.php");
	  } else if($modules=="verify_registration") {
		  include("information/verify_registration.php");
	  }elseif(($modules=="gallery_image")){
		  include("information/gallery_image.php");
	  }elseif(($modules=="gallery_all")){
			include("information/gallery_all.php");
	  }elseif(($modules=="news_announcement")){
			include("information/news_announcement.php");
	  }elseif(($modules=="news_procurement")){
			include("information/news_procurement.php");
	  }elseif(($modules=="news_public")){
			include("information/news_public.php");
	  }elseif(($modules=="news_recruitment")){
			include("information/news_recruitment.php");
	  }elseif(($modules=="course")){
			include("information/course.php");
	  }elseif(($modules=="download")){
			include("information/download.php");
	  }elseif(($modules=="request_card")){
      include("information/request_card.php");
    }elseif(($modules=="request_certified")){
      include("information/request_certified.php");
    }elseif(($modules=="request_card_list")){
      include("information/request_card_list.php");
    }else{
		  include("information/mainfile.php");
	  }

      ?>
<!--footer-->
      <footer class="d-print-none" style="background-color: #FF9933;">
        <div>&nbsp;</div>
        <div class="container-xl">
          <div class="row row-deck row-cards" >
            <div class="col-md-11">
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline list-inline-dots mb-0">
					<?php
						$now_year = date('Y');
					?>
                      Copyright <a href="admin/index.php">&copy;</a> 2023 - <?php echo $now_year;?> ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่. All rights reserved.<br><br>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-1" align="center"><a href="#">TOP</a>&nbsp;</div>
          </div>
        </div>
      </footer>
<!--footer End-->
    </div>
<!---->
<!---->
<!-- Libs JS -->
    <script src="dist/libs/apexcharts/dist/apexcharts.min.js?1685973381" defer></script>
    <script src="dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1685973381" defer></script>
    <script src="dist/libs/jsvectormap/dist/maps/world.js?1685973381" defer></script>
    <script src="dist/libs/jsvectormap/dist/maps/world-merc.js?1685973381" defer></script>
<!-- Tabler Core -->
    <script src="dist/js/tabler.min.js?1685973381" defer></script>
    <script src="dist/js/demo.min.js?1685973381" defer></script>
   
  </body>
</html>