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

        function fnc_count($document_topic){
            $s = "SELECT * FROM `tb_document` WHERE `document_topic` = '{$document_topic}'";
            $q = row_array($s);
        
            return is_array($q) ? "0" : "1";
        }
        
        $check = fnc_count($_POST["document_topic"]);

        if ($check) {

            if(($_POST["document_topic"]!=null and $_FILES["document_file"]["name"]!=null)){

                $document_topic=filter_input(INPUT_POST, 'document_topic');

                $document_file_nameNew=$document_topic;
                $document_file_name = $_FILES["document_file"]["name"];
                $document_file_type = $_FILES["document_file"]["type"];

                //new file Name
                $imgFile = explode('.', $document_file_name);
                $fileType = $imgFile[count($imgFile) - 1];
                //new file Name end

                $document_file_new_name = $document_file_nameNew.".pdf";
                $document_file_tmp = $_FILES["document_file"]["tmp_name"];
                $document_file_size = $_FILES["document_file"]["size"];

                move_uploaded_file($document_file_tmp, '../../../uploads/document/' . $document_file_new_name);
                //up image end

                //$document_topic
                $document_file=$document_file_new_name;

            }else{
                $document_topic=null;
                $document_file=null;
            }


            if(($_POST["document_topic_en"]!=null and $_FILES["document_file_en"]["name"]!=null)){

                $document_topic_en=filter_input(INPUT_POST, 'document_topic_en');
        
                $document_file_en_nameNew=$document_topic_en;
                $document_file_en_name = $_FILES["document_file_en"]["name"];
                $document_file_en_type = $_FILES["document_file_en"]["type"];
        
                //new file Name
                $imgFile = explode('.', $document_file_en_name);
                $fileType = $imgFile[count($imgFile) - 1];
                //new file Name end
        
                $document_file_en_new_name = $document_file_en_nameNew.".pdf";
                $document_file_en_tmp = $_FILES["document_file_en"]["tmp_name"];
                $document_file_en_size = $_FILES["document_file_en"]["size"];
        
                move_uploaded_file($document_file_en_tmp, '../../../uploads/document/' . $document_file_en_new_name);
                //up image end
        
                //$document_topic_en
                $document_file_en=$document_file_en_new_name;
        
            }else{
                $document_topic_en=null;
                $document_file_en=null;
            }

            if(($_POST["document_topic_cn"]!=null and $_FILES["document_file_cn"]["name"]!=null)){

                $document_topic_cn=filter_input(INPUT_POST, 'document_topic_cn');
        
                $document_file_cn_nameNew=$document_topic_cn;
                $document_file_cn_name = $_FILES["document_file_cn"]["name"];
                $document_file_cn_type = $_FILES["document_file_cn"]["type"];
        
                //new file Name
                $imgFile = explode('.', $document_file_cn_name);
                $fileType = $imgFile[count($imgFile) - 1];
                //new file Name end
        
                $document_file_cn_new_name = $document_file_cn_nameNew.".pdf";
                $document_file_cn_tmp = $_FILES["document_file_cn"]["tmp_name"];
                $document_file_cn_size = $_FILES["document_file_cn"]["size"];
        
                move_uploaded_file($document_file_cn_tmp, '../../../uploads/document/' . $document_file_cn_new_name);
                //up image end
        
                //$document_topic_cn
                $document_file_cn=$document_file_cn_new_name;
        
            }else{
                $document_topic_cn=null;
                $document_file_cn=null;
            }

            $document_post_date=filter_input(INPUT_POST, 'document_post_date');
            $document_status=filter_input(INPUT_POST, 'document_status');
            $category_id=filter_input(INPUT_POST, 'category_id');

            $document_Data = array("document_topic"=>$document_topic,
                                   "document_topic_en"=>$document_topic_en,
                                   "document_topic_cn"=>$document_topic_cn,
                                   "document_file"=>$document_file,
                                   "document_file_en"=>$document_file_en,
                                   "document_file_cn"=>$document_file_cn,
                                   "document_category_id"=>$category_id,
                                   "document_post_date"=>$document_post_date,
                                   "document_update_date"=>$update_date,
                                   "document_status"=>$document_status
            );  
            insert("tb_document", $document_Data); 

            $cat_key=base64_encode($category_id);

            exit("<script>window.location='../../?modules=document&manage=show_data&category_key=$cat_key';</script>");

        }else{
            exit("<script>window.location='../../?modules=document';</script>");
        }

    }elseif(($action=="edit")){

        if(($_POST["document_topic"]!=null and $_FILES["document_file"]["name"]!=null)){

            $document_topic=filter_input(INPUT_POST, 'document_topic');
            $document_id=filter_input(INPUT_POST, 'document_key');
            $copy_document_file=filter_input(INPUT_POST, 'copy_document_file');

            
            $delete_copy_document_file="../../../uploads/document/".$copy_document_file;
            unlink($delete_copy_document_file);

            $document_file_nameNew=$document_topic;
            $document_file_name = $_FILES["document_file"]["name"];
            $document_file_type = $_FILES["document_file"]["type"];

            //new file Name
            $imgFile = explode('.', $document_file_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $document_file_new_name = $document_file_nameNew.".pdf";
            $document_file_tmp = $_FILES["document_file"]["tmp_name"];
            $document_file_size = $_FILES["document_file"]["size"];

            move_uploaded_file($document_file_tmp, '../../../uploads/document/' . $document_file_new_name);
            //up image end

            //$document_topic
            $document_file=$document_file_new_name;

        }else{
            $document_topic=null;
            $document_file=null;
        }


        if(($_POST["document_topic_en"]!=null and $_FILES["document_file_en"]["name"]!=null)){

            $document_topic_en=filter_input(INPUT_POST, 'document_topic_en');
            $copy_document_file_en=filter_input(INPUT_POST, 'copy_document_file_en');

            $delete_copy_document_file_en="../../../uploads/document/".$copy_document_file_en;
            unlink($delete_copy_document_file_en);

            $document_file_en_nameNew=$document_topic_en;
            $document_file_en_name = $_FILES["document_file_en"]["name"];
            $document_file_en_type = $_FILES["document_file_en"]["type"];
    
            //new file Name
            $imgFile = explode('.', $document_file_en_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end
    
            $document_file_en_new_name = $document_file_en_nameNew.".pdf";
            $document_file_en_tmp = $_FILES["document_file_en"]["tmp_name"];
            $document_file_en_size = $_FILES["document_file_en"]["size"];
    
            move_uploaded_file($document_file_en_tmp, '../../../uploads/document/' . $document_file_en_new_name);
            //up image end
    
            //$document_topic_en
            $document_file_en=$document_file_en_new_name;
    
        }else{
            $document_topic_en=null;
            $document_file_en=null;
        }

        if(($_POST["document_topic_cn"]!=null and $_FILES["document_file_cn"]["name"]!=null)){

            $document_topic_cn=filter_input(INPUT_POST, 'document_topic_cn');
            $copy_document_file_cn=filter_input(INPUT_POST, 'copy_document_file_cn');

            $delete_copy_document_file_cn="../../../uploads/document/".$copy_document_file_cn;
            unlink($delete_copy_document_file_cn);

            $document_file_cn_nameNew=$document_topic_cn;
            $document_file_cn_name = $_FILES["document_file_cn"]["name"];
            $document_file_cn_type = $_FILES["document_file_cn"]["type"];
    
            //new file Name
            $imgFile = explode('.', $document_file_cn_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end
    
            $document_file_cn_new_name = $document_file_cn_nameNew.".pdf";
            $document_file_cn_tmp = $_FILES["document_file_cn"]["tmp_name"];
            $document_file_cn_size = $_FILES["document_file_cn"]["size"];
    
            move_uploaded_file($document_file_cn_tmp, '../../../uploads/document/' . $document_file_cn_new_name);
            //up image end
    
            //$document_topic_cn
            $document_file_cn=$document_file_cn_new_name;
    
        }else{
            $document_topic_cn=null;
            $document_file_cn=null;
        }

        $document_post_date=filter_input(INPUT_POST, 'document_post_date');
        $document_status=filter_input(INPUT_POST, 'document_status');
        $category_id=filter_input(INPUT_POST, 'category_id');

        $document_Data = array("document_topic"=>$document_topic,
                               "document_topic_en"=>$document_topic_en,
                               "document_topic_cn"=>$document_topic_cn,
                               "document_file"=>$document_file,
                               "document_file_en"=>$document_file_en,
                               "document_file_cn"=>$document_file_cn,
                               "document_category_id"=>$category_id,
                               "document_post_date"=>$document_post_date,
                               "document_update_date"=>$update_date,
                               "document_status"=>$document_status
        );  
        update("tb_document", $document_Data, "document_id = '{$document_id}'"); 

        $cat_key=base64_encode($category_id);

        exit("<script>window.location='../../?modules=document&manage=show_data&category_key=$cat_key';</script>");

    }elseif(($action=="delete")){

        $document_id=filter_input(INPUT_POST, 'document_id');
        $copy_file_nameTh=filter_input(INPUT_POST, 'copy_file_nameTh');
        $copy_file_nameEn=filter_input(INPUT_POST, 'copy_file_nameEn');
        $copy_file_nameCn=filter_input(INPUT_POST, 'copy_file_nameCn');

            if((isset($copy_file_nameTh))){
                $delete_copy_document_file_Th="../../../uploads/document/".$copy_file_nameTh;
                unlink($delete_copy_document_file_Th);
            }else{}

            if((isset($copy_file_nameEn))){
                $delete_copy_document_file_En="../../../uploads/document/".$copy_file_nameEn;
                unlink($delete_copy_document_file_En);
            }else{}

            if((isset($copy_file_nameCn))){
                $delete_copy_document_file_cn="../../../uploads/document/".$copy_file_nameCn;
                unlink($delete_copy_document_file_cn);
            }else{}


            $document_table = "tb_document";
            $document_ff = "document_id";
            delete($document_table, "{$document_ff} = '{$document_id}'");

            echo "no_error";  

    }else{}
?>