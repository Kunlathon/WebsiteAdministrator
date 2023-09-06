<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/subject_level_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=subject_level_data" class="breadcrumb-item"> จัดการระดับรายวิชา</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลระดับรายวิชา</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>ข้อมูลระดับรายวิชา</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-4">
                    <div class="btn-group">
                        <button type="button" name="subject_type_data" id="subject_type_data" class="btn btn-outline-success btn-sm" value="">ประเภทรายวิชา</button>&nbsp;&nbsp;
                        <button type="button" name="subject_data" id="subject_data" class="btn btn-outline-success btn-sm" value="">รายวิชา</button>&nbsp;&nbsp;
                        <button type="button" name="subject_level_data" id="subject_level_data" class="btn btn-outline-success btn-sm" value="">ระดับรายวิชา</button>
                    </div>
                </div>
                <div class="col-<?php echo $grid; ?>-4"></div>
                <div class="col-<?php echo $grid; ?>-4"></div>
            </div><br>

            <?php
            $manage = filter_input(INPUT_GET, 'manage');
            if (($manage == "update")) {

                $aid = check_session("admin_id_aba");

                $name = filter_input(INPUT_POST, 'name');
                $ename = filter_input(INPUT_POST, 'ename');
                $subject_level_key = filter_input(INPUT_POST, 'subject_level_key');

                if ((isset($name))) {

                    $data1 = array(
                        "subject_level_name" => $name,
                        "admin_id" => $aid
                    );

                    update("tb_subject_level", $data1, "subject_level_id = '{$subject_level_key}'");
                } else {
                }

                if ((isset($ename))) {

                    $data2 = array(
                        "subject_level_name_eng" => $ename,
                        "admin_id" => $aid
                    );

                    update("tb_subject_level", $data2, "subject_level_id = '{$subject_level_key}'");
                } else {
                }
            } elseif (($manage == "create")) {

                $aid = check_session("admin_id_aba");
                $name = filter_input(INPUT_POST, 'name');
                $ename = filter_input(INPUT_POST, 'ename');


                $data = array(
                    "subject_level_name" => $name,
                    "subject_level_name_eng" => $ename,
                    "admin_id" => $aid

                );

                insert("tb_subject_level", $data);
            } elseif (($manage == "delete")) {
                $aid = check_session("admin_id_aba");

                $table = filter_input(INPUT_POST, 'table');
                $ff = filter_input(INPUT_POST, 'ff');
                $subject_level_key = filter_input(INPUT_POST, 'subject_level_key');

                delete($table, "{$ff} = '{$subject_level_key}'");
            } else { ?>

                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลระดับรายวิชา</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    <button type="button" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_theme_success_Add"><i class="icon-plus3"></i> เพิ่มระดับรายวิชา</button>
                                </div>
                            </div>


                            <!-- Success modal -->
                            <div id="modal_theme_success_Add" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-white">
                                            <h6 class="modal-title">ฟอร์มข้อมูลระดับรายวิชา</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <form name="subject-level-data-add" id="subject-level-data-add" method="post" accept-charset="utf-8">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-4">ระดับรายวิชา</label>
                                                                <div class="col-<?php echo $grid; ?>-8">
                                                                    <div id="add-name-null">
                                                                        <input type="text" name="subject_level_name" id="name" class="form-control" value="" placeholder="ระดับรายวิชา" required="required">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-4">ระดับรายวิชาภาษาอังกฤษ</label>
                                                                <div class="col-<?php echo $grid; ?>-8">
                                                                    <div id="add-ename-null">
                                                                        <input type="text" name="ename" id="ename" class="form-control" value="" placeholder="ระดับรายวิชาภาษาอังกฤษ" required="required">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                            <button type="button" name="Add_Subject_Level_Data" id="Add_Subject_Level_Data" class="btn btn-primary">บันทึกข้อมูล</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /success modal -->


                            <div class="card-body">

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <form name="subject_level_data">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                                    <thead>
                                                        <tr align="center">
                                                            <th style="width: 4%;">
                                                                <div>ลำดับ</div>
                                                            </th>
                                                            <th style="width: 40%;">
                                                                <div>ระดับวิชา</div>
                                                            </th>
                                                            <th style="width: 40%;">
                                                                <div>ระดับวิชาภาษาอังกฤษ</div>
                                                            </th>
                                                            <th style="width: 16%;">
                                                                <div>จัดการ</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $sql = "SELECT * FROM tb_subject_level ORDER BY subject_level_id ASC";
                                                        $list = result_array($sql);
                                                        ?>

                                                        <?php foreach ($list as $key => $row) { ?>
                                                            <tr>
                                                                <td style="width: 4%;" align="center">
                                                                    <div><?php echo $key + 1; ?></div>
                                                                </td>
                                                                <td style="width: 40%;">
                                                                    <div><?php echo $row['subject_level_name']; ?></div>
                                                                </td>
                                                                <td style="width: 40%;">
                                                                    <div><?php echo $row['subject_level_name_eng']; ?></div>
                                                                </td>
                                                                <td style="width: 16%;">
                                                                    <div align="center">
                                                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modal_theme_success_Update<?php echo $row['subject_level_id']; ?>" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
                                                                        <button type="button" class="btn btn-outline-danger btn-sm" name="delete_<?php echo $row['subject_level_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['subject_level_id']; ?>" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                            <!-- Success modal -->
                                                            <div id="modal_theme_success_Update<?php echo $row['subject_level_id']; ?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-success text-white">
                                                                            <h6 class="modal-title">แก้ไขข้อมูลระดับรายวิชา <?php echo $row['subject_level_name']; ?></h6>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="subject-level-data-update" id="subject-level-data-update" method="post" accept-charset="utf-8">
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <fieldset class="mb-3">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label col-<?php echo $grid; ?>-4">ระดับรายวิชา</label>
                                                                                                <div class="col-<?php echo $grid; ?>-8">
                                                                                                    <div id="up-name-null<?php echo $row['subject_level_id']; ?>">
                                                                                                        <input type="text" name="name" id="name<?php echo $row['subject_level_id']; ?>" class="form-control" value="<?php echo $row['subject_level_name']; ?>" placeholder="ระดับรายวิชา" required="required">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <fieldset class="mb-3">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label col-<?php echo $grid; ?>-4">ระดับรายวิชาภาษาอังกฤษ</label>
                                                                                                <div class="col-<?php echo $grid; ?>-8">
                                                                                                    <div id="up-ename-null<?php echo $row['subject_level_id']; ?>">
                                                                                                        <input type="text" name="ename" id="ename<?php echo $row['subject_level_id']; ?>" class="form-control" value="<?php echo $row['subject_level_name_eng']; ?>" placeholder="ระดับรายวิชาภาษาอังกฤษ" required="required">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </div>

                                                                            </form>
                                                                        </div>



                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                                            <button type="button" name="Update_Subject_Level_Data" id="Update_Subject_Level_Data<?php echo $row['subject_level_id']; ?>" value="<?php echo $row['subject_level_id']; ?>" class="btn btn-success">บันทึกข้อมูล</button>
                                                                            <input type="hidden" name="subject_level_key" id="subject_level_key" value="<?php echo $row['subject_level_id']; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /success modal -->

                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                            <!-- /dangermodal -->
                                                            <div id="modal_theme_success_Delete<?php echo $row['subject_level_id']; ?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white">
                                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="course-type-data-delete" id="course-type-data-delete" method="post" accept-charset="utf-8">
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                ต้องการลบข้อมูลหลักสูตรหลัก <?php echo $row['subject_level_name']; ?> หรือไม่
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                <button type="button" id="delete_<?php echo $row['subject_level_id']; ?>" name="delete_<?php echo $row['subject_level_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['subject_level_id']; ?>">ใช่</button>
                                                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <script>
                                                                                            var SA_DelSubjectTypeData<?php echo $row['subject_level_id']; ?> = function() {
                                                                                                var _componentSA_DelSubjectTypeData = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDelSubjectTypeData = swal.mixin({
                                                                                                        buttonsStyling: false,
                                                                                                        customClass: {
                                                                                                            confirmButton: 'btn btn-primary',
                                                                                                            cancelButton: 'btn btn-light',
                                                                                                            denyButton: 'btn btn-light',
                                                                                                            input: 'form-control'
                                                                                                        }
                                                                                                    });
                                                                                                    // Defaults End

                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                    $('#delete_<?php echo $row['subject_level_id']; ?>').on('click', function() {
                                                                                                        var subject_level_key = $("#delete_<?php echo $row['subject_level_id']; ?>").val();
                                                                                                        var subject_level_name = "<?php echo $row['subject_level_name']; ?>";

                                                                                                        var action = "delete";
                                                                                                        var table = "tb_subject_level";
                                                                                                        var ff = "subject_level_id";

                                                                                                        if (action == "") {
                                                                                                            swalInitDelSubjectTypeData.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });
                                                                                                        } else {

                                                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_level_data/subject_level_process.php", {
                                                                                                                action: action,
                                                                                                                table: table,
                                                                                                                ff: ff,
                                                                                                                subject_level_key: subject_level_key
                                                                                                            }, function(process_edit) {

                                                                                                                let timerInterval;
                                                                                                                swalInitDelSubjectTypeData.fire({
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
                                                                                                                                const b_subject_level_data = content.querySelector('b_subject_level_data')
                                                                                                                                if (b_subject_level_data) {
                                                                                                                                    b_subject_level_data.textContent = Swal.getTimerLeft();
                                                                                                                                } else {}
                                                                                                                            } else {}
                                                                                                                        }, 100);
                                                                                                                    },
                                                                                                                    willClose: function() {
                                                                                                                        clearInterval(timerInterval)
                                                                                                                    }
                                                                                                                }).then(function(result) {
                                                                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data";
                                                                                                                    } else {}
                                                                                                                });
                                                                                                            })
                                                                                                        }
                                                                                                    });

                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                };
                                                                                                //--------------------------------------------------------------------------------------
                                                                                                return {
                                                                                                    initComponentsDelSubjectTypeData: function() {
                                                                                                        _componentSA_DelSubjectTypeData();
                                                                                                    }
                                                                                                }
                                                                                            }();
                                                                                            // Initialize module
                                                                                            // ------------------------------
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                SA_DelSubjectTypeData<?php echo $row['subject_level_id']; ?>.initComponentsDelSubjectTypeData();
                                                                                            });
                                                                                        </script>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete End-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Update-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                    
                                                                                        <script>
                                                                                            $(document).ready(function() {

                                                                                                // Defaults
                                                                                                var swalInitUpSubjectLevelData = swal.mixin({
                                                                                                    buttonsStyling: false,
                                                                                                    customClass: {
                                                                                                        confirmButton: 'btn btn-primary',
                                                                                                        cancelButton: 'btn btn-light',
                                                                                                        denyButton: 'btn btn-light',
                                                                                                        input: 'form-control'
                                                                                                    }
                                                                                                });
                                                                                                // Defaults End

                                                                                                $('#Update_Subject_Level_Data<?php echo $row['subject_level_id']; ?>').on('click', function() {

                                                                                                    swalInitUpSubjectLevelData.fire({
                                                                                                        title: 'ต้องการแก้ไขข้อมูลหรือไม่',
                                                                                                        //text: "You won't be able to revert this!",
                                                                                                        icon: 'warning',
                                                                                                        allowOutsideClick: false,
                                                                                                        showCancelButton: true,
                                                                                                        confirmButtonText: 'ใช่',
                                                                                                        cancelButtonText: 'ไม่',
                                                                                                        buttonsStyling: false,
                                                                                                        customClass: {
                                                                                                            confirmButton: 'btn btn-success',
                                                                                                            cancelButton: 'btn btn-danger'
                                                                                                        }
                                                                                                    }).then(function(result) {
                                                                                                        if (result.value) {
                                                                                                            var action = "update";
                                                                                                            var name = $("#name<?php echo $row['subject_level_id']; ?>").val();
                                                                                                            var ename = $("#ename<?php echo $row['subject_level_id']; ?>").val();
                                                                                                            var subject_level_key = $("#Update_Subject_Level_Data<?php echo $row['subject_level_id']; ?>").val();
                                                                                                            var id_key = btoa(subject_level_key);



                                                                                                            if (action == "") {
                                                                                                                swalInitUpSubjectLevelData.fire({
                                                                                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                    //title: ''+name,
                                                                                                                    icon: 'error'
                                                                                                                });
                                                                                                            } else {

                                                                                                                if (name == "") {
                                                                                                                    document.getElementById("up-name-null<?php echo $row['subject_level_id']; ?>").innerHTML =
                                                                                                                        '<input type="text" name="name" id="name<?php echo $row['subject_level_id']; ?>" class="form-control is-invalid" value="' + name + '" placeholder="ระดับรายวิชา" required="required">' +
                                                                                                                        '<span class="invalid-feedback">กรุณากรอกข้อมูล ระดับรายวิชา</span>';
                                                                                                                } else {
                                                                                                                    document.getElementById("up-name-null<?php echo $row['subject_level_id']; ?>").innerHTML =
                                                                                                                        '<input type="text" name="name" id="name<?php echo $row['subject_level_id']; ?>" class="form-control" value="' + name + '" placeholder="ระดับรายวิชา" required="required">';
                                                                                                                }

                                                                                                                if (ename != "") {
                                                                                                                    if (!ename.match(/^([a-z A-Z 0-9 .+-.+_.])+$/i)) {
                                                                                                                        document.getElementById("up-ename-null<?php echo $row['subject_level_id']; ?>").innerHTML =
                                                                                                                            '<input type="text" name="ename" id="ename<?php echo $row['subject_level_id']; ?>" class="form-control is-invalid" value="' + ename + '" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">' +
                                                                                                                            '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'
                                                                                                                        ename_error = "yes";
                                                                                                                    } else {
                                                                                                                        document.getElementById("up-ename-null<?php echo $row['subject_level_id']; ?>").innerHTML =
                                                                                                                            '<input type="text" name="ename" id="ename<?php echo $row['subject_level_id']; ?>" class="form-control" value="' + ename + '" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">' +
                                                                                                                            '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'
                                                                                                                        ename_error = "no";
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    document.getElementById("up-ename-null<?php echo $row['subject_level_id']; ?>").innerHTML =
                                                                                                                        '<input type="text" name="ename" id="ename<?php echo $row['subject_level_id']; ?>" class="form-control is-invalid" value="' + ename + '" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">' +
                                                                                                                        '<span class="invalid-feedback">กรอกข้อมูลระดับชั้นภาษาอังกฤษ</span>'
                                                                                                                    ename_error = "yes";
                                                                                                                }

                                                                                                                if (name != "" && ename_error != "yes") {
                                                                                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_level_data/subject_level_process.php", {
                                                                                                                        action: action,
                                                                                                                        name: name,
                                                                                                                        ename: ename,
                                                                                                                        subject_level_key: subject_level_key
                                                                                                                    }, function(process_add) {
                                                                                                                        var process_add = process_add;
                                                                                                                        if (process_add.trim() === "no_error") {

                                                                                                                            let timerInterval;
                                                                                                                            swalInitUpSubjectLevelData.fire({
                                                                                                                                title: 'บันทึกสำเร็จ',
                                                                                                                                //html: 'I will close in <b></b> milliseconds.',
                                                                                                                                timer: 1200,
                                                                                                                                icon: 'success',
                                                                                                                                timerProgressBar: true,
                                                                                                                                didOpen: function() {
                                                                                                                                    Swal.showLoading()
                                                                                                                                    timerInterval = setInterval(function() {
                                                                                                                                        const content = Swal.getContent();
                                                                                                                                        if (content) {
                                                                                                                                            const b_subject_level = content.querySelector('b_subject_level')
                                                                                                                                            if (b_subject_level) {
                                                                                                                                                b_subject_level.textContent = Swal.getTimerLeft();
                                                                                                                                            } else {}
                                                                                                                                        } else {}
                                                                                                                                    }, 100);
                                                                                                                                },
                                                                                                                                willClose: function() {
                                                                                                                                    clearInterval(timerInterval)
                                                                                                                                }
                                                                                                                            }).then(function(result) {
                                                                                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data";
                                                                                                                                } else {}
                                                                                                                            });

                                                                                                                        } else if (process_add.trim() === "it_error") {
                                                                                                                            swalInitUpSubjectLevelData.fire({
                                                                                                                                title: 'ข้อมูลซ้ำ',
                                                                                                                                icon: 'error'
                                                                                                                            });
                                                                                                                        } else {
                                                                                                                            swalInitUpSubjectLevelData.fire({
                                                                                                                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                                                                                icon: 'error'
                                                                                                                            });
                                                                                                                        }
                                                                                                                    })
                                                                                                                } else {}
                                                                                                            }
                                                                                                        } else if (result.dismiss === swal.DismissReason.cancel) {

                                                                                                            //swalInitLogout.fire(
                                                                                                            //'Cancelled',
                                                                                                            //'Your imaginary file is safe :)',
                                                                                                            //'error'
                                                                                                            //);
                                                                                                        } else {
                                                                                                            //--------------------------------------------------------------------------------------					
                                                                                                        }
                                                                                                    });
                                                                                                });



                                                                                            })
                                                                                        </script>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Update End-->
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
                                        </form>


                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php  } ?>

        </div>

<?php   } else {
    }
} ?>