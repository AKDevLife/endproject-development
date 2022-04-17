<?php
include_once 'function/function.php';
date_default_timezone_set("Asia/Bangkok");
$find_day = new DB_con();
$check_day = new DB_con();
$datelate4 = $find_day->dayplus4();
$datelate6 = $find_day->dayplus6();
$x=0;
foreach($datelate4 as $c)
if(strtotime($c['DateAdd']) > date("Y-m-d"))
{
    $upstatus = $check_day->update7($c['borrow_id']);
}
else;
foreach($datelate6 as $c)
if(strtotime($c['DateAdd']) > date("Y-m-d"))
{
    $upstatus = $check_day->update9($c['borrow_id']);
}
else;




     

//SELECT DATE_ADD(`ToDate`, interval 7 day) AS DateAdd FROM `tb_eq_borrow` WHERE Status = 4
?>