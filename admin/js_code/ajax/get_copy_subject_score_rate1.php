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

	//$exam_no = 1;

	$typec=isset($_GET['typec']) ? $_GET['typec'] : '';

	$cl_id=isset($_GET['cl_id']) ? $_GET['cl_id'] : '';


	//$check_grade=isset($_GET['check_grade']) ? $_GET['check_grade'] : '';

	$check_term=isset($_GET['check_term']) ? $_GET['check_term'] : '';

$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id WHERE a.course_class_id = '{$cid}'";
$row = row_array($sql);

$sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id='{$id}' AND a.grade_id = '$check_grade'";
$rowS = row_array($sqlS);

?>			
											<form action="process/copy_subject_score_rate1_process.php" method="post">
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
													<input type="hidden" name="subj_id" id="subj_id" value="<?php echo $rowS['subject_id']; ?>">						
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
															<label class="col-md-4 control-label">ครูผู้สอน</label>

															<div class="col-md-8">
															<?php
																$sqlTea = "SELECT * FROM  tb_teacher WHERE teacher_id = '$tid'";
																$rowTea = row_array($sqlTea);
															?>
															
															<?php echo "$rowTea[teacher_name]";?>&nbsp;<?php echo "$rowTea[teacher_surname]";?>

															</div>
														</div>
														<div>&nbsp;</div>

														<div class="form-group">
															<label class="col-md-4 control-label">ครูผู้สอน(สำเนา)</label>

															<div class="col-md-8">
																<div class="input-group select2-bootstrap-append">
																			<select id="single-append-add1-1" name="teacher1" class="form-control select2-allow-clear" required>
																				<option value="" disabled selected>เลือกครูผู้สอน(สำเนา)</option>
																				<?php
																				$sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
																				$tt = result_array($sql);
																				?>

																				<?php foreach ($tt as $_tt) { ?>
																					<option <?php echo $tid== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name]";?>&nbsp;<?php echo "$_tt[teacher_surname]";?></option>
																				<?php } ?>
																			</select>

																			<span class="input-group-btn">
																			<button class="btn btn-default" type="button" data-select2-open="single-append-add1-1">
																				<span class="glyphicon glyphicon-search"></span>
																			</button>
																		</span>
																	</div>
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
										
		<!-- BEGIN PAGE LEVEL PLUGINS -->	
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->