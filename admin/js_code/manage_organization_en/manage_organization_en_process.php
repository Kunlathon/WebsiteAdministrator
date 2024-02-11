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

    if(($action=="edit")){

        $information_topic_en=filter_input(INPUT_POST, 'information_topic_en');
        $information_detail_en=filter_input(INPUT_POST, 'information_detail_en');
        $information_key=filter_input(INPUT_POST,'information_key');  

            if(isset($_POST["copy_image"])){
                $copy_image=filter_input(INPUT_POST,'copy_image');  
            }else{
                $copy_image=null;
            }
        
            if(($_FILES["information_image"]["name"]!=null)){
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//up image
                $information_image_nameNew=$image_date."_information";
                $information_image_name = $_FILES["information_image"]["name"];
                $information_image_type = $_FILES["information_image"]["type"];
        
                    if(($copy_image!=null)){
                        $delete_image="../../../uploads/information/".$copy_image;
                        unlink($delete_image);
                    }else{}

//new file Name
                $imgFile = explode('.', $information_image_name);
                $fileType = $imgFile[count($imgFile) - 1];
//new file Name end

                $information_image_new_name = $information_image_nameNew.$information_key.".".$fileType;
                $information_image_tmp = $_FILES["information_image"]["tmp_name"];
                $information_image_size = $_FILES["information_image"]["size"];

                 move_uploaded_file($information_image_tmp, '../../../uploads/information/' . $information_image_new_name);
//up image end
//update db         
                $Data = array(
                    "information_topic_en"=>$information_topic_en,
                    "information_detail_en"=>$information_detail_en,
                    "information_image"=>$information_image_new_name,
                    "post_date"=>$update_date,
                    "update_date"=>$update_date,
                    "information_status"=>'1'
                );
                update("tb_information", $Data, "information_id  = '{$information_key}'"); 
//update db end
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            }else{
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//update db         
                $Data = array(
                    "information_topic_en"=>$information_topic_en,
                    "information_detail_en"=>$information_detail_en,
                    "post_date"=>$update_date,
                    "update_date"=>$update_date,
                    "information_status"=>'1'
                );
                update("tb_information", $Data, "information_id  = '{$information_key}'"); 
//update db end
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            }
        exit("<script>window.location='../../?modules=manage_organization_en';</script>");
    }else{}