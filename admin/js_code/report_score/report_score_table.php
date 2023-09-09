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
include("../../config/connect.ini.php");
include("../../config/fnc.php");

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

<script>
    $(document).ready(function() {}) {
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
    }
</script>

<?php
$check_year = filter_input(INPUT_POST, 'check_year');
$classroom = filter_input(INPUT_POST, 'check_classroom');
$check_grade = filter_input(INPUT_POST, 'check_grade');
$class_gn = filter_input(INPUT_POST, 'class_gn');
if ((isset($check_year, $classroom, $check_grade, $class_gn))) {

    if (!is_null($check_year)) {
        $sql = "SELECT * FROM tb_term WHERE year = '{$check_year}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $check_term = $row['term_id'];
    } else {
        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $check_term = $row['term_id'];
    }

?>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <div class="row">
        <div class="col-<?php echo $grid; ?>-12">
            <div class="card border border-purple">

                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid; ?>-6"></div>
                    <div class="col-<?php echo $grid; ?>-6"></div>
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
                                                <div>เบอร์โทร</div>
                                            </th>
                                            <th>
                                                <div>คะแนนครั้งที่ 1</div>
                                            </th>
                                            <th>
                                                <div>คะแนนครั้งที่ 2</div>
                                            </th>
                                            <th>
                                                <div>สัมฤทธิ์</div>
                                            </th>
                                            <th>
                                                <div>GPA</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
                    ORDER BY c.student_class ASC ,c.student_no ASC";
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
                    ORDER BY c.student_class ASC ,c.student_no ASC";
                                        }

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
                                                <td>
                                                    <div><?php echo $row['student_no']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $row['student_id']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $row['student_name']; ?>&nbsp;<?php echo $row['student_surname']; ?></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
                                                </td>
                                                <td>
                                                    <div></div>
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