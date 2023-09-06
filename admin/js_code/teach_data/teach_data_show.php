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
?>
<?php 
    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");

    include("../../structure/link.php");
    $RunLink = new link_system(); ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

<script type="text/javascript">
    function setScreenHWCookie() {
        $.cookie('sw', screen.width);
        //$.cookie('sh',screen.height);
        return true;
    }
    setScreenHWCookie();
</script>

<?php
$width_system = filter_input(INPUT_COOKIE, 'sw');
    if(($width_system >= 1200)) {
        $grid = "xl";
    }elseif(($width_system >= 992)) {
        $grid = "lg";
    }elseif(($width_system <= 768)) {
        $grid = "md";
    }elseif(($width_system <= 576)) {
        $grid = "sm";
    }else{
        $grid = "xs";
    }
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
     $(document).ready(function() {

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

        $.extend($.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });

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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <?php
        $exam_no=filter_input(INPUT_POST,'check_test');
        $check_term=filter_input(INPUT_POST,'check_term');
        $id=filter_input(INPUT_POST,'id');
        $tid=filter_input(INPUT_POST,'tid');
    ?>

    <?php
        //copy code
            //$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

            //$tid=isset($_REQUEST['tid']) ? $_REQUEST['tid'] : '';
        
            //$exam_no=isset($_REQUEST['exam_no']) ? $_REQUEST['exam_no'] : '';
        
            //$typec=isset($_REQUEST['typec']) ? $_REQUEST['typec'] : '';
        
        if (isset($_REQUEST['check_term'])) {
            $check_term=$_REQUEST['check_term'];
            $sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' ORDER BY year DESC , term DESC";
            $row = row_array($sql);	
            $term1="$row[term]";
            $year1="$row[year]";
            $term="$row[term]/$row[year]";
        } else if (!isset($_REQUEST['check_term'])) {
            $sql = "SELECT * FROM tb_term WHERE term_status = '1' ORDER BY year DESC , term DESC";
            $row = row_array($sql);
            $check_term=$row['term_id'];
            $term1="$row[term]";
            $year1="$row[year]";
            $term="$row[term]/$row[year]";
        } 
        
        $sqlT = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid}'";
        $rowT = row_array($sqlT);
        //copy code end
    ?>


    <div class="row">
        <div class="col-<?php echo $grid; ?>-12">
            <h4>ข้อมูลการสอนตามรายวิชา <small>ภาคเรียน <?php echo $term;?>&nbsp;<?php echo $rowT['teacher_name'];?> <?php echo $rowT['teacher_surname'];?>&nbsp;ครูผู้สอน</h4>           
        </div>
    </div>


    <div class="row">
        <div class="col-<?php echo $grid;?>-12">

            <div class="card">
				<div class="card-header bg-primary text-white header-elements-inline">
                    <div class="col-<?php echo $grid; ?>-6 card-title" style="font-size: 14px;">ตารางการสอนตามรายวิชา</div>
                    <div class="col-<?php echo $grid; ?>-6" align="right">
                        <button type="button" onclick="location.href='#';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                        <button type="button" onclick="location.href='#';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> พิมพ์</button>
                    </div>									
				</div>

				<div class="card-body" style="font-size: 14px;">
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                            <div class="table-responsive">
                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                    <thead>
                                        <tr align="center">
                                            <th align="center"><div>ลำดับ</div></th>
                                            <th align="center"><div>รหัสวิชา</div></th>
                                            <th align="center"><div>ชื่อวิชา</div></th>
                                            <th align="center"><div>ชื่อวิชา(Eng)</div></th>
                                            <th align="center"><div>ประเภท</div></th>
                                            <th align="center"><div>เวลาเรียน/ปี</div></th>
                                            <th align="center"><div>หน่วยกิต</div></th>
                                            <th align="center"><div>ห้องเรียน</div></th>
                                            <th align="center"><div>Academic</div></th>
                                            <th align="center"><div>Teacher</div></th>
                                            <th align="center"><div>คะแนน <?php echo $exam_no;?></div></th>
                                        </tr>
                                    </thead>
<!--copy code-->

<tbody>

