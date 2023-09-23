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
                                                                    <div col-md-12>
                                                                        <div class="page-title" style="font-size: 20px;">รายงานการยื่นเรื่องขอเอกสารรับรอง ()</div>
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
                                                                            <label>กรอกข้อมูลเพื่อค้นหา (Search)</label>
                                                                            <input name="" id="" type="text" class="form-control" required="required" placeholder="กรอกข้อมูลเพื่อค้นหา (Search)">
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                                                        <center>
                                                                            <button type="submit" name="" id="" class="btn btn-success">คันหา</button>
                                                                            <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>
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
                                                                <h3 class="card-title">รายการข้อมูล</h3>
                                                            </div>
                                                            <div class="card-body">

                                                                <div class="table-responsive">
                                                               
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><div>ลำดับ (No.)</div></th>
                                                                                <th><div>รหัสนิสิต (Student ID)</div></th>
                                                                                <th><div>รายชื่อ (Name-Surname)</div></th>
                                                                                <th><div>คณะ (Faculty)</div></th>
                                                                                <th><div>สาขา (Major)</div></th>
                                                                                <th><div>สถานะ (Status)</div></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
    <?php
        $request_Sql="SELECT * FROM `tb_certified`";
        $request_Rs=result_array($request_Sql);
        $requset_count=0;
        foreach($request_Rs as $key=>$request_Row){ 
            $requset_count=$requset_count+1;
            $myname=$request_Row["user_name"]." ".$request_Row["user_surname"];

           
            $faculty_Sql="SELECT `faculty_name` FROM `tb_faculty` WHERE `faculty_id` ='{$request_Row["user_faculty"]}'";
            $faculty_List=result_array($faculty_Sql);
            foreach($faculty_List as $key=>$faculty_Row){   
                if((is_array($faculty_Row) and count($faculty_Row))){
                    $faculty_name=$faculty_Row["faculty_name"];
                }else{
                    $faculty_name="-";
                }                                            
            } 

            
            $department_Sql="SELECT `department_name` FROM `tb_department` WHERE `department_id`='{$request_Row["user_department"]}'";
            $department_List=result_array($department_Sql);
            foreach($department_List as $key=>$department_Row){   
                if((is_array($department_Row) and count($department_Row))){
                    $department_name=$department_Row["department_name"];
                }else{
                    $department_name="-";
                }                             
            } 

            ?>

                                                                            <tr>
                                                                                <td><div><?php echo $requset_count;?></div></td>
                                                                                <td><div><?php echo $request_Row["user_student_id"];?></div></td>
                                                                                <td><div><?php echo $myname;?></div></td>
                                                                                <td><div><?php echo $faculty_name;?></div></td>
                                                                                <td><div><?php echo $department_name;?></div></td>
                                                                                <td>
            <?php
                    if(($request_Row["user_status"]=="1")){    ?>
                                                                                    <div class="btn btn-warning btn-xs">กำลังดำเนินการ</div>
            <?php    }elseif(($request_Row["user_status"]=="2")){  ?>
                                                                                    <div class="btn btn-success btn-xs">ดำเนินเรียบร้อย</div>
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
          