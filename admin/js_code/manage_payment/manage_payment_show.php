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
    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");

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
    if(($width_system >= 1200)) {
        $grid = "xl";
    }elseif(($width_system >= 992)) {
        $grid = "lg";
    }elseif(($width_system <= 768)) {
        $grid = "md";
    }elseif(($width_system <= 576)) {
        $grid = "sm";
    }else{
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

    <?php
        $check_grade=filter_input(INPUT_POST,'class_id');
        $class_gn=filter_input(INPUT_POST,'class_gn');
            if((is_numeric($check_grade))){ ?>

<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">
            <div class="card-header header-elements-inline bg-info text-white">
                <div class="col-<?php echo $grid; ?>-6">ข้อมูลห้องเรียน <?php echo $class_gn;?></div>
                <div class="col-<?php echo $grid; ?>-6">
                    <table align="right">
                        <tr>
                            <td>
                                <div>
    <form name="" >
                                    <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>    
    </form>                                                
                                </div>
                            </td>
                        </tr>
                    </table>            
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable-button-html5-columns-STD">
                                <thead>
                                    <tr align="center">
                                        <th align="center"><div>ลำดับ</div></th>
                                        <th><div>ภาคเรียน</div></th>
                                        <th><div>คะแนนครั้งที่ 1 </div></th>
                                        <th><div>คะแนนครั้งที่ 2 </div></th>
                                        <th><div>ผลสัมฤทธิ์ </div></th>
                                        <th><div>GPA</div></th>
                                        <th><div>จัดการ</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
    <?php 
        $sql = "SELECT * 
                FROM tb_payment 
                WHERE grade_id = '{$check_grade}' 
                ORDER BY payment_id DESC";
        $list = result_array($sql);
        $count=1;
        foreach ($list as $key => $row){ 
            
            $sqlT = "SELECT * 
                     FROM  tb_term 
                     WHERE term_id = '{$row["term_id"]}'";
            $rowT = row_array($sqlT);
            
            if(($row['payment_score1']==0)) {
                $payment_score1_txt='<span class="badge badge-danger">ปิดการใช้งาน</span>';      
            }elseif(($row['payment_score1']==1)) {
                $payment_score1_txt='<span class="badge badge-purple">เปิดใช้งาน</span>';   
            }else{
                $payment_score1_txt="-";
            }

            if(($row['payment_score2']==0)) {
                $payment_score2_txt='<span class="badge badge-danger">ปิดการใช้งาน</span>';      
            }elseif(($row['payment_score2']==1)) {
                $payment_score2_txt='<span class="badge badge-purple">เปิดใช้งาน</span>';   
            }else{
                $payment_score2_txt="-";
            }

            if(($row['payment_score3']==0)) {
                $payment_score3_txt='<span class="badge badge-danger">ปิดการใช้งาน</span>';      
            }elseif(($row['payment_score3']==1)) {
                $payment_score3_txt='<span class="badge badge-purple">เปิดใช้งาน</span>';   
            }else{
                $payment_score3_txt="-";
            }

            if(($row['payment_score4']==0)) {
                $payment_score4_txt='<span class="badge badge-danger">ปิดการใช้งาน</span>';      
            }elseif(($row['payment_score4']==1)) {
                $payment_score4_txt='<span class="badge badge-purple">เปิดใช้งาน</span>';   
            }else{
                $payment_score4_txt="-";
            }

            ?>


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                    <tr>
                                        <td align="center"><?php echo $count;?></div></td>
                                        <td><div><?php echo "ภาคการศึกษาที่&nbsp;".$rowT["term"]."&nbsp;ปีการศึกษา&nbsp;".$rowT["year"];?></div></td>
                                        <td><div><?php echo $payment_score1_txt;?></div></td>
                                        <td><div><?php echo $payment_score2_txt;?></div></td>
                                        <td><div><?php echo $payment_score3_txt;?></div></td>
                                        <td><div><?php echo $payment_score4_txt;?></div></td>
                                        <td align="center">
                                            <div>
                                                <ul class="nav justify-content-center">
                                                    <li class="nav-item">
<form name="" id="" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment">
                                                        <button type="submit" name="button_show"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>

    <input type="hidden" name="manage" id="manage" value="form_edit">
    <input type="hidden" name="payment_key" id="payment_key" value="<?php echo $row['payment_id'];?>">



</form>                                             </li>
                                                    <li class="nav-item">
<form>
                                                        <button type="button" name="delete_<?php echo $row["payment_id"]; ?>" data-toggle="modal" data-target="#modal_manage_payment_Delete<?php echo $row['payment_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
</form>
                                                    </li>       
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <!-- /dangermodal -->
                    <div id="modal_manage_payment_Delete<?php echo $row["payment_id"]; ?>" class="modal fade" tabindex="-1">
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
                                                        ต้องการลบข้อมูลระดับชั้น <?php echo $row["classroom_name"]; ?> หรือไม่
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row" style="text-align: center;">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <button type="button" id="delete_<?php echo $row["payment_id"]; ?>" name="delete_<?php echo $row["payment_id"]; ?>" class="btn btn-outline-success" value="<?php echo $row['payment_id']; ?>">ใช่</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                    </div>
                                                </div>
                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                <!--Delete-->
                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                <!--Delete-->
                                                <script>
                                                    $(document).ready(function() {
                                                        // Defaults
                                                        var swalInitDeleteGradeData = swal.mixin({
                                                            buttonsStyling: false,
                                                            customClass: {
                                                                confirmButton: 'btn btn-primary',
                                                                cancelButton: 'btn btn-light',
                                                                denyButton: 'btn btn-light',
                                                                input: 'form-control'
                                                            }
                                                        });
                                                        // Defaults End        
                                                        $('#delete_<?php echo $row["payment_id"]; ?>').on('click', function() {

                                                            //var subject_code="<?php //echo $row['subject_code']; 
                                                                                ?>";
                                                            //var check_grade = "<?php //echo $check_grade; 
                                                                                    ?>";
                                                            var payment_key = $("#delete_<?php echo $row['payment_id']; ?>").val();
                                                            var table = "tb_payment";
                                                            var ff = "payment_id";
                                                            var action = "delete";
                                                            var grade_key = "<?php echo $grade_key; ?>";
                                                            //var id_key = btoa(check_grade);

                                                            if (action == "") {
                                                                swalInitDeleteGradeData.fire({
                                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                    icon: 'error'
                                                                });
                                                            } else {

                                                                if (payment_key != "") {

                                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/manage_payment/manage_payment_process.php", {
                                                                        action: action,
                                                                        payment_key: payment_key,
                                                                        table: table,
                                                                        ff: ff
                                                                    }, function(manage_payment_add) {
                                                                        var manage_payment_add = manage_payment_add;
                                                                        if (manage_payment_add.trim() === "no_error") {

                                                                            let timerInterval;
                                                                            swalInitDeleteGradeData.fire({
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
                                                                                            const b_grade_classroom_data = content.querySelector('b_grade_classroom_data')
                                                                                            if (b_grade_classroom_data) {
                                                                                                b_grade_classroom_data.textContent = Swal.getTimerLeft();
                                                                                            } else {}
                                                                                        } else {}
                                                                                    }, 100);
                                                                                },
                                                                                willClose: function() {
                                                                                    clearInterval(timerInterval)
                                                                                }
                                                                            }).then(function(result) {
                                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment";
                                                                                } else {}
                                                                            });

                                                                        } else if (manage_payment_add.trim() === "it_error") {
                                                                            swalInitDeleteGradeData.fire({
                                                                                title: 'ข้อมูลซ้ำ',
                                                                                icon: 'error'
                                                                            });
                                                                        } else {
                                                                            swalInitDeleteGradeData.fire({
                                                                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                                text:''+manage_payment_add.trim(),
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <?php  
    $count=$count+1;
        } ?>

                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <?php   }else{} ?>