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
    $update_datetime = date('Y-m-d H:i:s');
    $action = filter_input(INPUT_POST, 'action');
        if(($action=="update")){
           
            $rid=filter_input(INPUT_POST,'rid');
            $grade_key=filter_input(INPUT_POST,'check_grade');
            $term_key=filter_input(INPUT_POST,'check_term');
            $cid=filter_input(INPUT_POST,'cid');
            $pay=filter_input(INPUT_POST,'pay');
            $pid=filter_input(INPUT_POST,'pid');
            $grade_txt=filter_input(INPUT_POST,'grade_txt');

            $manage=filter_input(INPUT_POST,'manage');

            $check_id=filter_input(INPUT_POST,'check_id');

            //$aid = check_session("admin_id_aba");
            //$update_date = date('Y-m-d H:i:s');
            //$grade_txt=filter_input(INPUT_POST,'grade_txt');

            $list=base64_encode($grade_key);
            $check_term=base64_encode($term_key);
            $grade_txt=base64_encode($grade_txt);

            $check_id=base64_encode($check_id);
        
        
                //echo "rid->".$rid."check_grade->".$grade_key."check_term->".$term_key."cid->".$cid."pay->".$pay."pid->".$pid."aid->".$aid."<br>"; 
        
                $show_sql = "SELECT * 
                        FROM tb_classroom_detail a 
                        INNER JOIN tb_student b ON a.student_id = b.student_id 
                        WHERE a.classroom_t_id='{$rid}' 
                        AND a.grade_id = '{$grade_key}' 
                        AND a.term_id = '{$term_key}' 
                        AND a.classroom_detail_status='1' 
                        AND (b.student_no != '0' OR b.student_no != '') 
                        ORDER BY b.student_no ASC"; 
                $show_list = result_array($show_sql);
        
                foreach ($show_list as $key => $show_row){
                    $cb_chk="chk".$show_row["student_id"];
                    $chk=filter_input(INPUT_POST,$cb_chk);
        
                    if((is_null($chk))){
                        $chk=0;
                    }else{
                        $chk;
                    }
        
                    $cb_id="id".$show_row["student_id"];
                    $id=filter_input(INPUT_POST,$cb_id);
        
                    //echo $chk."<br>";
        
                    if(($pay==5)){
                        $data = array(
                            "score_double_student" => $chk,
                            "admin_id" => $aid ,
                            "admin_update" => $update_datetime
                        );
                
                        update("tb_payment_student", $data, "payment_student_id = '{$id}' AND payment_id = '{$pid}'");
                    }else{
        
                        $data = array(
                            "payment_student_score$pay" => $chk,
                            "admin_id" => $aid ,
                            "admin_update" => $update_datetime
                        );
                
                        update("tb_payment_student", $data, "payment_student_id = '{$id}' AND payment_id = '{$pid}'");           
                    }
        
        //echo $show_row["student_id"]."/".$chk."/(".$id.") /<br>";
        
                }

            exit("<script>window.location='../../?modules=payment_show&check_grade=$list&check_term=$check_term&grade_txt=$grade_txt&check_id=$check_id';</script>");
            

        }else{}
?>