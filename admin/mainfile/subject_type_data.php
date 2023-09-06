<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/subject_type_data.php/", $_SERVER['PHP_SELF']))) {
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

                        <a href="?modules=subject_type_data" class="breadcrumb-item"> จัดการประเภทรายวิชา</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลประเภทรายวิชา</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>ข้อมูลประเภทรายวิชา</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-6">
                    <div class="btn-group">
                        <button type="button" name="subject_type_data" id="subject_type_data" class="btn btn-outline-success btn-sm" value="">ประเภทรายวิชา</button>&nbsp;&nbsp;
                        <button type="button" name="subject_data" id="subject_data" class="btn btn-outline-success btn-sm" value="">รายวิชา</button>&nbsp;&nbsp;
                        <button type="button" name="subject_level_data" id="subject_level_data" class="btn btn-outline-success btn-sm" value="">ระดับรายวิชา</button>
                    </div>
                </div>
                <div class="col-<?php echo $grid; ?>-6">
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <label class="col-form-label col-<?php echo $grid; ?>-4">ประเภทรายวิชา</label>
                            <div class="col-<?php echo $grid; ?>-8">
                                <select class="form-control select" name="SD" id="SD" data-placeholder="ประเภทรายวิชา..." required="required">
                                    <option></option>
                                    <optgroup label="ประเภทรายวิชา">

                                        <?php
                                        @$listSD = base64_decode(filter_input(INPUT_GET, 'list'));
                                        $SD_sql = "SELECT * FROM tb_subject_type ORDER BY subt_name ASC";
                                        $SD_list = result_array($SD_sql);
                                        foreach ($SD_list as $key => $SD_row) { ?>
                                            <?php
                                            if (($listSD == $SD_row["subt_id"])) { ?>
                                                <option value="<?php echo $SD_row["subt_id"]; ?>" selected="selected"><?php echo $SD_row["subt_name"]; ?></option>
                                            <?php    } else { ?>
                                                <option value="<?php echo $SD_row["subt_id"]; ?>"><?php echo $SD_row["subt_name"]; ?></option>
                                            <?php    } ?>


                                        <?php   } ?>

                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <?php
            $manage = filter_input(INPUT_GET, 'manage');
            if (($manage == "update")) {

                $aid = check_session("admin_id_aba");

                $subt_name = filter_input(INPUT_POST, 'subt_name');
                $subt_name_eng = filter_input(INPUT_POST, 'subt_name_eng');
                $subt_id = filter_input(INPUT_POST, 'subt_id');

                if ((isset($subt_name))) {

                    $data1 = array(
                        "subt_name" => $subt_name,
                        "admin_id" => $aid
                    );

                    update("tb_subject_type", $data1, "subt_id = '{$subt_id}'");
                } else {
                }

                if ((isset($subt_name_eng))) {

                    $data2 = array(
                        "subt_name_eng" => $subt_name_eng,
                        "admin_id" => $aid
                    );

                    update("tb_subject_type", $data2, "subt_id = '{$subt_id}'");
                } else {
                }
            } elseif (($manage == "create")) {

                $aid = check_session("admin_id_aba");
                $subt_name = filter_input(INPUT_POST, 'subt_name');
                $subt_name_eng = filter_input(INPUT_POST, 'subt_name_eng');

                $sqlST = "SELECT *,MAX(subt_id) AS ID FROM tb_subject_type";
                $tcrST = row_array($sqlST);
        
                $SUB_ID = $tcrST['ID'] + 1;

                $data = array(
                    "subt_id" => $SUB_ID,
                    "subt_name" => $subt_name,
                    "subt_name_eng" => $subt_name_eng,
                    "admin_id" => $aid

                );

                insert("tb_subject_type", $data);
            } elseif (($manage == "delete")) {
                $aid = check_session("admin_id_aba");

                $table = filter_input(INPUT_POST, 'table');
                $ff = filter_input(INPUT_POST, 'ff');
                $id = filter_input(INPUT_POST, 'id');

                delete($table, "{$ff} = '{$id}'");
            } else { ?>

                <?php
                //การทำงานเหมือนกันกับหน้า subject_data !!!    
                @$list = base64_decode(filter_input(INPUT_GET, 'list'));
                if ((is_numeric($list))) {
                    $subject_type_sql = "SELECT `subt_name`,`subt_name_eng` FROM `tb_subject_type` WHERE `subt_id`='{$list}'";
                    $subject_type_Row = result_array($subject_type_sql);
                    foreach ($subject_type_Row as $key => $subject_type_Print) {
                        if ((is_array($subject_type_Print) && count($subject_type_Print))) {
                            $txt_subt_name = $subject_type_Print["subt_name"];
                            $txt_subt_name_eng = $subject_type_Print["subt_name_eng"];
                        } else {
                            $txt_subt_name = "-";
                            $txt_subt_name_eng = "-";
                        }
                    }

                ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">

                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลรายวิชา ประเภท<?php echo $txt_subt_name; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data&list=<?php echo base64_encode($list); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_theme_success_Add<?php echo $list; ?>"><i class="icon-plus3"></i> เพิ่มรายวิชา</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="subject_data">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-button-html5-columns-STD">
                                                        <thead>
                                                            <tr align="center">
                                                                <th style="width: 4%;">
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
                                                                <th style="width: 16%;">
                                                                    <div>จัดการ</div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $sql = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subt_id='{$list}' ORDER BY b.subt_id ASC , a.subject_name ASC";
                                                        $list = result_array($sql);
                                                        ?>
                                                        <tbody>
                                                            <?php foreach ($list as $key => $row) {
                                                                $key = $key + 1;
                                                            ?>

                                                                <tr>
                                                                    <td style="width: 4%;" align="center">
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
                                                                    <td style="width: 16%;">
                                                                        <div align="center">
                                                                            <button type="button" name="update_<?php echo $row['subject_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&list=form_update&id=<?php echo base64_encode($row['subject_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo $row['subject_id']; ?>"><i class="icon-pen"></i></button>
                                                                            <button type="button" name="delete_<?php echo $row['subject_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['subject_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
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
                                                                                                    <button type="button" id="delete_<?php echo $row['subject_id']; ?>" name="delete_<?php echo $row['subject_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['subject_id']; ?>">ใช่</button>
                                                                                                    <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                            <!--Delete-->
                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                            <!--Delete-->
                                                                                            <script>
                                                                                                var SA_DeleteSubjectData<?php echo $row['subject_id']; ?> = function() {
                                                                                                    var _componentSA_DeleteSubjectData = function() {
                                                                                                        if (typeof swal == 'undefined') {
                                                                                                            console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                            return;
                                                                                                        }
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

                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                        $('#delete_<?php echo $row['subject_id']; ?>').on('click', function() {

                                                                                                            //var subject_code="<?php echo $row['subject_code']; ?>";
                                                                                                            var check_grade = "<?php echo $row['subt_id']; ?>";
                                                                                                            var id = $("#delete_<?php echo $row['subject_id']; ?>").val();
                                                                                                            var action = "delete";
                                                                                                            var id_key = btoa(id);

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
                                                                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data&list=" + btoa(check_grade);
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

                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                    };
                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                    return {
                                                                                                        initComponentsDeleteSubjectData: function() {
                                                                                                            _componentSA_DeleteSubjectData();
                                                                                                        }
                                                                                                    }
                                                                                                }();
                                                                                                // Initialize module
                                                                                                // ------------------------------
                                                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                                                    SA_DeleteSubjectData<?php echo $row['subject_id']; ?>.initComponentsDeleteSubjectData();
                                                                                                });
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
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลประเภทรายวิชา</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_theme_success_Add"><i class="icon-plus3"></i> เพิ่มประเภทรายวิชา</button>
                                    </div>
                                </div>


                                <!-- Success modal -->
                                <div id="modal_theme_success_Add" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h6 class="modal-title">ฟอร์มข้อมูลประเภทรายวิชา</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <form name="subject-type-data-add" id="subject-type-data-add" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">ประเภทรายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-8">
                                                                        <div id="subt_name-null">
                                                                            <input type="text" name="subt_name" id="subt_name" class="form-control" value="" placeholder="ประเภทรายวิชา" required="required">
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">ประเภทรายวิชาภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-8">
                                                                        <div id="subt_name_eng-null">
                                                                            <input type="text" name="subt_name_eng" id="subt_name_eng" class="form-control" value="" placeholder="ประเภทรายวิชาภาษาอังกฤษ" required="required">
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
                                                <button type="button" name="Add_Subject_Type_Data" id="Add_Subject_Type_Data" class="btn btn-primary">บันทึกข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /success modal -->


                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="subject_type_data">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-button-html5-columns-STD">
                                                        <thead>
                                                            <tr align="center">
                                                                <th style="width: 4%;">
                                                                    <div>ลำดับ</div>
                                                                </th>
                                                                <th style="width: 35%;">
                                                                    <div>ประเภทวิชา</div>
                                                                </th>
                                                                <th style="width: 35%;">
                                                                    <div>ประเภทวิชาภาษาอังกฤษ</div>
                                                                </th>
                                                                <th style="width: 20%;">
                                                                    <div>จัดการ</div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $sql = "SELECT * FROM tb_subject_type ORDER BY subt_name ASC";
                                                            $list = result_array($sql);
                                                            ?>

                                                            <?php foreach ($list as $key => $row) { ?>
                                                                <tr>
                                                                    <td align="center">
                                                                        <div><?php echo $row['subt_id']; ?></div>
                                                                    </td>
                                                                    <td>
                                                                        <div><?php echo $row['subt_name']; ?></div>
                                                                    </td>
                                                                    <td>
                                                                        <div><?php echo $row['subt_name_eng']; ?></div>
                                                                    </td>
                                                                    <td>
                                                                        <div align="center">
                                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data&list=<?php echo base64_encode($row['subt_id']); ?>';" data-popup="tooltip" title="ค้นหา" data-placement="bottom"><i class="icon-search4"></i></button>
                                                                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modal_theme_success_Update<?php echo $row['subt_id']; ?>" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
                                                                            <button type="button" class="btn btn-outline-danger btn-sm" name="DeleteSubt" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['subt_id']; ?>" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <!--Update-->
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                <!-- Success modal -->
                                                                <div id="modal_theme_success_Update<?php echo $row['subt_id']; ?>" class="modal fade" tabindex="-1">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-success text-white">
                                                                                <h6 class="modal-title">แก้ไขข้อมูลประเภทรายวิชา <?php echo $row['subt_name']; ?></h6>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form name="subject-type-data-add" id="subject-type-data-add" method="post" accept-charset="utf-8">
                                                                                    <div class="row">
                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                            <fieldset class="mb-3">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">ประเภทรายวิชา</label>
                                                                                                    <div class="col-<?php echo $grid; ?>-8">
                                                                                                        <div id="subt_name-null-up<?php echo $row['subt_id']; ?>">
                                                                                                            <input type="text" name="subt_name" id="subt_name<?php echo $row['subt_id']; ?>" class="form-control" value="<?php echo $row['subt_name']; ?>" placeholder="ประเภทรายวิชา" required="required">
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
                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">ประเภทรายวิชาภาษาอังกฤษ</label>
                                                                                                    <div class="col-<?php echo $grid; ?>-8">
                                                                                                        <div id="subt_name_eng-null-up<?php echo $row['subt_id']; ?>">
                                                                                                            <input type="text" name="subt_name_eng" id="subt_name_eng<?php echo $row['subt_id']; ?>" class="form-control" value="<?php echo $row['subt_name_eng']; ?>" placeholder="ประเภทรายวิชาภาษาอังกฤษ" required="required">
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
                                                                                <button type="button" name="Update_Subject_Type_Data" id="Update_Subject_Type_Data<?php echo $row['subt_id']; ?>" value="<?php echo $row['subt_id']; ?>" class="btn btn-success">บันทึกข้อมูล</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /success modal -->
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                <script>
                                                                    var SA_UpSubjectTypeData<?php echo $row['subt_id']; ?> = function() {
                                                                        var _componentSA_UpSubjectTypeData = function() {
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
                                                                            $('#Update_Subject_Type_Data<?php echo $row['subt_id']; ?>').on('click', function() {
                                                                                var subt_id = $("#Update_Subject_Type_Data<?php echo $row['subt_id']; ?>").val();
                                                                                var subt_name = $("#subt_name<?php echo $row['subt_id']; ?>").val();;
                                                                                var subt_name_eng = $("#subt_name_eng<?php echo $row['subt_id']; ?>").val();;
                                                                                var action = "update";
                                                                                swalInitDelSubjectTypeData.fire({
                                                                                    title: 'ต้องการแก้ไขข้อมูล หรือไม่',
                                                                                    //text: "",
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

                                                                                        if (action == "") {
                                                                                            swalInitDelSubjectTypeData.fire({
                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                icon: 'error'
                                                                                            });
                                                                                        } else {

                                                                                            if (subt_name == "") {
                                                                                                document.getElementById("subt_name-null-up<?php echo $row['subt_id']; ?>").innerHTML =
                                                                                                    '<input type="text" name="subt_name" id="subt_name' + subt_id + '" class="form-control is-invalid" value="" placeholder="ประเภทรายวิชา" required="required">' +
                                                                                                    '<span class="invalid-feedback">กรุณากรอบข้อมูล ประเภทรายวิชา</span>';
                                                                                            } else {
                                                                                                document.getElementById("subt_name-null-up<?php echo $row['subt_id']; ?>").innerHTML =
                                                                                                    '<input type="text" name="subt_name" id="subt_name' + subt_id + '" class="form-control" value="' + subt_name + '" placeholder="ประเภทรายวิชา" required="required">';
                                                                                            }

                                                                                            if (subt_name_eng == "") {
                                                                                                document.getElementById("subt_name_eng-null-up<?php echo $row['subt_id']; ?>").innerHTML =
                                                                                                    '<input type="text" name="subt_name_eng" id="subt_name_eng' + subt_id + '" class="form-control is-invalid" value="" placeholder="ประเภทรายวิชาภาษาอังกฤษ" required="required">' +
                                                                                                    '<span class="invalid-feedback">กรุณากรอบข้อมูล ประเภทรายวิชาภาษาอังกฤษ</span>';
                                                                                            } else {
                                                                                                document.getElementById("subt_name_eng-null-up<?php echo $row['subt_id']; ?>").innerHTML =
                                                                                                    '<input type="text" name="subt_name_eng" id="subt_name_eng' + subt_id + '" class="form-control" value="' + subt_name_eng + '" placeholder="ประเภทรายวิชาภาษาอังกฤษ" required="required">';
                                                                                            }

                                                                                            if (subt_name != "" && subt_name_eng != "") {

                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data&manage=update", {
                                                                                                    subt_id: subt_id,
                                                                                                    subt_name: subt_name,
                                                                                                    subt_name_eng: subt_name_eng,
                                                                                                    action: action
                                                                                                }, function(process_edit) {

                                                                                                    let timerInterval;
                                                                                                    swalInitDelSubjectTypeData.fire({
                                                                                                        title: 'แก้ไขข้อมูลสำเร็จ',
                                                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                                                        timer: 1200,
                                                                                                        icon: 'success',
                                                                                                        timerProgressBar: true,
                                                                                                        didOpen: function() {
                                                                                                            Swal.showLoading()
                                                                                                            timerInterval = setInterval(function() {
                                                                                                                const content = Swal.getContent();
                                                                                                                if (content) {
                                                                                                                    const b_subject_type_data = content.querySelector('b_subject_type_data')
                                                                                                                    if (b_subject_type_data) {
                                                                                                                        b_subject_type_data.textContent = Swal.getTimerLeft();
                                                                                                                    } else {}
                                                                                                                } else {}
                                                                                                            }, 100);
                                                                                                        },
                                                                                                        willClose: function() {
                                                                                                            clearInterval(timerInterval)
                                                                                                        }
                                                                                                    }).then(function(result) {
                                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data";
                                                                                                        } else {}
                                                                                                    });


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

                                                                            //--------------------------------------------------------------------------------------
                                                                        };
                                                                        //--------------------------------------------------------------------------------------
                                                                        return {
                                                                            initComponentsDelSubjectTypeData: function() {
                                                                                _componentSA_UpSubjectTypeData();
                                                                            }
                                                                        }
                                                                    }();
                                                                    // Initialize module
                                                                    // ------------------------------
                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                        SA_UpSubjectTypeData<?php echo $row['subt_id']; ?>.initComponentsDelSubjectTypeData();
                                                                    });
                                                                </script>
                                                                <!--Update End-->
                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                <!-- /dangermodal -->
                                                                <div id="modal_theme_success_Delete<?php echo $row['subt_id']; ?>" class="modal fade" tabindex="-1">
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
                                                                                                    ต้องการลบข้อมูลประเภทวิชา <?php echo $row['subt_name']; ?> หรือไม่
                                                                                                </div>
                                                                                            </div>
                                                                                            <br>
                                                                                            <div class="row" style="text-align: center;">
                                                                                                <div class="col-<?php echo $grid; ?>-12">
                                                                                                    <button type="button" id="delete_subt<?php echo $row['subt_id']; ?>" name="delete_subt<?php echo $row['subt_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['subt_id']; ?>">ใช่</button>
                                                                                                    <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                            <!--Delete-->
                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                            <script>
                                                                                                var SA_DelSubjectTypeData<?php echo $row['subt_id']; ?> = function() {
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
                                                                                                        $('#delete_subt<?php echo $row['subt_id']; ?>').on('click', function() {
                                                                                                            var delete_subt = $("#delete_subt<?php echo $row['subt_id']; ?>").val();
                                                                                                            var subt_name = "<?php echo $row['subt_name']; ?>";

                                                                                                            var action = "delete";
                                                                                                            var table = "tb_subject_type";
                                                                                                            var ff = "subt_id";

                                                                                                            if (action == "") {
                                                                                                                swalInitDelSubjectTypeData.fire({
                                                                                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                    icon: 'error'
                                                                                                                });
                                                                                                            } else {

                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data&manage=delete", {
                                                                                                                    action: action,
                                                                                                                    table: table,
                                                                                                                    ff: ff,
                                                                                                                    id: delete_subt
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
                                                                                                                                    const b_subject_type_data = content.querySelector('b_subject_type_data')
                                                                                                                                    if (b_subject_type_data) {
                                                                                                                                        b_subject_type_data.textContent = Swal.getTimerLeft();
                                                                                                                                    } else {}
                                                                                                                                } else {}
                                                                                                                            }, 100);
                                                                                                                        },
                                                                                                                        willClose: function() {
                                                                                                                            clearInterval(timerInterval)
                                                                                                                        }
                                                                                                                    }).then(function(result) {
                                                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data";
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
                                                                                                    SA_DelSubjectTypeData<?php echo $row['subt_id']; ?>.initComponentsDelSubjectTypeData();
                                                                                                });
                                                                                            </script>
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
                                            </form>


                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php  } ?>

            <?php   } ?>
        </div>

<?php   } else {
    }
} ?>