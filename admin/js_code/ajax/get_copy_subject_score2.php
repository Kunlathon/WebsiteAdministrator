<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

//$id = $_POST['id'];

if (isset($_REQUEST['check_grade'])) {
	$check_grade=$_REQUEST['check_grade'];
	$sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
	$row = row_array($sql);	
	$grade="ระดับชั้น$row[grade_name]";
} else if (!isset($_REQUEST['check_grade'])) {
	$grade="";
} 


	$id=isset($_GET['id']) ? $_GET['id'] : '';

	$idd=isset($_GET['idd']) ? $_GET['idd'] : '';

	$tid=isset($_GET['tid']) ? $_GET['tid'] : '';

	$cdid=isset($_GET['cdid']) ? $_GET['cdid'] : '';

	$cid=isset($_GET['cid']) ? $_GET['cid'] : '';

	$rid=isset($_GET['rid']) ? $_GET['rid'] : '';

	$exam_no=isset($_GET['exam_no']) ? $_GET['exam_no'] : '';

	//$exam_no = 2;

	$typec=isset($_GET['typec']) ? $_GET['typec'] : '';

	$cl_id=isset($_GET['cl_id']) ? $_GET['cl_id'] : '';


	//$check_grade=isset($_GET['check_grade']) ? $_GET['check_grade'] : '';

	$check_term=isset($_GET['check_term']) ? $_GET['check_term'] : '';

$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id WHERE a.course_class_id = '{$cid}'";
$row = row_array($sql);

$sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id='{$id}' AND a.grade_id = '$check_grade'";
$rowS = row_array($sqlS);

?>			
											<form action="process/copy_subject_score2_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มสำเนาคะแนน <?php echo $row['course_class_name']; ?> <?php echo $grade; ?></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">

													<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
													<input type="hidden" name="idd" id="idd" value="<?php echo $idd; ?>">	
													<input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>">	
													<input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">	
													<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">	
													<input type="hidden" name="cl_id" id="cl_id" value="<?php echo $cl_id; ?>">															
													<input type="hidden" name="rid" id="rid" value="<?php echo $rid; ?>">	
													<input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no; ?>">	
                                                    <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">	
													<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">	
													<input type="hidden" name="subjectid" id="subjectid" value="<?php echo $rowS['subject_id']; ?>">
													<input type="hidden" name="typec" id="typec" value="<?php echo $typec; ?>">	

														<div class="modal-body" style="overflow: hidden;">

														<div class="form-group">
															<label class="col-md-4 control-label">คะแนนวิชา(ต้นฉบับ)</label>

															<div class="col-md-8">
															<?php echo $rowS['subject_code'];?> - <?php echo $rowS['subject_name'] ?>
															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">คะแนนวิชา(สำเนา)</label>

															<div class="col-md-8">

																		<select name="subj_id" class="form-control" required>
																			<option value="" disabled selected>เลือกรายวิชา</option>
																			<?php																			

																			$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_subject c ON b.subject_id = c.subject_id WHERE a.course_class_id='{$cid}' AND b.subject_id!='{$id}' AND a.classroom_t_id='$rid' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  b.course_class_detail_status='1' AND c.subt_id !='4' ORDER BY c.subt_id ASC,b.sort ASC";

																			$cc = result_array($sql);
																		   ?>
																		   <?php foreach ($cc as $_cc) { ?>
																						<option value="<?php echo $_cc['subject_id'] ?>"><?php echo $_cc['subject_code'] ?> - <?php echo $_cc['subject_name'] ?></option>
																		  <?php } ?>
																		</select>

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