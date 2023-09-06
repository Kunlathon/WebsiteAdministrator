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

//$YYYY=date("y");

?>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select-search').select2();
    })
</script>

<script>
    $(document).ready(function() {
        $("#term_key").on('change',function(){

            // Defaults
                var swalReport = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });
            // Defaults End

            //var classroom_key=$("#classroom_key").val();
            var term_key=$("#term_key").val();
            var grade_key=$("#grade_key").val();

            if(term_key!="" && grade_key!=""){
                if(Number(grade_key)){
                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/character_data/character_data_show.php",{
                        //classroom_key:classroom_key,
                        term_key:term_key,
                        grade_key:grade_key
                    },function(run_Report){
                        if(run_Report!=""){
                            $("#RunReportData").html(run_Report);
                        }else{
                            swalReport.fire({
                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                icon: 'error'
                            });
                        }
                    })
                }else{
                   swalReport.fire({
                        title: 'ข้อมูลไม่ถูกต้องไม่สามารถดำเนินการได้',
                        icon: 'error'
                    });
                }
            }else{
                swalReport.fire({
                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                    icon: 'error'
                });
            }    
            
        })
    })
</script>


<script>
    $(document).ready(function() {
        //$("#term_key").on('change',function(){

            // Defaults
                var swalReport = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });
            // Defaults End

            //var classroom_key=$("#classroom_key").val();
            var term_key=$("#term_key").val();
            var grade_key=$("#grade_key").val();

            if(term_key!="" && grade_key!=""){
                if(Number(grade_key)){
                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/character_data/character_data_show.php",{
                        //classroom_key:classroom_key,
                        term_key:term_key,
                        grade_key:grade_key
                    },function(run_Report){
                        if(run_Report!=""){
                            $("#RunReportData").html(run_Report);
                        }else{
                            /*swalReport.fire({
                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                icon: 'error'
                            });*/
                        }
                    })
                }else{
                  /* swalReport.fire({
                        title: 'ข้อมูลไม่ถูกต้องไม่สามารถดำเนินการได้',
                        icon: 'error'
                    });*/
                }
            }else{
                /*swalReport.fire({
                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                    icon: 'error'
                });*/
            }    
            
        //})
    })
</script>