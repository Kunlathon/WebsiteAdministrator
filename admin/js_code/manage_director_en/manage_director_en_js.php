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
//$RunLink->Call_Link_System();

//OFF File Js
//sweet_alert.min.js
//select2.min.js
//bootstrap_multiselect.js
//OFF File Js end
//form_inputs.html
//components_alerts.html

//Data: datatables_extension_buttons_html5.js

    check_login('admin_username_lcm','login.php');

?>

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.summernote').summernote();
        })
    </script>