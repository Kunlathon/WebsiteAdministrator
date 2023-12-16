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

<?php
    if((isset($_POST["run_show"]))){
        $run_show=filter_input(INPUT_POST, 'run_show');
            if(($run_show=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
                [20, 40, 60, 100,"All"]
            ]       
        });    
        
        $('.datatable-button-html5-columns-STDB').DataTable({
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
        });

    })
</script>

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
                        <div>ห้องเรียน</div>
                    </th>
                    <th>
                        <div>ครูผู้สอน</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                
        <?php
            $sql = "SELECT * FROM `tb_classroom_teacher` WHERE `classroom_status` ='2' ORDER BY `classroom_name` ASC";
            $list = result_array($sql);
            foreach ($list as $key => $row) { 
                
                $tid1 = $row['teacher_id1'];
                $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
                $rowT1 = row_array($sqlT1);

                $sqlCou = "SELECT * FROM tb_course a INNER JOIN tb_course_detail  b ON a.course_id=b.course_id WHERE b.course_detail_id = '{$row['course_detail_id']}' AND a.course_status ='1'";
                $rowCou = row_array($sqlCou);

                ?>

                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $key + 1; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $rowCou['course_name']; ?></div>
                        <div><?php echo $rowCou['course_name_en']; ?></div>
                        <div><?php echo date_th($rowCou['course_detail_date_start']); ?> - <?php echo date_th($rowCou['course_detail_date_finnish']); ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $row['classroom_name']; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $rowT1['teacher_name']." ".$rowT1['teacher_surname']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="form_ccd<?php echo $row['classroom_t_id']; ?>" accept-charset="utf-8" method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_classroom_show">
                                    <button type="submit" name="sub_form_ccd<?php echo $row['classroom_t_id']; ?>"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                    <input name="manage"  type="hidden" value="show">
                                    <input name="classroom_t_key"  type="hidden" value="<?php echo $row['classroom_t_id'];?>">
</form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

        <?php    } ?>

            </tbody>
        </table>
    </div>




<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}
    }else{}
?>