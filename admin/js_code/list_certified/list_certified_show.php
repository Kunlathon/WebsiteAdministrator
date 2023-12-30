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
                        <div>ใบรับรอง</div>
                    </th>
                    <th>
                        <div>เปิดบัญชีธนาคาร</div>
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
        $sql = "SELECT * FROM `tb_certified` WHERE user_status='1' ORDER BY studentcard_id DESC";
        $list = result_array($sql);
             foreach ($list as $key => $row) { 
                
                if((isset($row['studentcard_id']))){
                    $user_idcode1 = base64_encode($row['studentcard_id']);
                }else{
                    $user_idcode1 = null;
                } ?>
                    <tr>
                        <td align="center" style="vertical-align: text-top;" class="align-top">
                            <div><?php echo $countA; ?></div>
                        </td>
                        <td align="center" style="vertical-align: text-top;" class="align-top">
                            <div><?php echo $row['user_student_id']; ?></div>
                        </td>   
                        <td align="left" style="vertical-align: text-top;" class="align-top">
                            <div><?php echo  $row['user_name'] . "&nbsp;" . $row['user_name_buddhist'] . "&nbsp;" . $row['user_surname']; ?></div>
                        </td>
                        <td align="center" style="vertical-align: text-top;" class="align-top">
        <?php
			if ($row['user_certified'] == "1") {
			    if ($row['user_certified_file'] == "") {
			?>
																<a href="" class="btn red btn-sm" title="แสดงข้อมูล">
																	<i class="fa fa-file-pdf-o"></i> </a>

		<?php
				}else{
			?>
																<a href="../../uploads/certified/<?php echo $row['user_certified_file']; ?>" class="btn blue btn-sm" target="_blank" title="แสดงข้อมูล">
																	<i class="fa fa-file-pdf-o"></i> </a>

		<?php
				}
			}
			?>   
                        
                      
                        </td>
                        <td align="center" style="vertical-align: text-top;" class="align-top">
        <?php
			if(($row['user_bank_account'] == "1")) {
			    if ($row['user_bank_account_file'] == "") { ?>
																<a href="" class="btn red btn-sm" title="แสดงข้อมูล">
																	<i class="fa fa-file-pdf-o"></i> </a>

		<?php
				}else{ ?>
																<a href="../../uploads/certified/<?php echo $row['user_bank_account_file']; ?>" class="btn blue btn-sm" target="_blank" title="แสดงข้อมูล">
																	<i class="fa fa-file-pdf-o"></i> </a>

		<?php
			    }
			} ?>
                        </td>
                        <td align="center" style="vertical-align: text-top;" class="align-top"> 
                            <div>
                                <a href="process/approve_list_certified.php?id=<?php echo $user_idcode1; ?>" title="ดำเนินการ"><span class="badge badge-success"> ดำเนินการ </span></a>
								&nbsp;
								<a href="process/canceled_list_certified.php?id=<?php echo $user_idcode1; ?>" title="ยกเลิก"><span class="badge badge-danger"> ยกเลิก </span></a>
                            </div>
                        </td>
                        <td align="center" style="vertical-align: text-top;" class="align-top"></td>
                    </tr>
    <?php    
            $countA = $countA + 1; 
             } ?>


            </tbody>
        </table>
    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }else{}
    }else{}
?>