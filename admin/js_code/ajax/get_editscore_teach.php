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
$tid = $_GET['tid'];
$sid = $_GET['sid'];
$clid = $_GET['clid'];
$exam_no = $_GET['exam_no'];
$typec = $_GET['typec'];
//$type = $_GET['type'];

$sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$id}' AND a.teacher_id = '{$tid}'  AND a.subject_id = '{$sid}' AND a.classroom_t_id = '{$clid}' AND b.course_class_type='$typec'";

//$sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$id}' AND a.classroom_t_id = '{$clid}'";
$row = row_array($sql);

$cid = $row['course_class_id'];
$clid = $row['classroom_t_id'];
$check_grade = $row['grade_id'];
$check_term = $row['term_id'];
$type = $row['score_type'];

?>			
											<form action="process/score_edit_teach_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มแก้ไขข้อมูลตัวชี้วัด</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="idd" id="idd" value="<?php echo $idd; ?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
													<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
													<input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>">
													<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
													<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
													<input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no; ?>">
													<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
													<input type="hidden" name="typec" id="typec" value="<?php echo $typec; ?>">	
													<input type="hidden" name="type" id="type" value="<?php echo $type; ?>">													
													
													<div class="form-group">
															<label class="col-md-4 control-label">ตัวชี้วัด</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="name" value="<?php echo $row['score_name'];?>" required/>
																<span class="help-block"> กรอกข้อมูลตัวชี้วัด</span>
															</div>
														</div>
														<div>&nbsp;</div>

														<!--<div class="form-group">
															<label class="col-md-4 control-label">หัวข้อการสอบภาษาอังกฤษ</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="text" name="ename" value="<?php echo $row['score_name_eng'];?>" />
																<span class="help-block"> กรอกข้อมูลหัวข้อการสอบภาษาอังกฤษ</span>
															</div>
														</div>
														<div>&nbsp;</div>-->

														<div class="form-group">
															<label class="col-md-4 control-label">คะแนนเต็ม</label>

															<div class="col-md-8">
																<input class="form-control form-control-inline" size="16" type="number" name="unit" value="<?php echo $row['score_max'];?>" required/>
																<span class="help-block"> กรอกข้อมูลคะแนนเต็ม เช่น 10 20 </span>
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