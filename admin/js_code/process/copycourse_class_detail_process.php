<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

		//Add Classroom

		$sqlCT = "SELECT *,MAX(classroom_t_id) AS CTID FROM tb_classroom_teacher";
		$tcrCT = row_array($sqlCT);

		$CT_ID = $tcrCT['CTID'] + 1;

		$sqlCt = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id='{$classroom}'";
		$tcrCt = row_array($sqlCt);

		$dataCt = array(
			"classroom_t_id" => $CT_ID ,
			"classroom_id" => $tcrCt['teacher_check'] ,
			"classroom_name" => $tcrCt['classroom_name'] ,
			"classroom_name_eng" => $tcrCt['classroom_name_eng'] ,
			"classroom_class" => $tcrCt['classroom_class'] ,
			"classroom_year" => $tcrCt['classroom_year'] ,
			"student_num" => $tcrCt['student_num'] ,					
			"building_id" => $tcrCt['building_id'] ,
			"teacher_id1" => $tcrCt['teacher_id1'] ,
			"position_id1" => $tcrCt['position_id1'] ,
			"teacher_id2" => $tcrCt['teacher_id2'] ,
			"teacher_id3" => $tcrCt['teacher_id3'] ,
			"teacher_check" => $tcrCt['teacher_check'] ,
			"check_status" => $tcrCt['check_status'] ,
			"check_date" => $tcrCt['check_date'] ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"classroom_status" => 1
			
		);

		insert("tb_classroom_teacher", $dataCt);

					$sqlCla = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id='{$classroom}'";
					$listCla = result_array($sqlCla);

					foreach ($listCla as $key => $rowCla) { 

						$CL_ID = $rowCla['classroom_detail_id'];

						$sqlCL = "SELECT *,MAX(classroom_detail_id) AS CLID FROM tb_classroom_detail";
						$tcrCL = row_array($sqlCL);

						$CL_ID = $tcrCL['CLID'] + 1;

						$data5 = array(
							"classroom_detail_id" => $CL_ID ,
							"classroom_t_id" => $CT_ID ,
							"student_no" => $rowCla['student_no'] ,
							"student_id" => $rowCla['student_id'] ,
							"student_head" => $rowCla['student_head'] ,
							"memo" => $rowCla['memo'] ,
							"term_id" => $term ,
							"grade_id" => $grade ,	
							"admin_id" => $aid,		
							"admin_update" => $update,
							"classroom_detail_status" => 1 ,		
						);

						insert("tb_classroom_detail", $data5);
					}

		//Add Course
		$sqlT = "SELECT *,MAX(course_class_id) AS ID FROM tb_course_class";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['ID'] + 1;

		$sql = "SELECT * FROM tb_course_class WHERE course_class_id='{$id}'";
		$tcr = row_array($sql);

		$data1 = array(
			"course_class_id" => $C_ID ,
			"course_id" => $tcr['course_id'] ,
			"classroom_t_id" =>  $CT_ID,
			"course_class_name" =>  $name,
			"course_class_name_eng" => $tcr['course_class_name_eng'] ,
			"term_id" => $term ,
			"grade_id" => $grade ,	
			"course_class_year" => $tcr['course_class_year'] ,	
			"memo" => $tcr['memo'] ,		
			"course_class_sort" => $tcr['course_class_sort'] ,
			"teacher_check" => "" ,
			"check_status" => "" ,
			"check_date" => "" ,
			"admin_id" => $aid,		
			"admin_update" => $update,
			"course_class_type" => $type_course ,	
			"course_class_sub_type" => $tcr['course_class_sub_type'] ,
			"course_class_status" => 1

		);

		insert("tb_course_class", $data1);

		//Add Student

		$sqlCSt = "SELECT * FROM tb_course_student WHERE course_class_id='{$id}'";
		$listCSt = result_array($sqlCSt);

		foreach ($listCSt as $key => $rowCSt) { 

			$sqlS = "SELECT *,MAX(course_s_id) AS SID FROM tb_course_student";
			$tcrS = row_array($sqlS);

			$S_ID = $tcrS['SID'] + 1;

			$data2 = array(
				"course_s_id" => $S_ID ,
				"course_class_id" => $C_ID ,
				"term_id" => $term ,
				"grade_id" => $grade ,	
				"student_id" => $rowCSt['student_id'] ,
				"sort" => $rowCSt['sort'] ,
				"memo" => $rowCSt['memo'] ,		
				"admin_id" => $aid,		
				"admin_update" => $update,
				"course_s_status" => 1

			);

			insert("tb_course_student", $data2);

		}

		$sql = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '{$id}' AND course_class_detail_status='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$course_class_detail_id = $row['course_class_detail_id'];

			$sqlCD = "SELECT *,MAX(course_class_detail_id) AS CDID FROM tb_course_class_detail";
			$tcrCD = row_array($sqlCD);

			$CD_ID = $tcrCD['CDID'] + 1;

			$data2 = array(
				"course_class_detail_id" => $CD_ID ,
				"course_class_id" => $C_ID ,
				"subject_id" => $row['subject_id'] ,
				"subject_code" => $row['subject_code'] ,	
				"subject_name" => $row['subject_name'] ,	
				"subject_name_eng" => $row['subject_name_eng'] ,			
				"unit" => $row['unit'] ,					
				"weight" => $row['weight'] ,	
				"subt_id" => $row['subt_id'] ,	
				"grade_id" => $row['grade_id'] ,
				"teacher_id1" => $row['teacher_id1'] ,	
				"rate1" => $row['rate1'] ,	
				"teacher_id2" => $row['teacher_id2'] ,	
				"rate2" => $row['rate2'] ,	
				"teacher_id3" => $row['teacher_id3'] ,	
				"rate3" => $row['rate3'] ,	
				"score1_1" => $row['score1_1'] ,	
				"score1_2" => $row['score1_2'] ,	
				"score2_1" => $row['score2_1'] ,	
				"score2_2" => $row['score2_2'] ,
				"sort" => $row['sort'] ,
				"admin_id" => $aid,		
				"admin_update" => $update,
				"course_class_detail_status" => 1 ,		
			);

			insert("tb_course_class_detail", $data2);

			$sqlCcd = "SELECT * FROM tb_course_class_level WHERE course_class_detail_id = '{$course_class_detail_id}' AND course_class_level_status='1'";
			$listCcd = result_array($sqlCcd);

			foreach ($listCcd as $key => $rowCcd) { 

				$sqlCCD = "SELECT *,MAX(course_class_level_id) AS CDID FROM tb_course_class_level";
				$tcrCCD = row_array($sqlCCD);

				$CCD_ID = $tcrCCD['CDID'] + 1;

				$data4 = array(
					"course_class_level_id" => $CCD_ID ,
					"course_class_detail_id" => $CD_ID ,
					"course_class_level_name" => $rowCcd['course_class_level_name'] ,
					"teacher_id1" => $rowCcd['teacher_id1'] ,	
					"rate1" => $rowCcd['rate1'] ,	
					"teacher_id2" => $rowCcd['teacher_id2'] ,	
					"rate2" => $rowCcd['rate2'] ,	
					"teacher_id3" => $rowCcd['teacher_id3'] ,	
					"rate3" => $rowCcd['rate3'] ,	
					"score1_1" => $rowCcd['score1_1'] ,	
					"score1_2" => $rowCcd['score1_2'] ,	
					"score2_1" => $rowCcd['score2_1'] ,	
					"score2_2" => $rowCcd['score2_2'] ,
					"sort" => $rowCcd['sort'] ,
					"teacher_check" => "" ,
					"check_status" => "" ,
					"check_date" => "" ,
					"teacher_check2" => "" ,
					"check_status2" => "" ,
					"check_date2" => "" ,
					"admin_check" => "" ,
					"admin_check_status" => "" ,
					"admin_check_date" => "" ,
					"admin_check2" => "" ,
					"admin_check_status2" => "" ,
					"admin_check_date2" => "" ,
					"admin_id" => $aid,		
					"admin_update" => $update,
					"course_class_level_status" => 1 ,		
				);

				insert("tb_course_class_level", $data4);

				//Add Student course_class_level

					/*$sqlCStu = "SELECT * FROM tb_course_student WHERE course_class_id='{$id}'";
					$listCStu = result_array($sqlCStu);

					foreach ($listCStu as $key => $rowCStu) { 

						$CS_ID = $rowCStu['course_s_id'];
						$student_id = $rowCStu['student_id'];

						$sqlCStud = "SELECT * FROM tb_course_student_detail WHERE course_s_id = '{$CS_ID}'";
						$listCStud = result_array($sqlCStud);

						foreach ($listCStud as $key => $rowCStud) { 

							$sqlStud = "SELECT * FROM tb_course_student WHERE course_class_id = '{$C_ID}' AND term_id = '{$term}' AND grade_id = '{$grade}' AND student_id = '{$student_id}'";
							$rowStud = row_array($sqlStud);

							$CSC_ID = $rowStud['course_s_id'];

							//Check

							$sql = "SELECT * FROM tb_course_student_detail WHERE course_s_id = '{$CSC_ID}' AND course_class_detail_id = '{$CD_ID}' AND course_class_level_id = '{$CCD_ID}'";
							$result = row_array($sql);

							if($result > 0){

							} else {

								$sqlCSD = "SELECT *,MAX(course_s_detail_id) AS CSDID FROM tb_course_student_detail";
								$tcrCSD = row_array($sqlCSD);

								$CSD_ID = $tcrCSD['CSDID'] + 1;

								$data5 = array(
									"course_s_detail_id" => $CSD_ID ,
									"course_s_id" => $CSC_ID ,
									"course_class_detail_id" => $CD_ID ,
									"course_class_level_id" => $CCD_ID ,
									"course_class_level_check" => $rowCStud['course_class_level_check'] ,
									"score1" => "" ,	
									"score2" => "" ,	
									"score" => "" ,	
									"grade" => "" ,
									"result" => "" ,
									"sort" => "" ,
									"admin_id" => $aid,		
									"admin_update" => $update,
									"course_s_detail_status" => 1 ,		
								);

								insert("tb_course_student_detail", $data5);
							}

						}
					}*/

			}

		}
		
		echo "<meta charset='utf-8'/><script>alert('สำเนาข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$CT_ID&check_term=$term&check_grade=$grade';</script>";

?>