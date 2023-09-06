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
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/term_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) { ?>

        <?php @$list = filter_input(INPUT_GET, 'list'); ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=term_data" class="breadcrumb-item"> จัดการภาคเรียน</a>

                        <a href="#" class="breadcrumb-item"> ภาคเรียน</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <?php
                    if (($list == "1")) {
                    ?>
                        <h4>ภาคเรียน ระดับชั้นประถมศึกษา</h4>

                    <?php
                    } else if (($list == "2")) {
                    ?>
                        <h4>ภาคเรียน ระดับชั้นมัธยมศึกษาตอนต้น</h4>

                    <?php
                    } else if (($list == "3")) {
                    ?>
                        <h4>ภาคเรียน ระดับชั้นมัธยมศึกษาตอนปลาย</h4>

                    <?php
                    } else {
                    ?>
                        <h4>ภาคเรียน</h4>

                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-6">
                    <div class="btn-group">
                        <button type="button" name="term_data" id="term_data" class="btn btn-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                        <button type="button" name="grade_data" id="grade_data" class="btn btn-outline-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                        <button type="button" name="course_data" id="course_data" class="btn btn-outline-success btn-sm" value="">หลักสูตรหลัก</button>&nbsp;&nbsp;
                        <button type="button" name="classroom_data" id="classroom_data" class="btn btn-outline-success btn-sm" value="">จัดหลักสูตร</button>
                    </div>
                </div>
                <div class="col-<?php echo $grid; ?>-3"></div>
                <div class="col-<?php echo $grid; ?>-3">

                    <div class="btn-group">
                        <?php
                        if (($list == "1") || ($list == "2") || ($list == "3") || ($list == "form_add_all") || ($list == "form_add") || ($list == "form_update") || ($list == "setting") || ($list == "setting_update")) {
                        } else {
                        ?>
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>&nbsp;&nbsp;
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=form_add_all';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มภาคเรียน</button>


                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div><br>


            <?php
            //@$list=base64_decode(filter_input(INPUT_GET,'list'));

            if ((is_numeric($list))) {
                $check_grade = $list;
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
                <!------------------------------------------------------------------------------->
                <?php
                $manage = filter_input(INPUT_GET, 'manage');
                if (($manage == "create")) {
                } else { ?>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลภาคเรียน ระดับชั้น<?php echo $txt_grade_name; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=form_add&gid=<?php echo base64_encode($list); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มภาคเรียน</button>
                                        <!-- <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_theme_success_Add"><i class="icon-plus3"></i> เพิ่มภาคเรียน</button> -->

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="term_data">

                                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                                    <thead>
                                                        <tr align="center">
                                                            <th style="width: 4%;">
                                                                <div>ลำดับ</div>
                                                            </th>
                                                            <th>
                                                                <div>ภาคเรียน</div>
                                                            </th>
                                                            <th>
                                                                <div>วันที่เปิดเรียน</div>
                                                            </th>
                                                            <th>
                                                                <div>วันที่ปิดเรียน</div>
                                                            </th>
                                                            <th>
                                                                <div>เปิดใช่งาน</div>
                                                            </th>
                                                            <th>
                                                                <div>ผลการเรียน</div>
                                                            </th>
                                                            <?php
                                                            if ($check_grade == '1') {
                                                                if ((check_session("admin_username_aba")) == "snaper" || (check_session("admin_username_aba") == "krusoh")) {
                                                            ?>
                                                                    <th>
                                                                        <div>สำเนา</div>
                                                                    </th>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <th style="width: 16%;">
                                                                <div>จัดการ</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $sql = "SELECT * FROM tb_term WHERE grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
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
                                                                <td align="left">
                                                                    <div>ภาคเรียนที่ <?php echo $row['term']; ?> ปีการศึกษา <?php echo $row['year']; ?></div>
                                                                </td>
                                                                <td align="center">
                                                                    <div><?php echo date_th($row['term_start']); ?></div>
                                                                </td>
                                                                <td align="center">
                                                                    <div><?php echo date_th($row['term_end']); ?></div>
                                                                </td>
                                                                <td align="center">
                                                                    <div>
                                                                        <?php
                                                                        if ($row['term_status'] == '0') {
                                                                            echo "<font color='red'>ปิดการใช่งาน</font>";
                                                                        } else if ($row['term_status'] == '1') {
                                                                            echo "<font color='blue'>เปิดใช่งาน</font>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div>
                                                                        <?php
                                                                        if ($row['checkgrade_status'] == '0') {
                                                                            echo "<font color='red'>ปิดการใช่งาน</font>";
                                                                        } else if ($row['checkgrade_status'] == '1') {
                                                                            echo "<font color='blue'>เปิดใช่งาน</font>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <?php
                                                                if ($check_grade == '1') {

                                                                    if ((check_session("admin_username_aba")) == "snaper" || (check_session("admin_username_aba") == "krusoh")) {
                                                                ?>
                                                                        <td align="center">
                                                                            <a href="ajax/get_copycourse_data11.php?id=<?php echo $row['term_id']; ?>&check_grade=<?php echo $check_grade; ?>" data-toggle="modal" data-id="<?php echo $row['term_id']; ?>" data-target="#CopyCoursedata" class="btn btn-sm yellow-gold">
                                                                                <i class="fa fa-copy"></i> สำเนา</a>
                                                                        </td>


                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                                <td style="width: 4%;">
                                                                    <div align="center">
                                                                        <button type="button" name="setting_<?php echo $row['term_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=setting&id=<?php echo base64_encode($row['term_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="ตั้งค่าภาคเรียน" data-placement="bottom" value=""><i class="icon-cog"></i></button>
                                                                        <button type="button" name="update_<?php echo $row['term_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=form_update&id=<?php echo base64_encode($row['term_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                                                                        <button type="button" name="delete_<?php echo $row['term_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['term_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- /dangermodal -->
                                                            <div id="modal_theme_success_Delete<?php echo $row['term_id']; ?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white">
                                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="Term-type-data-delete" id="Term-type-data-delete" method="post" accept-charset="utf-8">
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                ต้องการลบข้อมูลภาคเรียน <?php echo $row['term_id']; ?> หรือไม่
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                <button type="button" id="delete_<?php echo $row['term_id']; ?>" name="delete_<?php echo $row['term_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['term_id']; ?>">ใช่</button>
                                                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <script>
                                                                                            var SA_DeleteTermData<?php echo $row['term_id']; ?> = function() {
                                                                                                var _componentSA_DeleteTermData = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDeleteTermData = swal.mixin({
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
                                                                                                    $('#delete_<?php echo $row['term_id']; ?>').on('click', function() {

                                                                                                        var check_grade = "<?php echo $check_grade; ?>";
                                                                                                        var term_key = $("#delete_<?php echo $row['term_id']; ?>").val();
                                                                                                        var action = "delete";
                                                                                                        var id_key = btoa(term_key);

                                                                                                        if (action == "") {
                                                                                                            swalInitDeleteTermData.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });
                                                                                                        } else {

                                                                                                            if (term_key != "") {

                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                                                                                                    action: action,
                                                                                                                    check_grade: check_grade,
                                                                                                                    term_key: term_key
                                                                                                                }, function(process_delete) {
                                                                                                                    var process_delete = process_delete;
                                                                                                                    if (process_delete.trim() === "no_error") {

                                                                                                                        let timerInterval;
                                                                                                                        swalInitDeleteTermData.fire({
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
                                                                                                                                        const b_term_data = content.querySelector('b_term_data')
                                                                                                                                        if (b_term_data) {
                                                                                                                                            b_term_data.textContent = Swal.getTimerLeft();
                                                                                                                                        } else {}
                                                                                                                                    } else {}
                                                                                                                                }, 100);
                                                                                                                            },
                                                                                                                            willClose: function() {
                                                                                                                                clearInterval(timerInterval)
                                                                                                                            }
                                                                                                                        }).then(function(result) {
                                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=" + check_grade;
                                                                                                                            } else {}
                                                                                                                        });

                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                        swalInitDeleteTermData.fire({
                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    } else {
                                                                                                                        swalInitDeleteTermData.fire({
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
                                                                                                    initComponentsDeleteTermData: function() {
                                                                                                        _componentSA_DeleteTermData();
                                                                                                    }
                                                                                                }
                                                                                            }();
                                                                                            // Initialize module
                                                                                            // ------------------------------
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                SA_DeleteTermData<?php echo $row['term_id']; ?>.initComponentsDeleteTermData();
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

                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                <?php    } ?>


                <!------------------------------------------------------------------------------->
            <?php    } elseif (($list == "form_update")) { ?>

                <?php
                $id = base64_decode(filter_input(INPUT_GET, 'id'));
                if (($id != null)) {
                    $sql = "SELECT * FROM tb_term WHERE term_id = '{$id}'";
                    $row = row_array($sql);

                    $gid = $row['grade_id'];

                ?>

                    <?php
                    if (($gid == "1")) {
                        $grade_show = "ระดับชั้นประถมศึกษา";
                    } else if (($gid == "2")) {
                        $grade_show = "ระดับชั้นมัธยมศึกษาตอนต้น";
                    } else if (($gid == "3")) {
                        $grade_show = "ระดับชั้นมัธยมศึกษาตอนปลาย";
                    } else {
                        $grade_show = "";
                    }
                    ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลภาคเรียน <?php echo $grade_show; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=<?php echo $gid; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="term_data_1123_up" id="term_data_1123_up" method="post" accept-charset="utf-8">

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ปีการศึกษา</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <span><?php echo $row['term']; ?>/<?php echo $row['year']; ?></span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่เปิดเรียน</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <input type="text" name="date_start" id="date_start" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['term_start']; ?>" placeholder="เลือกวันที่เปิดเรียน" required="required">
                                                                    <span>เลือกข้อมูลวันที่เปิดเรียน</span>
                                                                    <div id="add-date-start-null"></div>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่ปิดเรียน</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <input type="text" name="date_end" id="date_end" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['term_end']; ?>" placeholder="เลือกวันที่ปิดเรียน" required="required">
                                                                    <span>เลือกข้อมูลวันที่ปิดเรียน</span>
                                                                    <div id="add-date-end-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ระดับชั้น">
                                                                            <?php
                                                                            $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                            $tst = result_array($sql);
                                                                            ?>
                                                                            <?php foreach ($tst as $_tst) { ?>
                                                                                <option <?php echo $_tst['grade_id'] == $row['grade_id'] ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
                                                                            <?php } ?>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="add-grade-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">การใช่งาน</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <select class="form-control select" name="status" id="status" data-placeholder="การใช่งาน..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="การใช่งาน">
                                                                            <option <?php echo $row['term_status'] == 1 ? "selected" : ""; ?> value="1">เปิดการใช่งาน</option>
                                                                            <option <?php echo $row['term_status'] == 0 ? "selected" : ""; ?> value="0">ปิดการใช่งาน</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="add-status-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ผลการเรียน</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <select class="form-control select" name="checkgrade_st" id="checkgrade_st" data-placeholder="ผลการเรียน..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ผลการเรียน">
                                                                            <option <?php echo $row['checkgrade_status'] == 1 ? "selected" : ""; ?> value="1">เปิดการใช่งาน</option>
                                                                            <option <?php echo $row['checkgrade_status'] == 0 ? "selected" : ""; ?> value="0">ปิดการใช่งาน</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="add-checkgrade-st-null"></div>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <!-- <div id="test">11111</div> -->
                                                <!-- <div id="test2">2222</div> -->

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="Update_term_data" id="Update_term_data" class="btn btn-info" value="<?php echo $id; ?>">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                <input type="hidden" name="term" id="term" value="<?php echo $row['term']; ?>">
                                                                <input type="hidden" name="term_year" id="term_year" value="<?php echo $row['year']; ?>">
                                                                <input type="hidden" name="term_key" id="term_key" value="<?php echo $row['term_id']; ?>">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                } ?>

            <?php   } elseif (($list == "form_add_all")) { ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลภาคเรียน</div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มภาคเรียน</button> -->
                                </div>
                            </div>

                            <?php $year_now = date('Y') + 543; ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <form name="term_data_1123_add_all" id="term_data_1123_add_all" method="post" accept-charset="utf-8">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาคเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <select class="form-control select" name="term" id="term" data-placeholder="ภาคเรียน..." required="required">
                                                                    <option></option>
                                                                    <optgroup label="ภาคเรียน">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="add-term-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ปีการศึกษา</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <div id="add-term-year-null">
                                                                    <input type="text" name="term_year" id="term_year" class="form-control" value="<?php echo $year_now; ?>" placeholder="" required="required">
                                                                    <span>กรอกข้อมูลปีการศึกษา เช่น 2566</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่เปิดเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <input type="text" name="date_start" id="date_start" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันที่เปิดเรียน" required="required">
                                                                <div id="add-date-start-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่ปิดเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <input type="text" name="date_end" id="date_end" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันที่ปิดเรียน" required="required">
                                                                <div id="add-date-end-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <button type="button" name="Add_term_data_all" id="Add_term_data_all" class="btn btn-info">บันทึก</button>&nbsp;
                                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php } elseif (($list == "form_add")) {

                $gid = base64_decode(filter_input(INPUT_GET, 'gid'));
            ?>


                <?php
                if (($gid == "1")) {
                    $grade_show = "ระดับชั้นประถมศึกษา";
                } else if (($gid == "2")) {
                    $grade_show = "ระดับชั้นมัธยมศึกษาตอนต้น";
                } else if (($gid == "3")) {
                    $grade_show = "ระดับชั้นมัธยมศึกษาตอนปลาย";
                } else {
                    $grade_show = "";
                }
                ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลภาคเรียน <?php echo $grade_show; ?></div>
                                <div class="col-<?php echo $grid; ?>-6" align="right">
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=<?php echo $gid; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>

                                    <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=form_add';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มภาคเรียน</button> -->
                                </div>
                            </div>

                            <?php $year_now = date('Y') + 543; ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-12">
                                        <form name="term_data_1123_add" id="term_data_1123_add" method="post" accept-charset="utf-8">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาคเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <select class="form-control select" name="term" id="term" data-placeholder="ภาคเรียน..." required="required">
                                                                    <option></option>
                                                                    <optgroup label="ภาคเรียน">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="add-term-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ปีการศึกษา</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <div id="add-term-year-null">
                                                                    <input type="text" name="term_year" id="term_year" class="form-control" value="<?php echo $year_now; ?>" placeholder="" required="required">
                                                                    <span>กรอกข้อมูลปีการศึกษา เช่น 2566</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่เปิดเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <input type="text" name="date_start" id="date_start" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันที่เปิดเรียน" required="required">
                                                                <div id="add-date-start-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">วันที่ปิดเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <input type="text" name="date_end" id="date_end" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันที่ปิดเรียน" required="required">
                                                                <div id="add-date-end-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                    <option></option>
                                                                    <optgroup label="ระดับชั้น">
                                                                        <?php
                                                                        $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                        $tst = result_array($sql);
                                                                        ?>
                                                                        <?php foreach ($tst as $_tst) { ?>
                                                                            <option <?php echo $_tst['grade_id'] == $gid ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="add-grade-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <button type="button" name="Add_term_data" id="Add_term_data" class="btn btn-info">บันทึก</button>&nbsp;
                                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php  } elseif (($list == "setting")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                $id = base64_decode(filter_input(INPUT_GET, 'id'));

                if ((!is_null($id))) {

                    $sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '{$id}' ORDER BY a.year DESC , a.term DESC";
                    $row = row_array($sql);

                    $gid = $row['grade_id']; ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    if (($gid == "1")) {
                        $grade_show = "ระดับชั้นประถมศึกษา";
                    } elseif (($gid == "2")) {
                        $grade_show = "ระดับชั้นมัธยมศึกษาตอนต้น";
                    } elseif (($gid == "3")) {
                        $grade_show = "ระดับชั้นมัธยมศึกษาตอนปลาย";
                    } else {
                        $grade_show = "-";
                    }
                    ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ข้อมูลรายละเอียดภาคเรียน <?php echo $grade_show; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=<?php echo $gid; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=setting_update&id=<?php echo base64_encode($id); ?>';" class="btn btn-warning btn-sm" style="align: right;"><i class="icon-cog"></i> แก้ไขข้อมูล</button>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="term_data_1123_up" id="term_data_1123_up" method="post" accept-charset="utf-8">

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ภาคเรียนปีการศึกษา :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <?php echo $row['term']; ?>/<?php echo $row['year']; ?>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">สอบครั้งที่ 1 :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    ระหว่างวันที่ <?php echo date_full_th($row['exam1_start']); ?> - <?php echo date_full_th($row['exam1_end']); ?> สถานะ <?php echo term_status($row['exam1_status']); ?>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">สอบครั้งที่ 2 :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    ระหว่างวันที่ <?php echo date_full_th($row['exam2_start']); ?> - <?php echo date_full_th($row['exam2_end']); ?> สถานะ <?php echo term_status($row['exam2_status']); ?>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">กำหนดส่งคะแนนครั้งที่ 1 :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    วันที่ <?php echo date_full_th($row['score_1']); ?> สถานะ <?php echo score_status($row['score_1_status']); ?>
                                                                    <?php
                                                                    if ($row['score_1_status'] == '1') {
                                                                    ?>
                                                                        <button type="button" name="modal_score1" id="modal_score1" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ปิด" data-placement="bottom" value="0"><?php echo score2_status($row['score_1_status']); ?></button>
                                                                    <?php
                                                                    } else if ($row['score_1_status'] == '0') {
                                                                    ?>
                                                                        <button type="button" name="modal_score1" id="modal_score1" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="เปิด" data-placement="bottom" value="1"><?php echo score2_status($row['score_1_status']); ?></button>
                                                                    <?php
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function() {

                                                        // Defaults
                                                        var swalInitScoreOpen = swal.mixin({
                                                            buttonsStyling: false,
                                                            customClass: {
                                                                confirmButton: 'btn btn-primary',
                                                                cancelButton: 'btn btn-light',
                                                                denyButton: 'btn btn-light',
                                                                input: 'form-control'
                                                            }
                                                        });
                                                        // Defaults End

                                                        $('#modal_score1').on('click', function() {

                                                            swalInitScoreOpen.fire({
                                                                title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                                                text: "You won't be able to revert this!",
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

                                                                    var term_key = "<?php echo $row['term_id']; ?>";
                                                                    var term_detail_key = "<?php echo $row["term_detail_id"]; ?>";
                                                                    var term_score = $("#modal_score1").val();;
                                                                    var id_key = btoa(term_key);

                                                                    if (term_score == "1") {
                                                                        var action = "open1";
                                                                    } else if (term_score == "0") {
                                                                        var action = "close1";
                                                                    }

                                                                    if (action == "") {

                                                                        swalInitScoreOpen.fire({
                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                            icon: 'error'
                                                                        });

                                                                    } else {

                                                                        if (term_key != "" && term_detail_key != "") {

                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                                                                action: action,
                                                                                term_key: term_key,
                                                                                term_detail_key: term_detail_key,
                                                                                term_score: term_score
                                                                            }, function(process_open) {
                                                                                var process_open = process_open;
                                                                                if (process_open.trim() === "no_error") {

                                                                                    let timerInterval;
                                                                                    swalInitScoreOpen.fire({
                                                                                        title: 'บันทึกข้อมูลสำเร็จ',
                                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                                        timer: 1200,
                                                                                        icon: 'success',
                                                                                        timerProgressBar: true,
                                                                                        didOpen: function() {
                                                                                            Swal.showLoading()
                                                                                            timerInterval = setInterval(function() {
                                                                                                const content = Swal.getContent();
                                                                                                if (content) {
                                                                                                    const b_term_data = content.querySelector('b_term_data')
                                                                                                    if (b_term_data) {
                                                                                                        b_term_data.textContent = Swal.getTimerLeft();
                                                                                                    } else {}
                                                                                                } else {}
                                                                                            }, 100);
                                                                                        },
                                                                                        willClose: function() {
                                                                                            clearInterval(timerInterval)
                                                                                        }
                                                                                    }).then(function(result) {
                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=setting&id=" + id_key;
                                                                                        } else {}
                                                                                    });

                                                                                } else if (process_open.trim() === "it_error") {
                                                                                    swalInitScoreOpen.fire({
                                                                                        title: 'ข้อมูลซ้ำ',
                                                                                        icon: 'error'
                                                                                    });
                                                                                } else {
                                                                                    swalInitScoreOpen.fire({
                                                                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้' + process_open.trim(),
                                                                                        icon: 'error'
                                                                                    });
                                                                                }
                                                                            })

                                                                        } else {}

                                                                    }

                                                                } else {}



                                                            })


                                                        })
                                                    })
                                                </script>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">กำหนดส่งคะแนนครั้งที่ 2 :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    วันที่ <?php echo date_full_th($row['score_2']); ?> สถานะ <?php echo score_status($row['score_2_status']); ?>&nbsp;
                                                                    <?php
                                                                    if ($row['score_2_status'] == '1') {
                                                                    ?>
                                                                        <button type="button" name="modal_score2" id="modal_score2" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ปิด" data-placement="bottom" value="0"><?php echo score2_status($row['score_2_status']); ?></button>
                                                                    <?php
                                                                    } else if ($row['score_2_status'] == '0') {
                                                                    ?>
                                                                        <button type="button" name="modal_score2" id="modal_score2" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="เปิด" data-placement="bottom" value="1"><?php echo score2_status($row['score_2_status']); ?></button>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function() {

                                                        // Defaults
                                                        var swalInitScoreOpen2 = swal.mixin({
                                                            buttonsStyling: false,
                                                            customClass: {
                                                                confirmButton: 'btn btn-primary',
                                                                cancelButton: 'btn btn-light',
                                                                denyButton: 'btn btn-light',
                                                                input: 'form-control'
                                                            }
                                                        });
                                                        // Defaults End

                                                        $('#modal_score2').on('click', function() {

                                                            swalInitScoreOpen2.fire({
                                                                title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                                                text: "You won't be able to revert this!",
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

                                                                    var term_key = "<?php echo $row['term_id']; ?>";
                                                                    var term_detail_key = "<?php echo $row["term_detail_id"]; ?>";
                                                                    var term_score = $("#modal_score2").val();;
                                                                    var id_key = btoa(term_key);

                                                                    if (term_score == "1") {
                                                                        var action = "open2";
                                                                    } else if (term_score == "0") {
                                                                        var action = "close2";
                                                                    }

                                                                    if (action == "") {

                                                                        swalInitScoreOpen2.fire({
                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                            icon: 'error'
                                                                        });

                                                                    } else {

                                                                        if (term_key != "" && term_detail_key != "") {

                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                                                                action: action,
                                                                                term_key: term_key,
                                                                                term_detail_key: term_detail_key,
                                                                                term_score: term_score
                                                                            }, function(process_open) {
                                                                                var process_open = process_open;
                                                                                if (process_open.trim() === "no_error") {

                                                                                    let timerInterval;
                                                                                    swalInitScoreOpen2.fire({
                                                                                        title: 'บันทึกข้อมูลสำเร็จ',
                                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                                        timer: 1200,
                                                                                        icon: 'success',
                                                                                        timerProgressBar: true,
                                                                                        didOpen: function() {
                                                                                            Swal.showLoading()
                                                                                            timerInterval = setInterval(function() {
                                                                                                const content = Swal.getContent();
                                                                                                if (content) {
                                                                                                    const b_term_data = content.querySelector('b_term_data')
                                                                                                    if (b_term_data) {
                                                                                                        b_term_data.textContent = Swal.getTimerLeft();
                                                                                                    } else {}
                                                                                                } else {}
                                                                                            }, 100);
                                                                                        },
                                                                                        willClose: function() {
                                                                                            clearInterval(timerInterval)
                                                                                        }
                                                                                    }).then(function(result) {
                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=setting&id=" + id_key;
                                                                                        } else {}
                                                                                    });

                                                                                } else if (process_open.trim() === "it_error") {
                                                                                    swalInitScoreOpen2.fire({
                                                                                        title: 'ข้อมูลซ้ำ',
                                                                                        icon: 'error'
                                                                                    });
                                                                                } else {
                                                                                    swalInitScoreOpen2.fire({
                                                                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้' + process_open.trim(),
                                                                                        icon: 'error'
                                                                                    });
                                                                                }
                                                                            })

                                                                        } else {}

                                                                    }

                                                                } else {}



                                                            })


                                                        })
                                                    })
                                                </script>


                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">กำหนดส่งผลสัมฤทธิ์ :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    วันที่ <?php echo date_full_th($row['score_F']); ?>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">กำหนดส่งผลคะแนน GPA :</label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    วันที่ <?php echo date_full_th($row['score_G']); ?>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>




                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                } ?>


                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php     } elseif (($list == "setting_update")) { ?>

                <?php
                $id = base64_decode(filter_input(INPUT_GET, 'id'));
                if (($id != null)) {
                    $sql = "SELECT * FROM tb_term a INNER JOIN tb_term_detail b ON a.term_id = b.term_id  WHERE a.term_id = '{$id}' ORDER BY a.year DESC , a.term DESC";
                    $row = row_array($sql);

                    $check_term = $row['term_id'];
                    $check_grade = $row['grade_id'];

                ?>

                    <?php
                    if (($check_grade == "1")) {
                        $grade_show = "ระดับชั้นประถมศึกษา";
                    } else if (($check_grade == "2")) {
                        $grade_show = "ระดับชั้นมัธยมศึกษาตอนต้น";
                    } else if (($check_grade == "3")) {
                        $grade_show = "ระดับชั้นมัธยมศึกษาตอนปลาย";
                    } else {
                        $grade_show = "";
                    }
                    ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลรายละเอียดภาคเรียน <?php echo $grade_show; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=<?php echo $check_grade; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=setting&id=<?php echo base64_encode($id); ?>';" class="btn btn-success btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายละเอียดภาคเรียน</button>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <form name="term_data_11234_up" id="term_data_11234_up" method="post" accept-charset="utf-8">

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ปีการศึกษา</label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <span><?php echo $row['term']; ?>/<?php echo $row['year']; ?></span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สอบครั้งที่ 1 : </label>
                                                                <div class="col-<?php echo $grid; ?>-5">
                                                                    <input type="text" name="date_start1" id="date_start1" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['exam1_start']; ?>" placeholder="เลือกวันที่เริ่ม" required="required">
                                                                    <span>เริ่มวันที่</span>
                                                                    <div id="add-date-start1-null"></div>

                                                                </div>
                                                                <div class="col-<?php echo $grid; ?>-5">
                                                                    <input type="text" name="date_end1" id="date_end1" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['exam1_end']; ?>" placeholder="เลือกวันที่สิ้นสุด" required="required">
                                                                    <span>สิ้นสุดวันที่</span>
                                                                    <div id="add-date-end1-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สอบครั้งที่ 2 : </label>
                                                                <div class="col-<?php echo $grid; ?>-5">
                                                                    <input type="text" name="date_start2" id="date_start2" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['exam2_start']; ?>" placeholder="เลือกวันที่เริ่ม" required="">
                                                                    <span>เริ่มวันที่</span>

                                                                </div>
                                                                <div class="col-<?php echo $grid; ?>-5">
                                                                    <input type="text" name="date_end2" id="date_end2" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['exam2_end']; ?>" placeholder="เลือกวันที่สิ้นสุด" required="">
                                                                    <span>สิ้นสุดวันที่</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">กำหนดส่งคะแนนครั้งที่ 1 : </label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <input type="text" name="date_score_1" id="date_score_1" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['score_1']; ?>" placeholder="เลือกวันที่กำหนดส่งคะแนนครั้งที่ 1" required="">
                                                                    <span>วันที่กำหนดส่งคะแนนครั้งที่ 1</span>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">กำหนดส่งคะแนนครั้งที่ 2 : </label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <input type="text" name="date_score_2" id="date_score_2" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['score_2']; ?>" placeholder="เลือกวันที่กำหนดส่งคะแนนครั้งที่ 2" required="">
                                                                    <span>วันที่กำหนดส่งคะแนนครั้งที่ 2</span>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">กำหนดส่งผลสัมฤทธิ์ : </label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <input type="text" name="date_score_f" id="date_score_f" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['score_F']; ?>" placeholder="เลือกวันที่กำหนดส่งผลสัมฤทธิ์" required="">
                                                                    <span>วันที่กำหนดส่งผลสัมฤทธิ์</span>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">กำหนดส่งผลคะแนน GPA : </label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <input type="text" name="date_score_g" id="date_score_g" class="form-control pickadate-accessibility rounded-right" value="<?php echo $row['score_G']; ?>" placeholder="เลือกวันที่กำหนดส่งผลคะแนน GPA" required="">
                                                                    <span>วันที่กำหนดส่งผลคะแนน GPA</span>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>


                                                <!-- <div id="test1">11111</div> -->
                                                <!-- <div id="test2">22222</div> -->

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="Update_term_detail_data" id="Update_term_detail_data" class="btn btn-info" value="<?php echo $id; ?>">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                <input type="hidden" name="term_key" id="term_key" value="<?php echo $row['term_id']; ?>">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                } ?>


            <?php   } else { ?>

                <div class="row">

                    <?php
                    $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` FROM `tb_grade` ORDER BY `grade_id` ASC";
                    $class_Row = result_array($class_Sql);
                    foreach ($class_Row as $key => $class_Print) {
                        if ((is_array($class_Print) && count($class_Print))) { ?>
                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                            <div class="col-<?php echo $grid; ?>-4">
                                <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=<?php echo $class_Print['grade_id']; ?>">
                                    <div class="card card-body bg-primary text-white has-bg-image">
                                        <div class="media">
                                            <div class="mr-3 align-self-center">
                                                <i class="icon-graduation2 icon-3x opacity-75"></i>
                                            </div>

                                            <div class="media-body text-right">
                                                <h3 class="mb-0">ระดับชั้น<?php echo $class_Print["grade_name"]; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php       } else {
                        }
                    } ?>

                </div>


            <?php   } ?>

        </div>

<?php   } else {
    }
} ?>