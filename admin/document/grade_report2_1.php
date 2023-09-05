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

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include ('../config/connect.ini.php');
    include ('../config/fnc.php');

   



    header("Content-type:text/html; charset=UTF-8");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    
    include('../structure/link.php');
    $RunLink = new link_system();
    //$RunLink->Call_Link_System();

    error_reporting (E_ALL ^ E_NOTICE);
    //ini_set('error_reporting', E_ALL);
    //ini_set('display_errors', 1);
    
    check_login('admin_username_aba','login.php');
    
            $id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

            $classroom=isset($_REQUEST['classroom']) ? $_REQUEST['classroom'] : '';

            $check_grade = 2;

            $exam_no="1";

        if (isset($_REQUEST['check_term'])) {
            $check_term=$_REQUEST['check_term'];
            $sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '{$check_term}' ORDER BY a.year DESC , a.term DESC";
            $row = row_array($sql);	
            $term1="$row[term]";
            $year1="$row[year]";
            $year2=$year1-543;
            $term="$row[term]/$row[year]";
            $date_score_1="$row[score_1]";
        } else if (!isset($_REQUEST['check_term'])) {
            $sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_status = '1' ORDER BY a.year DESC , a.term DESC";
            $row = row_array($sql);
            $check_term=$row['term_id'];
            $term1="$row[term]";
            $year1="$row[year]";
            $year2=$year1-543;
            $term="$row[term]/$row[year]";
            $date_score_1="$row[score_1]";
        }else{} 

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


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>โรงเรียนยุวทูตศึกษาราชพฤกษ์</title>



        <link rel="shortcut icon" href="<?php echo $RunLink->Call_Link_System(); ?>/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $RunLink->Call_Link_System(); ?>/images/favicon.ico" type="image/x-icon">

<!--Code Print css-->
        <link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System(); ?>/js_code/tool_js/print/test_img/css/normalize.css">
		<link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System(); ?>/js_code/tool_js/print/test_img/css/paper.css"> 	
<!--Code Print css End-->	

        <link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System(); ?>/document2/css/fonts/th_niramit_as.css" />

        <style>
			body{
				font-family: "THNiramitAS";
				font-size: 14px;
				color: #032E3B;
				
			}
		</style>

        <style>
			@media print {
				
				@page{
					size: A4;
					margin: 1 cm;
				}
				
				button {
					display:none;
				}
				
				#p_echo{
					display:none;
				}
				
				body{
					font-family: "THNiramitAS";
					font-size: 12pt; 
							
				}
			}
			
			body{
				width: 210mm; height: 297mm;
			}
			.imgA{
				width: 210mm; height: 297mm;
               
			}
		</style>

<!-- Core JS files -->
        <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/jquery.min.js"></script>
        <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/main/bootstrap.bundle.min.js"></script>
<!-- Core JS files -->

<!--Code Print js-->
	<script src="<?php echo $RunLink->Call_Link_System(); ?>/js_code/tool_js/print/test_img/js/html2canvas.js"></script>	
