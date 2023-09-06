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

        $('#datatable-button-html5-columns-STDA').DataTable({
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


<div class="table-responsive">
    <table class="table table-bordered" id="datatable-button-html5-columns-STDA">
        <thead>
            <tr align="center">
                <th>
                    <div>ลำดับ</div>
                </th>
                <th>
                    <div>ระดับชั้น</div>
                </th>
                <th>
                    <div>ระดับชั้น(Eng)</div>
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
            $sql = "SELECT * FROM `tb_grade` WHERE `grade_status`='1' ORDER BY `grade_id` ASC";
            $list = result_array($sql);
            foreach ($list as $key => $row) {
                if ((is_array($row) && count($row))) { ?>

                    <tr>
                        <td align="center">
                            <div><?php echo $key + 1; ?></div>
                        </td>
                        <td>
                            <div><?php echo $row['grade_name']; ?></div>
                        </td>
                        <td>
                            <div><?php echo $row['grade_name_eng']; ?></div>
                        </td>
                        <td>
                            <div><?php echo $row['grade_detail']; ?></div>
                        </td>
                        <td align="center" style="width: 16%;">
                            <div>
                                <ul class="nav">
                                    <li class="nav-item">
                                        <form name="gcdp_search" id="gcdp_search" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data" method="post">
                                            <button type="submit" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom"><i class="icon-search4"></i></button>
                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $row["grade_id"]; ?>"> 
                                            <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $row["grade_name"]; ?>">
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form name="gcdp_form_up<?php echo $row['grade_id']; ?>" id="gcdp_form_up<?php echo $row['grade_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data" method="post">
                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
                                            <input type="hidden" name="manage" id="manage" value="form_up"> 
                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $row['grade_id']; ?>">
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form>
                                            <button type="button" name="delete_<?php echo $row['grade_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['grade_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- /dangermodal -->
                    <div id="modal_theme_success_Delete<?php echo $row['grade_id']; ?>" class="modal fade" tabindex="-1">
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
                                                        ต้องการลบข้อมูลระดับชั้น <?php echo $row['grade_name']; ?> หรือไม่
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row" style="text-align: center;">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <button type="button" data-dismiss="modal"  id="delete_<?php echo $row['grade_id']; ?>" name="delete_<?php echo $row['grade_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['grade_id']; ?>">ใช่</button>
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
                                                        var swalInitDeleteGradeData = swal.mixin({
                                                            buttonsStyling: false,
                                                            customClass: {
                                                                confirmButton: 'btn btn-primary',
                                                                cancelButton: 'btn btn-light',
                                                                denyButton: 'btn btn-light',
                                                                input: 'form-control'
                                                            }
                                                        });
                                                        // Defaults End        
                                                        $('#delete_<?php echo $row['grade_id']; ?>').on('click', function() {

                                                            //var subject_code="<?php //echo $row['subject_code']; 
                                                                                ?>";
                                                            //var check_grade = "<?php //echo $check_grade; 
                                                                                    ?>";
                                                            var grade_key = $("#delete_<?php echo $row['grade_id']; ?>").val();
                                                            var table = "tb_grade";
                                                            var ff = "grade_id";
                                                            var action = "delete";
                                                            //var id_key = btoa(check_grade);

                                                            if (action == "") {
                                                                swalInitDeleteGradeData.fire({
                                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                    icon: 'error'
                                                                });
                                                            } else {

                                                                if (grade_key != "") {

                                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_data/grade_data_process.php", {
                                                                        action: action,
                                                                        grade_key: grade_key,
                                                                        table: table,
                                                                        ff: ff
                                                                    }, function(process_add) {
                                                                        var process_add = process_add;
                                                                        if (process_add.trim() === "no_error") {

                                                                            let timerInterval;
                                                                            swalInitDeleteGradeData.fire({
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
                                                                                            const b_grade_data = content.querySelector('b_grade_data')
                                                                                            if (b_grade_data) {
                                                                                                b_grade_data.textContent = Swal.getTimerLeft();
                                                                                            } else {}
                                                                                        } else {}
                                                                                    }, 100);
                                                                                },
                                                                                willClose: function() {
                                                                                    clearInterval(timerInterval)
                                                                                }
                                                                            }).then(function(result) {
                                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data";
                                                                                } else {}
                                                                            });

                                                                        } else if (process_add.trim() === "it_error") {
                                                                            swalInitDeleteGradeData.fire({
                                                                                title: 'ข้อมูลซ้ำ',
                                                                                icon: 'error'
                                                                            });
                                                                        } else {
                                                                            swalInitDeleteGradeData.fire({
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

            <?php   } else {
                }
            }
            ?>






        </tbody>
    </table>
</div>