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
    $aid = check_session("admin_id_aba");
    $update = date('Y-m-d H:i:s');
    $action=filter_input(INPUT_POST,'action');
        if(($action=="create")){

            $code=filter_input(INPUT_POST,'code');
            $name=filter_input(INPUT_POST,'name');
            $ename=filter_input(INPUT_POST,'ename');
            $unit=filter_input(INPUT_POST,'unit');
            $subt=filter_input(INPUT_POST,'subt');
            $grade=filter_input(INPUT_POST,'grade');


            function fnc_count_code($code){
                $s = "SELECT * FROM tb_subject WHERE subject_code = '$code'";
                $q = row_array($s);
            
                return is_array($q) ? "0" : "1";
            }
            
            function fnc_count($code,$name)   
            {
                $s = "SELECT * FROM tb_subject WHERE subject_code = '$code' AND subject_name = '$name'";
                $q = row_array($s);
            
                return is_array($q) ? "0" : "1";
            }

            if(($subt==4)) {
                $weight=0;
            }else{
                $weight=$unit/40;
            }

            $check = fnc_count($code,$name);

                if(($check)){

                    $data = array(
                        "subject_code" => $code ,
                        "subject_name" => $name ,
                        "subject_name_eng" => $ename ,
                        "unit" => $unit ,
                        "weight" => $weight ,
                        "subt_id" => $subt ,
                        "grade_id" => $grade ,				
                        "admin_id" => $aid ,
                        "admin_update" => $update,
                        "subject_status" => 1 
                    );
                    insert("tb_subject", $data);
                    echo "no_error";
                }else{
                    echo "it_error";
                }
        }elseif(($action=="update")){

            $code=filter_input(INPUT_POST,'code');
            $name=filter_input(INPUT_POST,'name');
            $ename=filter_input(INPUT_POST,'ename');
            $unit=filter_input(INPUT_POST,'unit');
            $subt=filter_input(INPUT_POST,'subt');
            $grade=filter_input(INPUT_POST,'grade');
            $id=filter_input(INPUT_POST,'id');

            if(($subt==4)) {
                $weight=0;
        
            }else{
                $weight = $unit/40;
            }
        
            $data = array(
                    "subject_code" => $code ,
                    "subject_name" => $name ,
                    "subject_name_eng" => $ename ,
                    "unit" => $unit ,
                    "weight" => $weight ,
                    "subt_id" => $subt ,
                    "grade_id" => $grade ,
                    "admin_id" => $aid ,
                    "admin_update" => $update,
            );
        
            update("tb_subject", $data, "subject_id = '{$id}'");            
            echo "no_error";
        }elseif(($action=="delete")){
            $id=filter_input(INPUT_POST,'id');
            $table="tb_subject";
            $ff="subject_id";
            delete($table,"{$ff} = '{$id}'");
            echo "no_error";
        }else{}
?>