<?php 

    //ระดับปฐมศึกษา
    $check_grade1 = 1;
        
    $sql1 = "SELECT * FROM tb_term WHERE grade_id = '$check_grade1' AND year = '{$year1}' AND  term = '{$term1}' ";
    $cc1 = row_array($sql1);

    $check_term1 = $cc1['term_id'];

    if ($exam_no == '1'){
            
    $sql_1 = "SELECT * , e.teacher_check AS TEACHER_CHECK, e.check_status AS CHECK_STATUS , e.admin_check AS A_CHECK, e.admin_check_status AS A_CHECK_STATUS FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id = e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade1' AND d.term_id = '$check_term1'  GROUP BY a.subject_id ASC , d.classroom_t_id ASC ORDER BY a.subt_id ASC , d.classroom_t_id ASC , c.sort ASC";	

    } else if ($exam_no == '2'){

    $sql_1 = "SELECT * , e.teacher_check2 AS TEACHER_CHECK, e.check_status2 AS CHECK_STATUS , e.admin_check2 AS A_CHECK, e.admin_check_status2 AS A_CHECK_STATUS FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id = e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade1' AND d.term_id = '$check_term1'  GROUP BY a.subject_id ASC , d.classroom_t_id ASC ORDER BY a.subt_id ASC , d.classroom_t_id ASC , c.sort ASC";	

    }
    
    //$sql_1 = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id=e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade' AND d.term_id = '$check_term1' GROUP BY c.subject_id ASC ORDER BY a.subt_id ASC , c.sort ASC";

    //echo $sql_1;
    $list_1 = result_array($sql_1);
?>
                    <tr>
                        <td align="left" colspan="10">ประถมศึกษา</td>
                        <!--<td align="left" colspan="10">ประถมศึกษา</td>-->
                    </tr>
