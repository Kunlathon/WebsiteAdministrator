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

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });           
        })
    </script>
<!-- /theme JS files -->

    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/user/user_show.php",{
                        run_show:run_show
                    },function(RunShow){
                        if(RunShow!=""){
                            $("#Run_Show_All").html(RunShow);
                        }else{}
                    })
                }else{
                    document.getElementById("Run_Show_All").innerHTML=
                    '<span style="font-weight: bold; color:red;">ไม่สามารถดำเนินการได้</span>';
                }
        })
    </script>