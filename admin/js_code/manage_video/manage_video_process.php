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
    $action = filter_input(INPUT_POST, 'action');

    if(($action=="add")){

        $videos_topic= filter_input(INPUT_POST, 'videos_topic');
        $videos_youtube= filter_input(INPUT_POST, 'videos_youtube');
        $videos_detail= filter_input(INPUT_POST, 'videos_detail');

        $manage_video_Data = array(
     
            "videos_topic" => $videos_topic,
            "videos_youtube" => $videos_youtube,
            "videos_detail" => $videos_detail,
            "videos_post_date	" => $update_date,
            "videos_update_date" => $update_date,
            "videos_status" => '1'

        );
        insert("tb_videos", $manage_video_Data); 

        echo "no_error";

    }elseif(($action=="edit")){

        $videos_id=filter_input(INPUT_POST,'videos_id');
        $videos_topic= filter_input(INPUT_POST, 'videos_topic');
        $videos_youtube= filter_input(INPUT_POST, 'videos_youtube');
        $videos_detail= filter_input(INPUT_POST, 'videos_detail');

        $manage_video_Data = array(

            "videos_topic" => $videos_topic,
            "videos_youtube" => $videos_youtube,
            "videos_detail" => $videos_detail,
            "videos_post_date	" => $update_date,
            "videos_update_date" => $update_date,
            "videos_status" => '1'

        );
        update("tb_videos", $manage_video_Data, "videos_id  = '{$videos_id}'"); 

        echo "no_error";

    }elseif(($action=="delete")){

        $videos_id=filter_input(INPUT_POST,'videos_id');
        $vmanage_video_table = "tb_videos";
        $vmanage_video_ff = "videos_id";
        delete($vmanage_video_table, "{$vmanage_video_ff} = '{$videos_id}'");
        
        echo "no_error";  

    }else{}

?>