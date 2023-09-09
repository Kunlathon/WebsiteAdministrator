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
            "searching": true,
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

        $check_term=filter_input(INPUT_POST, 'term_key');
        $check_grade=filter_input(INPUT_POST, 'grade_key');            
            if(($check_term!=null and $check_grade!=null)){ 
                
                if((isset($check_grade))) {
                    $sql = "SELECT *
                            FROM `tb_grade` 
                            WHERE `grade_id` = '{$check_grade}'";
                    $row = row_array($sql);	
                    $grade="ระดับ".$row["grade_name"];
                }else{
                    $grade="";
                } 
                

                if((isset($check_term))) {
                    $sql = "SELECT * FROM `tb_term` WHERE `term_id` = '{$check_term}' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                    $row = row_array($sql);	
                    $year = $row['year'];
                    $term=$row["term"]."/".$year;
                }else{
                    $sql = "SELECT * FROM `tb_term` WHERE `term_status` = '1' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
                    $row = row_array($sql);
                    $check_term=$row['term_id'];
                    $year = $row['year'];
                    $term=$row["term"]."/".$year;
                } 
                
                ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
					<div class="card-header header-elements-inline bg-info text-white">
                   
                            <div class="col-<?php echo $grid;?>-6">
                                <div>ผลสัมฤทธิ์ทางการศึกษาระดับมัธยมศึกษา ภาคเรียนที่ <?php echo $term;?></div>
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
                                                        <th > ลำดับ </th>
                                                        <th> ห้องเรียน </th>
														<th >นักเรียน</th>  
														<th >ครูประจำชั้น(Eng)</th>  
														<th >ครูประจำชั้น(Tha)</th> 
                                                        <th > จัดการ </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
							<?php 
										
								$sql = "SELECT * FROM tb_classroom_teacher WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' AND classroom_status ='1' ORDER BY classroom_name ASC";
								$list = result_array($sql);
							?>
							<?php foreach ($list as $key => $row) { ?>
							<?php
								$sql1 = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$row['classroom_t_id']}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC";
								$cc1 = result_array($sql1);
							?>
							<?php 
								$tid1=$row['teacher_id1'];
								$sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
								$rowT1= row_array($sqlT1);
							?>
							<?php 
								$tid2=$row['teacher_id2'];
								$sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
								$rowT2= row_array($sqlT2);
							?>
							<?php 
								$tidC=$row['teacher_check'];
								$sqlTC = "SELECT * FROM tb_admin WHERE admin_id = '{$tidC}'";
								$rowTC= row_array($sqlTC);
							?>

                                                    <tr>
                                                        <td align="center"><?php echo $key+1;?></td>
														<?php if($row['character_class']!="") {;?>
                                                        <td>&nbsp;<?php echo $row['classroom_name'];?>&nbsp;ชั้น&nbsp<?php echo $row['classroom_class'];?></td>
														<?php } else if($row['classroom_class']=="") {;?>
														<td>&nbsp;<?php echo $row['classroom_name'];?></td>
														<?php } ?>
														<td align="center"><span class="badge badge-info badge-pill"><?php echo count($cc1);?></span></td>
														<!--<td align="center"><?php echo $row['student_num'];?></td>-->
														<!--<td><?php echo $rowB['building_name'];?></td>-->
														<td><?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?><br>

														<?php 
														if($row['position_id1']=='1'){
															echo "English Homeroom Teacher";
														} else if($row['position_id1']=='2'){
															echo "Academic Affairs";															
														}

														?>
														
														</td>
														<td><?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?></td>
														<td align="center"> 	
                                                            
                                                            <div>
                                                                <ul class="nav justify-content-center">
                                                                    <li class="nav-item">
<form name="form_cds<?php echo $row['classroom_t_id']; ?>" accept-charset="utf-8" method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=character_show">
                                                                        <button type="submit" name="sub_form_cds<?php echo $row['classroom_t_id']; ?>"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                                                        <input name="manage"  type="hidden" value="character_show">
                                                                        <input name="classroom_t_key"  type="hidden" value="<?php echo $row['classroom_t_id'];?>">
                                                                        <input name="term_key"  type="hidden" value="<?php echo $check_term;?>">
                                                                        <input name="grade_key"  type="hidden" value="<?php echo $check_grade;?>">
</form>
                                                                    <li>
                                                                </ul>
                                                            </div>	
    
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
    <?php   }else{}