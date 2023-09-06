<?php include("main/includes/connect.ini.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

global $db;
$default_page=mysqli_query($db,"SELECT sid,title,keyword,desc_web,noscript,email,phone,addr,addr_cn,addr_en,footer_b,site_color,site_bg,site_show_view,site_product_view,paypal_api,ems_price,register_price,normal_price,anayatics,gmail,passgmail,gaapi,google_map,lat_value,lon_value,zoom_value,fb_id,fb_secret,fb_connect,ads_pub,facebook_id,tweet_id,fanpage_id,top_menu,left_menu,footer_menu,facebook_box FROM web_setting ");
list($sid,$title,$keyword,$desc_web,$noscript,$email,$phone,$addr,$addr_cn,$addr_en,$footer_b,$site_color,$site_bg,$site_show_view,$site_product_view,$paypal_api,$ems_price,$register_price,$normal_price,$anayatics,$gmail,$passgmail,$gaapi,$google_map,$lat_value,$lon_value,$zoom_value,$fb_id,$fb_secret,$fb_connect,$ads_pub,$facebook_id,$tweet_id,$fanpage_id,$top_menu,$left_menu,$footer_menu,$facebook_box)=mysqli_fetch_array($default_page)
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="main/assets/images/favicon.ico">
<title>:: <?php echo "$title"; ?> ::</title>
<!--<meta http-equiv="refresh" content="20;url=main/index.php">-->
<link href="images/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="images/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="images/assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="images/assets/js/bootstrap.js"></script>
<style type="text/css">
body {
  font-family: 'thaisans_neueregular';
  background-color: <?php echo "$site_color"; ?>;
  color: #000;
  font-size: 16pt;
  /*background:url(core/site/<?php echo "$site_bg"; ?>) top repeat-x;*/
} 
</style>

<!--font-->
        <link rel="stylesheet" href="images/assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="images/assets/fonts/specimen_files/specimen_stylesheet.css" type="text/css" charset="utf-8" />
<!--font-->
<link rel="stylesheet" href="images/assets/css/lightbox/lightbox.css">
<script src="images/assets/js/lightbox/lightbox.js"></script>
<meta name="keywords" content="<?php echo "$keyword"; //keyword ?>">
<meta name='description' content='<?php echo "$desc_web"; //desc_web ?>">'  />
</head>
<body>
<noscript><?php echo "$noscript"; ?></noscript><?php echo "$anayatics"; ?>
  <br><br>
<div class="container" style="margin-top:20px; width:1020px; background-color:#FFF;">
    <div class="row">
    <?php
          $result_logo=mysqli_query($db,"SELECT web_id,web_pic,web_topic,web_intro,type,datetimex  FROM web_data WHERE type='3xx'");
          while(list($web_id,$web_pic,$web_topic,$web_intro,$type,$datetimex)=mysqli_fetch_array($result_logo)){
            echo "<a href='main/index.php'><img src='images/image001.jpg' width='1020' /></a>"; 
            echo "<p>&nbsp;&nbsp;<b>$web_topic</b></p>";
        }
      ?>
       <div class="row">
        <div class=".col-md-12">
          <div id="footer">
              <div class="col-md-6">
              <p><span class="size18"><?php echo "$title";?></span></p>
               <p><span class="size18"><?php echo "$addr";?></span></p>
               <p><span class="size18"><?php echo "$phone";?></span></p>
               <p><span class="size18">E-mail : <?php echo "$email";?></span></p>
              </div>
              <div class="col-md-6" style="text-align:right;">
               <!--<p><span class="size18"><h1 ><a href="main/index.php">เข้าสู่เว็บไซต์</a> &nbsp;&nbsp;</h1></span></p>-->
			   <!--<a href="timetable.php"><button type="button" class="btn btn-success btm-lg size20">ตารางเรียน</button></a>
			   <a href="teachtable.php"><button type="button" class="btn btn-primary btm-lg size20">ตารางสอน</button></a>-->
			   <!--<a href="teacher/index.php"><button type="button" class="btn btn-primary btm-lg size20">อาจารย์เข้าสู่ระบบ</button></a>-->
			   <!--<a href="admin/index.php"><button type="button" class="btn btn-warning btm-lg size20">เจ้าหน้าที่เข้าสู่ระบบ</button></a>--> 
              </div>
            </div>
        </div>
        </div><!--row-->


    </div><!--row-->
  </div><!--container-->

</html>       