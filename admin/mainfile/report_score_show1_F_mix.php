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

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    if((preg_match("/payment_show.php/", $_SERVER['PHP_SELF']))){
        Header("Location:../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
        <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=report_score" class="breadcrumb-item"> ผลคะแนน</a>

                        <a href="#" class="breadcrumb-item"> แบบรายงานผลคะแนน</a>

                    </div>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>

<div class="content">
    <?php
        $id=filter_input(INPUT_GET,'id');
        $classroom=filter_input(INPUT_GET,'classroom');
        $check_grade=filter_input(INPUT_GET,'check_grade');
        $check_term=filter_input(INPUT_GET,'check_term');

            if((isset($id,$classroom,$check_grade,$check_term))){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <div class="row">
        <div class="col-<?php echo $grid;?>-12">
            <div class="card border border-purple">
                <div class="card-body">
<?php                
$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$classroom=isset($_REQUEST['classroom']) ? $_REQUEST['classroom'] : '';

$check_grade = 1;

if (isset($_REQUEST['check_term'])) {
$check_term=$_REQUEST['check_term'];
$sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
$row = row_array($sql);	
$term1="$row[term]";
$year1="$row[year]";
$year2=$year1-543;
$term="$row[term]/$row[year]";
} else if (!isset($_REQUEST['check_term'])) {
$sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
$row = row_array($sql);
$check_term=$row['term_id'];
$term1="$row[term]";
$year1="$row[year]";
$year2=$year1-543;
$term="$row[term]/$row[year]";
} 

$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id WHERE b.classroom_t_id='{$classroom}' AND c.student_id='{$id}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.course_class_status='1'";

//echo $sql;
$row = row_array($sql);

$course = $row['course_class_id'];
$courses_id = $row['course_s_id'];
$student_id = $row['student_id'];
$course_type = $row['course_class_type'];

$filedoc = $row['classroom_name'];
$file_explode = explode(" ",$filedoc);
$file_explode1 = $file_explode[0];
$file_explode2 = $file_explode[1];
$class_name = $file_explode2;
?>


            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">หน้าแรก</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="?modules=report_score_list">ผลคะแนน</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="?modules=report_score_1&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>">ผลคะแนนระดับชั้นประถมศึกษา </a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>GPA</span>
                            </li>
                        </ul>
                    <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <div class="form-group">
                        <div class="col-md-12" align="center">
                            <label class="col-md-12 control-label">
                            <br>
                            <strong>แบบรายงานผลพัฒนาคุณภาพผู้เรียนรายบุคคล / Assessment Report, Secondary Level<br>
                            โรงเรียนยุวฑูตศึกษาราชพฤกษ์ / Ambassador Bilingual Academy<br>
                            การประเมินผลสัมฤทธิ์ ปีการศึกษา <?php echo $year1;?> / Assessment Academic Year <?php echo $year2;?><br>
                            <!--การประเมินผลสัมฤทธิ์ ภาคเรียนที่ <?php echo $term1;?> ปีการศึกษา <?php echo $year1;?> / Assessment Academic Year <?php echo $term1;?>/<?php echo $year2;?><br>-->
                            <div style="display:block;width:500px;height:15px">
                            <?php 
                                $txt = $row['classroom_name'];
                                $txt_grade = substr($txt, 6 , 1);
                            ?>
                                <strong>ชั้นประถมศึกษาปีที่ <?php echo $row['classroom_year'];?> / Grade <?php echo $txt_grade;?></strong><br>
                            <!--ชั้นมัธยมศึกษาปีที่ <?php echo $row['classroom_year'];?> /Grade <?php echo $row['classroom_name'];?><br>-->
                            </strong>
                        </div>
                     </div>
                    
                    <div>&nbsp;</div>

                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PROJECT-->


                    <div class="row">
                        <div class="col-md-12">
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">

                                <div class="portlet-body">
                                    <div class="table-container">

                        <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <?php 
                                $txt2 = $row['classroom_name'];
                                $txt_grade2 = substr($txt2, 7);
                            ?>

                                        <table class="table">
                                                <tr>
                                                    <td width="130" align="left"> เลขประจำตัวนิสิต : </td>
                                                    <td width="40" align="left">&nbsp;<?php echo $row['student_id'];?></td>  
                                                    <td width="140"align="left"> ชื่อ - สกุล : </td>
                                                    <td width="230" align="left">&nbsp;<?php echo $row['student_name'];?><?php echo $row['student_surname'];?></td>  
                                                    <td width="80" align="left"> ระดับชั้น :  </td>
                                                    <td width="80" align="left">&nbsp;ป.<?php echo class_status($txt_grade);?><?php echo $txt_grade2;?></td> 
                                                    <!--<td width="80" align="left">&nbsp;ป.<?php echo $row['classroom_year'];?><?php echo $txt_grade2;?></td>--> 
                                                    <td width="40" align="left"> เลขที่  </td>
                                                    <td width="40" align="left">&nbsp;<?php echo $row['student_no'];?></td>
                                                </tr>
                                                <tr>
                                                    <td width="130" align="left"> Student ID : </td>
                                                    <td width="40" align="left">&nbsp;<?php echo $row['student_id'];?></td> 
                                                    <td width="140"> Name - Surname : </td>
                                                    <td width="230" align="left">&nbsp;<?php echo $row['student_name_eng'];?><?php echo $row['student_surname_eng'];?></td> 
                                                    <td width="80" align="left"> Grade :  </td>
                                                    <td width="80" align="left">&nbsp;G.<?php echo $class_name;?></td>
                                                    <td width="40" align="left"> No.  </td>
                                                    <td width="40" align="left">&nbsp;<?php echo $row['student_no'];?></td>
                                                </tr>
                                        </table>
                                </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->

                                <div class="portlet-body">
                                    <!--<div class="table-scrollable">-->
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr bgcolor="#dcdcdc">
                                                    <th width="30"> ลำดับ <br>No.</th>
                                                    <th width="80">รหัสวิชา <br>Subject Code</th>  
                                                    <th> รายวิชา/Subject </th>
                                                    <th width="120"> เทอม 1 / Term 1 <br>100% </th>
                                                    <th width="120"> เทอม 2 / Term 2 <br>100% </th>
                                                    <th width="120"> คะแนนรวม/Total <br>100% </th>
                                                    <th width="120"> ผลการเรียน <br>Grade </th>
                                                    <th width="80"> Remark </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $score1 = 0;
                                                $score2 = 0;
                                                $score3 = 0;
                                                $score4 = 0;

                                                $sum_s1 = 0;
                                                $max_s1 = 0;

                                                $score12 = 0;
                                                $score22 = 0;
                                                $score32 = 0;
                                                $score42 = 0;

                                                $sum_s2 = 0;
                                                $max_s2 = 0;

                                                $score13 = 0;
                                                $score23 = 0;
                                                $score33 = 0;
                                                $score43 = 0;

                                                $sum_s3 = 0;
                                                $max_s3 = 0;

                                                $score14 = 0;
                                                $score24 = 0;
                                                $score34 = 0;
                                                $score44 = 0;

                                                $sum_s4 = 0;
                                                $max_s4 = 0;

                                                $summary_grade = 0;

                                                $total_subweight1 = 0;
                                                $total_subweight2 = 0;
                                                $total_subweight3 = 0;
                                                $total_subweight_show1 = 0;
                                                $total_subweight_show3 = 0;

                                                $gpa = 0;
                                                $total_gpa1 = 0;
                                                $total_gpa = 0;

                                                $no =1;

                                                $sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id !='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";

                                                //echo $sql;
                                                $list = result_array($sql);
                                            ?>
                                            <?php 
                                            $key1 = 1;
                                            foreach ($list as $key => $row) { 


                                        //ตรวจสอบรายวิชา

                                        if ($txt_grade == "1") {
                                            $subject_code_1 = "ส11111";
                                            $subject_code_2 = "พ11111";
                                            $subject_code_3 = "ศ11111";

                                        } else if ($txt_grade == "2") {												
                                            $subject_code_1 = "ส12111";
                                            $subject_code_2 = "พ12111";
                                            $subject_code_3 = "ศ12111";

                                        } else if ($txt_grade == "3") {
                                            $subject_code_1 = "ส13111";
                                            $subject_code_2 = "พ13111";
                                            $subject_code_3 = "ศ13111";

                                        } else if ($txt_grade == "4") {
                                            $subject_code_1 = "ส14111";
                                            $subject_code_2 = "พ14111";
                                            $subject_code_3 = "ศ14111";

                                        } else if ($txt_grade == "5") {
                                            $subject_code_1 = "ส15111";
                                            $subject_code_2 = "พ15111";
                                            $subject_code_3 = "ศ15111";

                                        } else if ($txt_grade == "6") {
                                            $subject_code_1 = "ส16111";
                                            $subject_code_2 = "พ16111";
                                            $subject_code_3 = "ศ16111";

                                        } 

                                        if($row['subject_code'] == $subject_code_1 || $row['subject_code'] == $subject_code_2 || $row['subject_code'] == $subject_code_3) { // ตรวจสอบรายวิชา
                                        //if($subject_code_g) { // ตรวจสอบรายวิชา

                                            //echo "$subject_code_1 - $subject_code_2 - $subject_code_3  <br>";				
                                            
                                        } else {
    
                                            $coursedetail = $row['course_class_detail_id'];

                                            $subid = $row['subject_id'];		

                                            $subweight = $row['weight'];	
                                            $subtid = $row['subt_id'];	

                                            $sql111 = "SELECT * , COUNT(a.course_s_detail_id) AS NUM FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id}' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

                                            //echo "<br>$sql111";
                                            $row111 = row_array($sql111);

                                            $num_csd = $row111['NUM'];

                                            if ($num_csd  == '0') {

                                                $key1 = $key1-1;

                                            } else {				
                                        
                                            ?>
                                                <tr>
                                                    <!--<td align="center"><?php echo $key1;?></td>-->
                                                    <!--<td align="center"><?php echo $key+1;?></td>-->
                                                    <td align="center"><?php echo $no;?></td>
                                                    <td align="center"><?php echo $row['subject_code'];?></td>
                                                    <td align="left">&nbsp;<?php echo $row['subject_name'];?> / <?php echo $row['subject_name_eng'];?>&nbsp;

                                                    <?php

                                                    $course_cln = $row111['course_class_level_name'];

                                                    /*if ($course_cln == "Normal" || $course_cln == "HSL-B" || $course_cln == "HSL-I" || $course_cln == "HSL-A") {
                                                        $course_cln_show = "";

                                                    } else if ($course_cln == "TSL-B" || $course_cln == "TSL-I" || $course_cln == "TSL-A") {
                                                        $course_cln_show = "(TSL)";

                                                    } else if ($course_cln == "ESL-B" || $course_cln == "ESL-I" || $course_cln == "ESL-A") {
                                                        $course_cln_show = "(ESL)";

                                                    } else if ($course_cln == "IEP" || $course_cln == "IEP-B" || $course_cln == "IEP-I" || $course_cln == "IEP-A") {
                                                    //} else if ($course_cln == "IEP") {
                                                        $course_cln_show = "(IEP)";

                                                    } else if ($course_cln == "Pre-Intermediate") {

                                                        if(($row['subject_code'] == "ว11201") || ($row['subject_code'] == "ว12201") || ($row['subject_code'] == "ว13201") || ($row['subject_code'] == "ว14201") || ($row['subject_code'] == "ว15201") || ($row['subject_code'] == "ว16201") || ($row['subject_code'] == "ว21201") || ($row['subject_code'] == "ว22201") || ($row['subject_code'] == "ว23201") || ($row['subject_code'] == "ว21202") || ($row['subject_code'] == "ว22202") || ($row['subject_code'] == "ว23202") || ($row['subject_code'] == "ว21101") || ($row['subject_code'] == "ว22101") || ($row['subject_code'] == "ว21102") || ($row['subject_code'] == "ว22102") || ($row['subject_code'] == "ว23101") || ($row['subject_code'] == "ว23102")) {

                                                            $course_cln_show = "(IEP)";

                                                        } else if(($row['subject_code'] == "ค11201") || ($row['subject_code'] == "ค12201") || ($row['subject_code'] == "ค13201") || ($row['subject_code'] == "ค14201") || ($row['subject_code'] == "ค15201") || ($row['subject_code'] == "ค16201") || ($row['subject_code'] == "ค21201") || ($row['subject_code'] == "ค22201") || ($row['subject_code'] == "ค23201") || ($row['subject_code'] == "ค21202") || ($row['subject_code'] == "ค22202") || ($row['subject_code'] == "ค23202") || ($row['subject_code'] == "ค31201") || ($row['subject_code'] == "ค32201") || ($row['subject_code'] == "ค33201") || ($row['subject_code'] == "ค31202") || ($row['subject_code'] == "ค32202") || ($row['subject_code'] == "ค33202")) {

                                                            $course_cln_show = "(ESL)";

                                                        } else if(($row['subject_code'] == "อ21101") || ($row['subject_code'] == "อ23101") || ($row['subject_code'] == "อ22101") || ($row['subject_code'] == "อ21101") || ($row['subject_code'] == "อ23102") || ($row['subject_code'] == "อ22102") || ($row['subject_code'] == "อ21102") || ($row['subject_code'] == "อ23201") || ($row['subject_code'] == "อ23202") || ($row['subject_code'] == "อ22202") || ($row['subject_code'] == "อ21202") || ($row['subject_code'] == "อ23202") || ($row['subject_code'] == "อ21201") || ($row['subject_code'] == "อ22201")) {

                                                            $course_cln_show = "(ESL)";

                                                        } else {

                                                            $course_cln_show = "";

                                                        }

                                                    }

                                                    echo "<font color=red>$course_cln_show</font>";*/

                                                    ?>													
                                                    
                                                    </td>

                                                    <?php

                                                    $sqlSubt = "SELECT * FROM tb_subject_type WHERE subt_id='{$subtid}'";

                                                    //echo "<br>$sqlSubt";
                                                    $rowSubt = row_array($sqlSubt);
                                                    ?>
                                                    <!--<td align="center"><?php echo $rowSubt['subt_name'];?>/<?php echo $rowSubt['subt_name_eng'];?></td>-->

                                                <?php 

                                                //ตรวจสอบรายวิชา

                                                if ($txt_grade == "1") {
                                                    $subject_code_1 = "ส11101";
                                                    $subject_code_2 = "พ11101";
                                                    $subject_code_3 = "ศ11101";

                                                } else if ($txt_grade == "2") {												
                                                    $subject_code_1 = "ส12101";
                                                    $subject_code_2 = "พ12101";
                                                    $subject_code_3 = "ศ12101";

                                                } else if ($txt_grade == "3") {
                                                    $subject_code_1 = "ส13101";
                                                    $subject_code_2 = "พ13101";
                                                    $subject_code_3 = "ศ13101";

                                                } else if ($txt_grade == "4") {
                                                    $subject_code_1 = "ส14101";
                                                    $subject_code_2 = "พ14101";
                                                    $subject_code_3 = "ศ14101";

                                                } else if ($txt_grade == "5") {
                                                    $subject_code_1 = "ส15101";
                                                    $subject_code_2 = "พ15101";
                                                    $subject_code_3 = "ศ15101";

                                                } else if ($txt_grade == "6") {
                                                    $subject_code_1 = "ส16101";
                                                    $subject_code_2 = "พ16101";
                                                    $subject_code_3 = "ศ16101";

                                                } 

                                                        if($row['subject_code'] == $subject_code_1 || $row['subject_code'] == $subject_code_2 || $row['subject_code'] == $subject_code_3) { // ตรวจสอบรายวิชา
                                                            $subweight_show = $subweight ;
                                                            $subweight = $subweight*2;

                                                        } else {
                                                            $subweight_show = $subweight;
                                                            $subweight = $subweight ;

                                                        } // สิ้นสุดการตรวจสอบรายวิชา



                                                ?>


                                                    <!--<td align="center"><?php echo number_format($subweight,1);?></td>-->

                                                <?php 
                                                    if($subtid=='1'){
                                                        $total_subweight1 = $total_subweight1 + $subweight;
                                                        $total_subweight_show1 = $total_subweight_show1 + $subweight_show;

                                                    } else if($subtid=='2') {
                                                        $total_subweight2 = $total_subweight2 + $subweight;
                                                        
                                                    }
                                                        
                                                    ?>

                                            <?php		
                                            
                                            //คะแนนสอบเทอม1 

                                            $sum_s1 = 0;
                                            $max_s1 = 0;

                                            $sum_s2 = 0;
                                            $max_s2 = 0;

                                            $sqlCla1_1 = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id INNER JOIN tb_term e ON b.term_id = e.term_id WHERE b.classroom_name='{$filedoc}' AND c.student_id='{$id}' AND d.student_status='1' AND a.grade_id = '$check_grade' AND e.grade_id = '$check_grade' AND e.term = '1' AND e.year = '$year1' AND a.course_class_status='1' ORDER BY e.term_id DESC";

                                            //echo "$sqlCla1_1<br>";
                                            $rowCla1_1 = row_array($sqlCla1_1);

                                            $check_grade1 = $rowCla1_1['grade_id'];
                                            $check_term1 = $rowCla1_1['term_id'];

                                            $courses1 = $rowCla1_1['course_class_id'];
                                            $classroom_t1 = $rowCla1_1['classroom_t_id'];

                                            $courses_id1 = $rowCla1_1['course_s_id'];

                                            $sqlCouCla1 = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '$courses1' AND subject_id = '$subid' AND course_class_detail_status='1'";
                                            //echo  "$sqlCouCla1<br>";
                                            $rowCouCla1 = row_array($sqlCouCla1);
                                            
                                            $coursedetail1  = $rowCouCla1['course_class_detail_id'];

                                            //คะแนนสอบเทอม 1 ครั้งที่ 1

                                            $sql11 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id1}' AND a.course_class_detail_id = '$coursedetail1' AND a.course_class_level_check='1'";

                                            //echo $sql11;
                                            $row11 = row_array($sql11);

                                            $teacherid1 = $row11['teacher_id1'];
                                            $teacherid2 = $row11['teacher_id2'];

                                            $course_class_lid1 = $row11['course_class_level_id'];

                                            if($teacherid1 != "" && ($teacherid2 == "" || $teacherid2 == '0')) {

                                                //echo "T1-1 ";

                                                $rate1 = $row11['rate1'];

                                                $score1_1 = $row11['score1_1'];
                                                $score1_2 = $row11['score1_2'];

                                                //echo "<br>$rate1 -  $score1_1 - $score1_2<br>";

                                                $sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

                                                //echo "$sqlSco1<br><br>";
                                                $list1 = result_array($sqlSco1);

                                                //echo count($list1)."---";

                                                foreach ($list1 as $key => $rowSco1) { 

                                                    $scoreid1 = $rowSco1['score_id'];

                                                    $max_s1 = $max_s1 + $rowSco1['score_max'];

                                                    //echo $max_s1 ;

                                                    $sum_score1 = $rowSco1['score'];

                                                    $sum_s1 = $sum_s1 + $sum_score1;

                                                    $sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

                                                    $rowSco2 = row_array($sqlSco2);
                                                    $score2 = $rowSco2['score'];

                                                    $score2  = $score2;
                                                    //$score2  = number_format($score2,0);

                                                }
                                                //echo "$max_s-$sum_s-$rate1-$score1_1<br>";

                                                    if($max_s1 == "") { 
                                                        $score1 = 0;

                                                    } else if($max_s1 != "" ) { 
                                                    
                                                        $score1 = ($score1_1*$sum_s1)/$max_s1;

                                                        //echo "$score1 = ($score1_1*$sum_s1)/$max_s1;";

                                                        //echo "$summary_s1 = ($score1_1*$sum_s1)/$max_s1";
                                                    }

                                                    // if score1 == '0'

                                                    if($score1=='0' && $score2=='0') {			

                                                        $sqlCourse1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses1' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

                                                        //echo $sqlCourse1;
                                                        $rowCourse1 = result_array($sqlCourse1);

                                                        foreach ($rowCourse1 as $_rowCourse1) { 

                                                            $cc_id1 = $_rowCourse1['course_class_id'];
                                                            $cd_id1 = $_rowCourse1['course_class_detail_id'];
                                                            $cl_id1 = $_rowCourse1['course_class_level_id'];
                                                            $sj_id1 = $_rowCourse1['subject_id'];															

                                                            $sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1' AND b.course_class_level_id = '$cl_id1' AND c.subject_id = '$sj_id1'";
                                                            //echo $sql_1;
                                                            $row_1 = row_array($sql_1);

                                                            $cc__id1 = $row_1['course_class_id'];
                                                            $cd__id1 = $row_1['course_class_detail_id'];
                                                            $cl__id1 = $row_1['course_class_level_id'];
                                                            $sj__id1 = $row_1['subject_id'];		
                                                            $courses_s_id1 = $row_1['course_s_id'];	

                                                            $sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1}' AND b.course_class_detail_id='{$cd__id1}' AND b.course_class_level_id = '$cl__id1' AND c.course_s_id='{$courses_s_id1}' AND d.subject_id ='{$sj__id1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                            //echo "$sqlSco1<br><br>";
                                                            $list1 = result_array($sqlSco1);

                                                            //echo count($list1)."---";

                                                            foreach ($list1 as $key => $rowSco1) { 

                                                                $scoreid1 = $rowSco1['score_id'];

                                                                //$max_s1 = $max_s1 + $rowSco1['score_max'];

                                                                //echo "$scoreid1 - $max_s1<br>";

                                                                $sum_score1 = $rowSco1['score'];

                                                                $sum_s1 = $sum_s1 + $sum_score1;

                                                            }
                                                            //echo "$max_s1-$sum_s1-$rate1-$score1_1<br>";

                                                                if($max_s1 == "") { 
                                                                    $score1 = 0;

                                                                } else if($max_s1 != "") { 
                                                                
                                                                    $score1 = ($score1_1*$sum_s1)/$max_s1;

                                                                    //echo "$score1 = ($score1_1*$sum_s1)/$max_s1<br><br>";

                                                                    //echo "$summary_s1 = ($score1_1*$sum_s1)/$max_s1";
                                                                }

                                                                $sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1}' AND b.course_class_detail_id='{$cd__id1}' AND b.course_class_level_id = '$cl__id1' AND c.course_s_id='{$courses_s_id1}' AND d.subject_id ='{$sj__id1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                                //echo "$sqlSco2<br>";

                                                                $rowSco2 = row_array($sqlSco2);
                                                                $score_2 = $rowSco2['score'];

                                                                $score2 = $score2 + $score_2;

                                                                $score2  = $score2;
                                                                //$score2  = number_format($score2,0);

                                                        }

                                                        $score1  = $score1;
                                                        //$score1 = number_format($score1,0);

                                                        //echo "$score1 - $score2";


                                                    } else { // if score1 != 0

                                                        $score1  = $score1;
                                                        //$score1 = number_format($score1,0);

                                                    }

                                            } else if($teacherid1 != "" && $teacherid2 != "") {

                                                $rate1 = $row11['rate1'];													
                                                $rate2 = $row11['rate2'];

                                                $score1_1 = $row11['score1_1'];
                                                $score1_2 = $row11['score1_2'];

                                                //echo "T1";

                                                //echo "<br>$rate1 - $rate2 - $score1_1 - $score1_2<br>";

                                                $sqlSco1_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                //echo "$sqlSco1_1<br><br>";
                                                $list1_1 = result_array($sqlSco1_1);

                                                //echo count($list1_1)."---";

                                                $max_s1_1 = 0;
                                                $sum_s1_1 = 0;

                                                foreach ($list1_1 as $key => $rowSco1_1) { 

                                                    $scoreid1_1 = $rowSco1_1['score_id'];

                                                    $max_s1_1 = $max_s1_1 + $rowSco1_1['score_max'];

                                                    //echo $max_s1_1 ;

                                                    $sum_score1_1 = $rowSco1_1['score'];

                                                    $sum_s1_1 = $sum_s1_1 + $sum_score1_1;

                                                    $sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                    $rowSco1_2 = row_array($sqlSco1_2);
                                                    $score12 = $rowSco1_2['score'];

                                                    $score12  = $score12;
                                                    //$score12  = number_format($score12,0);

                                                }
                                                //echo "$max_s1_1-$sum_s1_1-$rate1-$score12<br>";

                                                    if($max_s1_1 == "") { 
                                                        $score11 = 0;

                                                    } else if($max_s1_1 != "" ) { 

														if ($sum_s1_1 != 0) {
																$score11 = ($score1_1*$sum_s1_1)/$max_s1_1;
														} else {
																// $sum_s is zero.
														}

                                                        //echo "$score11 = ($score1_1*$sum_s1_1)/$max_s1_1";

                                                    }

                                                    $score11 = $score11;	
                                                    //$score11 = number_format($score11,0);	

                                                //echo "T2";

                                                $sqlSco2_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

                                                //echo "$sqlSco2_1<br><br>";
                                                $list2_1 = result_array($sqlSco2_1);

                                                //echo count($list2_1)."---";

                                                $max_s2_1 = 0;
                                                $sum_s2_1 = 0;

                                                foreach ($list2_1 as $key => $rowSco2_1) { 

                                                    $scoreid2_1 = $rowSco2_1['score_id'];

                                                    $max_s2_1 = $max_s2_1 + $rowSco2_1['score_max'];

                                                    //echo $max_s2_1 ;

                                                    $sum_score2_1 = $rowSco2_1['score'];

                                                    $sum_s2_1 = $sum_s2_1 + $sum_score2_1;

                                                    $sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                    $rowSco2_2 = row_array($sqlSco2_2);
                                                    $score22 = $rowSco2_2['score'];

                                                    $score22  = $score22;
                                                    //$score22  = number_format($score22,0);

                                                }
                                                //echo "$max_s-$sum_s-$rate1-$score1_1<br>";

                                                    if($max_s2_1 == "") { 
                                                        $score21 = 0;

                                                    } else if($max_s2_1 != "" ) { 

														if ($sum_s2_1 != 0) {
															$score21 = ($score1_1*$sum_s2_1)/$max_s2_1;
														} else {
															// $sum_s is zero.
														}		

                                                        //echo "$score21 = ($score1_1*$sum_s2_1)/$max_s2_1";

                                                    }

                                                    $score21 = $score21;	
                                                    //$score21 = number_format($score21,0);

                                                    //check rate

                                                    $sum_maxs_1_1 = ($score11*$rate1)/100;																
                                                    $sum_maxs_1_2 = ($score21*$rate2)/100;	
                                                    $score1 = $sum_maxs_1_1+$sum_maxs_1_2;		

                                                    $sum_maxs_2_1 = ($score12*$rate1)/100;																
                                                    $sum_maxs_2_2 = ($score22*$rate2)/100;	
                                                    $score2 = $sum_maxs_2_1+$sum_maxs_2_2;		


                                            }				
                                            $score1 = $score1;
                                            $score2 = $score2;

                                            $score1 = number_format($score1,0);
                                            $score2 = number_format($score2,0);

                                            if($score1=='0' && $score2=='0') {
                                                $max_sum1_1 = 0;

                                            } else {
                                                $max_sum1_1 = $score1+$score2;

                                            }
                                            

                                            //echo "$max_sum1_1 = $score1+$score2<br>";
                                            
                                            //สิ้นสุดคะแนนเทอม 1 ครั้งที่ 1


                                            //คะแนนสอบเทอม 1 ครั้งที่ 2

                                            $sql11_2 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id1}' AND a.course_class_detail_id = '$coursedetail1' AND a.course_class_level_check='1'";

                                            //echo $sql11_2;
                                            $row11_2 = row_array($sql11_2);

                                            $teacherid1_2 = $row11_2['teacher_id1'];
                                            $teacherid2_2 = $row11_2['teacher_id2'];

                                            $course_class_lid1_2 = $row11_2['course_class_level_id'];

                                            if($teacherid1_2 != "" && ($teacherid2_2 == "" || $teacherid2_2 == '0')) {

                                                //echo "T1-1 ";

                                                $rate1_2 = $row11_2['rate1'];

                                                $score1_1_2 = $row11_2['score1_1'];
                                                $score1_2_2 = $row11_2['score1_2'];

                                                //echo "<br>$rate1_2 -  $score1_1_2 - $score1_2_2<br>";

                                                $sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1_2' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id' AND b.score!='0'";

                                                //echo "$sqlSco1_2<br><br>";
                                                $list1_2 = result_array($sqlSco1_2);

                                                //echo count($list1_2)."---";

                                                foreach ($list1_2 as $key => $rowSco1_2) { 

                                                    $scoreid1_2 = $rowSco1_2['score_id'];

                                                    $max_s2 = $max_s2 + $rowSco1_2['score_max'];

                                                    //echo $max_s2 ;

                                                    $sum_score1_2 = $rowSco1_2['score'];

                                                    $sum_s2 = $sum_s2 + $sum_score1_2;

                                                    $sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1_2' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id' AND b.score!='0'";

                                                    $rowSco2_2 = row_array($sqlSco2_2);
                                                    $score2_2 = $rowSco2_2['score'];

                                                    $score2_2  = $score2_2;
                                                    //$score2_2  = number_format($score2_2,0);

                                                }
                                                //echo "$max_s2-$sum_s2-$rate1_2-$score1_1_2<br>";

                                                    if($max_s2 == "") { 
                                                        $score1_2 = 0;

                                                    } else if($max_s2 != "" ) { 
                                                    
                                                        $score1_2 = ($score1_1_2*$sum_s2)/$max_s2;

                                                        //echo "$score1_2 = ($score1_1_2*$sum_s2)/$max_s2;";

                                                        //echo "$summary_s1_2 = ($score1_1_2*$sum_s2)/$max_s2";
                                                    }

                                                    // if score1_2 == '0'

                                                    if($score1_2=='0' && $score2_2=='0') {			

                                                        $sqlCourse1_2 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses1' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

                                                        //echo $sqlCourse1_2;
                                                        $rowCourse1_2 = result_array($sqlCourse1_2);

                                                        foreach ($rowCourse1_2 as $_rowCourse1_2) { 

                                                            $cc_id1_2 = $_rowCourse1_2['course_class_id'];
                                                            $cd_id1_2 = $_rowCourse1_2['course_class_detail_id'];
                                                            $cl_id1_2 = $_rowCourse1_2['course_class_level_id'];
                                                            $sj_id1_2 = $_rowCourse1_2['subject_id'];															

                                                            $sql_1_2 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1_2' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1_2' AND b.course_class_level_id = '$cl_id1_2' AND c.subject_id = '$sj_id1_2'";
                                                            //echo $sql_1_2;
                                                            $row_1_2 = row_array($sql_1_2);

                                                            $cc__id1_2 = $row_1_2['course_class_id'];
                                                            $cd__id1_2 = $row_1_2['course_class_detail_id'];
                                                            $cl__id1_2 = $row_1_2['course_class_level_id'];
                                                            $sj__id1_2 = $row_1_2['subject_id'];		
                                                            $courses_s_id1_2 = $row_1_2['course_s_id'];	

                                                            $sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_2}' AND b.course_class_detail_id='{$cd__id1_2}' AND b.course_class_level_id = '$cl__id1_2' AND c.course_s_id='{$courses_s_id1_2}' AND d.subject_id ='{$sj__id1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                            //echo "$sqlSco1_2<br><br>";
                                                            $list1_2 = result_array($sqlSco1_2);

                                                            //echo count($list1_2)."---";

                                                            foreach ($list1_2 as $key => $rowSco1_2) { 

                                                                $scoreid1_2 = $rowSco1_2['score_id'];

                                                                //$max_s2 = $max_s2 + $rowSco1_2['score_max'];

                                                                //echo "$scoreid1_2 - $max_s2<br>";

                                                                $sum_score1_2 = $rowSco1_2['score'];

                                                                $sum_s2 = $sum_s2 + $sum_score1_2;

                                                            }
                                                            //echo "$max_s2-$sum_s2-$rate1-$score1_1_2<br>";

                                                                if($max_s2 == "") { 
                                                                    $score1_2 = 0;

                                                                } else if($max_s2 != "") { 
                                                                
                                                                    $score1_2 = ($score1_1_2*$sum_s2)/$max_s2;

                                                                    //echo "$score1_2 = ($score1_1_2*$sum_s2)/$max_s2<br><br>";

                                                                    //echo "$summary_s1_2 = ($score1_1_2*$sum_s2)/$max_s2";
                                                                }

                                                                $sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_2}' AND b.course_class_detail_id='{$cd__id1_2}' AND b.course_class_level_id = '$cl__id1_2' AND c.course_s_id='{$courses_s_id1_2}' AND d.subject_id ='{$sj__id1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                                //echo "$sqlSco2_2<br>";

                                                                $rowSco2_2 = row_array($sqlSco2_2);
                                                                $score_2_2 = $rowSco2_2['score'];

                                                                $score2_2 = $score2_2 + $score_2_2;

                                                                $score2_2  = $score2_2;
                                                                //$score2_2  = number_format($score2_2,0);	

                                                        }

                                                        $score1_2  = $score1_2;
                                                        //$score1_2 = number_format($score1_2,0);	

                                                        //echo "$score1_2 - $score2_2";


                                                    } else { // if score1_2 != 0

                                                        $score1_2  = $score1_2;
                                                        //$score1_2 = number_format($score1_2,0);	

                                                    }

                                            } else if($teacherid1_2 != "" && $teacherid2_2 != "") {

                                                $rate1_2 = $row11_2['rate1'];													
                                                $rate2_2 = $row11_2['rate2'];	

                                                $score1_1_2 = $row11_2['score1_1'];
                                                $score1_2_2 = $row11_2['score1_2'];

                                                //echo "T1";

                                                //echo "<br>$rate1_2 - $rate2_2 - $score1_1_2 - $score1_2_2<br>";

                                                $sqlSco1_1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1_2' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                //echo "$sqlSco1_1_2<br><br>";
                                                $list1_1_2 = result_array($sqlSco1_1_2);

                                                //echo count($list1_1_2)."---";

                                                $max_s1_1_2 = 0;
                                                $sum_s1_1_2 = 0;

                                                foreach ($list1_1_2 as $key => $rowSco1_1_2) { 

                                                    $scoreid1_1_2 = $rowSco1_1_2['score_id'];

                                                    $max_s1_1_2 = $max_s1_1_2 + $rowSco1_1_2['score_max'];

                                                    //echo $max_s1_1_2 ;

                                                    $sum_score1_1_2 = $rowSco1_1_2['score'];

                                                    $sum_s1_1_2 = $sum_s1_1_2 + $sum_score1_1_2;

                                                    $sqlSco1_2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1_2' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                    $rowSco1_2_2 = row_array($sqlSco1_2_2);
                                                    $score12_2 = $rowSco1_2_2['score'];

                                                    $score12_2  = $score12_2;
                                                    //$score12_2  = number_format($score12_2,0);

                                                }
                                                //echo "$max_s1_1_2-$sum_s1_1_2-$rate1_2-$score12_2<br>";

                                                    if($max_s1_1_2 == "") { 
                                                        $score11_2 = 0;

                                                    } else if($max_s1_1_2 != "" ) { 
                                                    
                                                        $score11_2 = ($score1_1_2*$sum_s1_1_2)/$max_s1_1_2;

                                                        //echo "$score11_2 = ($score1_1_2*$sum_s1_1_2)/$max_s1_1_2";

                                                    }

                                                    $score11_2  = $score11_2;
                                                    //$score11_2  = number_format($score11_2,0);

                                                //echo "T2";

                                                $sqlSco2_1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1_2' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='1' AND a.score_no ='2' AND a.score_status='1' AND b.student_id='$student_id'";

                                                //echo "$sqlSco2_1_2<br><br>";
                                                $list2_1_2 = result_array($sqlSco2_1_2);

                                                //echo count($list2_1_2)."---";

                                                $max_s2_1_2 = 0;
                                                $sum_s2_1_2 = 0;

                                                foreach ($list2_1_2 as $key => $rowSco2_1_2) { 

                                                    $scoreid2_1_2 = $rowSco2_1_2['score_id'];

                                                    $max_s2_1_2 = $max_s2_1_2 + $rowSco2_1_2['score_max'];

                                                    //echo $max_s2_1_2 ;

                                                    $sum_score2_1_2 = $rowSco2_1_2['score'];

                                                    $sum_s2_1_2 = $sum_s2_1_2 + $sum_score2_1_2;

                                                    $sqlSco2_2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses1}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail1}' AND b.course_class_level_id = '$course_class_lid1_2' AND c.course_s_id='{$courses_id1}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_2}' AND a.grade_id = '{$check_grade1}' AND a.term_id = '{$check_term1}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                    $rowSco2_2_2 = row_array($sqlSco2_2_2);
                                                    $score22_2 = $rowSco2_2_2['score'];

                                                    $score22_2  = $score22_2;
                                                    //$score22_2  = number_format($score22_2,0);

                                                }
                                                //echo "$max_s2-$sum_s2-$rate1_2-$score1_1_2<br>";

                                                    if($max_s2_1_2 == "") { 
                                                        $score21_2 = 0;

                                                    } else if($max_s2_1_2 != "" ) { 
                                                    
                                                        $score21_2 = ($score1_1_2*$sum_s2_1_2)/$max_s2_1_2;

                                                        //echo "$score21_2 = ($score1_1_2*$sum_s2_1_2)/$max_s2_1_2";

                                                    }

                                                    $score21_2  = $score21_2;
                                                    //$score21_2 = number_format($score21_2,0);	

                                                    //check rate

                                                    $sum_maxs_1_1_2 = ($score11_2*$rate1_2)/100;																
                                                    $sum_maxs_1_2_2= ($score21_2*$rate2_2)/100;	
                                                    $score1_2 = $sum_maxs_1_1_2+$sum_maxs_1_2_2;		

                                                    $sum_maxs_2_1_2 = ($score12_2*$rate1_2)/100;																
                                                    $sum_maxs_2_2_2 = ($score22_2*$rate2_2)/100;	
                                                    $score2_2 = $sum_maxs_2_1_2+$sum_maxs_2_2_2;		


                                            }				
                                            $score1_2 = $score1_2;
                                            $score2_2 = $score2_2;

                                            $score1_2 = number_format($score1_2,0);
                                            $score2_2 = number_format($score2_2,0);

                                            if($score1_2=='0' && $score2_2=='0') {
                                                $max_sum1_2 = 0;

                                            } else {
                                                $max_sum1_2 = $score1_2+$score2_2;

                                            }												

                                            //echo "$max_sum1_2 = $score1_2+$score2_2<br>";
                                            
                                            //สิ้นสุดคะแนนเทอม 1 ครั้งที่ 2

                                            //echo "$max_sum1_1 = $score1+$score2<br>$max_sum1_2 = $score1_2+$score2_2<br>";

                                            $max_sum1_1 = number_format($max_sum1_1,0);		
                                            $max_sum1_2 = number_format($max_sum1_2,0);

                                            $score_show1 = ($max_sum1_1 + $max_sum1_2)/2;

                                            ?>


                                            <td align="center"><?php echo number_format($score_show1);?></td>

                                            <?php


                                            //คะแนนสอบเทอม2

                                            $sum_s3 = 0;
                                            $max_s3 = 0;

                                            $sum_s4 = 0;
                                            $max_s4 = 0;

                                            $sqlCla1_2 = "SELECT * FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id INNER JOIN tb_term e ON b.term_id = e.term_id WHERE b.classroom_name='{$filedoc}' AND c.student_id='{$id}' AND d.student_status='1' AND a.grade_id = '$check_grade' AND e.grade_id = '$check_grade' AND e.term = '2' AND e.year = '$year1' AND a.course_class_status='1' ORDER BY e.term_id DESC";

                                            //echo "$sqlCla1_2<br>";
                                            $rowCla1_2 = row_array($sqlCla1_2);

                                            $check_grade2 = $rowCla1_2['grade_id'];
                                            $check_term2 = $rowCla1_2['term_id'];

                                            $courses2 = $rowCla1_2['course_class_id'];
                                            $classroom_t2 = $rowCla1_2['classroom_t_id'];

                                            $courses_id2 = $rowCla1_2['course_s_id'];

                                            $sqlCouCla2 = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '$courses2' AND subject_id = '$subid' AND course_class_detail_status='1'";
                                            //echo  "$sqlCouCla2<br>";
                                            $rowCouCla2 = row_array($sqlCouCla2);
                                            
                                            $coursedetail2  = $rowCouCla2['course_class_detail_id'];

                                            //คะแนนสอบเทอม 2 ครั้งที่ 1

                                            $sql11_3 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id2}' AND a.course_class_detail_id = '$coursedetail2' AND a.course_class_level_check='1'";

                                            //echo "$sql11_3<br>";
                                            $row11_3 = row_array($sql11_3);

                                            $teacherid1_3= $row11_3['teacher_id1'];
                                            $teacherid2_3 = $row11_3['teacher_id2'];

                                            $course_class_lid2 = $row11_3['course_class_level_id'];

                                            if($teacherid1_3 != "" && ($teacherid2_3 == "" || $teacherid2_3 == '0')) {

                                                //echo "T1-1 ";

                                                $rate1_3 = $row11_3['rate1'];
                                                $rate2_3 = $row11_3['rate2'];

                                                $score1_1_3 = $row11_3['score1_1'];
                                                $score1_2_3= $row11_3['score1_2'];

                                                //echo "<br>$rate1_3 -  $score1_1_3 - $score1_2_3<br>";

                                                $sqlSco1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

                                                //echo "$sqlSco1_3<br><br>";
                                                $list1_3 = result_array($sqlSco1_3);

                                                //echo count($list1_3)."---";

                                                foreach ($list1_3 as $key => $rowSco1_3) { 

                                                    $scoreid1_3 = $rowSco1_3['score_id'];

                                                    $max_s3 = $max_s3 + $rowSco1_3['score_max'];

                                                    //echo $max_s3 ;

                                                    $sum_score1_3 = $rowSco1_3['score'];

                                                    $sum_s3 = $sum_s3 + $sum_score1_3;

                                                    $sqlSco2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

                                                    $rowSco2_3 = row_array($sqlSco2_3);
                                                    $score2_3 = $rowSco2_3['score'];

                                                    $score2_3  = $score2_3;
                                                    //$score2_3  = number_format($score2_3,0);

                                                }
                                                //echo "$max_s3-$sum_s3-$rate1_3-$score1_1_3<br>";

                                                    if($max_s3 == "") { 
                                                        $score1_3 = 0;

                                                    } else if($max_s3 != "" ) { 
                                                    
                                                        $score1_3 = ($score1_1_3*$sum_s3)/$max_s3;

                                                        //echo "$score1_3 = ($score1_1_3*$sum_s3)/$max_s3";

                                                        //echo "$summary_s1_3 = ($score1_1_3*$sum_s3)/$max_s3";
                                                    }

                                                    // if score1_3 == '0'

                                                    if($score1_3=='0' && $score2_3=='0') {			

                                                        $sqlCourse1_3 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses2' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

                                                        //echo $sqlCourse1_3;
                                                        $rowCourse1_3 = result_array($sqlCourse1_3);

                                                        foreach ($rowCourse1_3 as $_rowCourse1_3) { 

                                                            $cc_id1_3 = $_rowCourse1_3['course_class_id'];
                                                            $cd_id1_3 = $_rowCourse1_3['course_class_detail_id'];
                                                            $cl_id1_3 = $_rowCourse1_3['course_class_level_id'];
                                                            $sj_id1_3 = $_rowCourse1_3['subject_id'];															

                                                            $sql_1_3 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1_3' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1_3' AND b.course_class_level_id = '$cl_id1_3' AND c.subject_id = '$sj_id1_3'";
                                                            //echo $sql_1_3;
                                                            $row_1_3 = row_array($sql_1_3);

                                                            $cc__id1_3 = $row_1_3['course_class_id'];
                                                            $cd__id1_3 = $row_1_3['course_class_detail_id'];
                                                            $cl__id1_3 = $row_1_3['course_class_level_id'];
                                                            $sj__id1_3 = $row_1_3['subject_id'];		
                                                            $courses_s_id2 = $row_1_3['course_s_id'];	

                                                            $sqlSco1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_3}' AND b.course_class_detail_id='{$cd__id1_3}' AND b.course_class_level_id = '$cl__id1_3' AND c.course_s_id='{$courses_s_id2}' AND d.subject_id ='{$sj__id1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                            //echo "$sqlSco1_3<br><br>";
                                                            $list1_3 = result_array($sqlSco1_3);

                                                            //echo count($list1_3)."---";

                                                            foreach ($list1_3 as $key => $rowSco1_3) { 

                                                                $scoreid1_3 = $rowSco1_3['score_id'];

                                                                //$max_s3 = $max_s3 + $rowSco1_3['score_max'];

                                                                //echo "$scoreid1_3 - $max_s3<br>";

                                                                $sum_score1_3 = $rowSco1_3['score'];

                                                                $sum_s3 = $sum_s3 + $sum_score1_3;

                                                            }
                                                            //echo "$max_s3-$sum_s3-$rate1_3-$score1_1_3<br>";

                                                                if($max_s3 == "") { 
                                                                    $score1_3 = 0;

                                                                } else if($max_s3 != "") { 
                                                                
                                                                    $score1_3 = ($score1_1_3*$sum_s3)/$max_s3;

                                                                    //echo "$score1_3 = ($score1_1_3*$sum_s3)/$max_s3<br><br>";

                                                                    //echo "$summary_s1_3 = ($score1_1_3*$sum_s3)/$max_s3";
                                                                }

                                                                $sqlSco2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_3}' AND b.course_class_detail_id='{$cd__id1_3}' AND b.course_class_level_id = '$cl__id1_3' AND c.course_s_id='{$courses_s_id2}' AND d.subject_id ='{$sj__id1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                                //echo "$sqlSco2_3<br>";

                                                                $rowSco2_3 = row_array($sqlSco2_3);
                                                                $score_2_3 = $rowSco2_3['score'];

                                                                $score2_3 = $score2_3 + $score_2_3;

                                                                $score2_3  = $score2_3;
                                                                //$score2_3  = number_format($score2_3,0);	

                                                        }

                                                        $score1_3  = $score1_3;
                                                        //$score1_3  = number_format($score1_3,0);	

                                                        //echo "$score1_3 - $score2_3";


                                                    } else { // if score1_3 != 0

                                                        $score1_3  = $score1_3;
                                                        //$score1_3  = number_format($score1_3,0);	

                                                    }

                                            } else if($teacherid1_3 != "" && $teacherid2_3 != "") {

                                                $rate1_3 = $row11_3['rate1'];													
                                                $rate2_3 = $row11_3['rate2'];	

                                                $score1_1_3 = $row11_3['score1_1'];
                                                $score1_2_3 = $row11_3['score1_2'];

                                                //echo "T1";

                                                //echo "<br>$rate1_3 - $rate2_3 - $score1_1_3 - $score1_2_3<br>";

                                                $sqlSco1_1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                //echo "$sqlSco1_1_3<br><br>";
                                                $list1_1_3 = result_array($sqlSco1_1_3);

                                                //echo count($list1_1_3)."---";

                                                $max_s1_1_3 = 0;
                                                $sum_s1_1_3 = 0;

                                                foreach ($list1_1_3 as $key => $rowSco1_1_3) { 

                                                    $scoreid1_1_3 = $rowSco1_1_3['score_id'];

                                                    $max_s1_1_3 = $max_s1_1_3 + $rowSco1_1_3['score_max'];

                                                    //echo $max_s1_1_3 ;

                                                    $sum_score1_1_3 = $rowSco1_1_3['score'];

                                                    $sum_s1_1_3 = $sum_s1_1_3 + $sum_score1_1_3;

                                                    $sqlSco1_2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                    $rowSco1_2_3 = row_array($sqlSco1_2_3);
                                                    $score12_3 = $rowSco1_2_3['score'];

                                                    $score12_3  = $score12_3;
                                                    //$score12_3  = number_format($score12_3,0);

                                                }
                                                //echo "$max_s1_1_3-$sum_s1_1_3-$rate1_3-$score12_3<br>";

                                                    if($max_s1_1_3 == "") { 
                                                        $score11_3 = 0;

                                                    } else if($max_s1_1_3 != "" ) { 
                                                    
                                                        $score11_3 = ($score1_1_3*$sum_s1_1_3)/$max_s1_1_3;

                                                        //echo "$score11_3 = ($score1_1_3*$sum_s1_1_3)/$max_s1_1_3";

                                                    }

                                                    $score11_3  = $score11_3;
                                                    //$score11_3  = number_format($score11_3,0);

                                                //echo "T2";

                                                $sqlSco2_1_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

                                                //echo "$sqlSco2_1_3<br><br>";
                                                $list2_1_3 = result_array($sqlSco2_1_3);

                                                //echo count($list2_1_3)."---";

                                                $max_s2_1_3 = 0;
                                                $sum_s2_1_3 = 0;

                                                foreach ($list2_1_3 as $key => $rowSco2_1_3) { 

                                                    $scoreid2_1_3 = $rowSco2_1_3['score_id'];

                                                    $max_s2_1_3 = $max_s2_1_3 + $rowSco2_1_3['score_max'];

                                                    //echo $max_s2_1_3 ;

                                                    $sum_score2_1_3 = $rowSco2_1_3['score'];

                                                    $sum_s2_1_3 = $sum_s2_1_3 + $sum_score2_1_3;

                                                    $sqlSco2_2_3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_3}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                    $rowSco2_2_3 = row_array($sqlSco2_2_3);
                                                    $score22_3 = $rowSco2_2_3['score'];

                                                    $score22_3  = $score22_3;
                                                    //$score22_3  = number_format($score22_3,0);

                                                }
                                                //echo "$max_s_3-$sum_s_3-$rate1_3-$score1_1_3<br>";

                                                    if($max_s2_1_3 == "") { 
                                                        $score21_3 = 0;

                                                    } else if($max_s2_1_3 != "" ) { 
                                                    
                                                        $score21_3 = ($score1_1_3*$sum_s2_1_3)/$max_s2_1_3;

                                                        //echo "$score21_3 = ($score1_1_3*$sum_s2_1_3)/$max_s2_1_3";

                                                    }

                                                    $score21_3  = $score21_3;
                                                    //$score21_3  = number_format($score21_3,0);	

                                                    //check rate

                                                    $sum_maxs_1_1_3 = ($score11_3*$rate1_3)/100;																
                                                    $sum_maxs_1_2_3 = ($score21_3*$rate2_3)/100;	
                                                    $score1_3 = $sum_maxs_1_1_3+$sum_maxs_1_2_3;		

                                                    $sum_maxs_2_1_3 = ($score12_3*$rate1_3)/100;																
                                                    $sum_maxs_2_2_3 = ($score22_3*$rate2_3)/100;	
                                                    $score2_3 = $sum_maxs_2_1_3+$sum_maxs_2_2_3;		


                                            }				
                                            $score1_3 = $score1_3;
                                            $score2_3 = $score2_3;

                                            $score1_3 = number_format($score1_3,0);
                                            $score2_3 = number_format($score2_3,0);

                                            if($score1_3=='0' && $score2_3=='0') {
                                                $max_sum2_1 = 0;

                                            } else {
                                                $max_sum2_1 = $score1_3+$score2_3;

                                            }		


                                            //echo "$max_sum2_1 = $score1_3+$score2_3<br>";
                                            
                                            //สิ้นสุดคะแนนเทอม 2 ครั้งที่ 1


                                            //คะแนนสอบเทอม 2 ครั้งที่ 2

                                            $sql11_4 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id2}' AND a.course_class_detail_id = '$coursedetail2' AND a.course_class_level_check='1'";

                                            //echo $sql11_4;
                                            $row11_4 = row_array($sql11_4);

                                            $teacherid1_4 = $row11_4['teacher_id1'];
                                            $teacherid2_4 = $row11_4['teacher_id2'];

                                            $course_class_lid1_4 = $row11_4['course_class_level_id'];

                                            if($teacherid1_4 != "" && ($teacherid2_4 == "" || $teacherid2_4 == '0')) {

                                                //echo "T1-1 ";

                                                $rate1_4 = $row11_4['rate1'];
                                                $rate2_4 = $row11_4['rate2'];

                                                $score1_1_4 = $row11_4['score1_1'];
                                                $score1_2_4 = $row11_4['score1_2'];

                                                //echo "<br>$rate1_4 -  $score1_1_4 - $score1_2_4<br>";

                                                $sqlSco1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id' AND b.score!='0'";

                                                //echo "$sqlSco1_4<br><br>";
                                                $list1_4 = result_array($sqlSco1_4);

                                                //echo count($list1_4)."---";

                                                foreach ($list1_4 as $key => $rowSco1_4) { 

                                                    $scoreid1_4 = $rowSco1_4['score_id'];

                                                    $max_s4 = $max_s4 + $rowSco1_4['score_max'];

                                                    //echo $max_s4 ;

                                                    $sum_score1_4 = $rowSco1_4['score'];

                                                    $sum_s4 = $sum_s4 + $sum_score1_4;

                                                    $sqlSco2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id' AND b.score!='0'";

                                                    $rowSco2_4 = row_array($sqlSco2_4);
                                                    $score2_4 = $rowSco2_4['score'];

                                                    $score2_4  = $score2_4;
                                                    //$score2_4  = number_format($score2_4,0);

                                                }
                                                //echo "$max_s4-$sum_s4-$rate1_4-$score1_1_4<br>";

                                                    if($max_s4 == "") { 
                                                        $score1_4 = 0;

                                                    } else if($max_s4 != "" ) { 
                                                    
                                                        $score1_4 = ($score1_1_4*$sum_s4)/$max_s4;

                                                        //echo "$score1_4 = ($score1_1_4*$sum_s4)/$max_s4;";

                                                        //echo "$summary_s1_4 = ($score1_1_4*$sum_s4)/$max_s4";
                                                    }

                                                    // if score1_4 == '0'

                                                    if($score1_4=='0' && $score2_4=='0') {			

                                                        $sqlCourse1_4 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$courses2' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

                                                        //echo $sqlCourse1_4;
                                                        $rowCourse1_4 = result_array($sqlCourse1_4);

                                                        foreach ($rowCourse1_4 as $_rowCourse1_4) { 

                                                            $cc_id1_4 = $_rowCourse1_4['course_class_id'];
                                                            $cd_id1_4 = $_rowCourse1_4['course_class_detail_id'];
                                                            $cl_id1_4 = $_rowCourse1_4['course_class_level_id'];
                                                            $sj_id1_4 = $_rowCourse1_4['subject_id'];															

                                                            $sql_1_4 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id1_4' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id1_4' AND b.course_class_level_id = '$cl_id1_4' AND c.subject_id = '$sj_id1_4'";
                                                            //echo $sql_1_4;
                                                            $row_1_4 = row_array($sql_1_4);

                                                            $cc__id1_4 = $row_1_4['course_class_id'];
                                                            $cd__id1_4 = $row_1_4['course_class_detail_id'];
                                                            $cl__id1_4 = $row_1_4['course_class_level_id'];
                                                            $sj__id1_4 = $row_1_4['subject_id'];		
                                                            $courses_s_id1_4 = $row_1_4['course_s_id'];	

                                                            $sqlSco1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_4}' AND b.course_class_detail_id='{$cd__id1_4}' AND b.course_class_level_id = '$cl__id1_4' AND c.course_s_id='{$courses_s_id1_4}' AND d.subject_id ='{$sj__id1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                            //echo "$sqlSco1_4<br><br>";
                                                            $list1_4 = result_array($sqlSco1_4);

                                                            //echo count($list1_4)."---";

                                                            foreach ($list1_4 as $key => $rowSco1_4) { 

                                                                $scoreid1_4 = $rowSco1_4['score_id'];

                                                                //$max_s4 = $max_s4 + $rowSco1_4['score_max'];

                                                                //echo "$scoreid1_4 - $max_s4<br>";

                                                                $sum_score1_4 = $rowSco1_4['score'];

                                                                $sum_s4 = $sum_s4 + $sum_score1_4;

                                                            }
                                                            //echo "$max_s4-$sum_s4-$rate1-$score1_1_4<br>";

                                                                if($max_s4 == "") { 
                                                                    $score1_4 = 0;

                                                                } else if($max_s4 != "") { 
                                                                
                                                                    $score1_4 = ($score1_1_4*$sum_s4)/$max_s4;

                                                                    //echo "$score1_4 = ($score1_1_4*$sum_s4)/$max_s4<br><br>";

                                                                    //echo "$summary_s1_4 = ($score1_1_4*$sum_s4)/$max_s4";
                                                                }

                                                                $sqlSco2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id1_4}' AND b.course_class_detail_id='{$cd__id1_4}' AND b.course_class_level_id = '$cl__id1_4' AND c.course_s_id='{$courses_s_id1_4}' AND d.subject_id ='{$sj__id1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                                //echo "$sqlSco2_4<br>";

                                                                $rowSco2_4 = row_array($sqlSco2_4);
                                                                $score_2_4 = $rowSco2_4['score'];

                                                                $score2_4 = $score2_4 + $score_2_4;

                                                                $score2_4  = $score2_4;
                                                                //$score2_4  = number_format($score2_4,0);	

                                                        }

                                                        $score1_4 = $score1_4;	
                                                        //$score1_4 = number_format($score1_4,0);	

                                                        //echo "$score1_4 - $score2_4";


                                                    } else { // if score1_4 != 0

                                                        $score1_4 = $score1_4;	
                                                        //$score1_4 = number_format($score1_4,0);	

                                                    }

                                            } else if($teacherid1_4 != "" && $teacherid2_4 != "") {

                                                $rate1_4 = $row11_4['rate1'];
                                                $rate2_4 = $row11_4['rate2'];

                                                $score1_1_4 = $row11_4['score1_1'];
                                                $score1_2_4 = $row11_4['score1_2'];

                                                //echo "T1";

                                                //echo "<br>$rate1_4 - $rate2_4 - $score1_1_4 - $score1_2_4<br>";

                                                $sqlSco1_1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                //echo "$sqlSco1_1_4<br><br>";
                                                $list1_1_4 = result_array($sqlSco1_1_4);

                                                //echo count($list1_1_4)."---";

                                                $max_s1_1_4 = 0;
                                                $sum_s1_1_4 = 0;

                                                foreach ($list1_1_4 as $key => $rowSco1_1_4) { 

                                                    $scoreid1_1_4 = $rowSco1_1_4['score_id'];

                                                    $max_s1_1_4 = $max_s1_1_4 + $rowSco1_1_4['score_max'];

                                                    //echo $max_s1_1_4 ;

                                                    $sum_score1_1_4 = $rowSco1_1_4['score'];

                                                    $sum_s1_1_4 = $sum_s1_1_4 + $sum_score1_1_4;

                                                    $sqlSco1_2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                    $rowSco1_2_4 = row_array($sqlSco1_2_4);
                                                    $score12_4 = $rowSco1_2_4['score'];

                                                    $score12_4  = $score12_4;
                                                    //$score12_4  = number_format($score12_4,0);

                                                }
                                                //echo "$max_s1_1_4-$sum_s1_1_4-$rate1_4-$score12_4<br>";

                                                    if($max_s1_1_4 == "") { 
                                                        $score11_4 = 0;

                                                    } else if($max_s1_1_4 != "" ) { 
                                                    
                                                        $score11_4 = ($score1_1_4*$sum_s1_1_4)/$max_s1_1_4;

                                                        //echo "$score11_4 = ($score1_1_4*$sum_s1_1_4)/$max_s1_1_4";

                                                    }

                                                    $score11_4 = $score11_4;	
                                                    //$score11_4 = number_format($score11_4,0);	

                                                //echo "T2";

                                                $sqlSco2_1_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='1' AND a.score_no ='2' AND a.score_status='1' AND b.student_id='$student_id'";

                                                //echo "$sqlSco2_1_4<br><br>";
                                                $list2_1_4 = result_array($sqlSco2_1_4);

                                                //echo count($list2_1_4)."---";

                                                $max_s2_1_4 = 0;
                                                $sum_s2_1_4 = 0;

                                                foreach ($list2_1_4 as $key => $rowSco2_1_4) { 

                                                    $scoreid2_1_4 = $rowSco2_1_4['score_id'];

                                                    $max_s2_1_4 = $max_s2_1_4 + $rowSco2_1_4['score_max'];

                                                    //echo $max_s2_1_4 ;

                                                    $sum_score2_1_4 = $rowSco2_1_4['score'];

                                                    $sum_s2_1_4 = $sum_s2_1_4 + $sum_score2_1_4;

                                                    $sqlSco2_2_4 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$courses2}' AND b.score!='0' AND b.course_class_detail_id='{$coursedetail2}' AND b.course_class_level_id = '$course_class_lid2' AND c.course_s_id='{$courses_id2}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2_4}' AND a.grade_id = '{$check_grade2}' AND a.term_id = '{$check_term2}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='2' AND b.student_id='$student_id'";

                                                    $rowSco2_2_4 = row_array($sqlSco2_2_4);
                                                    $score22_4 = $rowSco2_2_4['score'];

                                                    $score22_4  = $score22_4;
                                                    //$score22_4  = number_format($score22_4,0);

                                                }
                                                //echo "$max_s4-$sum_s4-$rate1_4-$score1_1_4<br>";

                                                    if($max_s2_1_4 == "") { 
                                                        $score21_4 = 0;

                                                    } else if($max_s2_1_4 != "" ) {  
														
															if ($sum_s2_1_4 != 0) {
																$score21_4 = ($score1_1_4*$sum_s2_1_4)/$max_s2_1_4;
														   } else {
																// $sum_s is zero.
															}
                                                    
                                                        //echo "$score21_4 = ($score1_1_4*$sum_s2_1_4)/$max_s2_1_4";

                                                    }

                                                    $score21_4 = $score21_4;	
                                                    //$score21_4 = number_format($score21_4,0);		

                                                    //check rate

                                                    $sum_maxs_1_1_4 = ($score11_4*$rate1_4)/100;																
                                                    $sum_maxs_1_2_4= ($score21_4*$rate2_4)/100;	
                                                    $score1_4 = $sum_maxs_1_1_4+$sum_maxs_1_2_4;		

                                                    $sum_maxs_2_1_4 = ($score12_4*$rate1_4)/100;																
                                                    $sum_maxs_2_2_4 = ($score22_4*$rate2_4)/100;	
                                                    $score2_4 = $sum_maxs_2_1_4+$sum_maxs_2_2_4;		


                                            }				
                                            $score1_4 = $score1_4;
                                            $score2_4 = $score2_4;

                                            $score1_4 = number_format($score1_4,0);
                                            $score2_4 = number_format($score2_4,0);

                                            if($score1_4=='0' && $score2_4=='0') {
                                                $max_sum2_2 = 0;

                                            } else {
                                                $max_sum2_2 = $score1_4+$score2_4;

                                            }		

                                            //echo "$max_sum2_2 = $score1_4+$score2_4<br><br>";
                                            
                                            //สิ้นสุดคะแนนเทอม 2 ครั้งที่ 2

                                            //echo "$max_sum2_1 = $score1_3+$score2_3<br>$max_sum2_2 = $score1_4+$score2_4<br><br>";

                                            //echo "$max_sum1_1 - $max_sum1_2 ||  $max_sum2_1 - $max_sum2_2<br>";

                                            $max_sum2_1 = number_format($max_sum2_1,0);		
                                            $max_sum2_2 = number_format($max_sum2_2,0);

                                            $score_show2 = ($max_sum2_1 + $max_sum2_2)/2;

                                            ?>


                                            <td align="center"><?php echo number_format($score_show2);?></td>


                                                    <?php 

                                                    /*$max_sum1_1 = number_format($max_sum1_1,0);		
                                                    $max_sum1_2 = number_format($max_sum1_2,0);
                                                    $max_sum2_1 = number_format($max_sum2_1,0);		
                                                    $max_sum2_2 = number_format($max_sum2_2,0);
                                                    
                                                    
                                                    $summary_grade = (((($max_sum1_1 + $max_sum1_2)/2) + (($max_sum2_1 + $max_sum2_2)/2))/2);*/	
                                                    
                                                    $score_show1 = number_format($score_show1,0);		
                                                    $score_show2 = number_format($score_show2,0);
                                                    
                                                    
                                                    $summary_grade = ((($score_show1) + ($score_show2))/2);	
                                                    ?>

                                                    <td align="center"><?php echo number_format($summary_grade,0);?></td>
                                                    <td align="center">
                                                    <?php 															

                                                        if(($summary_grade >= 79.5) && ($summary_grade <= 100)){
                                                            $show_grade = "4.0";

                                                        } else if(($summary_grade >= 74.5) && ($summary_grade < 79.5)){
                                                            $show_grade = "3.5";

                                                        } else if(($summary_grade >= 69.5) && ($summary_grade < 74.5)){
                                                            $show_grade = "3.0";

                                                        } else if(($summary_grade >= 64.5) && ($summary_grade < 69.5)){
                                                            $show_grade = "2.5";

                                                        } else if(($summary_grade >= 59.5) && ($summary_grade < 64.5)){
                                                            $show_grade = "2.0";

                                                        } else if(($summary_grade >= 54.5) && ($summary_grade < 59.5)){
                                                            $show_grade = "1.5";

                                                        } else if(($summary_grade >= 49.5) && ($summary_grade < 54.5)){
                                                            $show_grade = "1.0";

                                                        } else if(($summary_grade >= 0) && ($summary_grade < 49.5)){
                                                            $show_grade = "0.0";

                                                        }


                                                        echo $show_grade;

                                                        $gpa = $subweight_show * $show_grade;
                                                        //$gpa = $subweight * $show_grade;
                                                        $total_gpa1 = $total_gpa1 + $gpa;

                                                    ?>

                                                    </td>
                                                    <td align="center">

                                                    <?php

                                                    if ($course_cln == "Normal" || $course_cln == "HSL-B" || $course_cln == "HSL-I" || $course_cln == "HSL-A") {
                                                        $course_cln_show = "";

                                                    } else if ($course_cln == "TSL-B" || $course_cln == "TSL-I" || $course_cln == "TSL-A") {
                                                        
                                                        if(($row['subject_code'] == "ส11111") || ($row['subject_code'] == "ส11102") || ($row['subject_code'] == "ส12102") || ($row['subject_code'] == "ส13102") || ($row['subject_code'] == "ส14102") || ($row['subject_code'] == "ส15102") || ($row['subject_code'] == "ส16102") || ($row['subject_code'] == "ส12111") || ($row['subject_code'] == "ส12121") || ($row['subject_code'] == "ส13111") || ($row['subject_code'] == "ส13121") || ($row['subject_code'] == "ส14111") || ($row['subject_code'] == "ส14121") || ($row['subject_code'] == "ส15111") || ($row['subject_code'] == "ส15121") || ($row['subject_code'] == "ส16111") || ($row['subject_code'] == "ส16121") || ($row['subject_code'] == "ส31121") || ($row['subject_code'] == "ส31122") || ($row['subject_code'] == "ส11101") || ($row['subject_code'] == "ส12101") || ($row['subject_code'] == "ส13101") || ($row['subject_code'] == "ส14101") || ($row['subject_code'] == "ส15101")  || ($row['subject_code'] == "ส16101") || ($row['subject_code'] == "ส21102") || ($row['subject_code'] == "ส21122") || ($row['subject_code'] == "ส22102") || ($row['subject_code'] == "ส22122") || ($row['subject_code'] == "ส23112") || ($row['subject_code'] == "ส23122") || ($row['subject_code'] == "ส32121") || ($row['subject_code'] == "ส32122") || ($row['subject_code'] == "ส23121") || ($row['subject_code'] == "ส22121") || ($row['subject_code'] == "ส21121") || ($row['subject_code'] == "ส22101")) {
                                                            $course_cln_show = "";
                                                        } else {
                                                            $course_cln_show = "(TSL)";

                                                        }

                                                    } else if ($course_cln == "ESL-B" || $course_cln == "ESL-I" || $course_cln == "ESL-A") {
                                                    //} else if ($course_cln == "ESL") {
                                                        $course_cln_show = "(ESL)";

                                                    } else if ($course_cln == "IEP" || $course_cln == "IEP-B" || $course_cln == "IEP-I" || $course_cln == "IEP-A") {
                                                        $course_cln_show = "(IEP)";

                                                    } else if ($course_cln == "Pre-Intermediate") {

                                                        if(($row['subject_code'] == "ว11201") || ($row['subject_code'] == "ว12201") || ($row['subject_code'] == "ว13201") || ($row['subject_code'] == "ว14201") || ($row['subject_code'] == "ว15201") || ($row['subject_code'] == "ว16201") || ($row['subject_code'] == "ว21201") || ($row['subject_code'] == "ว22201") || ($row['subject_code'] == "ว23201") || ($row['subject_code'] == "ว21202") || ($row['subject_code'] == "ว22202") || ($row['subject_code'] == "ว23202") || ($row['subject_code'] == "ว21101") || ($row['subject_code'] == "ว22101") || ($row['subject_code'] == "ว21102") || ($row['subject_code'] == "ว22102") || ($row['subject_code'] == "ว23101") || ($row['subject_code'] == "ว23102")) {

                                                            $course_cln_show = "(IEP)";

                                                        } else if(($row['subject_code'] == "ค11201") || ($row['subject_code'] == "ค12201") || ($row['subject_code'] == "ค13201") || ($row['subject_code'] == "ค14201") || ($row['subject_code'] == "ค15201") || ($row['subject_code'] == "ค16201") || ($row['subject_code'] == "ค21201") || ($row['subject_code'] == "ค22201") || ($row['subject_code'] == "ค23201") || ($row['subject_code'] == "ค21202") || ($row['subject_code'] == "ค22202") || ($row['subject_code'] == "ค23202") || ($row['subject_code'] == "ค31201") || ($row['subject_code'] == "ค32201") || ($row['subject_code'] == "ค33201") || ($row['subject_code'] == "ค31202") || ($row['subject_code'] == "ค32202") || ($row['subject_code'] == "ค33202")) {

                                                            $course_cln_show = "(ESL)";

                                                        } else if(($row['subject_code'] == "อ21101") || ($row['subject_code'] == "อ23101") || ($row['subject_code'] == "อ22101") || ($row['subject_code'] == "อ21101") || ($row['subject_code'] == "อ23102") || ($row['subject_code'] == "อ22102") || ($row['subject_code'] == "อ21102") || ($row['subject_code'] == "อ23201") || ($row['subject_code'] == "อ23202") || ($row['subject_code'] == "อ22202") || ($row['subject_code'] == "อ21202") || ($row['subject_code'] == "อ23202") || ($row['subject_code'] == "อ21201") || ($row['subject_code'] == "อ22201")) {

                                                            $course_cln_show = "(ESL)";

                                                        } else {

                                                            $course_cln_show = "";

                                                        }

                                                    }

                                                    echo "<font size=1.9>$course_cln_show</font>";

                                                    ?>

                                                    <?php
                                                    //Rescore

                                                    //$rescore_1 = $rescore_memo1_1 + $rescore_memo1_2 + $rescore_memo1_3 + $rescore_memo1_4 + $rescore_memo1_5 + $rescore_memo1_6 + $rescore_memo2_1 + $rescore_memo2_2 + $rescore_memo2_3 + $rescore_memo2_4 + $rescore_memo2_5 + $rescore_memo2_6;

                                                    //echo "$rescore_1 = $rescore_memo1_1 + $rescore_memo1_2 + $rescore_memo1_3 + $rescore_memo1_4 + $rescore_memo1_5 + $rescore_memo1_6 + $rescore_memo2_1 + $rescore_memo2_2 + $rescore_memo2_3 + $rescore_memo2_4 + $rescore_memo2_5 + $rescore_memo2_6";


                                                    /*if ($rescore_1 > 0) {
                                                        $rescore_show = "<font size='2'>Rescore</font>";

                                                    } else {
                                                        $rescore_show = "";

                                                    }*/ 

                                                    //echo "$rescore_show";


                                                    ?>

                                                    </td>
                                                </tr>
                                                <?php
                                                $no = $no+1;
                                                } //จบการตรวจสอบ

                                                $score1 = 0;
                                                $score2 = 0;

                                                $sum_s = 0;
                                                $max_s = 0;

                                                $score12 = 0;
                                                $score22 = 0;

                                                $sum_s2 = 0;
                                                $max_s2 = 0;

                                                $summary_grade = 0;
                                                } 

                                                $key1 = $key1+1;

                                            }
                                                ?>

                                                <tr>
                                                    <td align="left" colspan="8"><strong>กิจกรรมพัฒนาผู้เรียน / Learner Development Activities</strong></td>
                                                </tr>

                                                <?php 
                                                $sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";
                                                $list = result_array($sql);
                                            ?>
                                            <?php foreach ($list as $key => $row) { ?>

                                                <tr>
                                                    <td align="center">&nbsp;</td>
                                                    <td align="center">กิจกรรม</td>
                                                    <td align="left" colspan="4">&nbsp;<?php echo $row['subject_name'];?> / <?php echo $row['subject_name_eng'];?></td>
                                                    <td align="center" width="80">ผ่าน/PASS</td>
                                                    <!--<td align="center" width="80">N/A</td>-->
                                                    <td align="center">&nbsp;</td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td align="left" colspan="7">&nbsp;</td>
                                                </tr>
                                                 <tr>
                                                    <td align="left" colspan="4">
                                                    <table class="table table-striped table-hover">
                                                    <tr>
                                                        <td align="left" colspan="2"><strong>การประเมินคุณลักษณะ / Character Evaluation</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">คุณลักษณะอันพึงประสงค์ของสถานศึกษา / Desirable characteristics<br>
                                                        (The Basic Education Core Curriculum)
                                                        </td>

                                                        <?php
                                                        $sqlScoC1 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='1') AND b.classroom_t_id = '{$classroom}' AND b.student_id='$student_id' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

                                                        //echo $sqlSco1;
                                                        $rowScoC1 = result_array($sqlScoC1);

                                                        foreach ($rowScoC1 as $key => $_rowScoC1) {

                                                            $score_max_1 = $score_max_1 + $_rowScoC1['score_max'];
                                                            $score_max_100_1 = 100;

                                                            $sum_score_max_1 = $sum_score_max_1 + $_rowScoC1['score'];
                                                            $sum_score_max_100_1 = ($sum_score_max_1*$score_max_100_1)/$score_max_1;
                                                        }

                                                        if($sum_score_max_100_1 >= 90) {
                                                            $analysis1 = "ดีเยี่ยม/EXCELLENT";
                                                            $analysis_num1 = "3";

                                                        } else if($sum_score_max_100_1 >= 75) {
                                                            $analysis1 = "ดี/GOOD	";
                                                            $analysis_num1 = "2";

                                                        } else if($sum_score_max_100_1 >= 60) {
                                                            $analysis1 = "ผ่าน/PASS";
                                                            $analysis_num1 = "1";

                                                        } else if($sum_score_max_100_1 < 60) {
                                                            $analysis1 = "ไม่ผ่าน/FAIL";
                                                            $analysis_num1 = "0";

                                                        }			
                                                        
                                                    ?>
                                                        <td align="center" width="80"><?php echo $analysis1;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">การอ่าน คิด วิเคราะห์และเขียน / Capacity for communication,<br>
                                                        thinking, problem-solving and applying life skills</td>

                                                        <?php
                                                        $sqlScoC2 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='2') AND b.classroom_t_id = '{$classroom}' AND b.student_id='$student_id' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

                                                        //echo $sqlSco2;
                                                        $rowScoC2 = result_array($sqlScoC2);

                                                        foreach ($rowScoC2 as $key => $_rowScoC2) {
                                                            $sum_score_max_2 = $sum_score_max_2 + $_rowScoC2['score'];

                                                        }

                                                        if($sum_score_max_2 >= 90) {
                                                            $analysis2 = "ดีเยี่ยม/EXCELLENT";
                                                            $analysis_num2 = "3";

                                                        } else if($sum_score_max_2 >= 75) {
                                                            $analysis2 = "ดี/GOOD	";
                                                            $analysis_num2 = "2";

                                                        } else if($sum_score_max_2 >= 60) {
                                                            $analysis2 = "ผ่าน/PASS";
                                                            $analysis_num2 = "1";

                                                        } else if($sum_score_max_2 < 60) {
                                                            $analysis2 = "ไม่ผ่าน/FAIL";
                                                            $analysis_num2 = "0";

                                                        }			
                                                        
                                                    ?>
                                                        <td align="center" width="80"><?php echo $analysis2;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">กิจกรรมพัฒนาผู้เรียน / Student activities</td>

                                                        <?php
                                                        $sqlScoC3 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='3') AND b.classroom_t_id = '{$classroom}' AND b.student_id='$student_id' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

                                                        //echo $sqlSco2;
                                                        $rowScoC3 = result_array($sqlScoC3);

                                                        foreach ($rowScoC3 as $key => $_rowScoC3) {
                                                            $sum_score_max_3 = $_rowScoC3['score'];

                                                        }

                                                        if($sum_score_max_3 == '0') {
                                                            $analysis3 = "N/A";

                                                        } else if($sum_score_max_3 == '1') {
                                                            $analysis3 = "ผ่าน/PASS";

                                                        } else if($sum_score_max_3 == '2') {
                                                            $analysis3 = "ไม่ผ่าน/FAIL";

                                                        } 		
                                                        
                                                    ?>
                                                        <td align="center" width="80"><?php echo $analysis3;?></td>

                                                    </tr>

                                                    </table>

                                                    <table class="table table-striped table-hover">
                                                    <tr>
                                                        <td align="left" colspan="2"><strong>สรุปผลการประเมิน / Summary</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">จำนวนหน่วยกิตวิชาพื้นฐาน / Credit for core subjects
                                                        </td>
                                                        <td align="center" width="80"><?php echo number_format($total_subweight_show1,1);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">จำนวนหน่วยกิตวิชาเพิ่มเติม / Credit for supplementary subjects</td>
                                                        <td align="center" width="80"><?php echo number_format($total_subweight2,1);?></td>
                                                    </tr>
                                                    <?php 
                                                    $total_subweight3 = $total_subweight1 + $total_subweight2;
                                                    $total_subweight_show3 = $total_subweight_show1 + $total_subweight2;
                                                    
                                                    ?>
                                                    <tr>
                                                        <td align="left">รวมหน่วยกิต / Total</td>
                                                        <td align="center" width="80"><?php echo number_format($total_subweight_show3,1);?></td>
                                                    </tr>
                                                    <?php $total_gpa = $total_gpa1/$total_subweight_show3;?>
                                                    <tr>
                                                        <td align="left">ระดับผลการเรียนเฉลี่ย / GPA.</td>
                                                        <td align="center" width="80"><?php echo number_format($total_gpa,2);?></td>
                                                    </tr>

                                                    </table>

                                                    </td>

                        <?php
                            $sql1 = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id='{$classroom}' AND classroom_status='1'";
                            //echo $sql1;
                            $cc1 = row_array($sql1);
                        ?>
                        <?php 
                            $tid1=$row['teacher_id1'];
                            $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '$cc1[teacher_id1]'";
                            $rowT1= row_array($sqlT1);
                        ?>
                        <?php 
                            $tid2=$row['teacher_id2'];
                            $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '$cc1[teacher_id2]'";
                            $rowT2= row_array($sqlT2);
                        ?>
                        <?php 
                            $tid3=$row['teacher_id3'];
                            $sqlT3 = "SELECT * FROM tb_teacher WHERE teacher_id = '$cc1[teacher_id3]'";
                            $rowT3= row_array($sqlT3);
                        ?>
                                                    <td align="center" colspan="3">
                                                    <table class="table table-striped table-hover">
                                                    <tr>
                                                        <td align="center">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">ลงชื่อ ............................................</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">( <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?> )</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                    <?php 
                                                        if($cc1['position_id1']=='1'){
                                                            echo "English Homeroom Teacher";
                                                        } else if($cc1['position_id1']=='2'){
                                                            echo "Academic Affairs";															
                                                        }

                                                    ?>
                                                    </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">ลงชื่อ ............................................</td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center">( <?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?> )</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">Thai Homeroom Teacher</td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">ลงชื่อ ............................................</td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center">( <?php echo $rowT3['teacher_name'];?>&nbsp;<?php echo $rowT3['teacher_surname'];?> )</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">Academic Affairs</td>
                                                    </tr>

                                                    </table>

                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    <!--</div>-->
                                </div>
                            </div>
                            </div>
                                
                            <!-- END SAMPLE TABLE PORTLET-->


                                            <div align="left"><strong><u>หมายเหตุ</u> : N/A = Not Applicable / ยังไม่มีการประเมินผล จะประเมินเมื่อสิ้นปีการศึกษา</div>		
                        
                                    </div>
                                </div>
                            </div>
                            
                            <!-- End: life time stats -->
                        </div>
                    </div>

                    <!-- END PROJECT-->


                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
                
                </div>
            </div>
        </div>
    </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ }?>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }
?>