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
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

?>


<?php include ("../../config/connect.ini.php"); ?>
<?php include ("../../config/fnc.php"); ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

<?php
    $aid = check_session("admin_id_aba");
    $update = date('Y-m-d H:i:s');
    $action = filter_input(INPUT_POST, 'action');

        if(($action=="create_AddRate")){

            $asid=filter_input(INPUT_POST, 'asid');
            $clid=filter_input(INPUT_POST, 'clid');
            $check_grade=filter_input(INPUT_POST, 'check_grade');
            $check_term=filter_input(INPUT_POST, 'check_term');
            $ctid=filter_input(INPUT_POST, 'ctid');

            $count = count($_POST["id"]);

        

            for($i=0;$i<$count;$i++){
                $id=$_POST["id"][$i];
                $score=$_POST["score"][$i];

                //echo "id->".$id."score->".$score."<br>";


                $sql = "SELECT * 
                        FROM `tb_assessment_detail` 
                        WHERE `assessment_detail_id` = '{$id}' 
                        AND `assessment_detail_id`='{$asid}'";
                $data = row_array($sql);
            
                $data = array(
                        "score" => $score,
                        "admin_id" => $aid ,
                        "admin_update" => $update
                );
            
                update("tb_assessment_detail", $data, "assessment_detail_id = '{$id}'");

            }

            $id=base64_encode($clid);
            $check_grade=base64_encode($check_grade);
            $check_term=base64_encode($check_term);

            exit("<script>window.location='../../?modules=assessment_th_show&id=$id&check_grade=$check_grade&check_term=$check_term';</script>");

        }elseif(($action=="create_Comment")){

            $assid=filter_input(INPUT_POST, 'assid');
            $sid=filter_input(INPUT_POST, 'sid');
            $check_grade=filter_input(INPUT_POST, 'check_grade');
            $check_term=filter_input(INPUT_POST, 'check_term');
            $txtdetail=filter_input(INPUT_POST, 'txtdetail');
            $clid=filter_input(INPUT_POST, 'clid');

            $db = connect();
            $txt_detail = mysqli_real_escape_string($db ,$txtdetail);
        
            $data = array(
                    "memo" => $txt_detail
            );
        
            update("tb_assessment_detail", $data, "assessment_detail_id = '{$assid}' AND student_id='{$sid}'");

            echo "no_error";

        }else{} 
    
    ?>