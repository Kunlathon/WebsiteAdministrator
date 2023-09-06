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
//no_error
//it_error
//filter_input(INPUT_POST,'xxxx');
//ini_set('display_errors', 1);
//error_reporting(E_ALL ^ E_NOTICE);
    include("../../config/connect.ini.php");
    include("../../config/fnc.php");
    include("../../structure/link.php");
    $RunLink = new link_system();
    check_login('admin_username_aba', 'login.php');
?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript">
    function setScreenHWCookie() {
            $.cookie('sw',screen.width);
                //$.cookie('sh',screen.height);
            return true;
    }
            setScreenHWCookie();
</script>

<?php
	$width_system=filter_input(INPUT_COOKIE,'sw');
		if(($width_system>=1200)){
			$grid="xl";
		}elseif(($width_system>=992)){
			$grid="lg";
		}elseif(($width_system<=768)){
			$grid="md";
		}elseif(($width_system<=576)){
			$grid="sm";
		}else{
			$grid="xs";
		}
?>

<script>
    $(document).ready(function(){
        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            }
        });

        // Apply custom style to select
        $.extend($.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });


        // Basic initialization
        $('.datatable-button-html5-basic').DataTable({
            /*buttons: {            
                dom: {
                    button: {
                        className: 'btn btn-light'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5'
                ]
            }*/
        });

        // Column selectors
        $('.datatable-button-html5-columns-STD').DataTable({
            /*buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn btn-primary btn-icon dropdown-toggle'
                    }
                ]
            }*/

            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "paging" : false,
            "lengehChange": false,
            "searching": false,
            "ordering": false,
            "autoWidth": false

        });
    })
</script>

