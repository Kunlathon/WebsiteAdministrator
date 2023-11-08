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
    $(document).ready(function() {

        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>ค้นหา:</span> _INPUT_',
                searchPlaceholder: 'พิมพ์เพื่อค้นหา...',
                lengthMenu: '<span>แสดง:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            }
        });

        $('#datatable-button-html5-columns-STD').DataTable({
            processing: true,

            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "paging"       :    true,
            "lengthChange" :    false,
            "searching"    :    true,
            "ordering"     :    false,
            "info"         :    true,
            "autowidth"    :    false
        });

    })
</script>

    <div class="table-responsive">
        <table class="table table-bordered" id="datatable-button-html5-columns-STD">
            <thead>
                <tr align="center">
                    <th>
                        <div>#</div>
                    </th>
                    <th>
                        <div>ภาพ</div>
                    </th>
                    <th>
                        <div>หัวข้อเรื่อง</div>
                    </th>
                    <th>
                        <div>วันที่</div>
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
            $slide_sql = "SELECT * 
                          FROM `tb_slide`
                          ORDER BY `slide_id` ASC";
            $slide_list = result_array($slide_sql);
            foreach ($slide_list as $key => $slide_row) { 
                if((isset($slide_row["slide_image"]))){
                    $slideimg_name=$slide_row["slide_image"];
                }else{
                    $slideimg_name=null;
                }
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td align="center" style="vertical-align: text-top;" class="align-top">
                        <div><?php echo $key+1;?></div>
                    </td>

                    <td align="center" style="vertical-align: text-top;" class="align-top">
    <?php
            if((isset($slideimg_name))){
                if(file_exists("../../../uploads/slides/".$slideimg_name)){ ?>
                        <div><img src="../uploads/slides/<?php echo $slideimg_name;?>" class="img-thumbnail" alt="<?php echo $slideimg_name;?>" style="width:304px; height:236px;"></div>
    <?php       }else{ ?>
                        <div><img src="../uploads/slides/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:304px; height:236px;"></div>
    <?php       }
            }else{ ?>
                        <div><img src="../uploads/slides/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:304px; height:236px;"></div>
    <?php   } ?>

                    </td>

                    <td style="vertical-align: text-top;" class="align-top">
                        <div><?php echo $slide_row["slide_topic"];?></div>
                    </td>

                    <td align="center" style="vertical-align: text-top;" class="align-top">
					วันที่ลง&nbsp;:&nbsp;
					<?php
							if((isset($slide_row["slide_post_date"]))){
								if((($slide_row["slide_post_date"]!="0000-00-00 00:00:00" OR $slide_row["slide_post_date"]!=null))){ 
									$print_post_date=new strto_datetime("datetime_th",$slide_row["slide_post_date"]);
					?>
										<div><span class="badge badge-primary"><?php echo $print_post_date->print_datetime();?></span></div>
					<?php       }else{}
							}else{}
					?>
					<br>
					วันที่ปรับปรุง&nbsp;:&nbsp;

					<?php
							if((isset($slide_row["slide_update_date"]))){
								if((($slide_row["slide_update_date"]!="0000-00-00 00:00:00" OR $slide_row["slide_update_date"]!=""))){ 
									$print_update_date=new strto_datetime("datetime_th",$slide_row["slide_update_date"]);                
					?>
										<div><span class="badge badge-warning"><?php echo $print_update_date->print_datetime();?></span></div>
					<?php       }else{}
							}else{}
					?>
                    </td>
                    <td align="center" style="vertical-align: text-top;" class="align-top">
                        <div>
					<?php
							if(($slide_row["slide_status"]==0)){ ?>
											<span class="badge badge-danger">ไม่แสดง</span>
					<?php   }elseif(($slide_row["slide_status"]==1)){ ?>
											<span class="badge badge-success">แสดง</span>
					<?php   }else{} ?>
                        </div>
                    </td>
                    <td align="center" style="vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
									<form name="slide_update<?php echo $slide_row["slide_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
										<input type="hidden" name="manage" value="edit"> 
										<input type="hidden" name="slide_id" value="<?php echo $slide_row["slide_id"];?>">
										<button type="submit" name="button_<?php echo $slide_row["slide_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
									</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="Delete_Student_Data" id="delete_slide_<?php echo $slide_row["slide_id"];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
            </tbody>
        </table>
    </div>


    <?php
        $slide_sql="SELECT * 
                    FROM `tb_slide`
                    ORDER BY `slide_id` ASC";
        $slide_list = result_array($slide_sql);
        foreach ($slide_list as $key => $slide_row) { 
            if((is_array($slide_row) && count($slide_row))){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
            var slide_id="<?php echo $slide_row["slide_id"];?>";
            var action="delete";
            var action_error="error";
            var slide_id_error="error";
            var copy_slide_image="<?php echo $slide_row["slide_image"];?>";
// Defaults
            var swalInitDeteleImageData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
// Defaults End

            $('#delete_slide_<?php echo $slide_row["slide_id"];?>').on('click', function() {
                swalInitDeteleImageData.fire({
                    title: 'ต้องการลบข้อมูลหรือไม่',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: 'ไม่',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    }
                }).then(function(result) {
                    if(result.value){

                        if (action=="") {
                            swalInitDeteleImageData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                            action_error="error";
                        }else{
                            action_error="no_error";
                        }

                        if(slide_id==""){
                            swalInitDeteleImageData.fire({
                                title: 'คีย์ว่าง ไม่สามารถดำเนินการลบได้',
                                icon: 'error'
                            });
                            slide_id_error="error";
                        }else{
                            slide_id_error="no_error";
                        }

                        if(action_error=="no_error" && slide_id_error=="no_error"){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/image_slide/image_slide_process.php",{
                                action:action,
                                slide_id:slide_id,
                                copy_slide_image:copy_slide_image
                            },function(process_delete){
                                var process_delete = process_delete.trim();
                                if (process_delete === "no_error"){

                                    let timerInterval;
                                        swalInitDeteleImageData.fire({
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
                                                        const b_image_slide = content.querySelector('b_image_slide')
                                                        if (b_image_slide) {
                                                            b_image_slide.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide";
                                            } else {}
                                        });

                                }else if(process_delete === "it_error"){
                                    swalInitDeteleImageData.fire({
                                            title: 'ลบไม่สำเร็จ',
                                            icon: 'error'
                                    });
                                }else{
                                    swalInitDeteleImageData.fire({
                                            title: 'พบข้อผิดพลาด',
                                            text: process_delete,
                                            icon: 'error'
                                    });
                                }
                            })
                        }else{}

                    }else if (result.dismiss === swal.DismissReason.cancel){

                    }else{

                    }
                });
            });
        })
    </script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}
        } ?>