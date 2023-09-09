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
<?php include '../../config/connect.ini.php';
include '../../config/fnc.php';

include("../../structure/link.php");
$RunLink = new link_system(); ?>

<?php check_login('admin_username_lcm', 'login.php'); ?>

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
    $(document).ready(function() {

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

        $('#datatable-button-html5-columns-STD').DataTable({
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
                [10, 25, 50, 100, "All"]
            ]



        });

    })
</script>


<?php
@$check_grade = filter_input(INPUT_POST, 'class_id');
if (($check_grade != null)) {
    if ((is_numeric($check_grade))) {

        //$check_grade=$list;
        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$check_grade}';";
        $class_Row = result_array($class_Sql);
        foreach ($class_Row as $key => $class_Print) {
            if ((is_array($class_Print) && count($class_Print))) {
                $txt_grade_name = $class_Print["grade_name"];
                $txt_grade_name_eng = $class_Print["grade_name_eng"];
            } else {
                $txt_grade_name = "-";
                $txt_grade_name_eng = "-";
            }
        }

?>
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">
                <div class="card border border-purple">

                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลประเภทรายวิชา ระดับชั้น<?php echo $txt_grade_name; ?></div>
                        <div class="col-<?php echo $grid; ?>-6" align="right">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=<?php echo base64_encode($check_grade);?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=<?php echo base64_encode($check_grade);?>">
                                                <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button>
<input type="hidden" name="class_subject" id="class_subject" value="<?php echo $check_grade;?>">                                                
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data">
                                                <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา(Excel)</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="datatable-button-html5-columns-STD">
                                        <thead>
                                            <tr align="center">
                                                <th>
                                                    <div>ลำดับ</div>
                                                </th>
                                                <th>
                                                    <div>รหัสวิชา</div>
                                                </th>
                                                <th>
                                                    <div>ชื่อวิชา</div>
                                                </th>
                                                <th>
                                                    <div>ชื่อวิชา(Eng)</div>
                                                </th>
                                                <th>
                                                    <div>ประเภท</div>
                                                </th>
                                                <th>
                                                    <div>เวลาเรียน/ปี</div>
                                                </th>
                                                <th>
                                                    <div>หน่วยกิต</div>
                                                </th>
                                                <th>
                                                    <div>จัดการ</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.grade_id = '{$check_grade}' ORDER BY a.subt_id ASC , a.subject_name ASC";
                                        $list = result_array($sql);
                                        ?>
                                        <tbody>
                                            <?php foreach ($list as $key => $row) {
                                                $key = $key + 1;
                                            ?>

                                                <tr>
                                                    <td align="center">
                                                        <div><?php echo $key; ?></div>
                                                    </td>
                                                    <td align="center">
                                                        <div><?php echo $row['subject_code']; ?></div>
                                                    </td>
                                                    <td align="left">
                                                        <div><?php echo $row['subject_name']; ?></div>
                                                    </td>
                                                    <td align="left">
                                                        <div><?php echo $row['subject_name_eng']; ?></div>
                                                    </td>
                                                    <td align="center">
                                                        <div><?php echo $row['subt_name']; ?></div>
                                                    </td>
                                                    <td align="center">
                                                        <div><?php echo $row['unit']; ?></div>
                                                    </td>
                                                    <td align="center">
                                                        <div><?php echo $row['weight']; ?></div>
                                                    </td>
                                                    <td>
                                                        <div align="right">
                                                            <ul class="nav">
                                                                <li class="nav-item">
                                                                    <form name="update_sds<?php echo $row['subject_id']; ?>" id="update_sds<?php echo $row['subject_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=<?php echo base64_encode($check_grade);?>">
                                                                        <button type="submit" name="update_<?php echo $row['subject_id']; ?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
                                                                        <input type="hidden" name="id" id="id" value="<?php echo @$row['subject_id']; ?>"> 
                                                                        <input type="hidden" name="manage" id="manage" value="form_update">
                                                                    </form>

                                                                </li>
                                                                <li class="nav-item">
                                                                    <form>
                                                                        <button type="button" name="delete_<?php echo $row['subject_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['subject_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>









                                                <!-- /dangermodal -->
                                                <div id="modal_theme_success_Delete<?php echo $row['subject_id']; ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form name="subject-type-data-delete" id="subject-type-data-delete" method="post" accept-charset="utf-8">
                                                                    <div class="row">
                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                            <div class="row" style="text-align: center;">
                                                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                    ต้องการลบข้อมูลประเภทวิชา <?php echo $row['subject_code']; ?> หรือไม่
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row" style="text-align: center;">
                                                                                <div class="col-<?php echo $grid; ?>-12">
                                                                                    <button type="button" data-dismiss="modal" id="delete_<?php echo $row['subject_id']; ?>" name="delete_<?php echo $row['subject_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['subject_id']; ?>">ใช้</button>
                                                                                    <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                </div>
                                                                            </div>
                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                            <!--Delete-->
                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                            <!--Delete-->
                                                                            <script>
                                                                                $(document).ready(function() {
                                                                                    // Defaults
                                                                                    var swalInitDeleteSubjectData = swal.mixin({
                                                                                        buttonsStyling: false,
                                                                                        customClass: {
                                                                                            confirmButton: 'btn btn-primary',
                                                                                            cancelButton: 'btn btn-light',
                                                                                            denyButton: 'btn btn-light',
                                                                                            input: 'form-control'
                                                                                        }
                                                                                    });
                                                                                    // Defaults End        
                                                                                    $('#delete_<?php echo $row['subject_id']; ?>').on('click', function() {

                                                                                        //var subject_code="<?php echo $row['subject_code']; ?>";
                                                                                        var check_grade = "<?php echo $check_grade; ?>";
                                                                                        var id = $("#delete_<?php echo $row['subject_id']; ?>").val();
                                                                                        var action = "delete";
                                                                                        var id_key = btoa(check_grade);

                                                                                        if (action == "") {
                                                                                            swalInitDeleteSubjectData.fire({
                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                icon: 'error'
                                                                                            });
                                                                                        } else {

                                                                                            if (id != "") {

                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_data_process.php", {
                                                                                                    action: action,
                                                                                                    id: id
                                                                                                }, function(process_add) {
                                                                                                    var process_add = process_add;
                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                        let timerInterval;
                                                                                                        swalInitDeleteSubjectData.fire({
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
                                                                                                                        const b_subject_data = content.querySelector('b_subject_data')
                                                                                                                        if (b_subject_data) {
                                                                                                                            b_subject_data.textContent = Swal.getTimerLeft();
                                                                                                                        } else {}
                                                                                                                    } else {}
                                                                                                                }, 100);
                                                                                                            },
                                                                                                            willClose: function() {
                                                                                                                clearInterval(timerInterval)
                                                                                                            }
                                                                                                        }).then(function(result) {
                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade="+id_key;
                                                                                                            } else {}
                                                                                                        });

                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                        swalInitDeleteSubjectData.fire({
                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                            icon: 'error'
                                                                                                        });
                                                                                                    } else {
                                                                                                        swalInitDeleteSubjectData.fire({
                                                                                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                                                            icon: 'error'
                                                                                                        });
                                                                                                    }
                                                                                                })
                                                                                            } else {}
                                                                                        }
                                                                                    });
                                                                                })
                                                                            </script>
                                                                            <!--Delete end-->
                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                            <!--Delete End-->
                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                        </div>
                                                                    </div>


                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /danger modal -->

                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       } else {
    }
} else {
}
?>