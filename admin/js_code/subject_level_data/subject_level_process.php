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
    $aid = check_session("admin_id_lcm");
    $update = date('Y-m-d H:i:s');
    $action=filter_input(INPUT_POST,'action');
        if(($action=="create")){

            $name=filter_input(INPUT_POST,'name');
            $ename=filter_input(INPUT_POST,'ename');


            function fnc_count($name){
                $s = "SELECT * FROM tb_subject_level WHERE subject_level_name = '$name'";
                $q = row_array($s);
            
                return is_array($q) ? "0" : "1";
            }
            
            $check = fnc_count($name);

                if(($check)){

                    $data = array(
                        "subject_level_name" => $name ,
                        "subject_level_name_eng" => $ename ,			
                        "admin_id" => $aid 
                    );
                    insert("tb_subject_level", $data);
                    echo "no_error";
                }else{
                    echo "it_error";
                }
        }elseif(($action=="update")){

            $name=filter_input(INPUT_POST,'name');
            $ename=filter_input(INPUT_POST,'ename');
            $subject_level_key=filter_input(INPUT_POST,'subject_level_key');
       
            $data = array(
                    "subject_level_name" => $name ,
                    "subject_level_name_eng" => $ename ,
                    "admin_id" => $aid 
            );
        
            update("tb_subject_level", $data, "subject_level_id = '{$subject_level_key}'");            
            echo "no_error";
        }elseif(($action=="delete")){
            $subject_level_key=filter_input(INPUT_POST,'subject_level_key');
            $table="tb_subject_level";
            $ff="subject_level_id";
            delete($table,"{$ff} = '{$subject_level_key}'");
            echo "no_error";
        }else{}
?>


