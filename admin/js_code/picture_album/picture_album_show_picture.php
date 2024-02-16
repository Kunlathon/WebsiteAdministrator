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

    <fieldset class="mb-1">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="row">
    <?php

        if((isset($_POST["run_gallery_key"],$_POST["run_gallery_folder"]))){
            
            $gallery_key=filter_input(INPUT_POST, 'run_gallery_key');
            $gallery_folder=filter_input(INPUT_POST, 'run_gallery_folder');

            $picture_sql = "SELECT `picture_name` FROM `tb_picture`  WHERE `gallery_id`='{$gallery_key}'";
            $picture_list = result_array($picture_sql);
            //$link_album="../uploads/gallery/".$gallery_folder."/".$picture_row["picture_name"];
            foreach ($picture_list as $key => $picture_row) {   ?>
            
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="col-<?php echo $grid;?>-3">
                        <div class="card">
                            <div class="card-img-actions mx-1 mt-1">
                                <img class="card-img img-fluid" src="../uploads/gallery/<?php echo $gallery_folder;?>/<?php echo $picture_row["picture_name"];?>" style="width: 100%; height: 236px;" alt="<?php echo $picture_row["picture_name"];?>">
                                    <div class="card-img-actions-overlay card-img">
                                        <a href="../uploads/gallery/<?php echo $gallery_folder;?>/<?php echo $picture_row["picture_name"];?>" class="btn-icon" data-popup="lightbox" data-gallery="gallery1">
                                            <i class="icon-zoomin3"></i>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->    
    <?php   }

        }else{

        }
    ?>           
                </div>
            </div>
        </div>
    </fieldset>




