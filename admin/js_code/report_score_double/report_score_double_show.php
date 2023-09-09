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
    check_login('admin_username_lcm', 'login.php');
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
                                <div>ผลคะแนนระดับมัธยมศึกษา(ดับเบิล) ภาคเรียนที่ <?php echo $term;?></div>
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
                                            <table class="table table-bordered datatable-button-html5-columns-STD" >
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
														<th width="120"> ห้องเรียน </th>
														<!--<th width="70"> คะแนน <br>ครํ้งที่ 1 </th>-->	
														<th width="70"> คะแนน <br>ครํ้งที่ 2</th>
														<th width="70"> สัมฤทธิ์</th>
														<th width="70"> GPA</th>
                                                    </tr>

													<?php
													if ($classroom!="") {
													?>

													<tr>
                                                        <td colspan="9">&nbsp;</td>
														<!--<td width="70" align="center"> 

														<a href="document/double/grade_report_all3_1.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 1" target="_blank">
																<i class="fa fa-print"></i> </a>

														</td>-->	
														<td width="70" align="center"> 

                                                        <div><a  href="<?php echo $RunLink->Call_Link_System();?>/document/double/grade_report_all<?php echo $check_grade;?>_2.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="พิมพ์คะแนนครั้ง 2" target="_blank" class="badge badge-dark p-1" ><i class="icon-printer4"></i></a></div>

														<!--<a href="document/double/grade_report_all3_2.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 2" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="document/double/grade_report_all3_2.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์คะแนนครั้ง 2" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>	
														<td width="70" align="center"> 

                                                        <div><a  href="<?php echo $RunLink->Call_Link_System();?>/document/double/grade_report_all<?php echo $check_grade;?>_3.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="พิมพ์ผลสัมฤทธิ์" target="_blank" class="badge badge-dark p-1" ><i class="icon-printer4"></i></a></div>

														<!--<a href="document/double/grade_report_all3_3.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์ผลสัมฤทธิ์" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>	
														<td width="70" align="center"> 

                                                        <div><a  href="<?php echo $RunLink->Call_Link_System();?>/document/double/grade_report_all<?php echo $check_grade;?>_4.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="พิมพ์ผลการเรียน" target="_blank" class="badge badge-dark p-1" ><i class="icon-printer4"></i></a></div>

														<!--<a href="document/double/grade_report_all3_4.php?classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="พิมพ์ผลการเรียน" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														</td>	
                                                    </tr>
													<?php } ?>
                                                </thead>
                                                <tbody>
										<?php 

										if (isset($classroom)) {
											$sql = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_student c ON b.student_id=c.student_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND c.student_status='1' AND (b.student_no != '0' OR b.student_no != '') AND a.classroom_t_id = '$classroom' ORDER BY c.student_class ASC ,c.student_no ASC";

										} else if (!isset($classroom)) {
											$sql = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_student c ON b.student_id=c.student_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term' AND c.student_status='1' AND (b.student_no != '0' OR b.student_no != '') AND a.classroom_t_id = '$classroom' ORDER BY c.student_class ASC ,c.student_no ASC";

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

								$sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
								$rowC = row_array($sqlC);
							?>

                                                    <tr>
                                                        <td align="center"> <?php echo $row['student_no'];?></td>
														<!--<td align="center"><?php echo $key+1;?></td>-->
                                                        <td align="center"> <?php echo $row['student_id'];?></td>
														<td><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?></td>
														<td><?php echo $row['student_name_eng'];?>&nbsp;<?php echo $row['student_surname_eng'];?></td>
														<td align="center"> <?php echo $row['student_idcard'];?></td>
														<td><?php echo $row['nickname'];?></td>
														<td><?php echo $gender;?></td>
														<td><?php echo $row['student_tel'];?></td>
														<!--<td><?php echo $row['student_email'];?></td>-->
														<td><?php echo $rowC['classroom_name'];?></td>
														<!--<td align="center"> 

														<a href="?modules=report_score_double_show3&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn blue btn-sm" title="ประเมินครั้งที่ 1">
																<i class="fa fa-file-text-o"></i> </a>
																
														<a href="document/double/grade_report3_1.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 1" target="_blank">
																<i class="fa fa-print"></i> </a>
																														
														</td>-->
														<td align="center"> 

                                                        <div><a  href="<?php echo $RunLink->Call_Link_System();?>/?modules=report_score_double_show<?php echo $check_grade;?>_2&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="ประเมินครั้งที่ 2" class="badge badge-purple p-1" target="_blank"><i class="icon-file-text2"></i></a></div>

														<!--<a href="?modules=report_score_double_show3_2&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn purple btn-sm" title="ประเมินครั้งที่ 2">
																<i class="fa fa-file-text-o"></i> </a>-->
																
														<div><a  href="<?php echo $RunLink->Call_Link_System();?>/document/double/grade_report<?php echo $check_grade;?>_2.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="พิมพ์คะแนนครั้ง 2" target="_blank" class="badge badge-dark p-1" ><i class="icon-printer4"></i></a></div>

                                                        <!--<a href="document/double/grade_report3_2.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 2" target="_blank">
																<i class="fa fa-print"></i> </a>-->

														<!--<a href="?modules=report_score_double_show3_2&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn purple btn-sm" title="ประเมินครั้งที่ 2">
																<i class="fa fa-file-text-o"></i> </a>-->	

														<!--
																<a href="document/grade_report3_2.php" class="btn btn-sm grey-salsa" title="ประเมินครั้งที่ 1" target="_blank">
																<i class="fa fa-print"></i> </a>-->
																														
														</td>
														<td align="center"> 

                                                        <div><a  href="<?php echo $RunLink->Call_Link_System();?>/?modules=report_score_double_show<?php echo $check_grade;?>_F&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="ประเมินผลสัมฤทธิ์" class="badge badge-warning p-1" target="_blank"><i class="icon-file-text2"></i></a></div>

														<!--<a href="?modules=report_score_double_show3_F&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn yellow-gold btn-sm" title="ประเมินผลสัมฤทธิ์">
																<i class="fa fa-file-text-o"></i> </a>-->	

                                                                <div><a  href="<?php echo $RunLink->Call_Link_System();?>/document/double/grade_report<?php echo $check_grade;?>_3.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="ประเมินผลสัมฤทธิ์" target="_blank" class="badge badge-dark p-1" ><i class="icon-printer4"></i></a></div>

                                                        <!--<a href="document/double/grade_report3_3.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ประเมินผลสัมฤทธิ์" target="_blank">
																<i class="fa fa-print"></i> </a>-->
																														
														</td>
														<td align="center"> 

                                                        <div><a  href="<?php echo $RunLink->Call_Link_System();?>/?modules=report_score_double_show<?php echo $check_grade;?>_G&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="ผลการเรียน" class="badge badge-danger p-1" target="_blank"><i class="icon-file-text2"></i></a></div>

														<!--<a href="?modules=report_score_double_show3_G&id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn red btn-sm" title="ผลการเรียน">
																<i class="fa fa-file-text-o"></i> </a>-->	

                                                                <div><a  href="<?php echo $RunLink->Call_Link_System();?>/document/double/grade_report<?php echo $check_grade;?>_4.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" title="ผลการเรียน" target="_blank" class="badge badge-dark p-1" ><i class="icon-printer4"></i></a></div>
                                                       
                                                        <!--<a href="document/double/grade_report3_4.php?id=<?php echo $row['student_id'];?>&classroom=<?php echo $classroom;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>" class="btn btn-sm grey-salsa" title="ผลการเรียน" target="_blank">
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



<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{} ?>