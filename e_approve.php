<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_Approve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/e_approve.css">
</head>

<body style="background-color: #91AFA8">
    <div class="container-fluid">
        <?php
        include "item/pageheader.php";
        ?>
        <div class="menu">
            <aside>
                <?php
                include "item/menubar_e.php";
                ?>
            </aside>
            <main class="form">
                <div class="box">
                    <h2>คำร้องขอยืมอุปกรณ์</h2>
                    <hr class="s1">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>รหัสการยืม</th>
                                <th>รหัสประจำตัว</th>
                                <th>ผู้ยื่นคำร้อง</th>
                                <th>คำขอ</th>
                                <th>ไม่ผ่าน</th>
                                <th>ผ่าน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('function/function.php');
                            $eq1 = new DB_con();
                            $eq2 = new DB_con();
                            $eq3 = new DB_con();
                            $eq4 = new DB_con();
                            //อ่านข้อมูลตารางการยืมโดยแสดงเฉพาะที่สถานะเป็น 2 อ.ที่ปรึกษาอนุมัติ ผ่าน
                            $eq_borrow_2_fetch = $eq1->eq_borrow_2_fetch();
                            $i = 1;
                            while ($sql1 = mysqli_fetch_array($eq_borrow_2_fetch)) {
                                $s_user = $sql1['s_user'];
                                //นำรหัสนักศึกษามา มาค้นหาชื่อ-นาสกุล-อีเมล ตามรหัสนั้น 
                                $s_name_s_user_fetch = $eq2->s_name_s_user_fetch($s_user);
                                $sql2 = mysqli_fetch_array($s_name_s_user_fetch)
                            ?>
                                <tr>
                                    <td><?php echo $sql1['borrow_id']; ?></td>
                                    <td><?php echo $sql1['s_user']; ?></td>
                                    <td><?php echo $sql2['s_firstname']; ?> <?php echo $sql2['s_lastname']; ?></td>
                                    <td>
                                        <a class="bb" href="#popup<?php echo $i; ?>">คำขอ</a>
                                        <div id="popup<?php echo $i; ?>" class="overlay">
                                            <div class="popup">
                                                <h2>รายการอุปกรณ์ที่ต้องการยืม</h2>
                                                <a class="close" href="e_approve.php">&times;</a>
                                                <div class="content">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>ชื่ออุปกรณ์</th>
                                                                <th>จำนวนที่ยืม</th>
                                                                <th>วันที่ยืม</th>
                                                                <th>วันที่คืน</th>
                                                                <th>รายละเอียด</th>
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
                                                                    <td><?php echo $sql3['FromDate']; ?></td>
                                                                    <td><?php echo $sql3['ToDate']; ?></td>
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
                                    <!-- เมื่อกดปุ่มไม่ผ่านทำการส่ง 0.ค่าตรวจสอบap=2 1.รหัสการยืม -->
                                    <td><div class="dropdown1">
                                            <button class="rb">ไม่ผ่าน</button>
                                            <div class="dropdown-content">
                                                <a href="#popup">แก้ไขรายการ</a>
                                                    <div id="popup" class="overlay">
                                                        <div class="popup">
                                                            <h2>เหตุผลในการแก้ไข</h2><hr class="s1">
                                                            <a class="close" href="e_approve.php">&times;</a>
                                                            <form action="function/approve_e_edit.php" method="POST">
                                                                <label></label>
                                                                <input type="text" name="reason" size="30" placeholder="กรอกเหตุผล.." require>
                                                                <input type="hidden" name="borrow_id" value="<?php echo $sql1['borrow_id']; ?>">
                                                                <input type="hidden" name="s_email" value="<?php echo $sql2['s_email']; ?>">
                                                                <button class="gb" type="submit">ยืนยัน</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <a href="function/approve_e.php?ap=2&borrow_id=<?php echo $sql1['borrow_id']; ?>&se=<?php echo $sql2['s_email']; ?>">ไม่ผ่าน</a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- เมื่อกดปุ่มผ่านทำการส่ง 0.ค่าตรวจสอบap=1 1.รหัสการยืม 2.อีเมลนศ. -->
                                    <td><a class="gb" href="function/approve_e.php?ap=1&borrow_id=<?php echo $sql1['borrow_id']; ?>&se=<?php echo $sql2['s_email']; ?>">ผ่าน</a></td>
                                </tr>
                            <?php
                                $i = $i + 1;
                            }
                            ?>
                        </tbody>
                        <tbody>
                    </table>
                </div>
            </main>
        </div>
        <?php
        include "item/footer.php";
        ?>
    </div>
</body>

</html>