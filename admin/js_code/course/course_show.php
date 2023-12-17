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
    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");

    include("../../structure/link.php");
    include("../../structure/function_php_oop.php");

    $RunLink = new link_system();

    check_login('admin_username_lcm', 'login.php');
?>
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
    if (($width_system >= 1200)) {
        $grid = "xl";
    } elseif (($width_system >= 992)) {
        $grid = "lg";
    } elseif (($width_system <= 768)) {
        $grid = "md";
    } elseif (($width_system <= 576)) {
        $grid = "sm";
    } else {
        $grid = "xs";
    }
?>

<script>
    $(document).ready(function(){

        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{ 
                orderable: false,
                width: 100,
                //targets: [ 7 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        // Apply custom style to select
        $.extend( $.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });


        var dataTable = $('.datatable-button-html5-columns-STD').DataTable();

        if (dataTable) {
            dataTable.destroy();
        }else{}


        // Basic datatable
        $('.datatable-button-html5-columns-STD').DataTable({
            
            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "lengthMenu": [
                [20, 40, 60, 100, -1],
                [20, 40 ,60, 100,"All"]
            ]       
        });    
        
        /*$('.datatable-button-html5-columns-STDB').DataTable({
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
        });*/

    })
</script>

<?php
    if((isset($_POST["run_show"]))){
        $run_show=filter_input(INPUT_POST, 'run_show');
            if(($run_show=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


    <div class="table-responsive">
        <table class="table table-bordered datatable-button-html5-columns-STD">
            <thead>
                <tr align="center">
                    <th>
                        <div>ลำดับ</div>
                    </th>
                    <th>
                        <div>หลักสูตร</div>
                    </th>
                    <th>
                        <div>สถานะ</div>
                    </th>
                    <th>
                        <div>รายละเอียด</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
    <?php
            $sql = "SELECT * FROM `tb_course` ORDER BY `course_name` ASC";
            $list = result_array($sql);
            foreach ($list as $key => $row) { 
                $courseid = $row['course_id'];
                $sqlCouD = "SELECT * FROM `tb_course_detail` WHERE `course_id`='{$courseid}'";
                $rowCouD = result_array($sqlCouD);
                $count1_CouD = count($rowCouD);
                ?>

                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $key + 1; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['course_name']; ?></div>
                        <div>
    <?php
		if($row['course_name_en'] == "") {
            echo "&nbsp;";
		}else{
		    echo $row['course_name_en'];
	    }
	?>
                        </div>
                        <div>
    <?php
		if($row['course_name_cn'] == ""){
            echo "&nbsp;";									
        } else {
			echo $row['course_name_cn'];
	    }
	?>
                        </div>

                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
		     if(($row['course_status']==1)) {
			    $course_status = show_status($row['course_status']); ?>
			            <div><span class="badge badge-success ml-auto"><?php echo $course_status;?></span></div>
	<?php    }elseif(($row['course_status']==0)){
			    $course_status = show_status($row['course_status']); ?>
			            <div><span class="badge badge-danger ml-auto"><?php echo $course_status;?></span></div>
	<?php    }else{} ?>   
                
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="form_course_show<?php echo $row["course_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
    <input type="hidden" name="" value="">
    <button type="submit" name="button_course_show<?php echo $row["course_id"];?>" class="btn btn-outline-info btn-sm"  title="แสดงข้อมูล <?php echo  $count1_CouD; ?>" data-placement="bottom"><?php echo  $count1_CouD; ?></button>
</form>
                                </li>
                            </ul>
                        </div>
                    </td>

                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="course_update<?php echo $row["course_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course">
    <input type="hidden" name="manage" value="edit"> 
    <input type="hidden" name="course_id" value="<?php echo $row["course_id"];?>">

    <button type="submit" name="button_<?php echo $row["course_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                <button type="button" name="Delete_Course_Delete" data-toggle="modal" data-target="#modal_course_Delete<?php echo $row['course_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--Delete-->
    <div id="modal_course_Delete<?php echo $row['course_id']; ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <div><i class="icon-warning" style="font-size :30px;"></i></div>
                </div>

                <div class="modal-body">
<form name="Form-course-Delete" id="Form-course-Delete" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="row" style="text-align: center;">
                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                    ต้องการลบข้อมูล  หรือไม่
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row" style="text-align: center;">
                        <div class="col-<?php echo $grid; ?>-12">
                            <button type="button" data-dismiss="modal" id="delete_course_<?php echo $row["course_id"];?>" name="delete_course_<?php echo $row["course_id"];?>" class="btn btn-outline-success" value="<?php echo $row["course_id"];?>">ใช้</button>
                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                        </div>
                    </div>
</form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var course_id=$("#delete_course_<?php echo $row["course_id"];?>").val();
            var action="delete";
            var action_error="error";
            var course_id_error="error";
            var table="tb_course";
            var ff="course_id";
// Defaults
            var swalInitDeteleImageData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
// Defaults End

            $('#delete_course_<?php echo $row["course_id"];?>').on('click', function() {

                        if (action==="") {
                            swalInitDeteleImageData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                            action_error="error";
                        }else{
                            action_error="no_error";
                        }

                        if(course_id===""){
                            swalInitDeteleImageData.fire({
                                title: 'คีย์ว่าง ไม่สามารถดำเนินการลบได้',
                                icon: 'error'
                            });
                            course_id_error="error";
                        }else{
                            course_id_error="no_error";
                        }

                        if(action_error=="no_error" && course_id_error=="no_error"){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/course/course_process.php",{
                                action:action,
                                course_id:course_id,
                                table:table,
                                ff:ff
                            },function(process_delete){
                                var process_delete = process_delete.trim();
                                if (process_delete === "NotError"){

                                    let timerInterval;
                                        swalInitDeteleImageData.fire({
                                            title: 'ลบสำเร็จ',
                                            //html: 'I will close in <b></b> milliseconds.',
                                            timer: 1200,
                                            icon: 'success',
                                            timerProgressBar: true,
                                            didOpen: function() {
                                                Swal.showLoading()
                                                timerInterval = setInterval(function() {
                                                    const content = Swal.getContent();
                                                    if (content) {
                                                        const b_manage_video = content.querySelector('b_manage_video')
                                                        if (b_manage_video) {
                                                            b_manage_video.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course";
                                            } else {}
                                        });

                                }else if(process_delete === "Error"){
                                    swalInitDeteleImageData.fire({
                                            title: 'ลบไม่สำเร็จ',
                                            icon: 'error'
                                    });
                                }else{
                                    swalInitDeteleImageData.fire({
                                            title: 'พบข้อผิดพลาด',
                                            text: process_delete,
                                            icon: 'error'
                                    });
                                }
                            })
                        }else{}

                });
            });
    </script>

<!--Delete End-->




<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php    } ?>

            </tbody>
        </table>
    </div>




<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}
    }else{}
?>




