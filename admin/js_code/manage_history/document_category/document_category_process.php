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

        $document_category_name= filter_input(INPUT_POST, 'document_category_name');
        $document_category_name_en= filter_input(INPUT_POST, 'document_category_name_en');
        $document_category_name_cn= filter_input(INPUT_POST, 'document_category_name_cn');
    
        function fnc_count($category_name){
            $s = "SELECT `document_category_id` FROM `tb_document_category` WHERE `document_category_name`='{$category_name}'";
            $q = row_array($s);
        
            return is_array($q) ? "0" : "1";
        }
    
        $check = fnc_count($document_category_name);
    
        if(($check)){
    
            $document_Data = array("document_category_name"=>$document_category_name,
                                   "document_category_name_en"=>$document_category_name_en,
                                   "document_category_name_cn"=>$document_category_name_cn);  
            insert("tb_document_category", $document_Data);
            echo "no_error";
        }else{
            echo "it_error";
        }
    
    }elseif(($action=="edit")){

        $category_id= filter_input(INPUT_POST, 'category_id');
        $document_category_name= filter_input(INPUT_POST, 'document_category_name');
        $document_category_name_en= filter_input(INPUT_POST, 'document_category_name_en');
        $document_category_name_cn= filter_input(INPUT_POST, 'document_category_name_cn');

        $document_Data = array("document_category_name"=>$document_category_name,
        "document_category_name_en"=>$document_category_name_en,
        "document_category_name_cn"=>$document_category_name_cn);  
        update("tb_document_category", $document_Data, "document_category_id='{$category_id}'");
        echo "no_error";
        
    }elseif(($action=="delete")){

        $category_id=filter_input(INPUT_POST, 'document_category_id');

        $count_categorySql="SELECT COUNT(`document_id`) AS `int_document`
                            FROM `tb_document` WHERE `document_category_id`='{$category_id}'";
        $count_category_list = result_array($count_categorySql);
        foreach ($count_category_list as $key => $count_category_row){
            $int_document=$count_category_row["int_document"];
        }

        if(($int_document>=1)){
            echo "it_error";
        }else{
            $category_table = "tb_document_category";
            $category_ff = "document_category_id";
            delete($category_table, "{$category_ff} = '{$category_id}'");

            echo "no_error";            
        }

    }else{
        
    }
 

?>