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


        var dataTable = $('.datatable-button-html5-columns-STD').DataTable();

        if (dataTable) {
            dataTable.destroy();
        }else{}


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
                [20, 40 ,60, 100,"All"]
            ]       
        });    
        
        /*$('.datatable-button-html5-columns-STDB').DataTable({
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
        });*/

    })
</script>

<?php
    if((isset($_POST["run_show"]))){
        $run_show=filter_input(INPUT_POST, 'run_show');
            if(($run_show=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<div class="table-responsive">
        <table class="table table-bordered datatable-button-html5-columns-STD">
            <thead>
                <tr align="center">
                    <th>
                        <div>ลำดับ</div>
                    </th>
                    <th>
                        <div>รหัสนิสิต</div>
                    </th>
                    <th>
                        <div>รายชื่อ</div>
                    </th>
                    <th>
                        <div>รหัสประจำตัวประชาชน / Passport</div>
                    </th>
                    <th>
                        <div>QR-Code</div>
                    </th>
                    <th>
                        <div>สถานะ</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                
    <?php
            $countA = 1;
            $sql = "SELECT * FROM `tb_student` WHERE user_status='1' OR user_status='2' ORDER BY user_student_no ASC";
            $list = result_array($sql);
            foreach ($list as $key => $row) {
                $user_idcode1 = base64_encode($row['user_studentid']);
                //$sid = sprintf("%04d", $row['user_studentid']);
                $sid = $row['user_student_no']; ?>

                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $countA; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $sid; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['user_name'] . "&nbsp;" . $row['user_name_buddhist'] . "&nbsp;" . $row['user_surname']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $row['user_idcard']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://www.mse-exam.net/qr/chk_std.php?std_id=<?php echo $sid; ?>&choe=UTF-8" ;></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div class="badge badge-teal"><?php echo student_new_status($row['user_status']); ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div ></div>
                    </td>
                </tr>

    <?php    $countA=$countA+1;} ?>

            </tbody>
        </table>
    </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }else{}
?>