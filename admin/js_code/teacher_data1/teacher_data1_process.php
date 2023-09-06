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
?>

<?php include '../../config/connect.ini.php'; ?>
<?php include '../../config/fnc.php'; ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

<?php
    $aid=check_session("admin_id_aba");
    $update=date('Y-m-d H:i:s');
    $action=filter_input(INPUT_POST, 'action');
        if(($action=="create")){

            $name=filter_input(INPUT_POST,'name');//*
            $username =filter_input(INPUT_POST,'username');//*
            $password =filter_input(INPUT_POST,'password');//*

            if((filter_input(INPUT_POST,'surname')!=null)){
                $surname=filter_input(INPUT_POST,'surname');
            }else{
                $surname="-";
            }
        
            if((filter_input(INPUT_POST,'gender')!=null)){
                $gender=filter_input(INPUT_POST,'gender');
            }else{
                $gender="0";
            }
        
            if((filter_input(INPUT_POST,'position')!=null)){
                $position=filter_input(INPUT_POST,'position');
            }else{
                $position="-";
            }

            if((filter_input(INPUT_POST,'section')!=null)){
                $section=filter_input(INPUT_POST,'section');
            }else{
                $section="0";
            }                

            if((filter_input(INPUT_POST,'ttype')!=null)){
                $ttype=filter_input(INPUT_POST,'ttype');
            }else{
                $ttype="0";
            }   

            if((filter_input(INPUT_POST,'tclass')!=null)){
                $tclass=filter_input(INPUT_POST,'tclass');
            }else{
                $tclass="0";
            }

            if((filter_input(INPUT_POST,'tteach')!=null)){
                $tteach=filter_input(INPUT_POST,'tteach');
            }else{
                $tteach="0";
            }

            function fnc_count($username){
                $s = "SELECT * FROM `tb_teacher` WHERE `teacher_username` = '{$username}'";
                //$s = "SELECT * FROM tb_teacher WHERE teacher_name = '$name' AND teacher_surname = '$surname' AND teacher_username = '$username'";
                $q = row_array($s);
                return is_array($q) ? "0" : "1";
            }

            $check = fnc_count($username);

                if(($check)){
                    $pass = MD5($password);

                    $data = array("teacher_section_id" => $section ,
                                  "teacher_username" => $username ,
                                  "teacher_password" => $pass ,
                                  "teacher_name" => $name ,
                                  "teacher_surname" => $surname ,
                                  "position" => $position ,
                                  "gender" => $gender ,
                                  "admin_id" => $aid ,
                                  "admin_update" => $update,	
                                  "teacher_class" => $tclass ,	
                                  "teacher_teach" => $tteach ,
                                  "teacher_type" => $ttype ,
                                  "teacher_status" => 1,
                                  "teacher_work" => 1);

                    insert("tb_teacher", $data);
                    echo "no_error";
                }else{
                    echo "it_error";
                }

        }elseif($action=="update"){

            $teacher_key=filter_input(INPUT_POST,'teacher_key');//*
            $name=filter_input(INPUT_POST,'name');//*
            $username=filter_input(INPUT_POST,'username');//*
            $status_work=filter_input(INPUT_POST,'status_work');//*

            if((filter_input(INPUT_POST,'surname')!=null)){
                $surname=filter_input(INPUT_POST,'surname');
            }else{
                $surname="-";
            }
        
            if((filter_input(INPUT_POST,'gender')!=null)){
                $gender=filter_input(INPUT_POST,'gender');
            }else{
                $gender="0";
            }
        
            if((filter_input(INPUT_POST,'position')!=null)){
                $position=filter_input(INPUT_POST,'position');
            }else{
                $position="-";
            }

            if((filter_input(INPUT_POST,'section')!=null)){
                $section=filter_input(INPUT_POST,'section');
            }else{
                $section="0";
            }                

            if((filter_input(INPUT_POST,'ttype')!=null)){
                $ttype=filter_input(INPUT_POST,'ttype');
            }else{
                $ttype="0";
            }   

            if((filter_input(INPUT_POST,'tclass')!=null)){
                $tclass=filter_input(INPUT_POST,'tclass');
            }else{
                $tclass="0";
            }

            if((filter_input(INPUT_POST,'tteach')!=null)){
                $tteach=filter_input(INPUT_POST,'tteach');
            }else{
                $tteach="0";
            }            

            $data = array("teacher_section_id" => $section ,
                          "teacher_username" => $username ,
                          "teacher_name" => $name ,
                          "teacher_surname" => $surname ,
                          "position" => $position ,
                          "gender" => $gender ,
                          "admin_id" => $aid ,
                          "admin_update" => $update,	
                          "teacher_class" => $tclass ,	
                          "teacher_teach" => $tteach ,	
                          "teacher_type" => $ttype,
                          "teacher_work" => $status_work);

            update("tb_teacher", $data, "teacher_id = '{$teacher_key}'");              
            echo "no_error";
        }elseif(($action=="change_picture")){

            $teacher_key=filter_input(INPUT_POST,'teacher_key');
            $teacher_name=date('YmdHis')."_teacher1";
            
            $list=filter_input(INPUT_POST,'code_list');
            $code_id=filter_input(INPUT_POST,'code_id');
            //$update_file_time = date("Y_m_d_H_i_s", strtotime($update));

            $picture_name = $_FILES["change_picture"]["name"];
            $picture_type = $_FILES["change_picture"]["type"];
            //new file Name
            $imgFile = explode('.', $picture_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end
            $picture_new_name = $teacher_name.".".$fileType;
            $picture_tmp = $_FILES["change_picture"]["tmp_name"];
            $picture_size = $_FILES["change_picture"]["size"];
            move_uploaded_file($picture_tmp, '../../uploads/teacher_picture/' . $picture_new_name);


            $data = array(
                "tPic" => $picture_new_name
            );
            update("tb_teacher", $data,"teacher_id = {$teacher_key}");

            $code=base64_encode($teacher_key);

            exit("<script>window.location='../../?modules=teacher_data1&list=$list&manage=change_picture$code_id&teacher_key=$code';</script>");
  
       
        }elseif(($action=="password")){

            @$password=filter_input(INPUT_POST,'password');
            @$teacher_key=filter_input(INPUT_POST,'teacher_key');

            $pass = md5($password);
            $data = array("teacher_password" => $pass ,
                          "admin_id" => $aid ,
                          "admin_update" => $update);
            update("tb_teacher", $data, "teacher_id = '{$teacher_key}'");
            echo "no_error";
        }elseif(($action=="delete")){

            $teacher_key=filter_input(INPUT_POST,'teacher_key');
            $table=filter_input(INPUT_POST,'table');
            $ff=filter_input(INPUT_POST,'ff');

            $delete_sql="DELETE FROM `tb_teacher` WHERE `teacher_id`='{$teacher_key}'";
            $delete_txt_sql=new coding_sql($delete_sql);
                if(($delete_txt_sql->run_coding_sql()=="yes")){
                    echo "no_error";
                }else{
                    echo "it_error";
                }
            
        }else{
            exit("<script>window.location='../../index.php';</script>");
        }
?>