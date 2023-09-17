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
            "searching"    :    false,
            "ordering"     :    false,
            "info"         :    true,
            "autowidth"    :    false
        });

    })
</script>

<div class="table-responsive">
        <table class="table table-bordered" id="datatable-button-html5-columns-STD" style="width: 100%;">
            <thead>
                <tr align="center">
                    <th>
                        <div>ข่าว</div>
                    </th>
                    <th>
                        <div>เนื้อหาข่าว</div>
                    </th>
                    <th>
                        <div>วันที่อัพโหลด</div>
                    </th>
                    <th>
                        <div>วันที่แก้ไข</div>
                    </th>
                    <th>
                        <div>ประเภทข่าว / </div>    
                        <div>สถานะ</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
    <?php
            $news_sql = "SELECT * FROM `tb_news` WHERE `news_category_id`='1' ORDER BY `news_id` DESC";
            $news_list = result_array($news_sql);
            foreach ($news_list as $key => $news_row) { 
                if((isset($news_row["news_image0"]))){
                    $newsimg_name=$news_row["news_image0"];
                }else{
                    $newsimg_name=null;
                }

                $NewsCategorySql="SELECT `news_category_name` 
                                  FROM `tb_news_category` 
                                  WHERE`news_category_id`='{$news_row["news_category_id"]}';";
                $NewsCategoryList=result_array($NewsCategorySql);
                foreach($NewsCategoryList as $key=>$NewCategoryRow){
                    $news_category=$NewCategoryRow["news_category_name"];
                }
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td style="width: 40%; vertical-align: text-top;" class="align-top">
                        <div>
                            <div class="card">

								<div class="card-body">
									
    <?php
            if((($newsimg_name!=null))){
                if(file_exists("../../../dist/img/news/".$newsimg_name)){ ?>
                        <div><img src="../dist/img/news/<?php echo $newsimg_name;?>" class="img-thumbnail" alt="<?php echo $newsimg_name;?>" style="width:304px; height:236px;"></div>
    <?php       }else{ ?>
                        <div><img src="../dist/img/news/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:304px; height:236px;"></div>
    <?php       }
            }else{ ?>
                        <div><img src="../dist/img/news/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:304px; height:236px;"></div>
    <?php   } ?>
									
								</div>            

								<div class="card-header">
									<div><?php echo $news_row["news_topic"];?></div>
								</div>

							</div>
                        </div>
                    </td>

                    <td align="center" style="width: 40%; vertical-align: text-top;" class="align-top">
                        <div><?php echo $news_row["news_detail_1"];?></div>
                    </td>

                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">
   
    <?php
        if(($news_row["news_post_date"]!=null or $news_row["news_post_date"]!="0000-00-00 00:00:00")){
            $copy_news_post_time=new strto_datetime("datetime_th",$news_row["news_post_date"]); 
            $print_post_time=$copy_news_post_time->print_datetime();
        }else{
            $print_post_time=null;
        }
    ?>
                        <div><span class="badge badge-warning"><?php echo $print_post_time;?></span></div>

                    </td>

                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">
    <?php
        if(($news_row["news_update_date"]!=null or $news_row["news_update_date"]!="0000-00-00 00:00:00")){
            $copy_news_update_time=new strto_datetime("datetime_th",$news_row["news_update_date"]); 
            $print_update_time=$copy_news_update_time->print_datetime();
        }else{
            $print_update_time=null;
        }
    ?>
                        <div><span class="badge badge-warning"><?php echo $print_update_time;?></span></div>

                    </td>

                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">

                        <div>
    <?php
            if(($news_category!=null)){ ?>
                            <span class="badge badge-info"><?php echo $news_category?></span>
    <?php    }else{} ?>
                        </div>

                        <div>
    <?php
            if(($news_row["news_status"]==0)){ ?>
                            <span class="badge badge-danger">ไม่แสดง</span>
    <?php   }elseif(($news_row["news_status"]==1)){ ?>
                            <span class="badge badge-success">แสดง</span>
    <?php   }else{} ?>
                        </div>

                    </td>
                    <td align="center" style="width: 5%; vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="news_update<?php echo $news_row["news_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=announcemen_news">
    <input type="hidden" name="manage" value="edit"> 
    <input type="hidden" name="news_id" value="<?php echo $news_row["news_id"];?>">
    <button type="submit" name="button_<?php echo $news_row["news_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="delete_news_<?php echo $news_row["news_id"];?>" id="delete_news_<?php echo $news_row["news_id"];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
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
        $news_sql="SELECT * FROM `tb_news`  WHERE `news_category_id`='1' ORDER BY `news_id` DESC";
        $news_list = result_array($news_sql);
        
        foreach ($news_list as $key => $news_row) { 
            if((is_array($news_row) && count($news_row))){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
            var news_id="<?php echo $news_row["news_id"];?>";
            var action="delete";
            var action_error="error";
            var news_id_error="error";
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

            $('#delete_news_<?php echo $news_row["news_id"];?>').on('click', function() {
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

                        if(news_id==""){
                            swalInitDeteleImageData.fire({
                                title: 'คีย์ว่าง ไม่สามารถดำเนินการลบได้',
                                icon: 'error'
                            });
                            news_id_error="error";
                        }else{
                            news_id_error="no_error";
                        }

                        if(action_error=="no_error" && news_id_error=="no_error"){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/announcemen_news/announcemen_news_process.php",{
                                action:action,
                                news_id:news_id
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=announcemen_news";
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