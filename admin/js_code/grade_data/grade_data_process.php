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

    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");
    check_login('admin_username_aba', 'login.php');

?>

<?php
    $aid = check_session("admin_id_aba");
    $update = date('Y-m-d H:i:s');
    $action = filter_input(INPUT_POST, 'action');
        
        if(($action=="create")){

            $name=filter_input(INPUT_POST, 'grade_name');
            $name_eng=filter_input(INPUT_POST, 'grade_name_eng');
            $detail=filter_input(INPUT_POST, 'grade_detail');

            function fnc_count($name){
                $s = "SELECT * FROM tb_grade WHERE grade_name = '$name'";
                $q = row_array($s);
                return is_array($q) ? "0" : "1";
            }

            $check = fnc_count($name);

                if(($check)){
                    $data = array(
                        "grade_name" => $name ,
                        "grade_name_eng" => $name_eng ,
                        "grade_detail" => $detail ,
                        "grade_status" => 1 ,
                        "admin_id" => $aid 
                    );
                    insert("tb_grade", $data);
                    echo "no_error";
                }else{
                    echo "it_error";
                }            

        }elseif(($action=="update")){
            $name=filter_input(INPUT_POST, 'grade_name');
            $name_eng=filter_input(INPUT_POST, 'grade_name_eng');
            $detail=filter_input(INPUT_POST, 'grade_detail');
            $grade_key=filter_input(INPUT_POST, 'grade_key');

            $data = array(
                "grade_name" => $name ,
                "grade_name_eng" => $name_eng ,
                "grade_detail" => $detail ,
                "admin_id" => $aid
            );
    
        update("tb_grade", $data, "grade_id = '{$grade_key}'");

        echo "no_error";

        }elseif(($action=="delete")){

            $grade_key=filter_input(INPUT_POST, 'grade_key');
            $table=filter_input(INPUT_POST, 'table');
            $ff=filter_input(INPUT_POST, 'ff');

            delete($table,"{$ff} = '{$grade_key}'");

            echo "no_error";

        }else{}
?>