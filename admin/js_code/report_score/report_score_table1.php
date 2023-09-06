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
error_reporting(error_reporting() & ~E_NOTICE);
?>
<?php
include("../../config/connect.ini.php");
include("../../config/fnc.php");

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
            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '2px')
                }
            }],
            "paging": false,
            "lengehChange": false,
            "searching": true,
            "ordering": false,
            "autoWidth": true
        });
    })
</script>

<script>
    $(document).ready(function() {}) {
        $('.select-search').select2();
    }
</script>

<?php
$check_year = filter_input(INPUT_POST, 'check_year');
$classroom = filter_input(INPUT_POST, 'check_classroom');
$check_grade = filter_input(INPUT_POST, 'check_grade');
$class_name = filter_input(INPUT_POST, 'class_name');

if ((isset($check_year, $classroom, $check_grade, $class_name))) {

    if (!is_null($check_year)) {
        $sql = "SELECT * FROM tb_term WHERE year = '{$check_year}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $check_term = $row['term_id'];
    } else {
        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $check_term = $row['term_id'];
    }

    $sql = "SELECT *  FROM tb_course_class a INNER JOIN tb_classroom_teacher b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_course_student c ON a.course_class_id = c.course_class_id INNER JOIN tb_student d ON c.student_id = d.student_id WHERE b.classroom_t_id='{$classroom}' AND a.grade_id = '$check_grade' AND a.term_id = '$check_term' AND a.course_class_status='1'";

    // echo $sql;
    $row = row_array($sql);

    $course = $row['course_class_id'];
    $courses_id = $row['course_s_id'];
    $student_id = $row['student_id'];
    $course_type = $row['course_class_type'];

    $classroom_name = $row['classroom_name'];

    $filedoc = $row['classroom_name'];
    $file_explode = explode(" ", $filedoc);
    $file_explode1 = $file_explode[0];
    $file_explode2 = $file_explode[1];
    $class_name = $file_explode2;

?>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <div class="row">
        <div class="col-<?php echo $grid; ?>-12">
            <div class="card border border-purple">

                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid; ?>-6"></div>
                    <div class="col-<?php echo $grid; ?>-6" align="right">
                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_1&classroom=<?php echo $classroom; ?>&check_year=<?php echo $check_year; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="table-responsive">
                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                    <thead>
                                        <tr align="center">
                                            <th>
                                                <div>เลขที่</div>
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
                                                <div>ชื่อเล่น</div>
                                            </th>
                                            <th>
                                                <div>เพศ</div>
                                            </th>
                                            <th>
                                                <div>ห้อง</div>
                                            </th>
                                            <th>
                                                <div>คะแนนครั้งที่ 1</div>
                                            </th>
                                            <th>
                                                <div>คะแนนครั้งที่ 2</div>
                                            </th>
                                            <th>
                                                <div>สัมฤทธิ์ 1</div>
                                            </th>
                                            <th>
                                                <div>คะแนนครั้งที่ 3</div>
                                            </th>
                                            <th>
                                                <div>คะแนนครั้งที่ 4</div>
                                            </th>
                                            <th>
                                                <div>สัมฤทธิ์ 2</div>
                                            </th>
                                            <th>
                                                <div>สัมฤทธิ์ (รวม)</div>
                                            </th>
                                            <th>
                                                <div>GPA</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                        <?php
                                        if (($classroom != null)) {
                                        ?>
                                            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <tr>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>
                                                <td>
                                                    <div>&nbsp;</div>
                                                </td>

                                                <!-- เริ่มเทอม 1 -->

                                                <?php
                                                $sqlTer1 = "SELECT * FROM tb_term WHERE term = '1' AND year = '{$check_year}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                                                $rowTer1 = row_array($sqlTer1);

                                                @$check_term_1 = $rowTer1['term_id'];

                                                @$sqlClass1 = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id WHERE a.classroom_name = '$classroom_name' AND b.grade_id = '$check_grade' AND b.term_id = '$check_term_1'";
                                                $rowClass1 = row_array($sqlClass1);

                                                @$classroom_1 = $rowClass1['classroom_t_id'];
                                                ?>

                                                <td align="center">
                                                    <div>
                                                        <form name="print1" id="print1" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_1.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์คะแนนครั้ง 1" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    <div>
                                                        <form name="print2" id="print2" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_2.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์คะแนนครั้ง 2" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    <div>
                                                        <form name="print3" id="print3" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_3.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์ผลสัมฤทธิ์ 2" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                </td>

                                                <!-- สิ้นสุดเทอม 1 -->
                                                <!-- เริ่มเทอม 2 -->
                                                <?php
                                                $sqlTer2 = "SELECT * FROM tb_term WHERE term = '2' AND year = '{$check_year}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                                                @$rowTer2 = row_array($sqlTer2);
                                                $check_term_2 = $rowTer2['term_id'];
                                                @$sqlClass2 = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id WHERE a.classroom_name = '$classroom_name' AND b.grade_id = '$check_grade' AND b.term_id = '$check_term_2'";
                                                $rowClass2 = row_array($sqlClass2);
                                                @$classroom_2 = $rowClass2['classroom_t_id'];
                                                ?>
                                                <td align="center">
                                                    <div>
                                                        <form name="print4" id="print4" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_1.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์คะแนนครั้ง 3" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    <div>
                                                        <form name="print5" id="print5" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_2.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์คะแนนครั้ง 4" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    <div>
                                                        <form name="print6" id="print6" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_3.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์ผลสัมฤทธิ์ 2" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <!-- สิ้นสุดเทอม 2 -->
                                                <td align="center">
                                                    <div>
                                                        <form name="print7" id="print7" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_3_mix.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์ผลสัมฤทธิ์ (รวม)" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    <div>
                                                        <form name="print8" id="print8" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report_all1_4.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="พิมพ์ผลการเรียน" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                        <?php
                                        } else {
                                        }
                                        ?>
                                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                        <?php
                                        if ((is_null($classroom))) {
                                            $sql = "SELECT * 
                                                        FROM `tb_classroom_teacher 
                                                        a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id 
                                                        INNER JOIN tb_student c ON b.student_id=c.student_id 
                                                        WHERE b.grade_id = '{$check_grade}' 
                                                        AND b.term_id = '{$check_term}' 
                                                        AND c.student_status='1' 
                                                        AND (b.student_no != '0' OR b.student_no != '') 
                                                        AND a.classroom_t_id = '{$classroom}' 
                                                        ORDER BY c.student_no ASC ,c.student_class ASC";
                                        } else {
                                            $sql = "SELECT * 
                                                        FROM tb_classroom_teacher 
                                                        a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id 
                                                        INNER JOIN tb_student c ON b.student_id=c.student_id 
                                                        WHERE b.grade_id = '{$check_grade}' 
                                                        AND b.term_id = '{$check_term}' 
                                                        AND c.student_status='1' 
                                                        AND (b.student_no != '0' OR b.student_no != '') 
                                                        AND a.classroom_t_id = '{$classroom}' 
                                                        ORDER BY c.student_no ASC ,c.student_class ASC";
                                        }
                                        // echo $sql;

                                        $list = result_array($sql);

                                        foreach ($list as $key => $row) {

                                            if (($row["gender"] == 1)) {
                                                $gender = "ชาย";
                                            } elseif (($row["gender"] == 2)) {
                                                $gender = "หญิง";
                                            } else {
                                                $gender = "-";
                                            }

                                            $sqlC = "SELECT * 
                                                        FROM tb_classroom 
                                                        WHERE classroom_id = '{$row["student_class"]}'";
                                            $rowC = row_array($sqlC);

                                        ?>

                                            <tr>
                                                <td align="center">
                                                    <div><?php echo @$row['student_no']; ?></div>
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
                                                <td align="center">
                                                    <div><?php echo @$row['student_idcard']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo @$row['nickname']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $gender; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo @$rowC['classroom_name']; ?></div>
                                                </td>

                                                <!-- เริ่มเทอม 1 -->

                                                <?php
                                                $sqlTer1 = "SELECT * FROM tb_term WHERE term = '1' AND year = '{$check_year}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                                                $rowTer1 = row_array($sqlTer1);

                                                $check_term_1 = $rowTer1['term_id'];

                                                $sqlClass1 = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term_1' AND b.student_id='$row[student_id]'";
                                                $rowClass1 = row_array($sqlClass1);

                                                @$classroom_1 = $rowClass1['classroom_t_id'];
                                                ?>

                                                <td align="center">
                                                    <div>
                                                        <form name="show1<?php echo @$row['student_id']; ?>" id="show1<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1" method="get">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 1" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print1<?php echo @$row['student_id']; ?>" id="print1<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_1.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 1" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                </td>

                                                <td align="center">
                                                    <div>
                                                        <form name="show2<?php echo @$row['student_id']; ?>" id="show2<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1_2" method="get">
                                                            <button type="submit" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 2" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1_2">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print2<?php echo @$row['student_id']; ?>" id="print2<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_2.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 2" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                </td>

                                                <td align="center">
                                                    <div>
                                                        <form name="show3<?php echo @$row['student_id']; ?>" id="show3<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1_F" method="get">
                                                            <button type="submit" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="ประเมินผลสัมฤทธิ์ 1" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1_F">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print3<?php echo @$row['student_id']; ?>" id="print3<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_3.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินผลสัมฤทธิ์ 1" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_1; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_1; ?>">
                                                        </form>
                                                    </div>
                                                </td>


                                                <!-- สิ้นสุดเทอม 1 -->
                                                <!-- เริ่มเทอม 2 -->
                                                <?php
                                                $sqlTer2 = "SELECT * FROM tb_term WHERE term = '2' AND year = '{$check_year}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                                                $rowTer2 = row_array($sqlTer2);

                                                $check_term_2 = $rowTer2['term_id'];

                                                $sqlClass2 = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id WHERE b.grade_id = '$check_grade' AND b.term_id = '$check_term_2' AND b.student_id='$row[student_id]'";
                                                $rowClass2 = row_array($sqlClass2);

                                                @$classroom_2 = $rowClass2['classroom_t_id'];
                                                ?>


                                                <td align="center">
                                                    <div>
                                                        <form name="show4<?php echo @$row['student_id']; ?>" id="show4<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1" method="get">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 1" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print4<?php echo @$row['student_id']; ?>" id="print4<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_1.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 1" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>

                                                <td align="center">
                                                    <div>
                                                        <form name="show5<?php echo @$row['student_id']; ?>" id="show5<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1_2" method="get">
                                                            <button type="submit" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 2" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1_2">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print5<?php echo @$row['student_id']; ?>" id="print5<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_2.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินครั้งที่ 2" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>

                                                <td align="center">
                                                    <div>
                                                        <form name="show6<?php echo @$row['student_id']; ?>" id="show6<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1_F" method="get">
                                                            <button type="submit" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="ประเมินผลสัมฤทธิ์ 2" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1_F">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print6<?php echo @$row['student_id']; ?>" id="print6<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_3.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินผลสัมฤทธิ์ 2" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                                <!-- สิ้นสุดเทอม 2 -->

                                                <td align="center">
                                                    <div>
                                                        <form name="show7<?php echo @$row['student_id']; ?>" id="show7<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1_F_mix" method="get">
                                                            <button type="submit" class="btn btn-outline-dark btn-sm" data-popup="tooltip" title="ประเมินผลสัมฤทธิ์ (รวม)" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1_F_mix>">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print7<?php echo @$row['student_id']; ?>" id="print7<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_3_mix.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ประเมินผลสัมฤทธิ์ (รวม)" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom_2; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term_2; ?>">
                                                        </form>
                                                    </div>
                                                </td>

                                                <td align="center">
                                                    <div>
                                                        <form name="show8<?php echo @$row['student_id']; ?>" id="show8<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=report_score_show1_G" method="get">
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ผลการเรียน" data-placement="bottom"><i class="icon-file-text2"></i></button>
                                                            <input type="hidden" name="modules" id="modules" value="report_score_show1_G">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form name="print8<?php echo @$row['student_id']; ?>" id="print8<?php echo @$row['student_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/document/grade_report1_4.php" method="get" target="_blank">
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="ผลการเรียน" data-placement="bottom"><i class="icon-file-pdf"></i></button>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom" id="classroom" value="<?php echo $classroom; ?>">
                                                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } else { ?>

<?php   } ?>