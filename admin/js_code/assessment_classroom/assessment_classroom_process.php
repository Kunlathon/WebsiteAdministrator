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
        if(($action=="create")){

            $classroomid=filter_input(INPUT_POST,'classroomid');
            $teacher1=filter_input(INPUT_POST,'teacher1');
            $position1=filter_input(INPUT_POST,'position1');
            $teacher2=filter_input(INPUT_POST,'teacher2');
            $teacher_esl=filter_input(INPUT_POST,'teacher_esl');
            $teacher3=filter_input(INPUT_POST,'teacher3');
            $term=filter_input(INPUT_POST,'term');
            $grade=filter_input(INPUT_POST,'grade');

            $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroomid}' AND grade_id='{$grade}' AND term_id='{$term}'";
            $row = row_array($sql);
    
            $name = @$row['classroom_name'];
            $ename = @$row['classroom_name_eng'];
    
            $cyear = @$row['classroom_year'];
    
            $data = array(
                "classroom_t_id" => $classroomid ,
                "a_classroom_name" => $name ,
                "a_classroom_name_eng" => $ename ,
                //"a_classroom_class" => $class ,
                "a_classroom_year" => $cyear ,
                //"a_student_num" => $num ,						
                //"building_id" => $building ,
                "teacher_id1" => $teacher1 ,
                "position_id1" => $position1 ,
                "teacher_id2" => $teacher2 ,
                "teacher_id3" => $teacher3 ,
                "teacher_esl" => $teacher_esl ,				
                "term_id" => $term ,
                "grade_id" => $grade ,
                "admin_id" => $aid ,
                "admin_update" => $update,
                "a_classroom_status" => 1
                
            );
    
            insert("tb_assessment_classroom", $data);
            echo "no_error";

        }elseif($action=="update"){

            $classroomid=filter_input(INPUT_POST,'classroomid');
            $teacher1=filter_input(INPUT_POST,'teacher1');
            $position1=filter_input(INPUT_POST,'position1');
            $teacher2=filter_input(INPUT_POST,'teacher2');
            $teacher_esl=filter_input(INPUT_POST,'teacher_esl');
            $teacher3=filter_input(INPUT_POST,'teacher3');
            $term=filter_input(INPUT_POST,'term');
            $grade=filter_input(INPUT_POST,'grade');
            $a_classroom_id=filter_input(INPUT_POST,'a_classroom_id');

            $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$classroomid' AND grade_id='$grade' AND term_id='$term'";
            $row = row_array($sql);
        
            $name = $row['classroom_name'];
            $ename = $row['classroom_name_eng'];
        
            $cyear = $row['classroom_year'];
        
            $data = array(
                    "classroom_t_id" => $classroomid ,
                    "a_classroom_name" => $name ,
                    "a_classroom_name_eng" => $ename ,
                    //"a_classroom_class" => $class ,
                    "a_classroom_year" => $cyear ,
                    //"a_student_num" => $num ,						
                    //"a_building_id" => $building ,
                    "teacher_id1" => $teacher1 ,
                    "position_id1" => $position1 ,
                    "teacher_id2" => $teacher2 ,
                    "teacher_id3" => $teacher3 ,
                    "teacher_esl" => $teacher_esl ,		
                    "term_id" => $term ,
                    "grade_id" => $grade ,
                    "admin_id" => $aid ,
                    "admin_update" => $update
            );
        
            update("tb_assessment_classroom", $data, "a_classroom_id = '{$a_classroom_id}'");
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