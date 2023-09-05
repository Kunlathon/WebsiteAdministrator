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

    //header("Content-Type: text/html;charset=UTF-8");

    error_reporting (E_ALL ^ E_NOTICE);
    ini_set('display_errors', 'On');
?>
<?php
        if((preg_match("/course_manage.php/", $_SERVER['PHP_SELF']))){
            Header("Location: ../index.php");
            die();
        }else{
            if((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        
        if((isset($_POST['course_class_key']))){
            $course_class_key=filter_input(INPUT_POST, 'course_class_key');
        }else{
            if((isset($_GET['id']))){
                $course_class_key=filter_input(INPUT_GET, 'id');
            }else{}
        }

        if((isset($_POST['class_key']))){
            $class_key=filter_input(INPUT_POST, 'class_key');
        }else{
            if((isset($_GET['rid']))){
                $class_key=filter_input(INPUT_GET, 'rid');
            }else{}
        }

        if((isset($_POST['check_term']))){
            $check_term=filter_input(INPUT_POST, 'check_term');
        }else{
            if((isset($_GET['check_term']))){
                $check_term=filter_input(INPUT_GET, 'check_term');
            }else{}
        }

        if((isset($_POST['check_grade']))){
            $check_grade=filter_input(INPUT_POST, 'check_grade');
        }else{
            if((isset($_GET['check_grade']))){
                $check_grade=filter_input(INPUT_GET, 'check_grade');
            }else{}
        }
        
       /* $course_class_key="8";
        $class_key="11";
        $check_term="2";
        $check_grade="2";*/
    ?>


    <?php

        if((isset($class_key))) {
            $check_id=$class_key;
            $sqlC = "SELECT * 
                    FROM `tb_classroom_teacher` 
                    WHERE `classroom_t_id` = '{$check_id}'";
            $rowC = row_array($sqlC);	
            $cid = $rowC["classroom_t_id"];
            $class = $rowC["classroom_name"];
        }else{}
    
        if((isset($check_grade))){
            $sql = "SELECT * 
                    FROM `tb_grade` 
                    WHERE `grade_id` = '{$check_grade}'";
            $row = row_array($sql);	
            $grade="ระดับชั้น".$row["grade_name"];
        }else{
            $grade="";
        }         

        if((isset($check_term))) {
            $sql = "SELECT * 
                    FROM `tb_term` 
                    WHERE `term_id` = '{$check_term}' 
                    AND `grade_id` = '{$check_grade}' 
                    ORDER BY `year` 
                    DESC , `term` DESC";
            $row = row_array($sql);	
            $term=$row["term"]."/".$row["year"];
            $year=$row["year"];
        }else{
            $sql = "SELECT * 
                    FROM `tb_term` 
                    WHERE `term_status` = '1'
                    AND `grade_id` = '{$check_grade}' 
                    ORDER BY `year` 
                    DESC , `term` DESC";
            $row = row_array($sql);
            $check_term=$row['term_id'];
            $term=$row["term"]."/".$row["year"];
            $year=$row["year"];
        }

        
        $tid1=$rowC['teacher_id1'];
        $sqlT1 = "SELECT * 
                  FROM `tb_teacher` 
                  WHERE `teacher_id` = '{$tid1}'";
        $rowT1= row_array($sqlT1);
    
        if((isset($rowC['teacher_id2']))){
            if(($rowC['teacher_id2']!=null and $rowC['teacher_id2']!=0)){
                $tid2=$rowC["teacher_id2"];
                $sqlT2 = "SELECT * 
                        FROM `tb_teacher` 
                        WHERE `teacher_id` = '{$tid2}'";
                $rowT2= row_array($sqlT2);
                $txt_teacher_name="&nbsp;,&nbsp;ครูประจำชั้น(Thai)&nbsp;:&nbsp;".$rowT2['teacher_name']."&nbsp;".$rowT2['teacher_surname'];;
            }else{
                $txt_teacher_name="&nbsp;";
            }
        }else{
           $txt_teacher_name="&nbsp;";
        }

        if((isset($rowC['teacher_esl']))){
            if(($rowC['teacher_esl']!=null and $rowC['teacher_esl']!=0)){
                $tidE=$rowC['teacher_esl'];
                $sqlTE= "SELECT * 
                         FROM `tb_teacher` 
                         WHERE `teacher_id` = '{$tidE}'";
                $rowTE= row_array($sqlTE);
                $txt_teacher_name_eng="ESL Teacher : ".$rowTE['teacher_name_eng']."&nbsp;".$rowTE['teacher_surname_eng'];
            }else{
                $txt_teacher_name_eng="&nbsp;";
            }
        }else{
            $txt_teacher_name_eng="&nbsp;";
        }
    
    ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=course_show_class" class="breadcrumb-item"> xxx</a>

                        <a href="#" class="breadcrumb-item"> xx</a>


                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
    
        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <div>บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year;?> ภาคเรียน <?php echo $term;?></div>
                    <div><?php echo $grade;?> / <?php echo $class;?></div>
                    <div>ครูประจำชั้น(Eng) : <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname']."&nbsp;".$txt_teacher_name;?></div>
                    <div><?php echo $txt_teacher_name_eng;?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card">
						<div class="card-header bg-info text-white header-elements-inline">
							<h6 class="card-title">บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year;?> ภาคเรียน <?php echo $term;?></h6>
						</div>

						<div class="card-body">
							
<input name="course_class_key" id="course_class_key" type="hidden" value="<?php echo $course_class_key;?>">
<input name="class_key" id="class_key" type="hidden" value="<?php echo $class_key;?>">
<input name="check_term" id="check_term" type="hidden" value="<?php echo $check_term;?>">
<input name="check_grade" id="check_grade" type="hidden" value="<?php echo $check_grade;?>"> 

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">

                                            <div id="course_manage_show"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>

                                        </div>
                                    </div>

						</div>
					</div>
                </div>
            </div>

        </div>




<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }else{} ?>
<?php   } ?>