<script>
    $(document).ready(function(){
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });  
    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $classroom=filter_input(INPUT_POST, 'classroom_key');
        $check_term=filter_input(INPUT_POST, 'term_key');
        $check_grade=filter_input(INPUT_POST, 'grade_key');
            if(($classroom!=null and $check_term!=null and $check_grade!=null)){ 
                $now_date = date('Y-m-d');
                if (isset($check_term)) {
                    //$check_term=$_REQUEST['check_term'];
                    $sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                    $row = row_array($sql);	
                    $term1="$row[term]";
                    $year1="$row[year]";
                    $year2=$year1-543;
                    $term="$row[term]/$row[year]";
                } else{
                    $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                    $row = row_array($sql);
                    $check_term=$row['term_id'];
                    $term1="$row[term]";
                    $year1="$row[year]";
                    $year2=$year1-543;
                    $term="$row[term]/$row[year]";
                } 
                
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
					<div class="card-header header-elements-inline bg-info text-white">
                   
                            <div class="col-<?php echo $grid;?>-6">
                                <div>ผลคะแนนระดับมัธยมศึกษา (ย้อนหลัง) ภาคเรียนที่ <?php echo $term;?></div>
                            </div>
                            <div class="col-<?php echo $grid;?>-6">
                                <div></div>
                            </div>
                     
					</div>

					<div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="table-responsive">

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <table class="table table-bordered datatable-button-html5-columns-STD">
                                                <thead>
                                                    <tr>
                                                        <th width="30"> เลขที่ </th>
														<!--<th width="30"> ลำดับ </th>-->
                                                        <th width="40"> รหัส </th>
                                                        <th> รายชื่อ </th>
														<th width="120"> รายชื่อ(Eng) </th>
														<th width="100"> บัตร </th>
														<th width="100"> ชื่อเล่น </th>
														<th width="50"> เพศ </th>
														<th width="90"> เบอร์โทร </th>
														<!--<th width="120"> อีเมล์ </th>-->
														<!--<th width="120"> ห้องเรียน </th>-->
														<th width="70"> คะแนน <br>ครั้งที่ 1 </th>	
														<th width="70"> คะแนน <br>ครั้งที่ 2</th>
														<th width="70"> สัมฤทธิ์</th>
														<th width="70"> GPA</th>
                                                    </tr>

													<?php
													if ($classroom!=null) {
													?>

													<tr>
                                                        <td colspan="8">&nbsp;</td>
														<!--<td colspan="9">&nbsp;</td>-->

														<td width="70" align="center"> 

														
                                                        <div><a  title="พิมพ์คะแนนครั้ง 1" class="badge badge-dark p-1" data-toggle="modal" data-target="#ggrpa1"><i class="icon-printer4"></i></a></div>

                                                        <!--<a href="ajax/get_grade_report_previous_all2_1.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGradeAll1" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 1">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/grade_report_previous_all2_1.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 1" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>	

														<td width="70" align="center"> 

                                                        <div><a  title="พิมพ์คะแนนครั้ง 2" class="badge badge-dark p-1" data-toggle="modal" data-target="#ggrpa2"><i class="icon-printer4"></i></a></div>

														<!--<a href="ajax/get_grade_report_previous_all2_2.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGradeAll2" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 2">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/grade_report_previous_all2_2.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 2" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>	

														<td width="70" align="center"> 

                                                        <div><a  title="พิมพ์ผลสัมฤทธิ์" class="badge badge-dark p-1" data-toggle="modal" data-target="#ggrpa3"><i class="icon-printer4"></i></a></div>
														<!--<a href="ajax/get_grade_report_previous_all2_3.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGradeAllAchievement" class="btn btn-sm grey-salsa" title="พิมพ์ผลสัมฤทธิ์">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/grade_report_previous_all2_3.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์ผลสัมฤทธิ์" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>

														<td width="70" align="center"> 

                                                        <div><a  title="พิมพ์ผลการเรียน" class="badge badge-dark p-1" data-toggle="modal" data-target="#ggrpa4"><i class="icon-printer4"></i></a></div>
														<!--<a href="ajax/get_grade_report_previous_all2_4.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGradeAll" class="btn btn-sm grey-salsa" title="พิมพ์ผลการเรียน">
																<i class="fa fa-print"></i> </a>-->
																
														<!--<a href="document/grade_report_previous_all2_4.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์ผลการเรียน" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>	
                                                    </tr>

													<?php } ?>

                                                </thead>
                                                <tbody>
							<?php 

							if (isset($classroom)) {
								$sql = "SELECT * , b.student_no AS STUNO FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_student c ON b.student_id=c.student_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND a.classroom_t_id = '$classroom' ORDER BY c.student_class ASC ,c.student_no ASC";

								//$sql = "SELECT * , b.student_no AS STUNO  FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_student c ON b.student_id=c.student_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND c.student_status='1' AND (b.student_no != '0' OR b.student_no != '') AND a.classroom_t_id = '$classroom' ORDER BY c.student_class ASC ,c.student_no ASC";

							} else if (!isset($classroom)) {
								$sql = "SELECT * , b.student_no AS STUNO  FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_student c ON b.student_id=c.student_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND a.classroom_t_id = '$classroom' ORDER BY c.student_class ASC ,c.student_no ASC";

								//$sql = "SELECT * , b.student_no AS STUNO  FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_student c ON b.student_id=c.student_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND c.student_status='1' AND (b.student_no != '0' OR b.student_no != '') AND a.classroom_t_id = '$classroom' ORDER BY c.student_class ASC ,c.student_no ASC";

							} 								
								//echo $sql;
								
								$list = result_array($sql);

							?>
							<?php foreach ($list as $key => $row) { ?>
							<?php
								if ($row['gender'] == '1') {
									$gender = "ชาย";

								} else if ($row['gender'] == '2') {
									$gender = "หญิง";

								}

								$sqlC = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$row[student_class]'";
								$rowC = row_array($sqlC);

                                $copy_student_id=$row['student_id'];
                                $copy_student_new=$row['student_name']."&nbsp;".$row['student_surname'];

							?>

                                                    <tr>
                                                        <td align="center"> <?php echo $row['STUNO'];?></td>
														<!--<td align="center"><?php echo $key+1;?></td>-->
                                                        <td align="center"> <?php echo $row['student_id'];?></td>
														<td><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></td>
														<td><?php echo $row['student_name_eng'];?>&nbsp;<?php echo $row['student_surname_eng'];?></td>
														<td align="center"> <?php echo $row['student_idcard'];?></td>
														<td><?php echo $row['nickname'];?></td>
														<td><?php echo $gender;?></td>
														<td><?php echo $row['student_tel'];?></td>
														<!--<td><?php echo $row['student_email'];?></td>-->
														<!--<td><?php echo $rowC['classroom_name'];?></td>-->

														<td align="center"> 

                                                        <div><a  title="ประเมินครั้งที่ 1" class="badge badge-dark p-1" data-toggle="modal" data-target="#ReportGrade1<?php echo $row['student_id'];?>"><i class="icon-printer4"></i></a></div>

														<!--<a href="ajax/get_grade_report_previous2_1.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGrade1" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 1">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/grade_report_previous2_1.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 1" target="_blank">
																<i class="fa fa-print"></i> </a>-->
																														
														</td>
														<td align="center"> 

                                                        <div><a  title="ประเมินครั้งที่ 2" class="badge badge-dark p-1" data-toggle="modal" data-target="#ReportGrade2<?php echo $row['student_id'];?>"><i class="icon-printer4"></i></a></div>

														<!--<a href="ajax/get_grade_report_previous2_2.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGrade2" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 2">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/grade_report_previous2_2.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 2" target="_blank">
																<i class="fa fa-print"></i> </a>-->
																														
														</td>

														<td align="center"> 

                                                        <div><a  title="ประเมินผลสัมฤทธิ์" class="badge badge-dark p-1" data-toggle="modal" data-target="#ReportGrade3<?php echo $row['student_id'];?>"><i class="icon-printer4"></i></a></div>

														<!--<a href="ajax/get_grade_report_previous2_2.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGradeAchievement" class="btn btn-sm grey-salsa" title="ประเมินผลสัมฤทธิ์">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/grade_report_previous2_3.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ประเมินผลสัมฤทธิ์" target="_blank">
																<i class="fa fa-print"></i> </a>-->
																														
														</td>

														<td align="center"> 
														
                                                        <div><a  title="ผลการเรียน" class="badge badge-dark p-1" data-toggle="modal" data-target="#ReportGrade4<?php echo $row['student_id'];?>"><i class="icon-printer4"></i></a></div>

														<!--<a href="ajax/get_grade_report_previous2_4.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" data-toggle="modal" data-id="<?php echo $row['grade_id'];?>" data-target="#ReportGrade" class="btn btn-sm grey-salsa" title="ผลการเรียน">
																<i class="fa fa-print"></i> </a>-->
																
														<!--<a href="document/grade_report_previous2_4.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ผลการเรียน" target="_blank">
																<i class="fa fa-print"></i> </a>-->
																														
														</td>
                                                    </tr>

								<?php } ?>
                                                </tbody>
                                            </table>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                </div>                        
                            </div>
                        </div>   
                    </div> 
				</div>                            
            </div>
        </div>




    <?php   foreach ($list as $key => $copy_row) { ?>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="ReportGrade1<?php echo $copy_row['student_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form1_<?php echo $copy_row['student_id'];?>" method="post" target="_blank" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous<?php echo $check_grade;?>_1.php">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์ผลคะแนนครั้งที่ 1 (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $cr_sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $cr_row = row_array($cr_sql);
        
        $classroomid = $cr_row['classroom_id'];
        
        $sqlstu = "SELECT * FROM tb_student WHERE student_id = '{$copy_row['student_id']}'";
        $rowstu = row_array($sqlstu);
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>
								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">เลขประจำตัวนักเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_id'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ชื่อ-สกุล</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_name'];?>&nbsp;<?php echo $copy_row['student_surname'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" name="but1_<?php echo $copy_row['student_id'];?>" class="btn btn-info">พิมพ์</button>
								</div>
    <input type="hidden" name="classroom" value="<?php echo $classroom; ?>">
	<input type="hidden" name="id"  value="<?php echo $copy_row['student_id']; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
       

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="ReportGrade2<?php echo $copy_row['student_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form2_<?php echo $copy_row['student_id'];?>" method="post" target="_blank" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous<?php echo $check_grade;?>_2.php">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์ผลคะแนนครั้งที่ 2 (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $cr_sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $cr_row = row_array($cr_sql);
        
        $classroomid = $cr_row['classroom_id'];
        
        $sqlstu = "SELECT * FROM tb_student WHERE student_id = '{$copy_row['student_id']}'";
        $rowstu = row_array($sqlstu);
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>
								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">เลขประจำตัวนักเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_id'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ชื่อ-สกุล</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_name'];?>&nbsp;<?php echo $copy_row['student_surname'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" name="but2_<?php echo $copy_row['student_id'];?>" class="btn btn-info">พิมพ์</button>
								</div>
    <input type="hidden" name="classroom" value="<?php echo $classroom; ?>">
	<input type="hidden" name="id"  value="<?php echo $copy_row['student_id']; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="ReportGrade3<?php echo $copy_row['student_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form3_<?php echo $copy_row['student_id'];?>" method="post" target="_blank" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous<?php echo $check_grade;?>_3.php">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์ผลสัมฤทธิ์ (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $cr_sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $cr_row = row_array($cr_sql);
        
        $classroomid = $cr_row['classroom_id'];
        
        $sqlstu = "SELECT * FROM tb_student WHERE student_id = '{$copy_row['student_id']}'";
        $rowstu = row_array($sqlstu);
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>
								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">เลขประจำตัวนักเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_id'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ชื่อ-สกุล</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_name'];?>&nbsp;<?php echo $copy_row['student_surname'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" name="but3_<?php echo $copy_row['student_id'];?>" class="btn btn-info">พิมพ์</button>
								</div>
    <input type="hidden" name="classroom" value="<?php echo $classroom; ?>">
	<input type="hidden" name="id"  value="<?php echo $copy_row['student_id']; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="ReportGrade4<?php echo $copy_row['student_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form4_<?php echo $copy_row['student_id'];?>" method="post" target="_blank" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous<?php echo $check_grade;?>_4.php">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์ผลการเรียน (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $cr_sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $cr_row = row_array($cr_sql);
        
        $classroomid = $cr_row['classroom_id'];
        
        $sqlstu = "SELECT * FROM tb_student WHERE student_id = '{$copy_row['student_id']}'";
        $rowstu = row_array($sqlstu);
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>
								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">เลขประจำตัวนักเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_id'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ชื่อ-สกุล</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $copy_row['student_name'];?>&nbsp;<?php echo $copy_row['student_surname'];?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" name="but4_<?php echo $copy_row['student_id'];?>" class="btn btn-info">พิมพ์</button>
								</div>
    <input type="hidden" name="classroom" value="<?php echo $classroom; ?>">
	<input type="hidden" name="id"  value="<?php echo $copy_row['student_id']; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <?php   } ?>




<!--++Print All++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                 
                    <div id="ggrpa1" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
                             
							<div class="modal-content">
<form name="form_ggrpa1" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous_all<?php echo $check_grade;?>_1.php" method="post" target="_blank">                                  
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์คะแนนครั้งที่ 1 (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $row = row_array($sql);
        
        $classroomid = $row['classroom_id'];
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>


								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

    <input type="hidden" name="classroom"  value="<?php echo $classroom; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">                                    
                                    
                                					
                                </div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" name="but_ggrpa1" class="btn btn-info">พิมพ์</button>
								</div>
                                
</form>    

							</div>
                        
						</div>
					</div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div id="ggrpa2" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form_ggrpa2" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous_all<?php echo $check_grade;?>_2.php" method="post" target="_blank">                                
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์คะแนนครั้งที่ 2 (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $row = row_array($sql);
        
        $classroomid = $row['classroom_id'];
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>


								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" class="btn btn-info">พิมพ์</button>
								</div>
                                
    <input type="hidden" name="classroom"  value="<?php echo $classroom; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div id="ggrpa3" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form_ggrpa3" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous_all<?php echo $check_grade;?>_3.php" method="post" target="_blank">                                
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์ผลสัมฤทธิ์ (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $row = row_array($sql);
        
        $classroomid = $row['classroom_id'];
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>


								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" class="btn btn-info">พิมพ์</button>
								</div>
                                
    <input type="hidden" name="classroom"  value="<?php echo $classroom; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div id="ggrpa4" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="form_ggrpa4" action="<?php echo $RunLink->Call_Link_System();?>/document/grade_report_previous_all<?php echo $check_grade;?>_4.php" method="post" target="_blank">                                
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ฟอร์มตั้งค่าการพิมพ์ผลการเรียน (ย้อนหลัง)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
    <?php
        $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$check_grade}' ";
        $row = row_array($sql);
        
        $classroomid = $row['classroom_id'];
        
        $sqlc = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroomid}'";
        $rowc = row_array($sqlc);
    ?>


								<div class="modal-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ห้องเรียน</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <?php echo $rowc['classroom_name']; ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher1" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายวิชาการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id1']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายวิชาการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select name="position1" class="form-control select">
															<option value="1" selected>School Registrar</option>
															<option value="2">Academic Affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="teacher2" class="form-control select">
															<option value="" disabled selected>เลือกฝ่ายอำนวยการ</option>
	<?php
		$sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '5' AND teacher_status='1' ORDER BY teacher_name_eng ASC";
		$tt = result_array($sql);
	?>

	<?php foreach ($tt as $_tt) { ?>
																<option <?php echo $row['teacher_id3']== $_tt['teacher_id'] ? "selected":""; ?> value="<?php echo $_tt['teacher_id'] ?>"><?php echo "$_tt[teacher_name_eng]";?>&nbsp;<?php echo "$_tt[teacher_surname_eng]";?></option>
	<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">ตำแหน่งฝ่ายอำนวยการ</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <select  name="position2" class="form-control select">
															<option value="3" selected>School Director</option>
															<option value="4">Deputy Director</option>
														</select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid?>-12">
                                            <fieldset class="mb-1">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid;?>-4">วันที่</label>
                                                    <div class="col-<?php echo $grid;?>-8">
                                                        <input class="form-control" data-date-format="yyyy-mm-dd"  size="16" type="text" name="txtdate" value="<?php echo $now_date; ?>" required/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" class="btn btn-info">พิมพ์</button>
								</div>
                                
    <input type="hidden" name="classroom"  value="<?php echo $classroom; ?>">
	<input type="hidden" name="check_term"  value="<?php echo $check_term; ?>">
	<input type="hidden" name="check_grade"  value="<?php echo $check_grade; ?>">
</form>
							</div>
						</div>
					</div>
<!--++Print All End++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{} ?>