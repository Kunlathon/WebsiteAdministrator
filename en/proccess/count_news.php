<?php
    include("../config/connect.ini.php");
    include("../config/fnc.php");

    $Date=date("Y-m-d");
    $DateTime=date("Y-m-d H:i:s");
    $Dateimg=date("YmdHis");




        if((isset($_POST["news_key"]))){

            $news_key=filter_input(INPUT_POST,'news_key');

            $sql = "SELECT * FROM `tb_news` WHERE `news_id` = '{$news_key}'";
            $row = row_array($sql);
  
            //ทำการเพิ่มจำนวนคนเข้าชม
  
            $pageview = $row['news_pageview'] + 1;
  
            $data = array(
              "news_pageview" => $pageview
            );
  
            update("tb_news", $data, "news_id = {$news_key}");

            echo "yes";

        }else{
            echo "no";
        }
   

 ?>