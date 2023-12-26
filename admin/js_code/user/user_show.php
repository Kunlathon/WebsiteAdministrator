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
                        <div>ชื่อ - สกุล</div>
                    </th>
                    <th>
                        <div>ชื่อผู้ใช้</div>
                    </th>
                    <th>
                        <div>เบอร์โทร</div>
                    </th>
                    <th>
                        <div>อีเมล</div>
                    </th>
                    <th>
                        <div>สิทธิ์</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
    
    <?php
            $sql = "SELECT * FROM tb_admin WHERE (admin_username!='snaper') ORDER BY admin_name ASC";
            $list = result_array($sql);
            foreach ($list as $key => $row) { ?>

                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $key + 1; ?></div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div>
        <?php
			if (($row['admin_name'] != null and $row['admin_lastname'] == null)) {
				$myname_admin=$row['admin_name'];
		    }elseif($row['admin_name'] == null and $row['admin_lastname'] != null){
                $myname_admin=$row['admin_name'];
            }elseif(($row['admin_name'] != null and $row['admin_lastname'] != null)){
                $myname_admin=$row['admin_name']."&nbsp;".$row['admin_lastname'];
            }else{
                $myname_admin=null;
			}

		?>
                            <?php echo $myname_admin;?>
                        </div>
                    </td>
                    <td align="left" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['admin_username']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['admin_tel']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo  $row['admin_email']; ?></div>
                    </td>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div class="badge badge-teal"><?php echo  admin_status($row['admin_status']); ?></div>
                    </td>
                    <td align="center" style="width: 15%; vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="form_user_list<?php echo $row["admin_id"];?>" accept-charset="utf-8" method="POST" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user">
                                    <button type="submit" name="submit_list<?php echo $row["admin_id"];?>" id="submit_list<?php echo $row["admin_id"];?>" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom"><i class="icon-search4"></i></button>
                                    <input name="manage"  type="hidden" value="list">
                                    <input name="news_key" type="hidden" value="<?php echo $row["admin_id"];?>">
</form>
                                <li>
                                <li class="nav-item">
<form name="form_user_update<?php echo $row["admin_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=user">
    <input type="hidden" name="manage" value="edit"> 
    <input type="hidden" name="admin_id" value="<?php echo $row["admin_id"];?>">
    <button type="submit" name="button_<?php echo $row["admin_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="form_user_delete<?php echo $row["admin_id"];?>" data-toggle="modal" data-target="#form_user_delete<?php echo $row["admin_id"];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <!--Delete-->
                <div id="form_user_delete<?php echo $row["admin_id"];?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                            </div>

                            <div class="modal-body">
                                <form name="user-form-delete" id="user-form-delete" method="post" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <div class="row" style="text-align: center;">
                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                    ต้องการลบข้อมูล <?php echo $myname_admin; ?> หรือไม่
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row" style="text-align: center;">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <button type="button" data-dismiss="modal" id="delete_<?php echo $row['admin_id']; ?>" name="delete_<?php echo $row['admin_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['admin_id']; ?>">ใช้</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Delete End-->
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <!--Delete-->
                <script>
                    $(document).ready(function() {
                        // Defaults
                        var swalInitDeleteUser = swal.mixin({
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-primary',
                                cancelButton: 'btn btn-light',
                                denyButton: 'btn btn-light',
                                input: 'form-control'
                            }
                        });
                        // Defaults End

                        $('#delete_<?php echo $row['admin_id']; ?>').on('click', function() {

                            var action = "delete";
                            var table = "tb_admin";
                            var ff = "admin_id";
                            var admin_id = $("#delete_<?php echo $row['admin_id']; ?>").val();;

                            if (action == "") {
                                swalInitDeleteUser.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon: 'error'
                                });
                            } else {

                                if (admin_id != "") {
                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/user/user_process.php", {
                                        action: action,
                                        table: table,
                                        ff: ff,
                                        admin_id: admin_id
                                    }, function(process_add) {
                                        var process_add = process_add;
                                        if (process_add.trim() === "NotError") {

                                            let timerInterval;
                                            swalInitDeleteUser.fire({
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
                                                            const b_user = content.querySelector('b_user')
                                                            if (b_user) {
                                                                b_user.textContent = Swal.getTimerLeft();
                                                            } else {}
                                                        } else {}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function(result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=user";
                                                } else {}
                                            });

                                        } else if (process_add.trim() === "Error") {
                                            swalInitDeleteUser.fire({
                                                title: 'ลบไม่สำเร็จ',
                                                icon: 'error'
                                            });
                                        } else {
                                            swalInitDeleteUser.fire({
                                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                text: process_add.trim(),
                                                icon: 'error'
                                            });
                                        }
                                    })

                                } else {}

                            }
                        });

                    })
                </script>
                <!--Delete end-->
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <?php   } ?>

            <tbody>
        </table>
    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}
    }else{}
?>
