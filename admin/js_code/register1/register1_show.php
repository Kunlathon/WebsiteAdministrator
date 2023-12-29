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
                        <div>รายชื่อ</div>
                    </th>
                    <th>
                        <div>ลงทะเบียน</div>
                    </th>
                    <th>
                        <div>ห้องเรียน</div>
                    </th>
                    <th>
                        <div>ผู้สอน</div>
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
            $sql = "SELECT * FROM `tb_register` WHERE user_status='1' ORDER BY user_studentid ASC";
            //$sql="SELECT user_studentid, user_student_no,user_idcard,user_name,user_name_buddhist,user_surname,user_name_en,user_name_buddhist_en,user_surname_en,user_type,user_date,user_email,user_degree FROM `tb_student` WHERE term_id = '$rowTer[term_id]' AND user_degree='$degree' AND user_status='1' ORDER BY user_studentid ASC";
            $list = result_array($sql);
            foreach ($list as $key => $row){
                $user_idcode1 = base64_encode($row['user_studentid']);
                //$sid = sprintf("%04d", $row['user_studentid']);
                $sid = sprintf("%04d", $row['user_student_no']);

                $sqlCou = "SELECT * FROM tb_course a INNER JOIN tb_course_detail  b ON a.course_id=b.course_id WHERE b.course_detail_id = '{$row['course_detail_id']}' AND a.course_status ='1'";
                $rowCou = row_array($sqlCou);

                    if((isset($rowCou['teacher_id']))){
                        $tid1=$rowCou['teacher_id'];
                    }else{
                        $tid1=null;
                    }
                


                $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
                $rowT1 = row_array($sqlT1); ?>

                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $countA; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['user_name'] . "&nbsp;" . $row['user_name_buddhist'] . "&nbsp;" . $row['user_surname']; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
     <?php
            if((isset($rowCou['course_name']))){ ?>
                        <div><?php echo $rowCou['course_name']; ?></div>
     <?php  }else{ ?>
                        <div></div>
     <?php  } ?>
     <?php
            if((isset($rowCou['course_name_en']))){ ?>
                        <div><?php echo $rowCou['course_name_en']; ?></div>
     <?php  }else{ ?>
                        <div></div>
     <?php  } ?>    
     <?php 
            if((isset($rowCou['course_detail_date_start'],$rowCou['course_detail_date_finnish']))){ ?>
                        <div><?php echo date_th($rowCou['course_detail_date_start']); ?> - <?php echo date_th($rowCou['course_detail_date_finnish']); ?></div>
     <?php  }else{ ?>
                        <div></div>
     <?php  } ?>        

                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
            if((isset($rowCou['course_detail_place']))){ ?>
                        <div><?php echo $rowCou['course_detail_place']; ?></div>
    <?php   }else{ ?>
                        <div></div>
    <?php   } ?>

                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
            if((isset($rowT1['teacher_name'],$rowT1['teacher_surname']))){ ?>
                        <div><?php echo $rowT1['teacher_name']; ?>&nbsp;<?php echo $rowT1['teacher_surname']; ?></div>
    <?php   }else{ ?>
                        <div></div>
    <?php   } ?>

                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">

                        <div>
                            <a href="process/approve_register1.php?user_idcode1=<?php echo $user_idcode1; ?>" title="อนุมัติ"><span class="badge badge-success"> อนุมัติ </span></a>
							&nbsp;
							<a href="process/canceled_register1.php?user_idcode1=<?php echo $user_idcode1; ?>" title="ไม่อนุมัติ"><span class="badge badge-danger"> ไม่อนุมัติ </span></a>                        
                        </div>

                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div ></div>
                    </td>
                </tr>

    <?php   $countA = $countA + 1; } ?>


            </tbody>
        </table>
    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }else{}
    }else{}
?>