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
            if(($run_show=="show")){
                
                if((isset($_POST["now_date1"]))){
                    $now_date1=filter_input(INPUT_POST, 'now_date1');
                }else{
                    $now_date1=null;
                }
        
                if((isset($_POST["now_date2"]))){
                    $now_date2=filter_input(INPUT_POST, 'now_date2');
                }else{
                    $now_date2=null;
                }
                
                ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <div class="card-body"><?php echo "ข้อมูลระหว่างวันที่ : ".$now_date1." - ".$now_date2;?></div>

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
                        <div>ขอบัตรครั้งแรก</div>
                    </th>
                    <th>
                        <div>บัตรหาย</div>
                    </th>
                    <th>
                        <div>บัตรชำรุด</div>
                    </th>
                    <th>
                        <div>บัตรหมดอายุ</div>
                    </th>
                    <th>
                        <div>เปลี่ยนชื่อ-สกุล</div>
                    </th>
                    <th>
                        <div>หลักสูตร</div>
                    </th>
                    <th>
                        <div>หลักฐาน</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>

                </tr>
            </thead>
            <tbody>
    
    <?php

            if((isset($now_date1,$now_date2))){

                $now_date1=str_replace("/","-",$now_date1);
                $now_date2=str_replace("/","-",$now_date2);

                $countA = 1;
                $sql = "SELECT * FROM `tb_student_card` WHERE user_status='2' AND (user_update BETWEEN '{$now_date1}' AND '{$now_date2}') ORDER BY studentcard_id DESC";
                $list = result_array($sql);
                foreach ($list as $key => $row){
                    $user_idcode1 = base64_encode($row['studentcard_id']);

                    $course_detail_id = $row['course_detail_id'];
                    $sqlCou = "SELECT * FROM tb_course a INNER JOIN tb_course_detail b ON a.course_id=b.course_id WHERE b.course_detail_id='{$course_detail_id}'";
                    $rowCou = row_array($sqlCou); ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $countA; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $row['user_student_id']; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['user_name'] . "&nbsp;" . $row['user_name_buddhist'] . "&nbsp;" . $row['user_surname']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
	      if(($row['user_new_card'] == "1")) { ?>
                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>
    <?php }else{ ?>
                        <div><i class="icon-dash mr-3 icon-2x"></i></div>
	<?php } ?>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
		if(($row['user_lost_card'] == "1")) { ?>
                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>
    <?php }else{ ?> 
                        <div><i class="icon-dash mr-3 icon-2x"></i></div>
    <?php } ?>                        
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
		    if(($row['user_defective_card'] == "1")) {
	            if (($row['user_defective_card_file'] == null)) {
	?>
                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>
    <?php       }else{ ?>
        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>
                        <div><a href="<?php echo $RunLinkWeb->Call_link_web()?>/uploads/card/<?php echo $row['user_defective_card_file']; ?>" target="_blank" title="แสดงข้อมูล"><i class="icon-file-pdf mr-3 icon-2x"></i></a></div>
    <?php   }
		    }else{} ?>                        
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
			if(($row['user_expired_card'] == "1")) {
			    if(($row['user_expired_card_file'] == null)) {
	?>
                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>	
	<?php       }else{ ?>

                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>
                        <div><a href="<?php echo $RunLinkWeb->Call_link_web()?>/uploads/card/<?php echo $row['user_expired_card_file']; ?>" target="_blank" title="แสดงข้อมูล"><i class="icon-file-pdf mr-3 icon-2x"></i></a></div>
   
    <?php       }
			}else{ ?>

    <?php   } ?>                        
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
		    if(($row['user_change_name'] == "1")){
		        if(($row['<!-- user_user_fileuser_change_name_file -->'] == null)) {
	?>
                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>	
    <?php       }else{ ?>

                        <div><i class="icon-checkmark4 mr-3 icon-2x"></i></div>
                        <div><a href="<?php echo $RunLinkWeb->Call_link_web();?>/uploads/card/<?php echo $row['user_user_file']; ?>" target="_blank" title="แสดงข้อมูล"><i class="icon-file-pdf mr-3 icon-2x"></i></a></div>
    
    <?php       }
		    }else{ } ?>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $rowCou['course_name']; ?></div>
                        <div>ห้อง <?php echo $rowCou['course_detail_place']; ?></div>
                        <div><?php echo $rowCou['course_detail_date_start']; ?>-<?php echo $rowCou['course_detail_date_finnish']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo payment_status($row['user_cash']); ?></div>
    <?php
		  if(($row['user_slip'] == null)) { ?>
							<img class="img-responsive pic-bordered" style='width:80;height:60;' src="../../uploads/card/no-image-icon-0.jpg" alt="">
	<?php }else{ ?>
							<a href="../../uploads/card/<?php echo $row['user_slip']; ?>" target="_blank"><img alt="" class="img-responsive pic-bordered" style='width:40;height:30;' src="../../uploads/card/<?php echo $row['user_slip']; ?>" /></a>
    <?php } ?>
    <?php
		    if(($row['user_cash'] == 1)) { ?>
						    <div><?php echo substr($row['user_update'], 0, 10); ?></div>
	<?php	}elseif(($row['user_cash'] == 2)) { ?>
							<div><?php echo substr($row['user_date'], 0, 10); ?></div>
	<?php   } ?>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
	        if (($row['user_cash_number'] == null)) { ?>

                        <div>เลขที่ใบเสร็จ :</div>
														

															<!--<a href="ajax/get_addbill_user.php?id=<?php echo $user_idcode1; ?>" data-toggle="modal" data-id="<?php echo  $row['admin_id']; ?>" data-target="#AddBill" class="btn btn-sm purple" title="กรอกเลขที่ใบเสร็จ">
																<i class="fa fa-edit"></i> กรอกเลขที่ใบเสร็จ</a>-->




	<?php   } else { ?>

                        <div>เลขที่ใบเสร็จ :</div>
                        <div><?php echo $row['user_cash_number']; ?></div>
															
                        <!--เลขที่ใบเสร็จ :<br> <?php echo $row['user_cash_number']; ?> <a href="ajax/get_editbill_user.php?id=<?php echo $user_idcode1; ?>" data-toggle="modal" data-id="<?php echo  $row['admin_id']; ?>" data-target="#EditBill" class="btn btn-sm purple" title="แก้ไขเลขที่ใบเสร็จ">
																<i class="fa fa-edit"></i> </a>-->





	<?php  } ?>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        
                    </td>
                </tr>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php       $countA=$countA=1;
                }

            }else{}
    ?>

            </tbody>
        </table>
    </div>



<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }else{}
    }else{}
?>