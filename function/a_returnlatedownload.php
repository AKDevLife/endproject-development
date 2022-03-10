<!DOCTYPE html>
<html lang="en">

<head>
    <?php ///ส่วนสำหรับการดาวโหลดเป็น excel แต่เป็นแบบทั้งหน้า
    date_default_timezone_set("Asia/Bangkok");
    header("Content-Type: application/vnd.ms-excel");
    $filename = "รายชื่อเกินกำหนดการคืนประจำวันที่ ".date("d-m-Y");
    header('Content-Disposition: attachment; filename='.$filename.'.xls');#กำหนดชื่อไฟล์
    echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">';
    ?>
  <style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body style="background-color:aliceblue">

    <div class="container-fluid">
        <div class="menu">
            <main class="form">
                
                    <h2>รายชื่อเกินกำหนดการคืนประจำวันที่ <?php echo date("d-m-Y") ?></h2>
                    <hr class="s1">
                    <table style="width:100% " style ="font-size: 18px" x:str >
                        <thead>
                            <tr>
                                <th></th>
                                <th>รหัสการยืม</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>คำขอ</th>
                                <th>วันที่ต้องคืน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('function.php');
                            $eq1 = new DB_con();
                            $eq2 = new DB_con();
                            $eq3 = new DB_con();
                            $eq4 = new DB_con();
                            $eq_borrow_LR_fetch = $eq1->eq_borrow_LR_fetch(6,date("Y-m-d"));
                            $i = 1;
                            while ($sql1 = mysqli_fetch_array($eq_borrow_LR_fetch)) {
                                $s_user = $sql1['s_user'];
                                //นำรหัสนักศึกษามา มาค้นหาชื่อ-นาสกุล-อีเมล ตามรหัสนั้น 
                                $s_name_s_user_fetch = $eq2->s_name_s_user_fetch($s_user);
                                $sql2 = mysqli_fetch_array($s_name_s_user_fetch)
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $sql1['borrow_id']; ?></td>
                                    <td><?php echo $sql1['s_user']; ?></td>
                                    <td><?php echo $sql2['s_firstname']; ?> <?php echo $sql2['s_lastname']; ?></td>
                                    <td>
                                        
                                                <div class="content">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="color:Red;">ชื่ออุปกรณ์</th>
                                                                <th style="color:Red;">จำนวนที่ยืม</th>
                                                                <th style="color:Red;">วันที่ยืม</th>
                                                                <th style="color:Red;">รายละเอียด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $borrow_id = $sql1['borrow_id'];
                                                            //นำรหัสการยืมมา มาค้นหาข้อมูลการยืมในตารางการยืม
                                                            $suser = $eq3->eq_borrow_id_fetch($borrow_id);
                                                            $a = 1;
                                                            while ($sql3 = mysqli_fetch_array($suser)) {
                                                            ?>
                                                                <tr>
                                                                    <?php
                                                                    $eq_id = $sql3['eq_id'];
                                                                    //นำรหัสอุปกรณ์ มาค้นหาชื่อของอุปกรณ์นั้นๆ
                                                                    $eq_name = $eq4->eq_id_fetch($eq_id);
                                                                    $b = 1;
                                                                    while ($sql4 = mysqli_fetch_array($eq_name)) { ?>
                                                                        <td><?php echo $sql4['eq_name']; ?></td>
                                                                    <?php
                                                                        $b = $b + 1;
                                                                    }
                                                                    ?>
                                                                    <td><?php echo $sql3['eq_number']; ?></td>
                                                                    <td><?php echo date_format (new DateTime($sql3['FromDate']), 'd-m-Y');?></td>
                                                                    <td><?php echo $sql3['Descriptions']; ?></td>
                                                                </tr>
                                                            <?php
                                                                $a = $a + 1;
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    <?php echo date_format (new DateTime($sql1['ToDate']), 'd-m-Y');?>
                                    </td>
                                </tr>
                            <?php
                                $i = $i + 1;
                            }
                            ?>
                        </tbody>
                        <tbody>
                    </table>
                
            </main>
        </div>

    </div>
                        </body>

</html>