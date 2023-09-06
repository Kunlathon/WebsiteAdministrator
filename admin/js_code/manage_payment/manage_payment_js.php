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
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
    })
</script>


<script>
    $(document).ready(function() {

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            }
        });

        // Apply custom style to select
        $.extend($.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });

        $('.datatable-button-html5-columns-STD').DataTable({
            /*buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn btn-primary btn-icon dropdown-toggle'
                    }
                ]
            }*/

            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]



        });

    })
</script>


<script>
    $(document).ready(function() {

    // Defaults
        var swalInitUpdateManagePayment = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
    // Defaults End

        $('#Add_Manage_Payment').on('click', function() {

            swalInitUpdateManagePayment.fire({
                title: 'ต้องการบันทึกข้อมูลหรือไม่',
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
                if (result.value) {
                    var action = "update";

                    var payment_key=$("#payment_key").val();
                    var term=$("#term").val();
                    var grade=$("#grade").val();

                    var payment_score1=$("#payment_score1").val();
                    var payment_score2=$("#payment_score2").val();
                    var payment_score3=$("#payment_score3").val();
                    var payment_score4=$("#payment_score4").val();

                    
                    if (action == "") {
                        swalInitUpdateManagePayment.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            //text:'id->'+id+'term->'+term+'grade->'+grade+'payment_score1->'+payment_score1+'payment_score2->'+payment_score2+'payment_score3->'+payment_score3+'payment_score4->'+payment_score4,
                            icon: 'error'
                        });
                    }else{

                        
                        if(payment_score1!="" && payment_score2!="" && payment_score3!="" && payment_score4!=""){

                            var list=btoa(grade);

                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/manage_payment/manage_payment_process.php", {

                                action:action,
                                payment_key:payment_key,
                                term:term,
                                grade:grade,
                                payment_score1:payment_score1,
                                payment_score2:payment_score2,
                                payment_score3:payment_score3,
                                payment_score4:payment_score4

                            }, function(process_add) {
                                var test_process = process_add;
                                if (test_process.trim() === "no_error") {
                                    let timerInterval;
                                    swalInitUpdateManagePayment.fire({
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
                                                    const b_manage_payment = content.querySelector('b_manage_payment')
                                                    if (b_manage_payment) {
                                                        b_manage_payment.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_payment&manage=show&list="+list;
                                        } else {}
                                    });

                                } else if (test_process.trim() === "it_error") {
                                    swalInitUpdateManagePayment.fire({
                                        title: 'ข้อมูลซ้ำ',
                                        icon: 'error'
                                    });
                                } else {
                                    swalInitUpdateManagePayment.fire({
                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                        icon: 'error'
                                    });
                                }
                            })

                        }else{}

                    }

                }else if (result.dismiss === swal.DismissReason.cancel){

                }else{}

            })
        })
    })
</script>