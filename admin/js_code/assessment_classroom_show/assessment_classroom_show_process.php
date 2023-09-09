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
//no_error
//it_error
//filter_input(INPUT_POST,'xxxx')
?>

<?php include '../../config/connect.ini.php'; ?>
<?php include '../../config/fnc.php'; ?>

<?php check_login('admin_username_lcm', 'login.php'); ?>
<?php
    $aid=check_session("admin_id");
    $update=date('Y-m-d H:i:s');
    $action=filter_input(INPUT_POST, 'action');
      
        if(($action=="create_form_classroom")){

            $id=filter_input(INPUT_POST,'id');
            $cid=filter_input(INPUT_POST,'cid');
            $term=filter_input(INPUT_POST,'term');
            $grade=filter_input(INPUT_POST,'grade');
            $classroom=filter_input(INPUT_POST,'classroom');

            $sql = "SELECT * , b.student_no AS STNO FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.term_id = '{$term}' AND a.grade_id='{$grade}' AND a.classroom_t_id='{$classroom}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC";    
            $list = result_array($sql);
            
            foreach ($list as $key => $row) { 
            
            $student_id = $row['student_id'];
            $memo = null;
                    
                    $sqlST = "SELECT * FROM tb_student WHERE student_id = '$student_id'";
                    $rowST = row_array($sqlST);
            
                    $data = array(
                        "a_classroom_id" => $id ,
                        "student_no" => $rowST['student_no'] ,
                        "student_id" => $rowST['student_id'] ,
                        "a_student_type" => 1 ,
                        "memo" => $memo ,
                        "term_id" => $term ,
                        "grade_id" => $grade ,
                        "admin_id" => $aid ,
                        "admin_update" => $update,
                        "a_classroom_detail_status" => 1 ,		
                    );
                    insert("tb_assessment_classroom_detail", $data);
            }   

            echo "no_error";
        }elseif(($action=="create_form_student")){
            $id=filter_input(INPUT_POST,'id');
            $class=filter_input(INPUT_POST,'class_id');
            $term=filter_input(INPUT_POST,'term');
            $grade=filter_input(INPUT_POST,'grade');
            $student_id=filter_input(INPUT_POST,'student_id');
            $memo=filter_input(INPUT_POST,'memo');
            function fnc_count($student_id,$term,$grade){
                $s = "SELECT * FROM tb_assessment_classroom_detail WHERE student_id = '{$student_id}' AND term_id ='{$term}' AND grade_id='{$grade}'";
                $q = row_array($s);
                return is_array($q) ? "0" : "1";
            }
            $check = fnc_count($student_id,$term,$grade);
                if(($check)){
                    $sqlST = "SELECT * FROM `tb_student` WHERE `student_id` = '{$student_id}'";
                    $rowST = row_array($sqlST);
                    $data = array("a_classroom_id" => $cid ,
                                  "student_no" => @$rowST['student_no'] ,
                                  "student_id" => @$rowST['student_id'] ,
                                  "a_student_type" => 1 ,
                                  "memo" => $memo ,
                                  "term_id" => $term ,
                                  "grade_id" => $grade ,
                                  "admin_id" => $aid ,
                                  "admin_update" => $update,
                                  "a_classroom_detail_status" => 1);
                    insert("tb_assessment_classroom_detail", $data);
                    echo "no_error";
                }else{
                    echo "it_error";
                }
        }elseif(($action=="create_form_student_class")){

            $status=filter_input(INPUT_POST,'status');
            $id=filter_input(INPUT_POST,'student_id');
            $stu_no=filter_input(INPUT_POST,'stu_no');
            $dateout=filter_input(INPUT_POST,'dateout');
            $check_grade=filter_input(INPUT_POST,'check_grade');
            $check_term=filter_input(INPUT_POST,'check_term');
            $cid=filter_input(INPUT_POST,'cid');
            
                if($status==2){

                    //$dateout = date('Y-m-d');
                
                    $data = array(
                            "student_no" => $stu_no ,
                            "date_out" => $dateout ,	
                            "admin_id" => $aid ,
                            "admin_update" => $update,
                            "student_status" => $status 
                            
                    );
                
                } else {
                
                    $data = array(
                            "student_no" => $stu_no ,
                            "admin_id" => $aid ,
                            "admin_update" => $update,
                            "student_status" => $status 
                            
                    );
                
                }
                
                    update("tb_student", $data, "student_id = '{$id}'");
                
                    $data2 = array(
                            "student_no" => $stu_no ,
                            "admin_id" => $aid ,
                            "admin_update" => $update
                            
                    );
                
                    update("tb_classroom_detail", $data2, "student_id = '{$id}'");
                
                    /*$data3 = array(
                            "student_no" => $stu_no
                
                    );
                
                    update("tb_assessment_classroom_detail", $data3, "student_id = '{$id}'");*/
                
                    if($status==2){
                
                        $table = "tb_classroom_detail";
                
                        delete($table,"classroom_t_id = '{$cid}' AND student_id = '{$id}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}'");
                
                    }
                    
                    echo "no_error";

        }elseif(($action=="delete")){
            @$table = filter_input(INPUT_POST, 'table');
            @$ff = filter_input(INPUT_POST, 'ff');
            @$id = filter_input(INPUT_POST, 'id');
        
            delete($table, "{$ff} = '{$id}'");
        
            echo "no_error";
        }else{}
    
    ?>