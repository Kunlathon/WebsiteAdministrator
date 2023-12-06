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

<?php
    if(($_POST["category_key"]!=null)){

        $category_key=filter_input(INPUT_POST,'category_key');  

        $DocumentCategorySql="SELECT *
                      FROM `tb_document_category` 
                      WHERE `document_category_id`='{$category_key}';";
        $DocumentCategoryList=result_array($DocumentCategorySql);

        foreach($DocumentCategoryList as $key=>$DocumentCategoryRow){
            if((is_array($DocumentCategoryRow) && count($DocumentCategoryRow))){
                $txt_document_category_id=$DocumentCategoryRow["document_category_id"];
                $txt_document_category_name=$DocumentCategoryRow["document_category_name"];
                $txt_document_category_name_en=$DocumentCategoryRow["document_category_name_en"];
                $txt_document_category_name_cn=$DocumentCategoryRow["document_category_name_cn"];
            }else{
                $txt_document_category_id=null;
                $txt_document_category_name=null;
                $txt_document_category_name_en=null;
                $txt_document_category_name_cn=null;
            }
        }

    }else{}
?>

<div class="table-responsive">
        <table class="table table-bordered" id="datatable-button-html5-columns-STD" style="width: 100%;">
            <thead>
                <tr align="center">
                    <th>
                        <div>ลำดับ</div>
                    </th>
                    <th>
                        <div>เอกสาร</div>
                    </th>
                    <th>
                        <div>ประเภท</div>
                    </th>
                    <th>
                        <div>ไฟส์</div>
                    </th>
                    <th>
                        <div>วันที่</div>    
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
    <?php   
            $count=0;
            $document_sql = "SELECT * FROM `tb_document` WHERE `document_category_id`='{$txt_document_category_id}' ORDER BY `document_id` DESC";
            $document_list = result_array($document_sql);
            foreach ($document_list as $key => $document_row) { 
                $count=$count+1;
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $count;?></div>
                    </td>

                    <td style=" vertical-align: text-top;" class="align-top">
                        <div><?php echo $document_row["document_topic"];?></div>
                    </td>

                    <td align="center" style=" vertical-align: text-top;" class="align-top">

                        <div>
                            <span class="badge badge-info"><?php echo $txt_document_category_name;?></span>

                        </div>

                        <div>
    <?php
            if(($document_row["document_status"]==0)){ ?>
                            <span class="badge badge-danger">ไม่แสดง</span>
    <?php   }elseif(($document_row["document_status"]==1)){ ?>
                            <span class="badge badge-success">แสดง</span>
    <?php   }else{} ?>
                        </div>

                    </td>

                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div>
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a href="../../../uploads/document/<?php echo $document_row["document_file"];?>" target="_blank" ><button type="button"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="Document TH" data-placement="bottom"><i class="icon-folder-download2"></i></button></a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../../uploads/document/<?php echo $document_row["document_file_en"];?>" target="_blank" ><button type="button"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="Document EH" data-placement="bottom"><i class="icon-folder-download2"></i></button></a>                             
                                </li>
                                <li class="nav-item">
                                    <a href="../../../uploads/document/<?php echo $document_row["document_file_cn"];?>" target="_blank" ><button type="button"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="Document CH" data-placement="bottom"><i class="icon-folder-download2"></i></button></a>
                                </li>
                            </ul>
                        </div>
                    </td>



                    <td align="center" style=" vertical-align: text-top;" class="align-top">
    <?php
        if(($document_row["document_update_date"]!=null or $document_row["document_update_date"]!="0000-00-00 00:00:00")){
            $copy_document_update_time=new strto_datetime("datetime_th",$document_row["document_update_date"]); 
            $print_update_time=$copy_document_update_time->print_datetime();
        }else{
            $print_update_time=null;
        }
    ?>
                        <div><span class="badge badge-warning"><?php echo $print_update_time;?></span></div>

                    </td>

                    <td align="center" style=" vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="document_update<?php echo $document_row["document_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
    <input type="hidden" name="manage" value="edit"> 
    <input type="hidden" name="category_key" value="<?php echo $document_row["document_category_id"];?>">
    <input type="hidden" name="document_key" value="<?php echo $document_row["document_id"];?>">
    <input type="hidden" name="document_status" value="<?php echo $document_row["document_status"];?>">
    <button type="submit" name="button_<?php echo $document_row["document_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="delete_document_<?php echo $document_row["document_id"];?>" id="delete_document_<?php echo $document_row["document_id"];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
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
        $document_sql="SELECT * FROM `tb_document` WHERE `document_category_id`='{$txt_document_category_id}' ORDER BY `document_id` DESC";
        $document_list = result_array($document_sql);
        
        foreach ($document_list as $key => $document_row) { 
            if((is_array($document_row) && count($document_row))){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
            var document_id="<?php echo $document_row["document_id"];?>";
            var copy_file_nameTh="<?php echo $document_row["document_file"];?>";
            var copy_file_nameEn="<?php echo $document_row["document_file_en"];?>";
            var copy_file_nameCn="<?php echo $document_row["document_file_cn"];?>";

            var action="delete";
            var action_error="error";
            var document_id_error="error";
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

            $('#delete_document_<?php echo $document_row["document_id"];?>').on('click', function() {
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

                        if(document_id==""){
                            swalInitDeteleImageData.fire({
                                title: 'คีย์ว่าง ไม่สามารถดำเนินการลบได้',
                                icon: 'error'
                            });
                            document_id_error="error";
                        }else{
                            document_id_error="no_error";
                        }

                        if(action_error=="no_error" && document_id_error=="no_error"){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/document/document_process.php",{
                                action:action,
                                document_id:document_id,
                                copy_file_nameTh:copy_file_nameTh,
                                copy_file_nameEn:copy_file_nameEn,
                                copy_file_nameCn:copy_file_nameCn
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=document";
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