<?php foreach ($list_1 as $key => $row1) { 

    $course_class_id1 = $row1['course_class_id'];

    $course_type = $row1['course_class_type'];

    $course_class_lid = $row1['course_class_level_id'];
    $course_class_detail_id = $row1['course_class_detail_id'];

    $teacher_check = $row1['TEACHER_CHECK'];
    $check_status = $row1['CHECK_STATUS'];

    $admin_check = $row1['A_CHECK'];
    $admin_check_status = $row1['A_CHECK_STATUS'];

    $ccl_name = $row1['course_class_level_name'];

    $classroom_t_id1 = $row1['classroom_t_id'];

    $sqlCla1= "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$classroom_t_id1'";
    $_rowCla1 = row_array($sqlCla1);	


?>

                        <tr>
                            <td align="center"><?php echo $key+1;?></td>
                            <td align="center"><?php echo $row1['subject_code'];?></td>
                            <td align="left"><?php echo $row1['subject_name'];?><br>(<?php echo $ccl_name;?>)</td>
                            <td align="left"><?php echo $row1['subject_name_eng'];?>	</td>
                            <td align="center"><?php echo $row1['subt_name'];?></td>
                            <td align="center"><?php echo $row1['unit'];?></td>
                            <td align="center"><?php echo $row1['weight'];?></td>
                            <td align="left"><?php echo  $_rowCla1['classroom_name']; ?></td>
                            <td align="center">

                                    <?php 
                                            if($admin_check_status=='1') {
                                                    echo "<font color='green'>Checked</font>";
                                            } else if($admin_check_status=='0') {			
                                                    echo "<font color='red'>Not Checked</font>";
                                            } 
                                    ?>	

                            </td>
                            <td align="center">

                                    <?php 
                                            if($check_status=='1') {
                                                    echo "<font color='green'>Checked</font>";
                                            } else if($check_status=='0') {			
                                                    echo "<font color='red'>Not Checked</font>";
                                            } 
                                    ?>	

                            </td>

                            <td align="center"> 

                            <?php 
                                if(($row1['teacher_id1'] == $tid) && ($row1['teacher_id2'] == "")) {		
                                //echo "$row1[teacher_id1] - $row1[teacher_id2]";															
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&cid=<?php echo $course_class_id1;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&cid=<?php echo $course_class_id1;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row1['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <?php 	
                                } else if(($row1['teacher_id1'] == $tid) && ($row1['teacher_id2'] != "")) {		
                                //echo "$row1[teacher_id1] - $row1[teacher_id2]";
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&cid=<?php echo $course_class_id1;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&cid=<?php echo $course_class_id1;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row1['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <!--<a href="?modules=teach_show_details&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn blue btn-sm" title="รายละเอียดคะแนนรวม">
                                    <i class="fa fa-server"></i> </a>	-->	
                            
                            <?php 	
                                } else if(($row1['teacher_id1'] != "") && ($row1['teacher_id2'] == $tid)) {		
                                //echo "$row1[teacher_id1] - $row1[teacher_id2]";
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&cid=<?php echo $course_class_id1;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&cid=<?php echo $course_class_id1;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>        
                                    
                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row1['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <!--<a href="?modules=teach_show_details&id=<?php echo $row1['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla1['classroom_t_id'];?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade1;?>&check_term=<?php echo $check_term1;?>" class="btn blue btn-sm" title="รายละเอียดคะแนนรวม">
                                    <i class="fa fa-server"></i> </a>	-->	
                            
                            <?php 	
                                } 
                            ?>	
                                    
                            </td>
                        </tr>

    <?php } ?>

    <?php 
    
    //ระดับมัธยมศึกษาตอนต้น
    $check_grade2 = 2;
        
    $sql2 = "SELECT * FROM tb_term WHERE grade_id = '$check_grade2' AND year = '{$year1}' AND  term = '{$term1}' ";
    $cc2 = row_array($sql2);

    $check_term2 = $cc2['term_id'];

    if ($exam_no == '1'){
            
        $sql_2 = "SELECT * , e.teacher_check AS TEACHER_CHECK, e.check_status AS CHECK_STATUS , e.admin_check AS A_CHECK, e.admin_check_status AS A_CHECK_STATUS FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id = e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade2' AND d.term_id = '$check_term2' GROUP BY a.subject_id ASC , d.classroom_t_id ASC ORDER BY a.subt_id ASC , d.classroom_t_id ASC ,c.sort ASC";	

    } else if ($exam_no == '2'){

        $sql_2 = "SELECT * , e.teacher_check2 AS TEACHER_CHECK, e.check_status2 AS CHECK_STATUS , e.admin_check2 AS A_CHECK, e.admin_check_status2 AS A_CHECK_STATUS FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id = e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade2' AND d.term_id = '$check_term2' GROUP BY a.subject_id ASC , d.classroom_t_id ASC ORDER BY a.subt_id ASC , d.classroom_t_id ASC ,c.sort ASC";	
    
    }

        //$sql_2 = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id=e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade' AND d.term_id = '$check_term2' GROUP BY c.subject_id ASC ORDER BY a.subt_id ASC , c.sort ASC";	

        //echo $sql_2;
        $list_2 = result_array($sql_2);
    ?>												
                    <tr>
                        <td align="left" colspan="10">มัธยมศึกษาตอนต้น</td>
                        <!--<td align="left" colspan="10">มัธยมศึกษาตอนต้น</td>-->
                    </tr>
    <?php foreach ($list_2 as $key => $row2) { 

        $course_class_id2 = $row2['course_class_id'];

        $course_type = $row2['course_class_type'];

        $course_class_lid = $row2['course_class_level_id'];
        $course_class_detail_id = $row2['course_class_detail_id'];

        $teacher_check = $row2['TEACHER_CHECK'];
        $check_status = $row2['CHECK_STATUS'];

        $admin_check = $row2['A_CHECK'];
        $admin_check_status = $row2['A_CHECK_STATUS'];

        $ccl_name = $row2['course_class_level_name'];

        $classroom_t_id2 = $row2['classroom_t_id'];

        $sqlCla2 = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$classroom_t_id2'";
        $_rowCla2 = row_array($sqlCla2);	
    ?>
                        
                        <tr>
                            <td align="center"><?php echo $key+1;?></td>
                            <td align="center"><?php echo $row2['subject_code'];?></td>
                            <td align="left"><?php echo $row2['subject_name'];?><br>(<?php echo $ccl_name;?>)</td>
                            <td align="left"><?php echo $row2['subject_name_eng'];?></td>
                            <td align="center"><?php echo $row2['subt_name'];?></td>
                            <td align="center"><?php echo $row2['unit'];?></td>
                            <td align="center"><?php echo $row2['weight'];?></td>
                            <td align="left"><?php echo  $_rowCla2['classroom_name']; ?></td>

                            <td align="center">

                                    <?php 
                                            if($admin_check_status=='1') {
                                                    echo "<font color='green'>Checked</font>";
                                            } else if($admin_check_status=='0') {			
                                                    echo "<font color='red'>Not Checked</font>";
                                            } 
                                    ?>	

                            </td>

                            <td align="center">

                                    <?php 
                                            if($check_status=='1') {
                                                    echo "<font color='green'>Checked</font>";
                                            } else if($check_status=='0') {			
                                                    echo "<font color='red'>Not Checked</font>";
                                            } 
                                    ?>	

                            </td>

                            <td align="center"> 

                            <?php 
                                if(($row2['teacher_id1'] == $tid) && ($row2['teacher_id2'] == "")) {		
                                //echo "$row2[teacher_id1] - $row2[teacher_id2]";															
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&cid=<?php echo $course_class_id2;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&cid=<?php echo $course_class_id2;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>        
                                    
                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row2['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <?php 	
                                } else if(($row2['teacher_id1'] == $tid) && ($row2['teacher_id2'] != "")) {		
                                //echo "$row2[teacher_id1] - $row2[teacher_id2]";
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&cid=<?php echo $course_class_id2;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&cid=<?php echo $course_class_id2;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>
                            
                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row2['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <!--<a href="?modules=teach_show_details&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn blue btn-sm" title="รายละเอียดคะแนนรวม">
                                    <i class="fa fa-server"></i> </a>-->		
                            
                            <?php 	
                                } else if(($row2['teacher_id1'] != "") && ($row2['teacher_id2'] == $tid)) {		
                                //echo "$row2[teacher_id1] - $row2[teacher_id2]";
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&cid=<?php echo $course_class_id2;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&cid=<?php echo $course_class_id2;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row2['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <!--<a href="?modules=teach_show_details&id=<?php echo $row2['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla2['classroom_t_id'];?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade2;?>&check_term=<?php echo $check_term2;?>" class="btn blue btn-sm" title="รายละเอียดคะแนนรวม">
                                    <i class="fa fa-server"></i> </a>-->		
                            
                            <?php 	
                                } 
                            ?>	
                                    
                            </td>
                        </tr>

    <?php } ?>

    <?php 

    //ระดับมัธยมศึกษาตอนปลาย
    $check_grade3 = 3;
        
    $sql3 = "SELECT * FROM tb_term WHERE grade_id = '$check_grade3' AND year = '{$year1}' AND  term = '{$term1}' ";
    $cc3 = row_array($sql3);

    $check_term3 = $cc3['term_id'];

    if ($exam_no == '1'){
            
        $sql_3 = "SELECT * , e.teacher_check AS TEACHER_CHECK, e.check_status AS CHECK_STATUS , e.admin_check AS A_CHECK, e.admin_check_status AS A_CHECK_STATUS FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id = e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade3' AND d.term_id = '$check_term3' GROUP BY a.subject_id ASC , d.classroom_t_id ASC ORDER BY a.subt_id ASC , d.classroom_t_id ASC ,c.sort ASC";	

    } else if ($exam_no == '2'){

        $sql_3 = "SELECT * , e.teacher_check2 AS TEACHER_CHECK, e.check_status2 AS CHECK_STATUS , e.admin_check2 AS A_CHECK, e.admin_check_status2 AS A_CHECK_STATUS FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id = e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade3' AND d.term_id = '$check_term3' GROUP BY a.subject_id ASC , d.classroom_t_id ASC ORDER BY a.subt_id ASC , d.classroom_t_id ASC ,c.sort ASC";	

    }

        //$sql_3 = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id INNER JOIN tb_course_class_detail c ON a.subject_id=c.subject_id INNER JOIN tb_course_class d ON c.course_class_id=d.course_class_id INNER JOIN tb_course_class_level e ON c.course_class_detail_id=e.course_class_detail_id WHERE (e.teacher_id1 = '$tid' OR e.teacher_id2 = '$tid') AND d.grade_id = '$check_grade' AND d.term_id = '$check_term3' GROUP BY c.subject_id ASC ORDER BY a.subt_id ASC , c.sort ASC";	

        
        //echo $sql_3;
        $list_3 = result_array($sql_3);
    ?>
                    <tr>
                        <td align="left" colspan="10">มัธยมศึกษาตอนปลาย</td>
                        <!--<td align="left" colspan="10">มัธยมศึกษาตอนปลาย</td>-->
                    </tr>
    <?php foreach ($list_3 as $key => $row3) { 
    
        $course_class_id3 = $row3['course_class_id'];

        $course_type = $row3['course_class_type'];

        $course_class_lid = $row3['course_class_level_id'];
        $course_class_detail_id = $row3['course_class_detail_id'];

        $teacher_check = $row3['TEACHER_CHECK'];
        $check_status = $row3['CHECK_STATUS'];

        $admin_check = $row3['A_CHECK'];
        $admin_check_status = $row3['A_CHECK_STATUS'];

        $ccl_name = $row3['course_class_level_name'];
        
        $classroom_t_id3 = $row3['classroom_t_id'];

        $sqlCla3 = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '$classroom_t_id3'";
        $_rowCla3 = row_array($sqlCla3);	
    ?>
                        <tr>
                            <td align="center"><?php echo $key+1;?></td>
                            <td align="center"><?php echo $row3['subject_code'];?></td>
                            <td align="left"><?php echo $row3['subject_name'];?><br>(<?php echo $ccl_name;?>)</td>
                            <td align="left"><?php echo $row3['subject_name_eng'];?></td>
                            <td align="center"><?php echo $row3['subt_name'];?></td>
                            <td align="center"><?php echo $row3['unit'];?></td>
                            <td align="center"><?php echo $row3['weight'];?></td>
                            <td align="left"><?php echo  $_rowCla3['classroom_name']; ?></td>
                            <td align="center">

                                    <?php 
                                            if($admin_check_status=='1') {
                                                    echo "<font color='green'>Checked</font>";
                                            } else if($admin_check_status=='0') {			
                                                    echo "<font color='red'>Not Checked</font>";
                                            } 
                                    ?>	

                            </td>

                            <td align="center">

                                    <?php 
                                            if($check_status=='1') {
                                                    echo "<font color='green'>Checked</font>";
                                            } else if($check_status=='0') {			
                                                    echo "<font color='red'>Not Checked</font>";
                                            } 
                                    ?>	

                            </td>

                            <td align="center"> 

                               
                            <?php 
                                if(($row3['teacher_id1'] == $tid) && ($row3['teacher_id2'] == "")) {		
                                //echo "$row3[teacher_id1] - $row3[teacher_id2]";															
                            ?>	
                               
                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&cid=<?php echo $course_class_id3;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&cid=<?php echo $course_class_id3;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>        
                                    
                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row3['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <?php 	
                                } else if(($row3['teacher_id1'] == $tid) && ($row3['teacher_id2'] != "")) {		
                                //echo "$row3[teacher_id1] - $row3[teacher_id2]";
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&cid=<?php echo $course_class_id3;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->
                                 
                                        
                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&cid=<?php echo $course_class_id3;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row3['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <!--<a href="?modules=teach_show_details&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn blue btn-sm" title="รายละเอียดคะแนนรวม">
                                    <i class="fa fa-server"></i> </a>	-->	
                            
                            <?php 	
                                } else if(($row3['teacher_id1'] != "") && ($row3['teacher_id2'] == $tid)) {		
                                //echo "$row3[teacher_id1] - $row3[teacher_id2]";
                            ?>	

                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&cid=<?php echo $course_class_id3;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn green btn-sm" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>">
                                    <i class="icon-search4"></i> </a>-->

                            <button type="button" name="button_show" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&cid=<?php echo $course_class_id3;?>&cl_id=<?php echo $course_class_lid;?>&cdid=<?php echo $course_class_detail_id;?>&typec=<?php echo $course_type ;?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>'" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียดคะแนนครั้งที่ <?php echo $exam_no;?>" data-placement="bottom"><i class="icon-search4"></i></button>        
                                    
                            <!--<a href="?modules=teach_show_detail&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&cid=<?php echo $row3['course_class_id'];?>&clid=<?php echo "$_rowCla[classroom_id]";?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn green btn-sm" title="รายละเอียดคะแนน">
                                    <i class="icon-search4"></i> </a>-->	

                            <!--<a href="?modules=teach_show_details&id=<?php echo $row3['subject_id'];?>&idd=<?php echo $id;?>&tid=<?php echo $tid;?>&exam_no=<?php echo $exam_no;?>&clid=<?php echo $_rowCla3['classroom_t_id'];?>&check_grade=<?php echo $check_grade3;?>&check_term=<?php echo $check_term3;?>" class="btn blue btn-sm" title="รายละเอียดคะแนนรวม">
                                    <i class="fa fa-server"></i> </a>	-->	
                            
                            <?php 	
                                } 
                            ?>	
                                    
                            </td>
                        </tr>

        <?php } ?>
                    </tbody>

<!--copy code end -->
                                </table>
                            </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->                        
                        </div>
                    </div>
				</div>
			</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

