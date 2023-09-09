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

<?php check_login('admin_username_lcm', 'login.php'); ?>

<?php
    $aid=check_session("admin_id_lcm");
    $update=date('Y-m-d H:i:s');
    $action=filter_input(INPUT_POST, 'action');
        if(($action=="create")){

            @$name=filter_input(INPUT_POST,'name');
            @$surname =filter_input(INPUT_POST,'surname');
            @$gender =filter_input(INPUT_POST,'gender');
            @$position =filter_input(INPUT_POST,'position');
            @$section =filter_input(INPUT_POST,'section');
            @$ttype =filter_input(INPUT_POST,'ttype');
            @$tclass =filter_input(INPUT_POST,'tclass');
            @$tteach =filter_input(INPUT_POST,'tteach');
            @$username =filter_input(INPUT_POST,'username');
            @$password =filter_input(INPUT_POST,'password');

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

            @$id=filter_input(INPUT_POST,'id');
            @$name=filter_input(INPUT_POST,'name');
            @$surname=filter_input(INPUT_POST,'surname');
            @$gender=filter_input(INPUT_POST,'gender');
            @$position=filter_input(INPUT_POST,'position');
            @$section=filter_input(INPUT_POST,'section');
            @$ttype=filter_input(INPUT_POST,'ttype');
            @$tclass=filter_input(INPUT_POST,'tclass');
            @$tteach=filter_input(INPUT_POST,'tteach');
            @$username=filter_input(INPUT_POST,'username');
            @$password=filter_input(INPUT_POST,'password');
            @$status_work=filter_input(INPUT_POST,'status_work');

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

            update("tb_teacher", $data, "teacher_id = '{$id}'");              
            echo "no_error";
        }elseif(($action=="password")){

            @$password=filter_input(INPUT_POST,'password');
            @$id=filter_input(INPUT_POST,'id');

            $pass = md5($password);
            $data = array("teacher_password" => $pass ,
                          "admin_id" => $aid ,
                          "admin_update" => $update);
            update("tb_teacher", $data, "teacher_id = '{$id}'");
            echo "no_error";
        }elseif(($action=="delete")){

            $id=filter_input(INPUT_POST,'id');
            $table=filter_input(INPUT_POST,'table');
            $ff=filter_input(INPUT_POST,'ff');

            delete($table,"{$ff} = '{$id}'");
            echo "no_error";
            
        }else{
            exit("<script>window.location='../../index.php';</script>");
        }
?>