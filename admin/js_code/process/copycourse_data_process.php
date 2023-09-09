<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

//Check Classroom
$sqlCT = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$id}' AND term_id = '{$term}' AND grade_id = '{$grade}' AND classroom_status ='1' ORDER BY classroom_t_id ASC";
//echo "$sqlCT<br>";
$listCT = result_array($sqlCT);

foreach ($listCT as $key => $rowCT) {

	$classroom_t_id = $rowCT['classroom_t_id'];

	//Copy Classroom
	$sql_CT = "SELECT *,MAX(classroom_t_id) AS CTID FROM tb_classroom_teacher";
	$tcr_CT = row_array($sql_CT);

	$CT_ID = $tcr_CT['CTID'] + 1;

	$data1_1 = array(
			"classroom_t_id" => $CT_ID ,
			"classroom_id" => $rowCT['classroom_id'] ,
			"classroom_name" => $rowCT['classroom_name'] ,
			"classroom_name_eng" => $rowCT['classroom_name_eng'] ,
			"classroom_class" => $rowCT['classroom_class'] ,
			"classroom_year" => $rowCT['classroom_id'] ,
			"student_num" => $rowCT['student_num'] ,					
			"building_id" => $rowCT['building_id'] ,
			"teacher_id1" => $rowCT['teacher_id1'] ,
			"position_id1" => $rowCT['position_id1'] ,
			"teacher_id2" => $rowCT['teacher_id2'] ,
			"teacher_id3" => $rowCT['teacher_id3'] ,
			"teacher_check" => $rowCT['teacher_check'] ,
			"check_status" => $rowCT['check_status'] ,
			"check_date" => $rowCT['check_date'] ,
			"term_id" => $term_copy ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"classroom_status" => $rowCT['classroom_status']
			
	);

	insert("tb_classroom_teacher", $data1_1);

	//Check Classroom Detail
	$sqlCD = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id = '{$classroom_t_id}' AND term_id = '{$term}' AND grade_id = '{$grade}' AND classroom_detail_status ='1' ORDER BY classroom_detail_id ASC";
	//echo "$sqlCD<br>";
	$listCD = result_array($sqlCD);
	foreach ($listCD as $key => $rowCD) {

		//Copy Classroom Detail
		$sql_CD = "SELECT *,MAX(classroom_detail_id) AS CDID FROM tb_classroom_detail";
		$tcr_CD = row_array($sql_CD);

		$CD_ID = $tcr_CD['CDID'] + 1;

		$data1_2 = array(
			"classroom_detail_id" => $CD_ID ,
			"classroom_t_id" => $CT_ID ,
			"student_no" => $rowCD['student_no'] ,
			"student_id" => $rowCD['student_id'] ,
			"memo" => $rowCD['memo'] ,
			"term_id" => $term_copy ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"classroom_detail_status" => $rowCD['classroom_detail_status']	

		);

		insert("tb_classroom_detail", $data1_2);

	}

	//Check Course Class	
	$sqlCC = "SELECT * FROM tb_course_class WHERE classroom_t_id = '{$classroom_t_id}' AND term_id = '{$term}' AND grade_id = '{$grade}' AND course_class_status ='1' ORDER BY course_class_id ASC";
	//echo "$sqlCC<br>";
	$listCC = result_array($sqlCC);
	foreach ($listCC as $key => $rowCC) {

		$course_class_id = $rowCC['course_class_id'];

		//Copy  Course Class
		$sql_CC = "SELECT *,MAX(course_class_id) AS CCID FROM tb_course_class";
		$tcr_CC = row_array($sql_CC);

		$CC_ID = $tcr_CC['CCID'] + 1;

		$data2_1 = array(
			"course_class_id" => $CC_ID ,
			"course_id" =>  $rowCC['course_id'],
			"classroom_t_id" =>  $CT_ID,
			"course_class_name" => $rowCC['course_class_name'] ,
			"course_class_name_eng" => $rowCC['course_class_name_eng'] ,
			"term_id" => $term_copy ,
			"grade_id" => $grade ,	
			"course_class_year" => $rowCC['course_class_year'] ,	
			"memo" => $rowCC['memo'] ,		
			"course_class_sort" => $rowCC['course_class_sort'] ,	
			"teacher_check" => $rowCC['teacher_check'] ,	
			"check_status" => $rowCC['check_status'] ,	
			"check_date" => $rowCC['check_date'] ,	
			"admin_id" => $aid,							
			"admin_update" => $update,			
			"course_class_type" => $rowCC['course_class_type'] ,	
			"course_class_sub_type" => $rowCC['course_class_sub_type'] ,		
			"course_class_status" => $rowCC['course_class_status']

		);

		insert("tb_course_class", $data2_1);

		//Check Course Student
		$sqlCS = "SELECT * FROM tb_course_student WHERE course_class_id = '{$course_class_id}' AND term_id = '{$term}' AND grade_id = '{$grade}' AND course_s_status ='1' ORDER BY course_s_id ASC";
		//echo "$sqlCS<br>";
		$listCS = result_array($sqlCS);
		foreach ($listCS as $key => $rowCS) {

			$course_s_id = $rowCS['course_s_id'];

			//Copy Course Student
			$sql_CS = "SELECT *,MAX(course_s_id) AS CSID FROM tb_course_student";
			$tcr_CS = row_array($sql_CS);

			$CS_ID = $tcr_CS['CSID'] + 1;

			$data3_1 = array(
				"course_s_id" => $CS_ID ,
				"course_class_id" => $CC_ID ,	
				"term_id" => $term_copy ,
				"grade_id" => $grade ,	
				"student_id" => $rowCS['student_id'] ,
				"sort" => $rowCS['sort'] ,	
				"memo" => $rowCS['memo'] ,
				"admin_id" => $aid,							
				"admin_update" => $update,			
				"course_s_status" => $rowCS['course_s_status']
			);

			insert("tb_course_student", $data3_1);
		}

		//Check Course Class Detail
		$sqlCCD = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '{$course_class_id}' AND course_class_detail_status ='1' ORDER BY course_class_detail_id ASC";
		//echo "$sqlCCD<br>";
		$listCCD = result_array($sqlCCD);
		foreach ($listCCD as $key => $rowCCD) {

			$course_class_detail_id = $rowCCD['course_class_detail_id'];

			//Copy Course Class Detail
			$sql_CCD = "SELECT *,MAX(course_class_detail_id) AS CCDID FROM tb_course_class_detail";
			$tcr_CCD = row_array($sql_CCD);

			$CCD_ID = $tcr_CCD['CCDID'] + 1;

			$data2_2 = array(
				"course_class_detail_id" => $CCD_ID ,
				"course_class_id" => $CC_ID ,
				"subject_id" => $rowCCD['subject_id'] ,	
				"subject_code" => $rowCCD['subject_code'] ,	
				"subject_name" => $rowCCD['subject_name'] ,	
				"subject_name_eng" => $rowCCD['subject_name_eng'] ,	
				"unit" => $rowCCD['unit'] ,					
				"weight" => $rowCCD['weight'] ,	
				"subt_id" => $rowCCD['subt_id'] ,	
				"grade_id" => $rowCCD['grade_id'] ,
				"teacher_id1" => $rowCCD['teacher_id1'] ,	
				"rate1" => $rowCCD['rate1'] ,	
				"teacher_id2" => $rowCCD['teacher_id2'] ,	
				"rate2" => $rowCCD['rate2'] ,	
				"teacher_id3" => $rowCCD['teacher_id3'] ,	
				"rate3" => $rowCCD['rate3'] ,	
				"score1_1" => $rowCCD['score1_1'] ,	
				"score1_2" => $rowCCD['score1_2'] ,	
				"score2_1" => $rowCCD['score2_1'] ,	
				"score2_2" => $rowCCD['score2_2'] ,
				"sort" => $rowCCD['sort'] ,	
				"admin_id" => $aid,							
				"admin_update" => $update,			
				"course_class_detail_status" => $rowCCD['course_class_detail_status']	

			);

			insert("tb_course_class_detail", $data2_2);

			//Check Course Level
			$sqlCL = "SELECT * FROM tb_course_class_level WHERE course_class_detail_id = '{$course_class_detail_id}' AND course_class_level_status ='1' ORDER BY course_class_level_id ASC";
			//echo "$sqlCL<br>";
			$listCL = result_array($sqlCL);
			foreach ($listCL as $key => $rowCL) {

				$course_class_level_id = $rowCL['course_class_level_id'];

				//Copy Course Level 
				$sql_CL = "SELECT *,MAX(course_class_level_id) AS CLID FROM tb_course_class_level";
				$tcr_CL = row_array($sql_CL);

				$CL_ID = $tcr_CL['CLID'] + 1;

				$data2_3 = array(
					"course_class_level_id" => $CL_ID ,
					"course_class_detail_id" => $CCD_ID ,
					"course_class_level_name" => $rowCL['course_class_level_name'] ,	
					"teacher_id1" => $rowCL['teacher_id1'] ,	
					"rate1" => $rowCL['rate1'] ,	
					"teacher_id2" => $rowCL['teacher_id2'] ,	
					"rate2" => $rowCL['rate2'] ,	
					"teacher_id3" => $rowCL['teacher_id3'] ,	
					"rate3" => $rowCL['rate3'] ,	
					"score1_1" => $rowCL['score1_1'] ,	
					"score1_2" => $rowCL['score1_2'] ,	
					"score2_1" => $rowCL['score2_1'] ,	
					"score2_2" => $rowCL['score2_2'] ,
					"teacher_check" => $rowCL['teacher_check'] ,	
					"check_status" => $rowCL['check_status'] ,	
					"check_date" => $rowCL['check_date'] ,	
					"teacher_check2" => $rowCL['teacher_check2'] ,	
					"check_status2" => $rowCL['check_status2'] ,	
					"check_date2" => $rowCL['check_date2'] ,	
					"admin_check" => $rowCL['admin_check'] ,	
					"admin_check_status" => $rowCL['admin_check_status'] ,	
					"admin_check_date" => $rowCL['admin_check_date'] ,	
					"admin_check2" => $rowCL['admin_check2'] ,	
					"admin_check_status2" => $rowCL['admin_check_status2'] ,	
					"admin_check_date2" => $rowCL['admin_check_date2'] ,	
					"sort" => $rowCL['sort'] ,	
					"admin_id" => $aid,							
					"admin_update" => $update,			
					"course_class_level_status" => $rowCL['course_class_level_status']

				);

				insert("tb_course_class_level", $data2_3);

				//Check Course Student && Course Student Detail
				$sqlCSD = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id WHERE a.course_class_id = '{$course_class_id}' AND a.term_id = '{$term}' AND a.grade_id = '{$grade}' AND a.course_s_status ='1' AND b.course_class_detail_id = '$course_class_detail_id' AND b.course_class_level_id = '$course_class_level_id' ORDER BY a.student_id ASC";
				//echo "$sqlCSD<br><br>";
				$listCSD = result_array($sqlCSD);
				foreach ($listCSD as $key => $rowCSD) {

					$studentid = $rowCSD['student_id'];

					//Check Course Student
					$sqlCST = "SELECT * FROM tb_course_student WHERE student_id = '{$studentid}' AND course_class_id = '{$CC_ID}' AND term_id = '{$term_copy}' AND grade_id = '{$grade}' AND course_s_status ='1'";
					//echo "$sqlCST<br>";
					$rowCST = row_array($sqlCST);

					$courses_id = $rowCST['course_s_id'];

					if($rowCST > 0){

						//Copy Course Student Detail
						$sql_CSD = "SELECT *,MAX(course_s_detail_id) AS CSDID FROM tb_course_student_detail";
						$tcr_CSD = row_array($sql_CSD);

						$CSD_ID = $tcr_CSD['CSDID'] + 1;

						$data3_2 = array(
							"course_s_detail_id" => $CSD_ID ,
							"course_s_id" => $courses_id ,						
							"course_class_detail_id" => $CCD_ID ,	
							"course_class_level_id" => $CL_ID ,
							"course_class_level_check" => $rowCSD['course_class_level_check'] ,  
							"score1" => $rowCSD['score1'] ,
							"score2" => $rowCSD['score2'] ,
							"score" => $rowCSD['score'] ,
							"grade" => $rowCSD['grade'] ,
							"result" => $rowCSD['result'] ,
							"sort" => $rowCSD['sort'] ,	
							"admin_id" => $aid,							
							"admin_update" => $update,			
							"course_s_detail_status" => $rowCSD['course_s_detail_status']
						);

						insert("tb_course_student_detail", $data3_2);
					}
				}

			}

		}

	}


}

			
echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=classroom_data&check_grade=$grade&check_term=$term';</script>";

?>