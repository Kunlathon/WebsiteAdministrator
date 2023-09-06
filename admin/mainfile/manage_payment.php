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

error_reporting(E_ALL ^ E_NOTICE);

?>

<?php
    if ((preg_match("/manage_payment.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="#" class="breadcrumb-item"> จัดการการชำระเงิน</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลภาคเรียน</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

    <?php

        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST,'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET,'manage');
            }else{
                $manage="-";
            }
        }
    

            if(($manage=="form_edit")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php


            if((isset($_POST["payment_key"]))){
                $payment_key=filter_input(INPUT_POST,'payment_key');
            }else{
                if((isset($_GET["list"]))){
                    $payment_key=filter_input(INPUT_GET,'list');
                }else{}
            }

            if((isset($payment_key))){ 
                
                $sql = "SELECT * 
                FROM `tb_payment` 
                WHERE `payment_id` = '{$payment_key}'";
                $row = row_array($sql); 
                
                $sqlT = "SELECT * 
                        FROM  `tb_term` 
                        WHERE `term_id` = '{$row["term_id"]}'";
                $rowT = row_array($sqlT);

                $sqlG = "SELECT * 
                        FROM `tb_grade` 
                        WHERE `grade_id` = '{$row["grade_id"]}'";
                $rowG = row_array($sqlG);
                
                ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขการชำระเงิน</div>
                            <div class="col-<?php echo $grid; ?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
<form name="form_list" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment">
                                                <button type="submit"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button> 
    <input type="hidden" name="manage"  value="show"> 
    <input type="hidden" name="list"  value="<?php echo $row["grade_id"]; ?>">                                       
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
<form name="manage_payment_up" id="manage_payment_up" accept-charset="utf-8" method="post">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ปีการศึกษา</label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <div><?php echo $rowT['term']; ?>/<?php echo $rowT['year']; ?></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น </label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <div><?php echo $rowG['grade_name'];?></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">คะแนนครํ้งที่ 1 <font style="color: red;">*</font></label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <select class="form-control select" data-fouc name="payment_score1" id="payment_score1">
                                                            <optgroup label="เปิด-ปิด คะแนนครํ้งที่ 1">
                                                                <option <?php echo $row['payment_score1']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																<option <?php echo $row['payment_score1']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
                                                            </optgroup>
										                </select>
                                                        <div id="payment_score1-update"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">คะแนนครํ้งที่ 2 <font style="color: red;">*</font></label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <select class="form-control select" data-fouc name="payment_score2" id="payment_score2">
                                                            <optgroup label="เปิด-ปิด คะแนนครํ้งที่ 2">
                                                                <option <?php echo $row['payment_score2']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																<option <?php echo $row['payment_score2']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
                                                            </optgroup>
										                </select>
                                                        <div id="payment_score2-update"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ผลสัมฤทธิ์ <font style="color: red;">*</font></label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <select class="form-control select" data-fouc name="payment_score3" id="payment_score3">
                                                            <optgroup label="เปิด-ปิด ผลสัมฤทธิ์">
                                                                <option <?php echo $row['payment_score3']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																<option <?php echo $row['payment_score3']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
                                                            </optgroup>
										                </select>
                                                        <div id="payment_score3-update"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">GPA <font style="color: red;">*</font></label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <select class="form-control select" data-fouc name="payment_score4" id="payment_score4">
                                                            <optgroup label="เปิด-ปิด GPA">
                                                                <option <?php echo $row['payment_score4']== 1 ? "selected":""; ?> value="1">เปิดการใช้งาน</option>
																<option <?php echo $row['payment_score4']== 0 ? "selected":""; ?> value="0">ปิดการใช้งาน</option>
                                                            </optgroup>
										                </select>
                                                        <div id="payment_score4-update"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div> 
                                    
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <button type="button" name="Add_Manage_Payment" id="Add_Manage_Payment" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

    <input type="hidden" name="payment_key" id="payment_key" value="<?php echo $payment_key; ?>">
	<input type="hidden" name="term" id="term" value="<?php echo $row['term_id']; ?>">
	<input type="hidden" name="grade" id="grade" value="<?php echo $row['grade_id']; ?>">                                

</from>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }elseif($manage=="show"){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<?php


            if((isset($_POST["list"]))){
                $check_grade=filter_input(INPUT_POST,'list');
            }else{
                if((isset($_GET["list"]))){
                    $check_grade=base64_decode(filter_input(INPUT_GET,'list'));
                }else{}
            }

            if((is_numeric($check_grade))){ ?>

<?php
                $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                              FROM `tb_grade` 
                              WHERE `grade_id`='{$check_grade}'";
                $class_Row = result_array($class_Sql);
                $class_gn=$class_Row["grade_name"];
?>

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
<form name="form_list" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment">
                                    <button type="submit"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button> 
    <input type="hidden" name="manage"  value="show"> 
    <input type="hidden" name="list"  value="<?php echo $check_grade; ?>">                                       
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
<form name="form_mp"  method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment">
                                                        <button type="submit" name="button_show"  class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>

    <input type="hidden" name="manage" id="manage" value="form_edit">
    <input type="hidden" name="payment_key" id="payment_key" value="<?php echo $row['payment_id'];?>">



</form>                                             </li>
                                                    <li class="nav-item">
<form name="" >
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

                                                                    var list=btoa(grade_key);

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
                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment&manage=show&list="+list;
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

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">

            <?php
                $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                            FROM `tb_grade` 
                            ORDER BY `grade_id` ASC";
                $class_Row = result_array($class_Sql);

                $count_color=0;
                $bg_color=array("bg-primary","bg-success","bg-info");

                foreach ($class_Row as $key => $class_Print){

                    if ((is_array($class_Print) && count($class_Print))) { ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        
                            <div class="col-<?php echo $grid; ?>-4">
            <form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment">
                                <button type="submit" class="card card-body <?php echo $bg_color[$count_color];?> btn-block text-white has-bg-image btn-float m-0">
                                    <div class="media">
                                        <div class="mr-3 align-self-center">
                                            <i class="icon-graduation2 icon-3x opacity-75"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h3 class="mb-0">ระดับชั้น<?php echo $class_Print["grade_name"]; ?>&nbsp;</h3>
                                            <span class="text-uppercase font-size-xs"><?php echo $class_Print["grade_name_eng"];?>&nbsp;</span>
                                        </div>
                                    </div>
                                </button>
            <input name="list"  type="hidden" value="<?php echo $class_Print['grade_id']; ?>">
            <input name="manage"  type="hidden" value="show" >
            </form>
                            </div>
                            
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php
                    $count_color=$count_color+1;
                        if(($count_color=="3")){
                            $count_color=0;
                        }else{}

                }else{}
                }
            ?>


            </div> 
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>


        </div>
<?php   }else{}
    }
?>