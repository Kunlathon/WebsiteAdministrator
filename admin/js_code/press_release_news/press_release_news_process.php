<?php
    //Develop By Arnon Manomuang
    //พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
    //Tel 0631146517 , 0946164461
    //โทร 0631146517 , 0946164461
    //Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	

    include("../../config/connect.ini.php");
    include("../../config/fnc.php");
    include("../../structure/link.php");

    $RunLink = new link_system();
    check_login('admin_username_lcm', 'login.php');
    $aid = check_session("admin_id_lcm");
    $update_date = date('Y-m-d H:i:s');
    $image_date=date("YmdHis");
    $action = filter_input(INPUT_POST, 'action');

    if(($action=="add")){
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//news_image0

        if(($_FILES["news_image0"]["name"]!=null)){

            $news_image0_nameNew=$image_date."_news0";
            $news_image0_name = $_FILES["news_image0"]["name"];
            $news_image0_type = $_FILES["news_image0"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image0_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image0_new_name = $news_image0_nameNew.$news_category_id.".".$fileType;
            $news_image0_tmp = $_FILES["news_image0"]["tmp_name"];
            $news_image0_size = $_FILES["news_image0"]["size"];

            move_uploaded_file($news_image0_tmp, '../../../dist/img/news/' . $news_image0_new_name);
            //up image end

        }else{
            $news_image0_new_name=null;
        }

//news_image0 end

//news_image1_1

        if(($_FILES["news_image1_1"]["name"]!=null)){

            $news_image1_1_nameNew=$image_date."_news1_1";
            $news_image1_1_name = $_FILES["news_image1_1"]["name"];
            $news_image1_1_type = $_FILES["news_image1_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image1_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image1_1_new_name = $news_image1_1_nameNew.$news_category_id.".".$fileType;
            $news_image1_1_tmp = $_FILES["news_image1_1"]["tmp_name"];
            $news_image1_1_size = $_FILES["news_image1_1"]["size"];

            move_uploaded_file($news_image1_1_tmp, '../../../dist/img/news/' . $news_image1_1_new_name);
            //up image end

        }else{
            $news_image1_1_new_name=null;
        }

//news_image1_1 end

//news_image1_2

        if(($_FILES["news_image1_2"]["name"]!=null)){

            $news_image1_2_nameNew=$image_date."_news1_2";
            $news_image1_2_name = $_FILES["news_image1_2"]["name"];
            $news_image1_2_type = $_FILES["news_image1_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image1_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image1_2_new_name = $news_image1_2_nameNew.$news_category_id.".".$fileType;
            $news_image1_2_tmp = $_FILES["news_image1_2"]["tmp_name"];
            $news_image1_2_size = $_FILES["news_image1_2"]["size"];

            move_uploaded_file($news_image1_2_tmp, '../../../dist/img/news/' . $news_image1_2_new_name);
            //up image end

        }else{
            $news_image1_2_new_name=null;
        }

//news_image1_2 end

//news_image2_1

        if(($_FILES["news_image2_1"]["name"]!=null)){

            $news_image2_1_nameNew=$image_date."_news2_1";
            $news_image2_1_name = $_FILES["news_image2_1"]["name"];
            $news_image2_1_type = $_FILES["news_image2_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image2_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image2_1_new_name = $news_image2_1_nameNew.$news_category_id.".".$fileType;
            $news_image2_1_tmp = $_FILES["news_image2_1"]["tmp_name"];
            $news_image2_1_size = $_FILES["news_image2_1"]["size"];

            move_uploaded_file($news_image2_1_tmp, '../../../dist/img/news/' . $news_image2_1_new_name);
            //up image end

        }else{
            $news_image2_1_new_name=null;
        }

//news_image2_1 end

//news_image2_2

        if(($_FILES["news_image2_2"]["name"]!=null)){

            $news_image2_2_nameNew=$image_date."_news2_2";
            $news_image2_2_name = $_FILES["news_image2_2"]["name"];
            $news_image2_2_type = $_FILES["news_image2_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image2_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image2_2_new_name = $news_image2_2_nameNew.$news_category_id.".".$fileType;
            $news_image2_2_tmp = $_FILES["news_image2_2"]["tmp_name"];
            $news_image2_2_size = $_FILES["news_image2_2"]["size"];

            move_uploaded_file($news_image2_2_tmp, '../../../dist/img/news/' . $news_image2_2_new_name);
            //up image end

        }else{
            $news_image2_2_new_name=null;
        }

//news_image2_2 end

//news_image3_1

        if(($_FILES["news_image3_1"]["name"]!=null)){

            $news_image3_1_nameNew=$image_date."_news3_1";
            $news_image3_1_name = $_FILES["news_image3_1"]["name"];
            $news_image3_1_type = $_FILES["news_image3_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image3_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image3_1_new_name = $news_image3_1_nameNew.$news_category_id.".".$fileType;
            $news_image3_1_tmp = $_FILES["news_image3_1"]["tmp_name"];
            $news_image3_1_size = $_FILES["news_image3_1"]["size"];

            move_uploaded_file($news_image3_1_tmp, '../../../dist/img/news/' . $news_image3_1_new_name);
            //up image end

        }else{
            $news_image3_1_new_name=null;
        }

//news_image3_1 end

//news_image3_2

        if(($_FILES["news_image3_2"]["name"]!=null)){

            $news_image3_2_nameNew=$image_date."_news3_2";
            $news_image3_2_name = $_FILES["news_image3_2"]["name"];
            $news_image3_2_type = $_FILES["news_image3_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image3_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image3_2_new_name = $news_image3_2_nameNew.$news_category_id.".".$fileType;
            $news_image3_2_tmp = $_FILES["news_image3_2"]["tmp_name"];
            $news_image3_2_size = $_FILES["news_image3_2"]["size"];

            move_uploaded_file($news_image3_2_tmp, '../../../dist/img/news/' . $news_image3_2_new_name);
            //up image end

        }else{
            $news_image3_2_new_name=null;
        }

//news_image3_2 end

//news_image4_1

        if(($_FILES["news_image4_1"]["name"]!=null)){

            $news_image4_1_nameNew=$image_date."_news4_1";
            $news_image4_1_name = $_FILES["news_image4_1"]["name"];
            $news_image4_1_type = $_FILES["news_image4_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image4_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image4_1_new_name = $news_image4_1_nameNew.$news_category_id.".".$fileType;
            $news_image4_1_tmp = $_FILES["news_image4_1"]["tmp_name"];
            $news_image4_1_size = $_FILES["news_image4_1"]["size"];

            move_uploaded_file($news_image4_1_tmp, '../../../dist/img/news/' . $news_image4_1_new_name);
            //up image end

        }else{
            $news_image4_1_new_name=null;
        }

//news_image4_1 end

//news_image4_2

        if(($_FILES["news_image4_2"]["name"]!=null)){

            $news_image4_2_nameNew=$image_date."_news4_2";
            $news_image4_2_name = $_FILES["news_image4_2"]["name"];
            $news_image4_2_type = $_FILES["news_image4_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image4_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image4_2_new_name = $news_image4_2_nameNew.$news_category_id.".".$fileType;
            $news_image4_2_tmp = $_FILES["news_image4_2"]["tmp_name"];
            $news_image4_2_size = $_FILES["news_image4_2"]["size"];

            move_uploaded_file($news_image4_2_tmp, '../../../dist/img/news/' . $news_image4_2_new_name);
            //up image end

        }else{
            $news_image4_2_new_name=null;
        }

//news_image4_2 end

//news_image5_1

        if(($_FILES["news_image5_1"]["name"]!=null)){

            $news_image5_1_nameNew=$image_date."_news5_1";
            $news_image5_1_name = $_FILES["news_image5_1"]["name"];
            $news_image5_1_type = $_FILES["news_image5_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image5_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image5_1_new_name = $news_image5_1_nameNew.$news_category_id.".".$fileType;
            $news_image5_1_tmp = $_FILES["news_image5_1"]["tmp_name"];
            $news_image5_1_size = $_FILES["news_image5_1"]["size"];

            move_uploaded_file($news_image5_1_tmp, '../../../dist/img/news/' . $news_image5_1_new_name);
            //up image end

        }else{
            $news_image5_1_new_name=null;
        }

//news_image5_1 end

//news_image5_2

        if(($_FILES["news_image5_2"]["name"]!=null)){

            $news_image5_2_nameNew=$image_date."_news5_2";
            $news_image5_2_name = $_FILES["news_image5_2"]["name"];
            $news_image5_2_type = $_FILES["news_image5_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image5_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image5_2_new_name = $news_image5_2_nameNew.$news_category_id.".".$fileType;
            $news_image5_2_tmp = $_FILES["news_image5_2"]["tmp_name"];
            $news_image5_2_size = $_FILES["news_image5_2"]["size"];

            move_uploaded_file($news_image5_2_tmp, '../../../dist/img/news/' . $news_image5_2_new_name);
            //up image end

        }else{
            $news_image5_2_new_name=null;
        }

//news_image5_2 end

        $news_category_id=filter_input(INPUT_POST, 'news_category_id'); //*
        $news_topic=filter_input(INPUT_POST, 'news_topic'); //*
        $news_detail_1=filter_input(INPUT_POST, 'news_detail_1');
        $news_detail_2=filter_input(INPUT_POST, 'news_detail_2');
        $news_detail_3=filter_input(INPUT_POST, 'news_detail_3');
        $news_detail_4=filter_input(INPUT_POST, 'news_detail_4');
        $news_detail_5=filter_input(INPUT_POST, 'news_detail_5');
        $news_status=filter_input(INPUT_POST, 'news_status');

        $News_Data = array("news_category_id"=>$news_category_id,
                           "news_topic"=>$news_topic,
                           "news_image0"=>$news_image0_new_name,
                           "news_detail_1"=>$news_detail_1,
                           "news_image1_1"=>$news_image1_1_new_name,
                           "news_image1_2"=>$news_image1_2_new_name,
                           "news_detail_2"=>$news_detail_2,
                           "news_image2_1"=>$news_image2_1_new_name,
                           "news_image2_2"=>$news_image2_2_new_name,
                           "news_detail_3"=>$news_detail_3,
                           "news_image3_1"=>$news_image3_1_new_name,
                           "news_image3_2"=>$news_image3_2_new_name,
                           "news_detail_4"=>$news_detail_4,
                           "news_image4_1"=>$news_image4_1_new_name,
                           "news_image4_2"=>$news_image4_2_new_name,
                           "news_detail_5"=>$news_detail_5,
                           "news_image5_1"=>$news_image5_1_new_name,
                           "news_image5_2"=>$news_image5_2_new_name,
                           "news_post_date"=>$update_date,
                           "news_update_date"=>$update_date,
                           "news_status"=>$news_status);
        insert("tb_news", $News_Data); 
        exit("<script>window.location='../../?modules=press_release_news';</script>");
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    }elseif(($action=="edit")){
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $news_key=filter_input(INPUT_POST,'news_id');
            $news_sql = "SELECT * FROM `tb_news`  WHERE `news_id`='{$news_key}'";
            $news_list = result_array($news_sql);
            foreach ($news_list as $key => $news_row) {
                $copy_news_image0=$news_row["news_image0"];
                $copy_news_image1_1=$news_row["news_image1_1"];
                $copy_news_image1_2=$news_row["news_image1_2"];
                $copy_news_image2_1=$news_row["news_image2_1"];
                $copy_news_image2_2=$news_row["news_image2_2"];
                $copy_news_image3_1=$news_row["news_image3_1"];
                $copy_news_image3_2=$news_row["news_image3_2"];
                $copy_news_image4_1=$news_row["news_image4_1"];
                $copy_news_image4_2=$news_row["news_image4_2"];
                $copy_news_image5_1=$news_row["news_image5_1"];
                $copy_news_image5_2=$news_row["news_image5_2"];
            } 
//news_image0

        if(($_FILES["news_image0"]["name"]!=null)){

            $delete_image0="../../../dist/img/news/".$copy_news_image0;
            unlink($delete_image0);

            $news_image0_nameNew=$image_date."_news0";
            $news_image0_name = $_FILES["news_image0"]["name"];
            $news_image0_type = $_FILES["news_image0"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image0_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image0_new_name = $news_image0_nameNew.$news_category_id.".".$fileType;
            $news_image0_tmp = $_FILES["news_image0"]["tmp_name"];
            $news_image0_size = $_FILES["news_image0"]["size"];

            move_uploaded_file($news_image0_tmp, '../../../dist/img/news/' . $news_image0_new_name);
            //up image end

        }else{
            $news_image0_new_name=$copy_news_image0;
        }

        //news_image0 end

        //news_image1_1

        if(($_FILES["news_image1_1"]["name"]!=null)){

            $delete_image1_1="../../../dist/img/news/".$copy_news_image1_1;
            unlink($delete_image1_1);

            $news_image1_1_nameNew=$image_date."_news1_1";
            $news_image1_1_name = $_FILES["news_image1_1"]["name"];
            $news_image1_1_type = $_FILES["news_image1_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image1_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image1_1_new_name = $news_image1_1_nameNew.$news_category_id.".".$fileType;
            $news_image1_1_tmp = $_FILES["news_image1_1"]["tmp_name"];
            $news_image1_1_size = $_FILES["news_image1_1"]["size"];

            move_uploaded_file($news_image1_1_tmp, '../../../dist/img/news/' . $news_image1_1_new_name);
            //up image end

        }else{
            $news_image1_1_new_name=$copy_news_image1_1;
        }

        //news_image1_1 end

        //news_image1_2

        if(($_FILES["news_image1_2"]["name"]!=null)){

            $delete_image1_2="../../../dist/img/news/".$copy_news_image1_2;
            unlink($delete_image1_2);

            $news_image1_2_nameNew=$image_date."_news1_2";
            $news_image1_2_name = $_FILES["news_image1_2"]["name"];
            $news_image1_2_type = $_FILES["news_image1_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image1_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image1_2_new_name = $news_image1_2_nameNew.$news_category_id.".".$fileType;
            $news_image1_2_tmp = $_FILES["news_image1_2"]["tmp_name"];
            $news_image1_2_size = $_FILES["news_image1_2"]["size"];

            move_uploaded_file($news_image1_2_tmp, '../../../dist/img/news/' . $news_image1_2_new_name);
            //up image end

        }else{
            $news_image1_2_new_name=$copy_news_image1_2;
        }

        //news_image1_2 end

        //news_image2_1

        if(($_FILES["news_image2_1"]["name"]!=null)){

            $delete_image2_1="../../../dist/img/news/".$copy_news_image2_1;
            unlink($delete_image2_1);

            $news_image2_1_nameNew=$image_date."_news2_1";
            $news_image2_1_name = $_FILES["news_image2_1"]["name"];
            $news_image2_1_type = $_FILES["news_image2_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image2_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image2_1_new_name = $news_image2_1_nameNew.$news_category_id.".".$fileType;
            $news_image2_1_tmp = $_FILES["news_image2_1"]["tmp_name"];
            $news_image2_1_size = $_FILES["news_image2_1"]["size"];

            move_uploaded_file($news_image2_1_tmp, '../../../dist/img/news/' . $news_image2_1_new_name);
            //up image end

        }else{
            $news_image2_1_new_name=$copy_news_image2_1;
        }

        //news_image2_1 end

        //news_image2_2

        if(($_FILES["news_image2_2"]["name"]!=null)){

            $delete_image2_2="../../../dist/img/news/".$copy_news_image2_2;
            unlink($delete_image2_2);

            $news_image2_2_nameNew=$image_date."_news2_2";
            $news_image2_2_name = $_FILES["news_image2_2"]["name"];
            $news_image2_2_type = $_FILES["news_image2_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image2_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image2_2_new_name = $news_image2_2_nameNew.$news_category_id.".".$fileType;
            $news_image2_2_tmp = $_FILES["news_image2_2"]["tmp_name"];
            $news_image2_2_size = $_FILES["news_image2_2"]["size"];

            move_uploaded_file($news_image2_2_tmp, '../../../dist/img/news/' . $news_image2_2_new_name);
            //up image end

        }else{
            $news_image2_2_new_name=$copy_news_image2_2;
        }

        //news_image2_2 end

        //news_image3_1

        if(($_FILES["news_image3_1"]["name"]!=null)){

            $delete_image3_1="../../../dist/img/news/".$copy_news_image3_1;
            unlink($delete_image3_1);

            $news_image3_1_nameNew=$image_date."_news3_1";
            $news_image3_1_name = $_FILES["news_image3_1"]["name"];
            $news_image3_1_type = $_FILES["news_image3_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image3_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image3_1_new_name = $news_image3_1_nameNew.$news_category_id.".".$fileType;
            $news_image3_1_tmp = $_FILES["news_image3_1"]["tmp_name"];
            $news_image3_1_size = $_FILES["news_image3_1"]["size"];

            move_uploaded_file($news_image3_1_tmp, '../../../dist/img/news/' . $news_image3_1_new_name);
            //up image end

        }else{
            $news_image3_1_new_name=$copy_news_image3_1;
        }

        //news_image3_1 end

        //news_image3_2

        if(($_FILES["news_image3_2"]["name"]!=null)){

            $delete_image3_2="../../../dist/img/news/".$copy_news_image3_2;
            unlink($delete_image3_2);

            $news_image3_2_nameNew=$image_date."_news3_2";
            $news_image3_2_name = $_FILES["news_image3_2"]["name"];
            $news_image3_2_type = $_FILES["news_image3_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image3_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image3_2_new_name = $news_image3_2_nameNew.$news_category_id.".".$fileType;
            $news_image3_2_tmp = $_FILES["news_image3_2"]["tmp_name"];
            $news_image3_2_size = $_FILES["news_image3_2"]["size"];

            move_uploaded_file($news_image3_2_tmp, '../../../dist/img/news/' . $news_image3_2_new_name);
            //up image end

        }else{
            $news_image3_2_new_name= $copy_news_image3_2;
        }

        //news_image3_2 end

        //news_image4_1

        if(($_FILES["news_image4_1"]["name"]!=null)){

            $delete_image4_1="../../../dist/img/news/".$copy_news_image4_1;
            unlink($delete_image4_1);

            $news_image4_1_nameNew=$image_date."_news4_1";
            $news_image4_1_name = $_FILES["news_image4_1"]["name"];
            $news_image4_1_type = $_FILES["news_image4_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image4_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image4_1_new_name = $news_image4_1_nameNew.$news_category_id.".".$fileType;
            $news_image4_1_tmp = $_FILES["news_image4_1"]["tmp_name"];
            $news_image4_1_size = $_FILES["news_image4_1"]["size"];

            move_uploaded_file($news_image4_1_tmp, '../../../dist/img/news/' . $news_image4_1_new_name);
            //up image end

        }else{
            $news_image4_1_new_name=$copy_news_image4_1;
        }

        //news_image4_1 end

        //news_image4_2

        if(($_FILES["news_image4_2"]["name"]!=null)){

            $delete_image4_2="../../../dist/img/news/".$copy_news_image4_2;
            unlink($delete_image4_2);

            $news_image4_2_nameNew=$image_date."_news4_2";
            $news_image4_2_name = $_FILES["news_image4_2"]["name"];
            $news_image4_2_type = $_FILES["news_image4_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image4_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image4_2_new_name = $news_image4_2_nameNew.$news_category_id.".".$fileType;
            $news_image4_2_tmp = $_FILES["news_image4_2"]["tmp_name"];
            $news_image4_2_size = $_FILES["news_image4_2"]["size"];

            move_uploaded_file($news_image4_2_tmp, '../../../dist/img/news/' . $news_image4_2_new_name);
            //up image end

        }else{
            $news_image4_2_new_name=$copy_news_image4_2;
        }

        //news_image4_2 end

        //news_image5_1

        if(($_FILES["news_image5_1"]["name"]!=null)){

            $delete_image5_1="../../../dist/img/news/".$copy_news_image5_1;
            unlink($delete_image5_1);

            $news_image5_1_nameNew=$image_date."_news5_1";
            $news_image5_1_name = $_FILES["news_image5_1"]["name"];
            $news_image5_1_type = $_FILES["news_image5_1"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image5_1_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image5_1_new_name = $news_image5_1_nameNew.$news_category_id.".".$fileType;
            $news_image5_1_tmp = $_FILES["news_image5_1"]["tmp_name"];
            $news_image5_1_size = $_FILES["news_image5_1"]["size"];

            move_uploaded_file($news_image5_1_tmp, '../../../dist/img/news/' . $news_image5_1_new_name);
            //up image end

        }else{
            $news_image5_1_new_name=$copy_news_image5_1;
        }

        //news_image5_1 end

        //news_image5_2

        if(($_FILES["news_image5_2"]["name"]!=null)){

            $delete_image5_2="../../../dist/img/news/".$copy_news_image5_2;
            unlink($delete_image5_2);

            $news_image5_2_nameNew=$image_date."_news5_2";
            $news_image5_2_name = $_FILES["news_image5_2"]["name"];
            $news_image5_2_type = $_FILES["news_image5_2"]["type"];

            //new file Name
            $imgFile = explode('.', $news_image5_2_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $news_image5_2_new_name = $news_image5_2_nameNew.$news_category_id.".".$fileType;
            $news_image5_2_tmp = $_FILES["news_image5_2"]["tmp_name"];
            $news_image5_2_size = $_FILES["news_image5_2"]["size"];

            move_uploaded_file($news_image5_2_tmp, '../../../dist/img/news/' . $news_image5_2_new_name);
            //up image end

        }else{
            $news_image5_2_new_name=$copy_news_image5_2;
        }

        //news_image5_2 end

        $news_category_id=filter_input(INPUT_POST, 'news_category_id'); //*
        $news_topic=filter_input(INPUT_POST, 'news_topic'); //*
        $news_detail_1=filter_input(INPUT_POST, 'news_detail_1');
        $news_detail_2=filter_input(INPUT_POST, 'news_detail_2');
        $news_detail_3=filter_input(INPUT_POST, 'news_detail_3');
        $news_detail_4=filter_input(INPUT_POST, 'news_detail_4');
        $news_detail_5=filter_input(INPUT_POST, 'news_detail_5');
        $news_status=filter_input(INPUT_POST, 'news_status');
        $News_Data = array("news_category_id"=>$news_category_id,
                        "news_topic"=>$news_topic,
                        "news_image0"=>$news_image0_new_name,
                        "news_detail_1"=>$news_detail_1,
                        "news_image1_1"=>$news_image1_1_new_name,
                        "news_image1_2"=>$news_image1_2_new_name,
                        "news_detail_2"=>$news_detail_2,
                        "news_image2_1"=>$news_image2_1_new_name,
                        "news_image2_2"=>$news_image2_2_new_name,
                        "news_detail_3"=>$news_detail_3,
                        "news_image3_1"=>$news_image3_1_new_name,
                        "news_image3_2"=>$news_image3_2_new_name,
                        "news_detail_4"=>$news_detail_4,
                        "news_image4_1"=>$news_image4_1_new_name,
                        "news_image4_2"=>$news_image4_2_new_name,
                        "news_detail_5"=>$news_detail_5,
                        "news_image5_1"=>$news_image5_1_new_name,
                        "news_image5_2"=>$news_image5_2_new_name,
                        "news_post_date"=>$update_date,
                        "news_update_date"=>$update_date,
                        "news_status"=>$news_status);
        update("tb_news", $News_Data, "news_id = '{$news_key}'");
        exit("<script>window.location='../../?modules=press_release_news';</script>"); 
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    }elseif(($action=="delete")){

        $news_key=filter_input(INPUT_POST,'news_id');
        $news_sql = "SELECT * FROM `tb_news`  WHERE `news_id`='{$news_key}'";
        $news_list = result_array($news_sql);
        foreach ($news_list as $key => $news_row) {

            $key_image=array($news_row["news_image0"],$news_row["news_image1_1"],$news_row["news_image1_2"],$news_row["news_image2_1"],$news_row["news_image2_2"]
            ,$news_row["news_image3_1"],$news_row["news_image3_2"],$news_row["news_image4_1"],$news_row["news_image4_2"],$news_row["news_image5_1"],$news_row["news_image5_2"]);

        } 

            $count_inage=0;
            while($count_inage<=10){
                if(($key_image[$count_inage]!=null)){
                    $delete_image="../../../dist/img/news/".$key_image[$count_inage];  
                    unlink($delete_image);                                    
                }else{}
                $count_inage=$count_inage+1; 
            }

            $news_table = "tb_news";
            $news_ff = "news_id";
            delete($news_table, "{$news_ff} = '{$news_key}'");

            echo "no_error";  

    }else{}

?>