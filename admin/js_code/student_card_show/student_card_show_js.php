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
            $("#button_show").on("click",function(){
                var button_show=$("#button_show").val();
                    if(button_show==="show"){
                        location.reload();
                    }else{}
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            $("#TimeSearch").on("change",function(){
                var TimeSearch=$("#TimeSearch").val();
                    if(TimeSearch!==""){

                        var run_show=$("#run_show").val();
                        var now_date1=TimeSearch.substring(0, 10);
                            now_date1=now_date1.trim();
                        var now_date2=TimeSearch.substring(13);
                            now_date2=now_date2.trim();

                            if(run_show==="show"){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/student_card_show/student_card_show_show.php",{
                                    run_show:run_show,
                                    now_date1:now_date1,
                                    now_date2:now_date2
                                },function(RunShow){
                                    if(RunShow!=""){
                                        $("#Run_Show_All").html(RunShow);
                                    }else{}
                                })
                            }else{
                                document.getElementById("Run_Show_All").innerHTML=
                                '<span style="font-weight: bold; color:red;">ไม่สามารถดำเนินการได้</span>';
                            }

                    }else{}
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();

            var date1=new Date();
            var year1 = date1.getFullYear().toString().slice(-4);
            var month1 = ('0' + (date1.getMonth() + 1)).slice(-2); 
            var day1 = ('0' + date1.getDate()).slice(-2);
            var now_date1 = year1 + '-' + month1 + '-' + day1;
                now_date1=now_date1.trim();

            var date2=new Date();
            date2.setDate(date2.getDate() + 1); // Add 1 day
            var year2 = date2.getFullYear().toString().slice(-4);
            var month2 = ('0' + (date2.getMonth() + 1)).slice(-2); 
            var day2 = ('0' + date2.getDate()).slice(-2);
            var now_date2 = year2+'-'+month2+'-'+day2;
                now_date2=now_date2.trim();

                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/student_card_show/student_card_show_show.php",{
                        run_show:run_show,
                        now_date1:now_date1,
                        now_date2:now_date2
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
    <!--picker_date-->
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script>
        $(document).ready(function(){
            $('.daterange-basic').daterangepicker({
                parentEl: '.content-inner',
                timePicker: true,
                locale: {
                    format: 'YYYY/MM/DD'
                }
            });
        })
    </script>   

    <!--picker_date end-->