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
                        <div>วิดีโอ</div>
                    </th>
                    <th>
                        <div>เนื้อหาวิดีโอ</div>
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
            $video_sql = "SELECT * FROM `tb_videos`  ORDER BY `videos_id` DESC";
            $video_list = result_array($video_sql);
            foreach ($video_list as $key => $video_row) { 
                if((isset($video_row["video_image"]))){
                    $videoimg_name=$video_row["video_image"];
                }else{
                    $videoimg_name=null;
                }
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td align="center" style="vertical-align: text-top;" class="align-top">
                        <div><?php echo $key+1;?></div>
                    </td>
                    <td style="width: 45%; vertical-align: text-top;" class="align-top">
                        <div>
                            <div class="card">

								<div class="card-body">
									<div class="embed-responsive embed-responsive-16by9">
                                        <?php echo $video_row["videos_youtube"];?>
									</div>
								</div>            

								<div class="card-header">
									<div><?php echo $video_row["videos_topic"];?></div>
								</div>

							</div>
                        </div>
                    </td>

                    <td align="center" style="width: 35%; vertical-align: text-top;" class="align-top">
                        <div><?php echo $video_row["videos_detail"];?></div>
                    </td>

                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">
    <?php
        if(($video_row["videos_post_date"]!=null or $video_row["videos_post_date"]!="0000-00-00 00:00:00")){ 
            $copy_videos_post_date=new strto_datetime("datetime_th",$video_row["videos_post_date"]);
            $print_post_date=$copy_videos_post_date->print_datetime();
        }else{
            $print_post_date=null;
        }
    ?>
                        <div>วันที่ลง&nbsp;:&nbsp;<span class="badge badge-primary"><?php echo $print_post_date;?></span></div>

						<br>

    <?php
        if(($video_row["videos_update_date"]!=null or $video_row["videos_update_date"]!="0000-00-00 00:00:00")){ 
            $copy_videos_update_date=new strto_datetime("datetime_th",$video_row["videos_update_date"]);
            $print_update_date=$copy_videos_update_date->print_datetime();
        }else{
            $print_update_date=null;
        }
    ?>    
                    
                        <div>วันที่ปรับปรุง&nbsp;:&nbsp;<span class="badge badge-warning"><?php echo $print_update_date;?></span></div>
                    </td>

                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">
                        <div>
    <?php
            if(($video_row["videos_status"]==0)){ ?>
                            <span class="badge badge-danger">ไม่แสดง</span>
    <?php   }elseif(($video_row["videos_status"]==1)){ ?>
                            <span class="badge badge-success">แสดง</span>
    <?php   }else{} ?>
                        </div>
                    </td>
                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="video_update<?php echo $video_row["videos_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video">
    <input type="hidden" name="manage" value="edit"> 
    <input type="hidden" name="videos_id" value="<?php echo $video_row["videos_id"];?>">
    <button type="submit" name="button_<?php echo $video_row["videos_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="Delete_Student_Data" id="delete_video_<?php echo $video_row["videos_id"];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
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
        $video_sql="SELECT * FROM `tb_videos`  ORDER BY `videos_id` DESC";
        $video_list = result_array($video_sql);
        
        foreach ($video_list as $key => $video_row) { 
            if((is_array($video_row) && count($video_row))){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
            var videos_id="<?php echo $video_row["videos_id"];?>";
            var action="delete";
            var action_error="error";
            var videos_id_error="error";
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

            $('#delete_video_<?php echo $video_row["videos_id"];?>').on('click', function() {
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

                        if (action==="") {
                            swalInitDeteleImageData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                            action_error="error";
                        }else{
                            action_error="no_error";
                        }

                        if(videos_id==""){
                            swalInitDeteleImageData.fire({
                                title: 'คีย์ว่าง ไม่สามารถดำเนินการลบได้',
                                icon: 'error'
                            });
                            videos_id_error="error";
                        }else{
                            videos_id_error="no_error";
                        }

                        if(action_error=="no_error" && videos_id_error=="no_error"){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/manage_video/manage_video_process.php",{
                                action:action,
                                videos_id:videos_id
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
                                                        const b_manage_video = content.querySelector('b_manage_video')
                                                        if (b_manage_video) {
                                                            b_manage_video.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video";
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