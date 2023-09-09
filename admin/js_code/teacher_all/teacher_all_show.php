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
                <th align="center">
                    <div>ลำดับ</div>
                </th>
                <th>
                    <div>รายชื่อ</div>
                </th>
                <th>
                    <div>รายชื่อ (Eng)</div>
                </th>
                <th>
                    <div>ชื่อเล่น</div>
                </th>
                <th>
                    <div>ตำแหน่ง</div>
                </th>
                <th align="center">
                    <div>แผนก</div>
                </th>
                <th align="center">
                    <div>เบอร์โทร</div>
                </th>
                <th align="center">
                    <div>ชื่อผู้ใช้</div>
                </th>
                <th style="width: 16%;">
                    <div>จัดการ</div>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_work`='1' ORDER BY  `teacher_section_id` ASC, `teacher_name` ASC";
            $list = result_array($sql);
            ?>
            <?php
            $key = 0;
            foreach ($list as $key => $row) {
                $secid = $row['teacher_section_id'];
                $sqlS = "SELECT * FROM `tb_teacher_section` WHERE `teacher_section_id` = '{$secid}'";
                $rowS = row_array($sqlS);
                $key = $key + 1;
            ?>
                <tr>
                    <td align="center">
                        <div><?php echo $key; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['teacher_name']; ?>&nbsp;<?php echo @$row['teacher_surname']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['teacher_name_eng']; ?>&nbsp;<?php echo @$row['teacher_surname_eng']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['nickname']; ?></div>
                    </td>
                    <td>
                        <div><?php echo @$row['position']; ?></div>
                    </td>
                    <td align="center">
                        <div><?php echo @$rowS['teacher_section_name']; ?></div>
                    </td>
                    <td align="center">
                        <div><?php echo @$row['mobile']; ?></div>
                    </td>
                    <td align="center">
                        <div><?php echo @$row['teacher_username']; ?></div>
                    </td>
                    <td align="center" style="width: 16%;">
                        <ul class="nav">
                            <li class="nav-item">
                                <form name="password_ta<?php echo @$row['teacher_id']; ?>" id="password_ta<?php echo @$row['teacher_id']; ?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                    <button type="submit" name="submit_password" id="submit_password" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="เปลี่ยนรหัสผ่าน" data-placement="bottom" value=""><i class="icon-key"></i></button>
                                    <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>"> <input type="hidden" name="manage" id="manage" value="password">
                                </form>
                            </li>
                            <li class="nav-item">
                                <form name="form_show<?php echo @$row['teacher_id']; ?>"  accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                    <button type="submit" name="button_show"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                    <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>"> <input type="hidden" name="manage" id="manage" value="profile">
                                </form>
                            </li>                            
                            <li class="nav-item">
                                <form name="update_ta<?php echo @$row['teacher_id']; ?>" id="update_ta<?php echo @$row['teacher_id']; ?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                    <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                                    <input type="hidden" name="teacher_key" id="teacher_key" value="<?php echo @$row['teacher_id']; ?>"> <input type="hidden" name="manage" id="manage" value="form_edit">
                                </form>
                            </li>
                            <li class="nav-item">
                                <form>
                                    <button type="button" name="modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div id="modal_theme_success_Delete<?php echo @$row['teacher_id']; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <div class="row" style="text-align: center;">
                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                ต้องการลบข้อมูล <?php echo @$row['teacher_name'] . " " . @$row['teacher_surname']; ?> หรือไม่
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="row" style="text-align: center;">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <button type="button" id="delete_<?php echo @$row['teacher_id']; ?>" name="delete_<?php echo @$row['teacher_id']; ?>" class="btn btn-outline-success" value="<?php echo @$row['teacher_id']; ?>">ใช้</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                    </div>
                                </div>

                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                <!--Delete-->
                                <script>
                                    $(document).ready(function() {

                                        // Defaults
                                        var swalInitDeleteTeacherAll = swal.mixin({
                                            buttonsStyling: false,
                                            customClass: {
                                                confirmButton: 'btn btn-primary',
                                                cancelButton: 'btn btn-light',
                                                denyButton: 'btn btn-light',
                                                input: 'form-control'
                                            }
                                        });
                                        // Defaults End

                                        $('#delete_<?php echo @$row['teacher_id']; ?>').on('click', function() {

                                            var action = "delete";
                                            var table = "tb_teacher";
                                            var ff = "teacher_id";
                                            var teacher_key = $("#delete_<?php echo $row['teacher_id']; ?>").val();

                                            if (action == "") {

                                                swalInitDeleteTeacherAll.fire({
                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                    icon: 'error'
                                                });

                                            } else {

                                                if (teacher_key != "") {
                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/teacher_all/teacher_all_process.php", {
                                                        action: action,
                                                        table: table,
                                                        ff: ff,
                                                        teacher_key: teacher_key
                                                    }, function(process_add) {
                                                        var process_add = process_add;
                                                        if (process_add.trim() === "no_error") {

                                                            let timerInterval;
                                                            swalInitDeleteTeacherAll.fire({
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
                                                                            const b_teacher_all = content.querySelector('b_teacher_all')
                                                                            if (b_teacher_all) {
                                                                                b_teacher_all.textContent = Swal.getTimerLeft();
                                                                            } else {}
                                                                        } else {}
                                                                    }, 100);
                                                                },
                                                                willClose: function() {
                                                                    clearInterval(timerInterval)
                                                                }
                                                            }).then(function(result) {
                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all";
                                                                } else {}
                                                            });

                                                        } else if (process_add.trim() === "it_error") {
                                                            swalInitDeleteTeacherAll.fire({
                                                                title: 'ข้อมูลซ้ำ',
                                                                icon: 'error'
                                                            });
                                                        } else {
                                                            swalInitDeleteTeacherAll.fire({
                                                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + process_add.trim(),
                                                                icon: 'error'
                                                            });
                                                        }
                                                    })

                                                } else {}

                                            }
                                        });

                                    })
                                </script>
                                <!--Delete End-->
                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


                            </div>

                        </div>
                    </div>
                </div>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    } ?>


        </tbody>
    </table>
</div>