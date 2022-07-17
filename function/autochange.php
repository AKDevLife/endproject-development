<?php
include_once 'function.php';
date_default_timezone_set("Asia/Bangkok");
$sql = new DB_con();
$sql2 = new DB_con();
$sql3 = new DB_con();
$find_day = new DB_con();
$check_day = new DB_con();
$datelate4 = $find_day->dayplus4();
$datelate6 = $find_day->dayplus6();
$x=0;
foreach($datelate4 as $c)
if(strtotime($c['DateAdd']) < strtotime(date("Y-m-d")))
{
    $upstatus = $check_day->update7($c['borrow_id']);
    $eq_borrow_id_fetch = $sql->eq_borrow_id_fetch($c['borrow_id']);
    while ($row = mysqli_fetch_array($eq_borrow_id_fetch)) {
        $eq_id = $row['eq_id'];
        $eq_id_fetch = $sql2->eq_id_fetch($eq_id);
        $eq_remain_old = mysqli_fetch_array($eq_id_fetch);
        $eq_remain = $eq_remain_old['eq_remain']+$row['eq_number'];
        $remain= $sql3->eq_update_remain($eq_remain, $eq_id);
    }
}
else;
foreach($datelate6 as $c)
if(strtotime($c['DateAdd']) < strtotime(date("Y-m-d")))
{
    $upstatus = $check_day->update9($c['borrow_id']);
}
else;




     

//SELECT DATE_ADD(`ToDate`, interval 7 day) AS DateAdd FROM `tb_eq_borrow` WHERE Status = 4
?>