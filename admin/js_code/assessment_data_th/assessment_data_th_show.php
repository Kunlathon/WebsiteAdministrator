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
?>
<?php 
    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");

    include("../../structure/link.php");
    $RunLink = new link_system(); ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

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
    if(($width_system >= 1200)) {
        $grid = "xl";
    }elseif(($width_system >= 992)) {
        $grid = "lg";
    }elseif(($width_system <= 768)) {
        $grid = "md";
    }elseif(($width_system <= 576)) {
        $grid = "sm";
    }else{
        $grid = "xs";
    }
?>

<script>
    $(document).ready(function() {
        $('.select-search').select2();
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

        $('#datatable-button-html5-columns-STD').DataTable({
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

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $check_grade=filter_input(INPUT_POST,'class_id');
        $class_gn=filter_input(INPUT_POST,'class_gn');
            if((is_numeric($check_grade))){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){
        $('#check_term').on('change',function(){
            var check_grade="<?php echo $check_grade;?>";
            var check_term=$("#check_term").val();
            var cp_class_gn="<?php echo $class_gn;?>";
                if(check_grade!="" && check_term!="" && cp_class_gn!=""){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_data_th/assessment_data_th_run.php",{
                        check_grade:check_grade,
                        class_gn:cp_class_gn,
                        check_term:check_term
                    },function(class_student){
                        $("#run_assessment_data_th").html(class_student);
                    })
                }else{}
        })
    })
</script>

<script>
    $(document).ready(function(){
        var check_grade="<?php echo $check_grade;?>";
        var check_term="--";
        var cp_class_gn="<?php echo $class_gn;?>";
            if(check_grade!="" && check_term!="" && cp_class_gn!=""){
                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_data_th/assessment_data_th_run.php",{
                    check_grade:check_grade,
                    class_gn:cp_class_gn,
                    check_term:check_term
                },function(class_student){
                    $("#run_assessment_data_th").html(class_student);
                })
            }else{}        
    })
</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
    <div class="col-<?php echo $grid;?>-4">
        <h4>ข้อมูลห้องเรียน : <?php echo @$class_gn;?></h4>
    </div>
    <div class="col-<?php echo $grid;?>-4"></div>
    <div class="col-<?php echo $grid;?>-4">
        <fieldset class="mb-3">
            <div class="form-group row">
                <label class="col-form-label col-<?php echo $grid; ?>-3">ภาคเรียน</label>
                    <div class="col-<?php echo $grid; ?>-9">
                        <select class="form-control select-search" name="check_term" id="check_term" data-placeholder="เลือกภาคเรียน..." required="required">
                            
                            <optgroup label="ภาคเรียน">
    <?php
        $sql = "SELECT * FROM tb_term WHERE grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
        $cc = result_array($sql);
    ?>
	<?php foreach ($cc as $_cc) { ?>
                                <option value="<?php echo $_cc['term_id'];?>"><?php echo $_cc['term'];?>/<?php echo $_cc['year'];?></option>
    <?php } ?>
                            </optgroup>
                        </select>
                    </div>
            </div>
        </fieldset> 
    </div>    
</div>
<div id="run_assessment_data_th"></div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{} ?>
