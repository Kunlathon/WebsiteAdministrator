<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

//$id = $_POST['id'];
$id = $_GET['id'];
$cdid = $_GET['cdid'];
$cid = $_GET['cid'];
$idd = $_GET['idd'];
//$cid = $_GET['cid'];
$tid = $_GET['tid'];
$sid = $_GET['sid'];
$clid = $_GET['clid'];
$exam_no = $_GET['exam_no'];
$check_grade = $_GET['check_grade'];
$check_term = $_GET['check_term'];
$typec = $_GET['typec'];
$type = $_GET['type'];
$cclid = $_GET['cclid'];

$sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$id}' AND a.teacher_id = '{$tid}' AND c.subject_id = '{$sid}' AND b.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND b.course_class_type='$typec'";
$row = row_array($sql);

//echo $sql;

if($row['score_name'] != ""){
	$name_score = "Indicators $row[score_name]";
}

//$course=$row['course_class_id'];
$coursedetail=$row['course_class_detail_id'];

$sqlS = "SELECT * FROM tb_subject WHERE subject_id='{$sid}'";
$rowS = row_array($sqlS);

$subject_name = $rowS['subject_name_eng'];
//$subject_name = $rowS['subject_name'];

$sqlCla = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_status='1'";
$rowCla = row_array($sqlCla);

//$class_name= $rowCla['classroom_name_eng'];
$class_name= $rowCla['classroom_name'];

$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE a.score_id = '{$id}' AND d.course_class_detail_id='{$coursedetail}' AND c.subject_id='{$sid}' AND a.teacher_id = '{$tid}' AND b.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='$type' AND a.score_status='1'  AND b.course_class_type='$typec' AND d.course_class_level_id = '$cclid' GROUP BY a.score_id ASC";

//echo $sqlSco;
$rowSco = row_array($sqlSco);
$courseclasslevel=$rowSco['course_class_level_id'];
?>			
											<form action="process/scores_copy_teach2_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มสำเนาคะแนน 2>1 วิชา <?php echo $subject_name; ?>&nbsp;<?php echo $name_score; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="iid" id="iid" value="<?php echo $id; ?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
													<input type="hidden" name="idd" id="idd" value="<?php echo $idd; ?>">
													<input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>">
													<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">	
													<input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="typec" id="typec" value="<?php echo $typec; ?>">
													<input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
													<input type="hidden" name="coursedetail" id="coursedetail" value="<?php echo $coursedetail; ?>">	
													<input type="hidden" name="courseclasslevel" id="courseclasslevel" value="<?php echo $courseclasslevel; ?>">

													<div class="form-group">
															<label class="col-md-12 control-label">ระดับ/Grade <?php echo $check_grade;?> ห้อง/Room <?php echo $class_name;?></label>
													</div>
													<div>&nbsp;</div>

														<div class="form-group">

															<div class="col-md-12">

													<table class="table table-striped table-hover">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<th width="30" align="center"> เลขที่ </th>
																<th width="40" align="center"> รหัส </th>
																<th align="center"> รายชื่อ </th>
																<th width="100" align="center"> ชื่อเล่น </th>
																<th width="50" align="center">
																<?php echo $rowSco['score_name'];?>
																</th>
																</th>
															</tr>
														<tr>
                                                        <th colspan="4">&nbsp;</th>
														<th align="center" width="50">
														<?php 
														echo $rowSco['score_max'];
														$max = $rowSco['score_max'];
														?>
														</th>
														</th>
                                                    </tr>
                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					

															$sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE (c.teacher_id1='{$tid}' OR c.teacher_id2='{$tid}') AND a.classroom_t_id='$clid' AND b.course_class_detail_id='{$coursedetail}' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec' AND c.course_class_level_id = '$courseclasslevel'";

															//echo $sql1;
															$list1 = result_array($sql1);
															foreach ($list1 as $key => $row1) {

															$cc_id = $row1['course_class_id'];
															$cd_id = $row1['course_class_detail_id'];
															$cl_id = $row1['course_class_level_id'];

															$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$cc_id}' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') AND c.student_status = '1' ORDER BY c.student_class ASC , c.student_no ASC";

															//echo $sql;
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { ?>
														<?php
															if ($row['gender'] == 1) {
																$gender = "ชาย";

															} else if ($row['gender'] == 2) {
																$gender = "หญิง";

															}

															$stuid = $row['student_id'];

															$course_s_id = $row['course_s_id'];
														?>

															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo $row['student_name_eng'];?>&nbsp;<?php echo $row['student_surname_eng'];?></td>
																<!--<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?></td>-->
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE a.score_id = '{$id}' AND d.course_class_detail_id='{$coursedetail}' AND a.subject_id = '{$sid}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='$type' AND a.score_status='1' AND b.course_class_type='$typec' GROUP BY a.score_id ASC";

															//echo $sqlSco;
															$sqlSco = result_array($sqlSco);

															foreach ($sqlSco as $_sqlSco) { 

																$scoreid =  $_sqlSco['score_id'];
																$coursedetail =  $_sqlSco['course_class_detail_id'];

																$sqlScor = "SELECT * , COUNT(a.student_id) AS STUID FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid}' AND a.course_class_detail_id='{$coursedetail}' AND a.course_class_level_id='{$courseclasslevel}' AND a.student_id = '{$stuid}' AND a.score_type='$type' AND a.score_detail_status='1'";

																$_rowScorC = row_array($sqlScor);

																$STUID = $_rowScorC['STUID'];

																if($STUID==0) {

																	$data = array(
																		"score_id" => $scoreid ,
																		"course_s_id" => $course_s_id ,
																		"student_id" => $stuid ,
																		"course_class_detail_id" => $coursedetail ,	
																		"course_class_level_id" => $courseclasslevel ,	
																		"score1" => "" ,	
																		"score2" => "" ,	
																		"score" => 0 ,	
																		"result" => "" ,	
																		"score_type" => $type,
																		"score_detail_status" => 1	,
																		"admin_id" => $teaid ,
																		"admin_update" => $update
																	);

																	insert("tb_score_detail", $data);

																}
																
																//echo $sqlScor;
																$_rowScor = row_array($sqlScor);
															}
															?>

																<td>
																<input id="<?php echo $_rowScor['score_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_rowScor['score_detail_id']; ?>">
																</td>
															</tr>

															<?php 							
															} 
															}
															?>

														</tbody>
													</table>

															</div>
														</div>
														<div>&nbsp;</div>
													
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn green">บันทึก</button>
											<button type="button" class="btn dark btn-outline" data-dismiss="modal">ปิด</button>
										</div>
										</form>