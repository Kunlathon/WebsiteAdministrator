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

            $slide_topic=filter_input(INPUT_POST, 'slide_topic');//*
            $slide_link=filter_input(INPUT_POST, 'slide_link');
            $slide_status=filter_input(INPUT_POST, 'slide_status');//*
//up image
            $slide_image_nameNew=$image_date."_slide";
            $slide_image_name = $_FILES["slide_image"]["name"];
            $slide_image_type = $_FILES["slide_image"]["type"];

//new file Name
            $imgFile = explode('.', $slide_image_name);
            $fileType = $imgFile[count($imgFile) - 1];
//new file Name end

            $slide_new_name = $slide_image_nameNew.".".$fileType;
            $slide_image_tmp = $_FILES["slide_image"]["tmp_name"];
            $slide_image_size = $_FILES["slide_image"]["size"];

            move_uploaded_file($slide_image_tmp, '../../../dist/img/slides/' . $slide_new_name);
            
//up image end

//add
            if(($slide_link!=null)){
                $Appimage_slide_Data = array(
                    //"slide_id" => NULL,
                    "slide_topic" => $slide_topic,
                    "slide_image" => $slide_new_name,
                    "slide_link" => $slide_link,
                    "slide_post_date" => $update_date,
                    "slide_update_date" => $update_date,
                    "slide_status" => $slide_status
                );
                insert("tb_slide", $Appimage_slide_Data); 
            }else{
                $Appimage_slide_Data = array(
                    //"slide_id" => NULL,
                    "slide_topic" => $slide_topic,
                    "slide_image" => $slide_new_name,
                    //"slide_link" => NULL,
                    "slide_post_date" => $update_date,
                    "slide_update_date" => $update_date,
                    "slide_status" => $slide_status
                );
                insert("tb_slide", $Appimage_slide_Data); 
            }

//add end
            exit("<script>window.location='../../?modules=image_slide';</script>");
        }elseif(($action=="edit")){

            $slide_id=filter_input(INPUT_POST, 'slide_id');//*
            $slide_topic=filter_input(INPUT_POST, 'slide_topic');//*
            $slide_link=filter_input(INPUT_POST, 'slide_link');
            $slide_status=filter_input(INPUT_POST, 'slide_status');//*

            if(($_FILES["slide_image"]["name"]==null)){
//update
                if(($slide_link!=null)){
                    $Upimage_slide_Data = array(
                        //"slide_id" => NULL,
                        "slide_topic" => $slide_topic,
                        //"slide_image" => $slide_new_name,
                        "slide_link" => $slide_link,
                        "slide_post_date" => $update_date,
                        "slide_update_date" => $update_date,
                        "slide_status" => $slide_status
                    );
                    update("tb_slide", $Upimage_slide_Data, "slide_id = '{$slide_id}'"); 
                }else{
                    $Upimage_slide_Data = array(
                        //"slide_id" => NULL,
                        "slide_topic" => $slide_topic,
                        //"slide_image" => $slide_new_name,
                        //"slide_link" => NULL,
                        "slide_post_date" => $update_date,
                        "slide_update_date" => $update_date,
                        "slide_status" => $slide_status
                    );
                    update("tb_slide", $Upimage_slide_Data, "slide_id = '{$slide_id}'"); 
                }
//update end
                exit("<script>window.location='../../?modules=image_slide';</script>");
            }else{
//delete image
                $copy_slide_image=filter_input(INPUT_POST, 'copy_slide_image');
//delete image end

                $delete_image="../../../dist/img/slides/".$copy_slide_image;
                    if((unlink($delete_image))){
//up image
                        $slide_image_nameNew=$image_date."_slide";
                        $slide_image_name = $_FILES["slide_image"]["name"];
                        $slide_image_type = $_FILES["slide_image"]["type"];
//new file Name
                        $imgFile = explode('.', $slide_image_name);
                        $fileType = $imgFile[count($imgFile) - 1];
//new file Name end
                        $slide_new_name = $slide_image_nameNew.".".$fileType;
                        $slide_image_tmp = $_FILES["slide_image"]["tmp_name"];
                        $slide_image_size = $_FILES["slide_image"]["size"];
                        move_uploaded_file($slide_image_tmp, '../../../dist/img/slides/'.$slide_new_name);
//up image end

//update
                        if(($slide_link!=null)){
                            $Upimage_slide_Data = array(
                                //"slide_id" => NULL,
                                "slide_topic" => $slide_topic,
                                "slide_image" => $slide_new_name,
                                "slide_link" => $slide_link,
                                "slide_post_date" => $update_date,
                                "slide_update_date" => $update_date,
                                "slide_status" => $slide_status
                            );
                            update("tb_slide", $Upimage_slide_Data, "slide_id = '{$slide_id}'"); 
                        }else{
                            $Upimage_slide_Data = array(
                                //"slide_id" => NULL,
                                "slide_topic" => $slide_topic,
                                "slide_image" => $slide_new_name,
                                //"slide_link" => NULL,
                                "slide_post_date" => $update_date,
                                "slide_update_date" => $update_date,
                                "slide_status" => $slide_status
                            );
                            update("tb_slide", $Upimage_slide_Data, "slide_id = '{$slide_id}'"); 
                        }
//update end
                        exit("<script>window.location='../../?modules=image_slide';</script>");
                    }else{}
            }
        }elseif(($action=="delete")){
            $slide_id=filter_input(INPUT_POST, 'slide_id');
//delete image 
            $copy_slide_image=filter_input(INPUT_POST, 'copy_slide_image');
            $delete_image="../../../dist/img/slides/".$copy_slide_image;
//delete image end        
                if((unlink($delete_image))){
                    $image_slide_table = "tb_slide";
                    $image_slide_ff = "slide_id";
                    delete($image_slide_table, "{$image_slide_ff} = '{$slide_id}'");
                    echo "no_error";  
                }else{
                    echo "it_error";                    
                }
        }else{}
?>