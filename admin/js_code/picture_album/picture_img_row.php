
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

    $RunLinkWeb=new link_web();

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

        const lightbox = GLightbox({
            selector: '[data-popup="lightbox"]',
            loop: true,
            svg: {
                next: document.dir == "rtl" ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>' : '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"> <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>',
                prev: document.dir == "rtl" ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>' : '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>'
            }
        });

     })
</script>


    <?php
            if((isset($_POST["gallery_key"]))){
                $picture_album_id=filter_input(INPUT_POST, 'gallery_key');
                $gallery_folder=filter_input(INPUT_POST, 'gallery_folder');
                
                ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                            <div class="row">

<?php
        $picture_sql = "SELECT * FROM `tb_picture` WHERE `gallery_id`='{$picture_album_id}'";
        $picture_list = result_array($picture_sql);
        foreach ($picture_list as $key => $picture_row) { 

            if((isset($picture_row["picture_id"]))){
                $picture_id=$picture_row["picture_id"];
            }else{
                $picture_id=null;
            }
            
            if((isset($picture_row["picture_name"]))){
                $picture_name=$picture_row["picture_name"];
            }else{
                $picture_name=null;
            }

            ?>

                                
                                    <div class="col-<?php echo $grid;?>-3">
                                
                                        <div class="card">
                                            <div class="card-img-actions mx-1 mt-1">

    <?php
            if(($picture_name!=null)){
                if((file_exists("../../../uploads/gallery/".$gallery_folder."/".$picture_name))){ ?>

                                                <img class="card-img img-fluid" src="<?php echo $RunLinkWeb->Call_link_web();?>/uploads/gallery/<?php echo $gallery_folder;?>/<?php echo $picture_name;?>" style="width: 100%; height: 236px;" alt="<?php echo $picture_name;?>">
                                                <div class="card-img-actions-overlay card-img">
                                                    <a href="<?php echo $RunLinkWeb->Call_link_web();?>/uploads/gallery/<?php echo $gallery_folder;?>/<?php echo $picture_name;?>" style="width: 100%; height: 236px;" alt="<?php echo $picture_name;?>" class="btn-icon" data-popup="lightbox" data-gallery="gallery1">
                                                        <i class="icon-zoomin3"></i>
                                                    </a>
                                                </div>

    <?php       }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php       }
            }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>





                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex align-items-start flex-nowrap">
                                                    <div>
                                                        <div class="font-weight-semibold mr-2"><?php echo $picture_name;?></div>
                                                    </div>

                                                    <div class="list-icons list-icons-extended ml-auto">
                                                        <button type="button" name="but_dele_img<?php echo $picture_id;?>" id="but_dele_img<?php echo $picture_id;?>" class="btn btn-danger btn-icon btn-sm"><i class="icon-bin top-0"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                               
        <script>
            $(document).ready(function(){

                var swalInit_DeleImg = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });

                var txt_picture_id="<?php echo $picture_id;?>";
                var txt_picture_name="<?php echo $picture_name;?>";
                var txt_gallery_folder="<?php echo $gallery_folder;?>";
                var txt_action="delect_img_key";

                $('#but_dele_img<?php echo $picture_id;?>').on('click', function() {
                    swalInit_DeleImg.fire({
                        title: 'คุณต้องลบใช้หรือไม่',
                        text: "ไฟส์รูป "+txt_picture_name,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        }
                    }).then(function(result) {
                        if(result.value) {
                            if(txt_action!="delect_img_key"){
                                swalInit_DeleImg.fire(
                                    'พบข้อผิดพลาดไม่สามารถดำเนินการได้',
                                    'error'
                                );                                   
                            }else{
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/picture_album/picture_album_process.php",{
                                    picture_id:txt_picture_id,
                                    picture_name:txt_picture_name,
                                    gallery_folder:txt_gallery_folder,
                                    action:txt_action
                                }).then(function(delete_img){
                                    var delete_img=delete_img.trim();
                                        if(delete_img==="no_error"){

                                            let timerInterval;
                                                swalInit_DeleImg.fire({
                                                    title: 'บันทึกสำเร็จ',
                                                    //html: 'I will close in <b></b> milliseconds.',
                                                    timer: 1200,
                                                    icon: 'success',
                                                    timerProgressBar: true,
                                                    didOpen: function() {
                                                        Swal.showLoading()
                                                        timerInterval = setInterval(function() {
                                                            const content = Swal.getContent();
                                                            if (content) {
                                                                const b_document_picture_album = content.querySelector('b_document_picture_album')
                                                                if (b_document_picture_album) {
                                                                    b_document_picture_album.textContent = Swal.getTimerLeft();
                                                                }else{}
                                                            }else{}
                                                        }, 100);
                                                    },
                                                    willClose: function() {
                                                        clearInterval(timerInterval)
                                                    }
                                                }).then(function (result) {
                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                        location.reload();
                                                    }else{}
                                                });

                                        }else if(delete_img==="it_error"){
                                            swalInit_DeleImg.fire(
                                                'ลบไฟส์รูปไม่สำเร็จ',
                                                'ไฟส์ภาพ '+delete_img,
                                                'error'
                                            );
                                        }else{
                                            swalInit_DeleImg.fire(
                                                'ลบไฟส์รูปไม่สำเร็จ',
                                                'ไฟส์ภาพ '+delete_img,
                                                'error'
                                            );
                                        }
                                })
                            }
                        }else if(result.dismiss === swal.DismissReason.cancel) {

                        }else{}
                    });
                });

            })
        </script>                  


<?php   } ?>



                            </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php    }else{} ?>