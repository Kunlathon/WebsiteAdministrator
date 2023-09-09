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
include '../../config/connect.ini.php';
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

        $('#datatable-button-html5-columns-STD').DataTable({
            processing: true,

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

<div class="table-responsive">
    <table class="table table-bordered" id="datatable-button-html5-columns-STD">
        <thead>
            <tr align="center">
                <th>
                    <div>ลำดับ</div>
                </th>
                <th>
                    <div>รหัส</div>
                </th>
                <th>
                    <div>รายชื่อ</div>
                </th>
                <th>
                    <div>รายชื่อ(Eng)</div>
                </th>
                <th>
                    <div>บัตร</div>
                </th>
                <th>
                    <div>วันเดือนปีเกิด</div>
                </th>
                <th>
                    <div>ชื่อเล่น</div>
                </th>
                <th>
                    <div>เพศ</div>
                </th>
                <th>
                    <div>เบอร์โทร</div>
                </th>
                <th>
                    <div>ห้องเรียน</div>
                </th>
                <th>
                    <div>จัดการ</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_student WHERE student_status='1' ORDER BY student_class ASC ,student_no ASC";
            $list = result_array($sql);

            foreach ($list as $key => $row) {

                if (($row['gender'] == '1')) {
                    $gender = "ชาย";
                } elseif (($row['gender'] == '2')) {
                    $gender = "หญิง";
                } else {
                    $gender = null;
                }

                $sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
                $rowC = row_array($sqlC);

                if (($row['birth_day'] == null || $row['birth_day'] == "0000-00-00")) {
                    $birth_day = "";
                } else {
                    $birth_day = date_short_th($row['birth_day']);
                }

            ?>
                <tr>
                    <td align="center">
                        <div><?php echo $key + 1; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['student_id']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['student_name']; ?>&nbsp;<?php echo @$row['student_surname']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['student_name_eng']; ?>&nbsp;<?php echo @$row['student_surname_eng']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['student_idcard']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$birth_day; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['nickname']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$gender; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['student_tel']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$rowC['classroom_name']; ?></div>
                    </td>
                    <td align="center">
                        <div align="center">
                            <ul class="nav">
                                <li class="nav-item">
                                    <form name="student_password<?php echo @$row['student_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                        <input type="hidden" name="manage" value="password"> <input type="hidden" name="student_key" value="<?php echo @$row['student_id']; ?>">
                                        <button type="submit" name="sp_<?php echo @$row['student_id']; ?>" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <form name="show" id="show" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                    <input type="hidden" name="manage" value="profile"> <input type="hidden" name="student_key" value="<?php echo @$row['student_id']; ?>">
                                    <button type="submit" name="show" id="show" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <form name="student_update<?php echo @$row['student_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                        <input type="hidden" name="manage" value="form_edit"> <input type="hidden" name="student_key" value="<?php echo @$row['student_id']; ?>">
                                        <button type="submit" name="su_<?php echo @$row['student_id']; ?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo $row['student_id']; ?>"><i class="icon-pen"></i></button>
                                        </from>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="Delete_Student_Data" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['student_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <!--Delete-->
                <div id="modal_theme_success_Delete<?php echo $row['student_id']; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                            </div>

                            <div class="modal-body">
                                <form name="student-data-delete" id="student-data-delete" method="post" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <div class="row" style="text-align: center;">
                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                    ต้องการลบข้อมูล <?php echo $row['student_name'] . " " . $row['student_surname']; ?> หรือไม่
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row" style="text-align: center;">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <button type="button" data-dismiss="modal" id="delete_<?php echo $row['student_id']; ?>" name="delete_<?php echo $row['student_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['student_id']; ?>">ใช้</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Delete End-->
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <!--Delete-->
                <script>
                    $(document).ready(function() {
                        // Defaults
                        var swalInitDeleteStudentData = swal.mixin({
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-primary',
                                cancelButton: 'btn btn-light',
                                denyButton: 'btn btn-light',
                                input: 'form-control'
                            }
                        });
                        // Defaults End

                        $('#delete_<?php echo $row['student_id']; ?>').on('click', function() {

                            var action = "delete";
                            var table = "tb_student";
                            var ff = "student_id";
                            var id = $("#delete_<?php echo $row['student_id']; ?>").val();;

                            if (action == "") {
                                swalInitDeleteStudentData.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon: 'error'
                                });
                            } else {

                                if (id != "") {
                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/student_data/student_data_process.php", {
                                        action: action,
                                        table: table,
                                        ff: ff,
                                        id: id
                                    }, function(process_add) {
                                        var process_add = process_add;
                                        if (process_add.trim() === "no_error") {

                                            let timerInterval;
                                            swalInitDeleteStudentData.fire({
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
                                                            const b_student_data = content.querySelector('b_student_data')
                                                            if (b_student_data) {
                                                                b_student_data.textContent = Swal.getTimerLeft();
                                                            } else {}
                                                        } else {}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function(result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data";
                                                } else {}
                                            });

                                        } else if (process_add.trim() === "it_error") {
                                            swalInitDeleteStudentData.fire({
                                                title: 'ข้อมูลซ้ำ',
                                                icon: 'error'
                                            });
                                        } else {
                                            swalInitDeleteStudentData.fire({
                                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                text: process_add.trim(),
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

            <?php   } ?>
        </tbody>
    </table>
</div>