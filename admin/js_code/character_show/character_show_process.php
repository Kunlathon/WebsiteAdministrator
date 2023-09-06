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

            $asid= filter_input(INPUT_POST, 'asid');
            $clid= filter_input(INPUT_POST, 'clid');
            $check_grade= filter_input(INPUT_POST, 'check_grade');
            $check_term= filter_input(INPUT_POST, 'check_term');
            $classroom_t_key=filter_input(INPUT_POST,'classroom_t_key');

            //$count = count($id);
            $count=count($_POST["id"]);

            for($i=0;$i<$count;$i++){
                $id=$_POST["id"][$i];
                $score=$_POST["score"][$i];
                $sql = "SELECT * FROM tb_character_detail WHERE character_detail_id = '{$id}' AND character_detail_id='{$asid}'";
                $data = row_array($sql);

                $data = array(
                        "score" => $score,
                        "admin_id" => $aid ,
                        "admin_update" => $update
                );

                update("tb_character_detail", $data, "character_detail_id = '{$id}'");
            }

            $id=base64_encode($classroom_t_key);
            $check_term=base64_encode($check_term);
            $check_grade=base64_encode($check_grade);
            exit("<script>window.location='../../?modules=character_show&id=$id&check_term=$check_term&check_grade=$check_grade';</script>");

        }elseif(($action=="create_AddRate2")){
            $asid= filter_input(INPUT_POST, 'asid');
            $clid= filter_input(INPUT_POST, 'clid');
            $check_grade= filter_input(INPUT_POST, 'check_grade');
            $check_term= filter_input(INPUT_POST, 'check_term');
            $classroom_t_key=filter_input(INPUT_POST,'classroom_t_key');

            //$count = count($id);
            $count=count($_POST["id"]);

            for($i=0;$i<$count;$i++){
                $id=$_POST["id"][$i];
                $score=$_POST["score"][$i];
                $sql = "SELECT * FROM tb_character_detail WHERE character_detail_id = '{$id}' AND character_detail_id='{$asid}'";
                $data = row_array($sql);

                $data = array(
                        "score" => $score,
                        "admin_id" => $aid ,
                        "admin_update" => $update
                );

                update("tb_character_detail", $data, "character_detail_id = '{$id}'");
            }

            $id=base64_encode($classroom_t_key);
            $check_term=base64_encode($check_term);
            $check_grade=base64_encode($check_grade);
            exit("<script>window.location='../../?modules=character_show&id=$id&check_term=$check_term&check_grade=$check_grade';</script>");

        }elseif(($action=="create_AddRate3")){
            $asid= filter_input(INPUT_POST, 'asid');
            $clid= filter_input(INPUT_POST, 'clid');
            $check_grade= filter_input(INPUT_POST, 'check_grade');
            $check_term= filter_input(INPUT_POST, 'check_term');
            $classroom_t_key=filter_input(INPUT_POST,'classroom_t_key');



            //$count = count($id);
            $count=count($_POST["id"]);

            for($i=0;$i<$count;$i++){
                $id=$_POST["id"][$i];
                $score=$_POST["score"][$i];
                $sql = "SELECT * FROM tb_character_detail WHERE character_detail_id = '{$id}' AND character_detail_id='{$asid}'";
                $data = row_array($sql);

                $data = array(
                        "score" => $score,
                        "admin_id" => $aid ,
                        "admin_update" => $update
                );

                update("tb_character_detail", $data, "character_detail_id = '{$id}'");
            }

                $id=base64_encode($classroom_t_key);
                $check_term=base64_encode($check_term);
                $check_grade=base64_encode($check_grade);
                exit("<script>window.location='../../?modules=character_show&id=$id&check_term=$check_term&check_grade=$check_grade';</script>");

        }else{}

?>

