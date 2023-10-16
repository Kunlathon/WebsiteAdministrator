<div class="page-body">
    <div class="container-xl">

        <div class="row row-cards">
            <div class="col-md-12">
                <div class="page-body">
                    <div class="container-xl">

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row row-cards">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-2 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">
                                                        <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div class="col-md-12">
                                                                        <div class="page-title" style="font-size: 20px;">ประกาศรายชื่อผู้สมัคร (Announcement of names of applicants)</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-5 alogn-items-center">
                                                <div class="row row-cards">
                                                <div class="col-md-12">
                                                    <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <div id="text_key-null">
                                                                            <input name="text_key"  id="text_key" type="text" class="form-control" required="required" placeholder="กรอกข้อมูลเพื่อค้นหา (Search)">
                                                                            </div>
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                                                        <center>
                                                                            <button type="button" name="but_clink" id="but_clink" class="btn btn-success">Search</button>
                                                                            <button type="button" name="but_delete" id="but_delete" class="btn btn-danger" value="but_delete">Cancel</button>
                                                                        </center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-5 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">

                                                        <div class="card">
                                                            <div class="card-status-top bg-green"></div>
                                                            <div class="card-header">
                                                                <h3 class="card-title">รายการข้อมูล (Detail)</h3>
                                                            </div>
                                                            <div class="card-body">
<div id="Run_List">
                                                                <div class="table-responsive">
                                                               
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><div>ลำดับ (No.)</div></th>
                                                                                <th><div>รายชื่อ (Name-Surname)</div></th>
                                                                                <th><div>สถานะ (Status)</div></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
    <?php
        $annouuce_Sql="SELECT * FROM `tb_register`";
        $annouuce_Rs=result_array($annouuce_Sql);
        $requset_count=0;
        foreach($annouuce_Rs as $key=>$annouuce_Row){ 
            $requset_count=$requset_count+1;
            $myname=$annouuce_Row["user_name"]." ".$annouuce_Row["user_surname"];

           


            


            ?>

                                                                            <tr>
                                                                                <td><div><?php echo $requset_count;?></div></td>

                                                                                <td><div><?php echo $myname;?></div></td>

                                                                                <td>
            <?php
                    if(($annouuce_Row["user_status"]=="1")){    ?>
                                                                                    <span class="badge bg-orange-lt">กำลังดำเนินการ / In Progress</span>
            <?php    }elseif(($annouuce_Row["user_status"]=="2")){  ?>
                                                                                    <span class="badge bg-teal-lt" >ดำเนินเรียบร้อย / Completed</span>
            <?php    }else{}    ?>
                                                                                    
                                                                                </td>
                                                                            </tr>
    <?php   } ?>


                                                                        </tbody>
                                                                </table>

                                                                </div>
</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#but_delete").on("click",function(){
            var but_delete=$("#but_delete").val();
                if(but_delete==="but_delete"){
                    document.location="?modules=announce_list";
                }else{}
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#but_clink").on("click",function(){
            var text_key=$("#text_key").val();
                if(text_key!==""){
                    if(text_key.length>=101){
                        document.getElementById("text_key-null").innerHTML=
                        '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control is-invalid">'
                        +'<div class="invalid-feedback">จำนวนตัวอักษรจำกัดไม่เกิน 100 ตัวอักษร</div>';
                    }else{
                        $.post("proccess/announce_show.php",{
                            text_key:text_key
                        },function(RunList){
                            if(RunList!==""){
                                $("#Run_List").html(RunList);
                                document.getElementById("text_key-null").innerHTML=
                                '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control">'
                                +'<div class="invalid-feedback"></div>';
                            }else{
                                document.getElementById("Run_List").innerHTML=
                                '<div class="row">'
                                +'  <div class="alert alert-warning" role="alert">'
                                +'      เกิดข้อผิดพลาดไม่สามารถดำเนินการได้'
                                +'  </div>'
                                +'</div>';
                            }
                        })
                    }
                }else{
                    document.getElementById("text_key-null").innerHTML=
                        '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control is-invalid">'
                        +'<div class="invalid-feedback">กรุณาพิมพ์ เพื่อค้นหา</div>';
                }
        })
    })
</script>