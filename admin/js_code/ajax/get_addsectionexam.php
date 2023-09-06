<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 


include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

//$id = $_POST['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tb_examtable a INNER JOIN tb_examtable_teacher b ON a.examtable_id=b.examtable_id WHERE a.examtable_id = '{$id}'";
$row = row_array($sql);
?>			
											<form action="process/sectionexam_process.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">ฟอร์มเพิ่มสาขาวิชา</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
													<input type="hidden" name="eid" id="eid" value="<?php echo $row['examtable_id']; ?>">
													<input type="hidden" name="tid" id="tid" value="<?php echo $row['examtable_teacher_id']; ?>">
													<input type="hidden" name="cy" id="cy" value="<?php echo $row['course_year']; ?>">
													<input type="hidden" name="term" id="term" value="<?php echo $row['term_id']; ?>">

													<div class="form-group">
															<label class="col-md-4 control-label">สาขาวิชา</label>

															<div class="col-md-8">
																		<select name="timetable" class="form-control" required>
																		<!--<select name="major" class="form-control" required>-->
																			<option value="" disabled selected>เลือกสาขาวิชา</option>
																			<?php
																			$sql = "SELECT * FROM tb_timetable a INNER JOIN tb_major b ON a.major_id=b.major_id WHERE a.term_id='$row[term_id]' AND a.course_year='$row[course_year]' ORDER BY b.major_name DESC";
																			$tm = result_array($sql);
																		   ?>
																		   <?php foreach ($tm as $_tm) { ?>
																						<option value="<?php echo $_tm['timetable_id'];?>"><?php echo $_tm['major_name']; ?>&nbsp;<?php echo $_tm['student_type']; ?></option>
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