<!--Code Print js End-->

    <script type="text/javascript">
		function setScreenHWCookie() {
			$.cookie('sw', screen.width);
			//$.cookie('sh',screen.height);
			return true;
		}
		setScreenHWCookie();
	</script>

	<?php
        $width_system = filter_input(INPUT_COOKIE, 'sw');
            if (($width_system >= 1200)) {
                $grid = "xl";
            } elseif (($width_system >= 992)) {
                $grid = "lg";
            } elseif (($width_system <= 768)) {
                $grid = "md";
            } elseif (($width_system <= 576)) {
                $grid = "sm";
            } else {
                $grid = "xs";
            }
	?>


    </head>

    <body onload="window.print()">

    <div id="p_echo">
		<div class="container psrA">
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="table-responsive">
						<table class="table" align="center" style="font-size: 18px;">
							<thead>
								<tr>
									<th style="width: 20%">
										<div><button type="button"  class="btn btn-default" onclick="window.print()"><b>พิมพ์</b></button></div>
									</th>
								</tr>
								<tr>
									<th style="width: 20%">
										<div><font color="#F70105"><b>ระบบการพิมพ์  รองรับ เว็บเบราว์เซอร์  Google Chrome และ  Microsoft Edge เท่านั้น<b></font></div>
									</th>								
								</tr>
							</thead>						
						</table>
						<table class="table" align="center" style="font-size: 18px;">
							<thead>
								<tr>
									<th style="width: 20%; font-size: 18px;"><div>ขนาดกระดาษ</div></th>
									<th style="width: 20%; font-size: 18px;"><div>แนวกระดาษ</div></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div>A4&nbsp;:&nbsp;210mm&nbsp;X&nbsp;297mm</div></td>
									<td><div>แนวตั้ง</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>		
			</div>		
		</div>
	</div>

    <section  class="sheet padding-10mm imgA">

        <div style="font-weight: bold; text-align: center; font-size: 15px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        แบบรายงานผลพัฒนาคุณภาพผู้เรียนรายบุคคล / Assessment Report, Secondary Level
        </div>
        <div style="font-weight: bold; text-align: center; font-size: 15px;">  
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                โรงเรียนยุวฑูตศึกษาราชพฤกษ์ / Ambassador Bilingual Academy
        </div>
        <div style="font-weight: bold; text-align: center; font-size: 15px;">
        &nbsp;&nbsp;&nbsp;&nbsp;
                การประเมินครั้งที่ 1 ภาคเรียนที่ <?php echo $term1;?> ปีการศึกษา <?php echo $year1;?> / 1<sup>st</sup> Assessment Semester <?php echo $term1;?> Academic Year <?php echo $year2;?>
        </div>

    <?php 
        $txt = $row['classroom_name'];
        $txt_grade = substr($txt, 6 , 1);
    ?>

        <div style="font-weight: bold; text-align: center; font-size: 15px;">ชั้นมัธยมศึกษาปีที่ <?php echo class_status($txt_grade);?> / Grade <?php echo $txt_grade;?></div>

    <?php 
        $txt2 = $row['classroom_name'];
        $txt_grade2 = substr($txt2, 7);
    ?>

<table style="width: 690 px;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="font-size: 13px; width: 140px;" align="left"> เลขประจำตัวนักเรียน : </td>
            <td style="font-size: 13px; width: 44px;" align="left"> &nbsp;<?php echo $row['student_id'];?></td>
            <td style="font-size: 13px; width: 120px;" align="left"> ชื่อ - สกุล : </td>
            <td style="font-size: 13px; width: 180px;" align="left">&nbsp;<?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></td>
            <td style="font-size: 13px; width: 69px;" align="left"> ระดับชั้น :  </td>
            <td style="font-size: 13px; width: 69px;" align="left">&nbsp;ม.<?php echo class_status($txt_grade);?><?php echo $txt_grade2;?></td>	
            <td style="font-size: 13px; width: 39px;" align="left"> เลขที่  </td>
            <td style="font-size: 13px; width: 39px;" align="left">&nbsp;<?php echo $row['student_no'];?></td>
        </tr>
        <tr>
            <td style="font-size: 13px; width: 140px;" align="left"> Student ID : </td>
            <td style="font-size: 13px; width: 44px;" align="left">&nbsp;<?php echo $row['student_id'];?></td> 
            <td style="font-size: 13px; width: 140px;"> Name - Surname : </td>
            <td style="font-size: 13px; width: 180px;" align="left">&nbsp;<?php echo $row['student_name_eng'];?>&nbsp;<?php echo $row['student_surname_eng'];?></td> 
            <td style="font-size: 13px; width: 69px;" align="left"> Grade :  </td>
            <td style="font-size: 13px; width: 69px;"  align="left">&nbsp;G.<?php echo $class_name;?></td>
            <td style="font-size: 13px; width: 39px;" align="left"> No.  </td>
            <td style="font-size: 13px; width: 39px;" align="left">&nbsp;<?php echo $row['student_no'];?></td>
        </tr>
    </tbody>    
