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
//filter_input(INPUT_POST,'xxxx')
?>

<?php   
    include("../../config/connect.ini.php"); 
    include("../../config/fnc.php");
    
    include("../../structure/link.php"); 
    $RunLink = new link_system(); ?>

<?php check_login('admin_username_lcm', 'login.php'); ?>

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
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25 ,50, 100,"All"]
            ]

        });
    })
</script>

<script>
    $(document).ready(function(){}){
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });        
    }
</script>

<?php
    $check_grade=filter_input(INPUT_POST,'check_grade');
    $class_gn=filter_input(INPUT_POST,'class_gn');
    $check_term=filter_input(INPUT_POST,'check_term');

        if(($check_grade!="" and $class_gn!="")){

//check_grade
            $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$check_grade}'";
            $row = row_array($sql);	
            $grade="ระดับ".$row["grade_name"];
//check_grade end


    if(($check_term!=null)){
        if(($check_term=="--")){
            $sql="SELECT * FROM `tb_term` WHERE `term_status` = '1' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
            $row=row_array($sql);
            $check_term=$row["term_id"];	
            $year=$row["year"];
            $term=$row["term"]."/".$year;
        }else{
            $sql="SELECT * FROM `tb_term` WHERE `term_id` = '{$check_term}' AND `grade_id` = '{$check_grade}' ORDER BY `year` DESC , `term` DESC";
            $row=row_array($sql);	
            $year=$row["year"];
            $term=$row["term"]."/".$year;
        }
    }else{}
        
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">
            <div class="card-header header-elements-inline bg-info text-white">
                <div class="col-<?php echo $grid; ?>-6">ข้อมูลห้องเรียน <?php echo $class_gn." ภาคเรียน ".$term;?></div>
                <div class="col-<?php echo $grid; ?>-6"></div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable-button-html5-columns-STD">
                                <thead>
                                    <tr align="center">
                                        <th align="center"><div>ลำดับ</div></th>
                                        <th><div>ห้องเรียน</div></th>
                                        <th><div>นักเรียน</div></th>
                                        <th><div>ครูประจำชั้น(Eng)</div></th>
                                        <th><div>ครูประจำชั้น(Tha)</div></th>
                                        <th><div>ครูผู้สอน(ESL)</div></th>
                                        <th><div>ผู้ตรวจสอบ</div></th>
                                        <th><div>ตรวจสอบ</div></th>
                                        <th><div>จัดการ</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
    <?php
            $sql="SELECT * 
                FROM tb_assessment_classroom 
                WHERE classroom_t_id !='0' 
                AND term_id = '{$check_term}' 
                AND grade_id = '{$check_grade}' 
                AND a_classroom_status ='1' 
                ORDER BY a_classroom_name ASC";
            $list=result_array($sql);

            foreach ($list as $key => $row){
                
            $sql1 = "SELECT * FROM tb_assessment_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.a_classroom_id='{$row['a_classroom_id']}' AND a.a_classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC";
            $cc1 = result_array($sql1);

            $tid1=$row['teacher_id1'];
            $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
            $rowT1= row_array($sqlT1);

            $tid2=$row['teacher_id2'];
            $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
            $rowT2= row_array($sqlT2);

            $tidE=$row['teacher_esl'];
            $sqlTE = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tidE}'";
            $rowTE= row_array($sqlTE);

            $tidC=$row['teacher_check'];
            $sqlTC = "SELECT * FROM tb_admin WHERE admin_id = '{$tidC}'";
            $rowTC= row_array($sqlTC);
            
                if(($row['assessment_class']!=null)){
                    $assessment_class_txt=$row['a_classroom_name']."&nbsp;ชั้น&nbsp".$row['a_classroom_class'];
                }else{
                    $assessment_class_txt=$row['a_classroom_name'];
                }

                if(($row['position_id1']==1)){
                    $position_txt='<span class="badge badge-purple">English Homeroom Teacher</span>';
                }elseif(($row['position_id1']==2)){
                    $position_txt='<span class="badge badge-pink">Academic Affairs</span>';															
                }else{
                    $position_txt="-";
                }

                if(($row['check_status']=='1')) {	
                    $check_status_txt=$rowTC['admin_name']."&nbsp;".$rowTC['admin_lastname'];
                }elseif(($row['check_status']=='0')){
                    $check_status_txt="-";
                }else{
                    $check_status_txt="-";                    
                }

            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                    <tr>
                                        <td align="center"><div><?php echo $key+1;?></div></td>
                                        <td align="center"><div><?php echo $assessment_class_txt;?></div></td>
                                        <td align="center"><div><span class="badge badge-info badge-pill"><?php echo count($cc1);?></span></div></td>
                                        <td>
                                            <div><?php echo $rowT1["teacher_name"];?>&nbsp;<?php echo $rowT1["teacher_surname"];?></div>
                                            <div><?php echo $position_txt;?></div>
                                        </td>
                                        <td><div><?php echo $rowT2["teacher_name"];?>&nbsp;<?php echo $rowT2["teacher_surname"];?></div></td>
                                        <td><div><?php echo $rowTE["teacher_name"];?>&nbsp;<?php echo $rowTE["teacher_surname"];?></div></td>
                                        <td><div><?php echo $check_status_txt;?></div></td>
                                        <td align="center">
            <?php
                    if(($row["check_status"]=='1')){ ?>
                                            <div><i class="icon-checkmark2"></i></div>
                                            <div><?php  echo date_th($row["check_date"]);?></div>
            <?php    }else{ ?>
                                            <div class="badge badge-danger">Not Checked</div>
            <?php    } ?>
                                        </td>
                                        <td> 
                                        <div>
                                            <ul class="nav">
                                                <li class="nav-item">
<form name="form_assessment_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=assessment_show">
    <input name="a_classroom_key" type="hidden" value="<?php echo $row['a_classroom_id'];?>" />
    <input name="term_key" type="hidden" value="<?php echo $check_term;?>" />
    <input name="grade_key" type="hidden" value="<?php echo $check_grade;?>"/>
                                                    <button type="submit" name="button_show"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
</form>                                          </li>
                                            </ul>
                                        </div></td>
                                    </tr>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>


    
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
        }else{} ?>