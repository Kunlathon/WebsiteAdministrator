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

<?php include '../../config/connect.ini.php'; ?>
<?php include '../../config/fnc.php'; ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

<?php

$aid = check_session("admin_id_aba");
$update_date = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');

if (($action == "createall")) {

    $term = filter_input(INPUT_POST, 'term');
    $term_year = filter_input(INPUT_POST, 'term_year');

    $date_start = filter_input(INPUT_POST, 'date_start');
    // if (($date_start != null)) {
    //     $date_start = explode("/", $date_start);
    //     $datestart1 = $date_start[0];
    //     $datestart2 = $date_start[1];  
    //     $datestart3 = $date_start[2];        
    //     $datestart = "$datestart3-$datestart2-$datestart1";
    //     //$datestart = date("Y-m-d", strtotime($date_start));
    // } else {
    // }

    $date_end = filter_input(INPUT_POST, 'date_end');
    // if (($date_end != null)) {
    //     $date_end = explode("/", $date_end);
    //     $dateend1 = $date_end[0];
    //     $dateend2 = $date_end[1];  
    //     $dateend3 = $date_end[2];        
    //     $dateend = "$dateend3-$dateend2-$dateend1";
    //     //$dateend = date("Y-m-d", strtotime($date_end));
    // } else {
    // }

    $sql = "SELECT * FROM tb_grade ORDER BY grade_id ASC";
    $list = result_array($sql);

    foreach ($list as $row) {

        $sqlT = "SELECT * FROM tb_term WHERE term='$term' AND year='$term_year' AND grade_id='$row[grade_id]'";
        $cc_term = result_array($sqlT);
        $count_term = count($cc_term);

        if ($count_term >= '1') {
            echo "it_error";
            exit();
        } else {

            $sqlTer = "SELECT *,MAX(term_id) AS ID FROM tb_term";
            $tcrTer = row_array($sqlTer);

            $T_ID = $tcrTer['ID'] + 1;

            $grade = $row['grade_id'];

            $data1 = array(
                "term_id" => $T_ID,
                "term" => $term,
                "year" => $term_year,
                "term_start" => $date_start,
                "term_end" => $date_end,
                "grade_id" => $grade,
                "admin_id" => $aid,
                "admin_update" => $update_date,
                "term_status" => 1,
                "checkgrade_status" => 0

            );
            insert("tb_term", $data1);

            $data2 = array(
                "term_id" => $T_ID,
                "exam1_no" => 1,
                "exam2_no" => 2,
                "term_detail_status" => 1

            );

            insert("tb_term_detail", $data2);
        }
    }

    echo "no_error";
} elseif (($action == "create")) {

    $term = filter_input(INPUT_POST, 'term');
    $term_year = filter_input(INPUT_POST, 'term_year');
    $date_start = filter_input(INPUT_POST, 'date_start');
    // if (($date_start != null)) {
    //     $date_start = explode("/", $date_start);
    //     $datestart1 = $date_start[0];
    //     $datestart2 = $date_start[1];
    //     $datestart3 = $date_start[2];
    //     $datestart = "$datestart3-$datestart2-$datestart1";
    //     //$datestart = date("Y-m-d", strtotime($date_start));
    // } else {
    // }

    $date_end = filter_input(INPUT_POST, 'date_end');
    // if (($date_end != null)) {
    //     $date_end = explode("/", $date_end);
    //     $dateend1 = $date_end[0];
    //     $dateend2 = $date_end[1];
    //     $dateend3 = $date_end[2];
    //     $dateend = "$dateend3-$dateend2-$dateend1";
    //     //$dateend = date("Y-m-d", strtotime($date_end));
    // } else {
    // }

    $grade = filter_input(INPUT_POST, 'grade');


    function fnc_count_code($term, $term_year, $grade)
    {
        $s =  "SELECT * FROM tb_term WHERE term = '$term' AND year = '$term_year' AND grade_id = '$grade'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    function fnc_count($term, $term_year, $date_start, $date_end, $grade)
    {
        $s = "SELECT * FROM tb_term WHERE term = '$term' AND year = '$term_year' AND term_start = '$date_start' AND term_end = '$date_end' AND grade_id = '$grade'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    function fnc_count_t($term, $term_year, $grade)
    {
        $s = "SELECT * FROM tb_term WHERE term = '$term' AND year = '$term_year' AND grade_id = '$grade'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    $check_t = fnc_count_t($term, $term_year, $grade);

    if ($check_t) {

        $check = fnc_count($term, $term_year, $date_start, $date_end, $grade);

        if (($check)) {

            $sqlTer = "SELECT *,MAX(term_id) AS ID FROM tb_term";
            $tcrTer = row_array($sqlTer);

            $T_ID = $tcrTer['ID'] + 1;

            $data = array(
                "term_id" => $T_ID,
                "term" => $term,
                "year" => $term_year,
                "term_start" => $date_start,
                "term_end" => $date_end,
                "grade_id" => $grade,
                "admin_id" => $aid,
                "admin_update" => $update_date,
                "term_status" => 1,
                "checkgrade_status" => 0

            );
            insert("tb_term", $data);

            $data2 = array(
                "term_id" => $T_ID,
                "exam1_no" => 1,
                "exam2_no" => 2,
                "term_detail_status" => 1

            );

            insert("tb_term_detail", $data2);

            echo "no_error";
        } else {
            echo "it_error";
        }
    } else {
        echo "it_error";
    }
} elseif (($action == "update")) {

    $term = filter_input(INPUT_POST, 'term');
    $term_year = filter_input(INPUT_POST, 'term_year');
    $grade = filter_input(INPUT_POST, 'grade');
    $date_start = filter_input(INPUT_POST, 'date_start');
    $date_end = filter_input(INPUT_POST, 'date_end');
    $status = filter_input(INPUT_POST, 'status');
    $checkgrade_st = filter_input(INPUT_POST, 'checkgrade_st');
    $term_key = filter_input(INPUT_POST, 'term_key');

    $data = array(
        "term" => $term,
        "year" => $term_year,
        "term_start" => $date_start,
        "term_end" => $date_end,
        "grade_id" => $grade,
        "admin_id" => $aid,
        "admin_update" => $update_date,
        "term_status" => $status,
        "checkgrade_status" => $checkgrade_st
    );

    update("tb_term", $data, "term_id = '{$term_key}'");
    echo "no_error";
} elseif (($action == "update_detail")) {

    $date_start1 = filter_input(INPUT_POST, 'date_start1');
    $date_end1 = filter_input(INPUT_POST, 'date_end1');
    $date_start2 = filter_input(INPUT_POST, 'date_start2');
    $date_end2 = filter_input(INPUT_POST, 'date_end2');
    $date_score_1 = filter_input(INPUT_POST, 'date_score_1');
    $date_score_2 = filter_input(INPUT_POST, 'date_score_2');
    $date_score_f = filter_input(INPUT_POST, 'date_score_f');
    $date_score_g = filter_input(INPUT_POST, 'date_score_g');
    $term_key = filter_input(INPUT_POST, 'term_key');

    $data = array(
        "exam1_start" => $date_start1,
        "exam1_end" => $date_end1,
        "exam2_start" => $date_start2,
        "exam2_end" => $date_end2,
        "score_1" => $date_score_1,
        "score_2" => $date_score_2,
        "score_F" => $date_score_f,
        "score_G" => $date_score_g,
        "admin_id" => $aid,
        "admin_update" => $update_date
    );

    update("tb_term_detail", $data, "term_id = '{$term_key}'");
    echo "no_error";
} elseif (($action == "delete")) {
    $term_key = filter_input(INPUT_POST, 'term_key');
    $table = "tb_term";
    $ff = "term_id";
    delete($table, "{$ff} = '{$term_key}'");

    // Delete tb_term_detail
    $sqlTerD = "SELECT * FROM tb_term_detail WHERE term_id='{$term_key}'";
    $listTerD = result_array($sqlTerD);

    $tableTerD = "tb_term_detail";

    foreach ($listTerD as $key => $rowTerD) {
        $term_d_id = $rowTerD['term_detail_id'];
        delete($tableTerD, "term_detail_id = '{$term_d_id}'");
    }

    echo "no_error";
} elseif (($action == "open1")) {

    $term_key=filter_input(INPUT_POST, 'term_key');
    $term_detail_key=filter_input(INPUT_POST, 'term_detail_key');
    $term_score=filter_input(INPUT_POST, 'term_score');

    $data11 = array(
        "score_1_status" => $term_score
    );

    update("tb_term_detail", $data11, "term_id = '{$term_key}' AND term_detail_id = '{$term_detail_key}' AND term_detail_status = '1'");

    // echo $term_key." ".$term_detail_key." ".$term_score;
    echo "no_error";

} elseif (($action == "close1")) {

    $term_key=filter_input(INPUT_POST, 'term_key');
    $term_detail_key=filter_input(INPUT_POST, 'term_detail_key');
    $term_score=filter_input(INPUT_POST, 'term_score');

    $data12 = array(
        "score_1_status" => $term_score
    );

    update("tb_term_detail", $data12, "term_id = '{$term_key}' AND term_detail_id = '{$term_detail_key}' AND term_detail_status = '1'");

    echo "no_error";

} elseif (($action == "open2")) {
    
    $term_key=filter_input(INPUT_POST, 'term_key');
    $term_detail_key=filter_input(INPUT_POST, 'term_detail_key');
    $term_score=filter_input(INPUT_POST, 'term_score');

    $data21 = array(
        "score_2_status" => $term_score
    );

    update("tb_term_detail", $data21, "term_id = '{$term_key}' AND term_detail_id = '{$term_detail_key}' AND term_detail_status = '1'");

    echo "no_error";
} elseif (($action == "close2")) {

    $term_key=filter_input(INPUT_POST, 'term_key');
    $term_detail_key=filter_input(INPUT_POST, 'term_detail_key');
    $term_score=filter_input(INPUT_POST, 'term_score');

    $data22 = array(
        "score_2_status" => $term_score
    );

    update("tb_term_detail", $data22, "term_id = '{$term_key}' AND term_detail_id = '{$term_detail_key}' AND term_detail_status = '1'");

    echo "no_error";
}  else {
}
?>