</table>

<table style="width: 690 px;" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333">
    <tbody>
        <tr bgcolor="#dcdcdc"> 
            <td style="font-size: 13px; width: 25px; font-weight: bold; text-align: center;"> 
                <div>ลำดับ</div>
                <div>No.</div>    
            </td>
            <td style="font-size: 13px; width: 65px; font-weight: bold; text-align: center;">
                <div>รหัสวิชา</div>
                <div>Subject Code</div>                       
             </td>  
            <td style="font-size: 13px; width: 280px; font-weight: bold; text-align: center;"> 
                <div>รายวิชา/Subject</div>
            </td>
            <td style="font-size: 13px; width: 80px; font-weight: bold; text-align: center;"> 
                <div>คะแนนเก็บตามตัวชี้วัด</div>
                <div>Standards Score</div>                       
            </td>
            <td style="font-size: 13px; width: 80px; font-weight: bold; text-align: center;"> 
                <div>คะแนนสอบ</div>
                <div>Test Score</div>                        
            </td>
            <td style="font-size: 13px; width: 80px; font-weight: bold; text-align: center;"> 
                <div>คะแนนรวม/Total</div>
                <div>100%</div>                        
            </td>
            <td style="font-size: 13px; width: 80px; font-weight: bold; text-align: center;"> 
                <div>สัดส่วนคะแนน</div>
                <div>Ratio</div>                        
            </td>                    
        </tr>


        <?php 
                                            $score1 = 0;
                                            $score2 = 0;

                                            $sum_s = 0;
                                            $max_s = 0;

                                            $sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id !='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";

                                            //echo $sql;
                                            $list = result_array($sql);
                                        ?>
                                        <?php 
                                        $key1 = 1;
                                        foreach ($list as $key => $row) { 

                                        $coursedetail = $row['course_class_detail_id'];

                                        $subid = $row['subject_id'];		

                                        $sql111 = "SELECT * , COUNT(a.course_s_detail_id) AS NUM FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id}' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

                                        //echo "<br>$sql111";
                                        $row111 = row_array($sql111);

                                        $num_csd = $row111['NUM'];

                                        if ($num_csd  == 0) {

                                            $key1 = $key1-1;

                                        } else {				
                                    
                                        ?>
                                            <tr>
                                                
                                                <td style="font-size: 13px; width: 25px; text-align: center;">
                                                    <div><?php echo $key1;?></div>
                                                </td>
                                                
                                                <td style="font-size: 13px; width: 65px; text-align: center;">
                                                    <div><?php echo  $row['subject_code']; ?></div>                      
                                                </td>  
                                    
                                                <td style="font-size: 13px; width: 280px;"> 
                                                    <div>&nbsp;<font size="2"><?php echo  $row['subject_name']; ?>&nbsp;
<?php
    if($row['subject_name_eng'] != null){
        if(($row['subject_code'] == "ว30261") or ($row['subject_code'] == "ว30291")){ ?>
                                                        &nbsp;/&nbsp;<font size="2"><?php echo $row['subject_name_eng']; ?></font>&nbsp;
<?php   }else{ ?>
                                                        /&nbsp;<font size="2"><?php echo $row['subject_name_eng']; ?></font>&nbsp;
<?php   }
    }elseif($row['subject_name_eng'] == null){

    }else{}
?>

<?php

    $course_cln = $row111['course_class_level_name'];

        if ($course_cln == "Normal" || $course_cln == "HSL-B" || $course_cln == "HSL-I" || $course_cln == "HSL-A") {
                                                    $course_cln_show = "";

        } else if ($course_cln == "TSL-B" || $course_cln == "TSL-I" || $course_cln == "TSL-A") {
                                                    
            if(($row['subject_code'] == "ส11111") || ($row['subject_code'] == "ส11102") || ($row['subject_code'] == "ส12102") || ($row['subject_code'] == "ส13102") || ($row['subject_code'] == "ส14102") || ($row['subject_code'] == "ส15102") || ($row['subject_code'] == "ส16102") || ($row['subject_code'] == "ส12111") || ($row['subject_code'] == "ส12121") || ($row['subject_code'] == "ส13111") || ($row['subject_code'] == "ส13121") || ($row['subject_code'] == "ส14111") || ($row['subject_code'] == "ส14121") || ($row['subject_code'] == "ส15111") || ($row['subject_code'] == "ส15121") || ($row['subject_code'] == "ส16111") || ($row['subject_code'] == "ส16121") || ($row['subject_code'] == "ส31121") || ($row['subject_code'] == "ส31122") || ($row['subject_code'] == "ส11101") || ($row['subject_code'] == "ส12101") || ($row['subject_code'] == "ส13101") || ($row['subject_code'] == "ส14101") || ($row['subject_code'] == "ส15101")  || ($row['subject_code'] == "ส16101") || ($row['subject_code'] == "ส21102") || ($row['subject_code'] == "ส21122") || ($row['subject_code'] == "ส22102") || ($row['subject_code'] == "ส22122") || ($row['subject_code'] == "ส23112") || ($row['subject_code'] == "ส23122") || ($row['subject_code'] == "ส32121") || ($row['subject_code'] == "ส32122") || ($row['subject_code'] == "ส23121") || ($row['subject_code'] == "ส22121") || ($row['subject_code'] == "ส21121") || ($row['subject_code'] == "ส22101") || ($row['subject_code'] == "ส21101")) {
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


                                                    </div>
                                                </td>

                                        <?php								

                                        //echo " <br>$course_s_id  -  $coursedetail  -- $subid<br>";

                                        $sql11 = "SELECT * FROM tb_course_student_detail a INNER JOIN tb_course_class_level b ON a.course_class_level_id = b.course_class_level_id WHERE a.course_s_id='{$courses_id}' AND a.course_class_detail_id = '$coursedetail' AND a.course_class_level_check='1'";

                                        //echo $sql11;
                                        $row11 = row_array($sql11);

                                        $teacherid1 = $row11['teacher_id1'];
                                        $teacherid2 = $row11['teacher_id2'];

                                        $course_class_lid = $row11['course_class_level_id'];

                                        if($teacherid1 != "" && ($teacherid2 == "" || $teacherid2 == 0)) {

                                            //echo "T1-1 ";

                                            $rate1 = $row11['rate1'];

                                            $score1_1 = $row11['score1_1'];
                                            $score1_2 = $row11['score1_2'];

                                            //echo "<br>$rate1 -  $score1_1 - $score1_2<br>";

                                            $sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                            //$sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

                                            //echo "$sqlSco1<br><br>";
                                            $list1 = result_array($sqlSco1);

                                            //echo count($list1)."---";

                                            foreach ($list1 as $key => $rowSco1) { 

                                                $scoreid1 = $rowSco1['score_id'];

                                                $max_s = $max_s + $rowSco1['score_max'];

                                                //echo $max_s ;

                                                $sum_score = $rowSco1['score'];

                                                $sum_s = $sum_s + $sum_score;

                                                $sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                //$sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

                                                $rowSco2 = row_array($sqlSco2);
                                                $score2 = $rowSco2['score'];

                                                $score2  = $score2;
                                                //$score2  = number_format($score2,0);;

                                            }
                                            //echo "$max_s-$sum_s-$rate1-$score1_1<br>";

                                                if($max_s == "") { 
                                                    $score1 = 0;

                                                } else if($max_s != "" ) { 

                                                                if ($sum_s != 0) {
                                                                    $score1 = ($score1_1*$sum_s)/$max_s;	
                                                                } else {
                                                                    // $sum_s is zero.
                                                                }

                                                    //echo "$score1 = ($score1_1*$sum_s)/$max_s;";

                                                    //echo "$summary_s = ($score1_1*$sum_s)/$max_s";
                                                }

                                                // if score1 == 0

                                                if($score1==0 && $score2==0) {			

                                                    $sqlCourse1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '$course' AND c.subt_id != '4' AND b.subject_id ='{$subid}' ORDER BY c.subt_id ASC ,b.sort ASC ,d.course_class_level_name ASC";

                                                    //echo $sqlCourse1;
                                                    $rowCourse1 = result_array($sqlCourse1);

                                                    foreach ($rowCourse1 as $_rowCourse1) { 

                                                        $cc_id = $_rowCourse1['course_class_id'];
                                                        $cd_id = $_rowCourse1['course_class_detail_id'];
                                                        $cl_id = $_rowCourse1['course_class_level_id'];
                                                        $sj_id = $_rowCourse1['subject_id'];															

                                                        $sql_1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id = c.course_class_detail_id WHERE a.course_class_id = '$cc_id' AND a.student_id = '$student_id' AND b.course_class_detail_id = '$cd_id' AND b.course_class_level_id = '$cl_id' AND c.subject_id = '$sj_id'";
                                                        //echo $sql_1;
                                                        $row_1 = row_array($sql_1);

                                                        $cc__id = $row_1['course_class_id'];
                                                        $cd__id = $row_1['course_class_detail_id'];
                                                        $cl__id = $row_1['course_class_level_id'];
                                                        $sj__id = $row_1['subject_id'];		
                                                        $courses_s_id = $row_1['course_s_id'];	

                                                        $sqlSco1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id}' AND b.course_class_detail_id='{$cd__id}' AND b.course_class_level_id = '$cl__id' AND c.course_s_id='{$courses_s_id}' AND d.subject_id ='{$sj__id}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                        //echo "$sqlSco1<br><br>";
                                                        $list1 = result_array($sqlSco1);

                                                        //echo count($list1)."---";

                                                        foreach ($list1 as $key => $rowSco1) { 

                                                            $scoreid1 = $rowSco1['score_id'];

                                                            //$max_s = $max_s + $rowSco1['score_max'];

                                                            //echo "$scoreid1 - $max_s<br>";

                                                            $sum_score = $rowSco1['score'];

                                                            $sum_s = $sum_s + $sum_score;

                                                        }
                                                        //echo "$max_s-$sum_s-$rate1-$score1_1<br>";

                                                            if($max_s == "") { 
                                                                $score1 = 0;

                                                            } else if($max_s != "") { 

                                                                if ($sum_s != 0) {
                                                                    $score1 = ($score1_1*$sum_s)/$max_s;	
                                                                } else {
                                                                    // $sum_s is zero.
                                                                }

                                                                //echo "$score1 = ($score1_1*$sum_s)/$max_s<br><br>";

                                                                //echo "$summary_s = ($score1_1*$sum_s)/$max_s";
                                                            }

                                                            $sqlSco2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$cc__id}' AND b.course_class_detail_id='{$cd__id}' AND b.course_class_level_id = '$cl__id' AND c.course_s_id='{$courses_s_id}' AND d.subject_id ='{$sj__id}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                            //echo "$sqlSco2<br>";

                                                            $rowSco2 = row_array($sqlSco2);
                                                            $score_2 = $rowSco2['score'];

                                                            $score2 = $score2 + $score_2;

                                                            $score2  = $score2;
                                                            //$score2  = number_format($score2,0);	

                                                    }

                                                    $score1  = $score1;
                                                    //$score1  = number_format($score1,0);

                                                    //echo "$score1 - $score2";


                                                } else { // if score1 != 0

                                                    $score1  = $score1;
                                                    //$score1  = number_format($score1,0);

                                                }

                                        } else if($teacherid1 != "" && $teacherid2 != "") {

                                            $rate1 = $row['rate1'];													
                                            $rate2 = $row['rate2'];

                                            $score1_1 = $row['score1_1'];
                                            $score1_2 = $row['score1_2'];

                                            //echo "T1";

                                            //echo "<br>$rate1 - $rate2 - $score1_1 - $score1_2<br>";

                                            $sqlSco1_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                            //$sqlSco1_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

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

                                                $sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                //$sqlSco1_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid1}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

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

                                            $sqlSco2_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id'";

                                            //$sqlSco2_1 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_no ='1' AND a.score_status='1' AND b.student_id='$student_id' AND b.score!='0'";

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

                                                $sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id'";

                                                //$sqlSco2_2 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_student c ON b.course_s_id=c.course_s_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id=d.course_class_detail_id WHERE a.course_class_id='{$course}' AND b.course_class_detail_id='{$coursedetail}' AND b.course_class_level_id = '$course_class_lid' AND c.course_s_id='{$courses_id}' AND d.subject_id ='{$subid}' AND a.teacher_id = '{$teacherid2}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND a.score_no ='1' AND b.student_id='$student_id' AND b.score!='0'";

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
                                        
                                        if($score2=='0'){
                                            $score2_show = "N/A";
                                        } else {													
                                            $score2_show = number_format($score2,0);
                                        }

                                        ?>

                                                <td style="font-size: 13px; width: 80px;  text-align: center;"> 
                                                    <div><?php echo number_format($score1,0);?></div>                      
                                                </td>

                                                <td style="font-size: 13px; width: 80px;  text-align: center;"> 
                                                    <div><?php echo $score2_show; ?></div>                        
                                                </td>

                                                <?php 
                                                    $score1 = $score1;
                                                    $score2 = $score2;

                                                    $score1 = number_format($score1,0);
                                                    $score2 = number_format($score2,0);

                                                    $max_sum = $score1+$score2;
                                                
                                                ?>

                                                <td style="font-size: 13px; width: 80px;  text-align: center;"> 
                                                    <div><?php echo  number_format($max_sum,0); ?></div>                       
                                                </td>
                                                <td style="font-size: 13px; width: 80px;  text-align: center;"> 
                                                    <div>(<?php echo $score1_1; ?>:<?php echo $score1_2; ?>)</div>                       
                                                </td>  

                                            </tr>
                                            <?php
                                            $score1 = 0;
                                            $score2 = 0;

                                            $sum_s = 0;
                                            $max_s = 0;
                                            } 

                                            $key1 = $key1+1;

                                        }
                                            ?>


    </tbody>                            
</table>

<div>&nbsp;</div>


                                    <table style="width: 690 px; font-size: 13px;" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333">
                                        <tbody>
                                             <tr valign="top">
                                                <td align="left" colspan="4">
                                                <table style="width: 100%; font-size: 13px;"  border="1" cellpadding="0" cellspacing="0">
                                                <tr bgcolor="#dcdcdc">
                                                    <td align="center" colspan="3"><strong><font size="2">กิจกรรมพัฒนาผู้เรียน / Learner Development Activities</font></strong></td>
                                                </tr>

                                                <?php 
                                                    $sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$course}' AND b.subt_id='4' AND b.grade_id = '$check_grade' AND a.course_class_detail_status='1' ORDER BY b.subt_id ASC, a.sort ASC, b.subject_id ASC";
                                                    $list = result_array($sql);
                                                ?>
                                                <?php foreach ($list as $key => $row) { ?>

                                                <tr>
                                                    <td align="center"><font size="2">กิจกรรม</font></td>
                                                    <td align="left">&nbsp;<font size="2"><?php echo  $row['subject_name']; ?> / <?php echo  $row['subject_name_eng']; ?></font></td>
                                                    <td align="center" width="80"><font size="2">N/A</font></td>
                                                </tr>

                                                <?php } ?>

                                                </table>

                                                <div>&nbsp;</div>

                                                <table style="width: 100%; font-size: 13px;" border="1" cellpadding="0" cellspacing="0">
                                                <tr bgcolor="#dcdcdc">
                                                    <td align="center" colspan="2"><strong><font size="2">การประเมินคุณลักษณะ / Character Evaluation</font></strong></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <div style="font-size: 13px;">คุณลักษณะอันพึงประสงค์ของสถานศึกษา / Desirable characteristics</div>
                                                        <div style="font-size: 13px;">(The Basic Education Core Curriculum)</div>    
                                                    </td>
                                                    <td align="center" width="80">
                                                        <div style="font-size: 13px;">N/A</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <div style="font-size: 13px;">การอ่าน คิด วิเคราะห์และเขียน / Capacity for communication,</div>
                                                        <div style="font-size: 13px;">thinking, problem-solving and applying life skills</div>
                                                    </td>

                                                    <td align="center" width="80">
                                                        <div style="font-size: 13px;">N/A</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <div style="font-size: 13px;">กิจกรรมพัฒนาผู้เรียน / Student activities</div>
                                                    </td>
                                                    <td align="center" width="80">
                                                        <div style="font-size: 13px;">N/A</div>
                                                    </td>
                                                </tr>

                                                </table>
                                                <table style="width: 690 px; font-size: 13px;" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="left" colspan="2">
                                                            <strong><u>หมายเหตุ</u> : N/A = Not Applicable / ยังไม่มีการประเมินผล จะประเมินเมื่อสิ้นปีการศึกษา
                                                        </td>
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
                        $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$cc1['teacher_id1']}'";
                        $rowT1= row_array($sqlT1);
                    ?>
                    <?php 
                        $tid2=$row['teacher_id2'];
                        $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$cc1['teacher_id2']}'";
                        $rowT2= row_array($sqlT2);
                    ?>
                    <?php 
                        $tid3=$row['teacher_id3'];
                        $sqlT3 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$cc1['teacher_id3']}'";
                        $rowT3= row_array($sqlT3);
                    ?>

                                                <td align="center" colspan="3">
                                                <table style="width: 100 %; font-size: 13px;" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ ............................................</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">( <?php echo  $rowT1['teacher_name']; ?>&nbsp;<?php echo  $rowT1['teacher_surname']; ?> )</td>
                                                </tr>

                                                <tr>
                                                    <td align="center">
                                                <?php 
                                                    if($cc1['position_id1']==1){
                                                        echo "English Homeroom Teacher";
                                                    } else if($cc1['position_id1']==2){
                                                        echo "Academic Affairs";															
                                                    }

                                                ?>
                                                </td>
                                                </tr>

                                                <tr>
                                                    <td align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ ............................................</td>
                                                </tr>

                                                <tr>
                                                    <td align="center">( <?php echo  $rowT2['teacher_name']; ?>&nbsp;<?php echo  $rowT2['teacher_surname']; ?> )</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Thai Homeroom Teacher</td>
                                                </tr>

                                                
                                                <tr>
                                                    <td align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ ............................................</td>
                                                </tr>

                                                <tr>
                                                    <td align="center">( <?php echo  $rowT3['teacher_name']; ?>&nbsp;<?php echo  $rowT3['teacher_surname']; ?> )</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Academic Affairs</td>
                                                </tr>

                                                <tr>
                                                    <td align="center">
                                                    <?php
                                                        //$date = date('Y-m-d H:i:s');
                                                        $date = $date_score_1;
                                                    ?>
                                                    <?php echo date_en($date);?>
                                                    </td>
                                                </tr>	

                                                </table>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>



    </section>
        


    </body>

</html>