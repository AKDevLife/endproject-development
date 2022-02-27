<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P_Approve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/p_approve.css">
</head>

<body style="background-color: #91AFA8">
    <div class="container-fluid">
        <?php
        include "item/pageheader.php";
        ?>
        <div class="menu">
            <aside>
                <?php
                include "item/menubar_p.php";
                ?>
            </aside>
            <main class="form">
                <div class="box">
                    <h2>คำร้อง</h2>
                    <hr class="s1">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>รหัสการยืม</th>
                                <th>รหัสประจำตัว</th>
                                <th>ผู้ยื่นคำร้อง</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('function/function.php');
                            session_start();
                            $p_id = $_SESSION['p_id'];
                            $eq1 = new DB_con();
                            $eq2 = new DB_con();
                            $eq3 = new DB_con();
                            $eq4 = new DB_con();

                            //หารหัสนักศึกษาตามอ.ที่ปรึกษา 
                            $s_user_p_id_fetch = $eq2->s_user_p_id_fetch($p_id);
                            $sql1 = mysqli_fetch_array($s_user_p_id_fetch);
                            // นำรหัสนักศึกษาที่มี Status1 เข้าไปหาในตาราง tb_eq_borrow
                            $s_user = $sql1['s_user'];
                            $eq_borrow_1_fetch = $eq2->eq_borrow_1_fetch($s_user);
                            $i = 1;
                            while ($sql2 = mysqli_fetch_array($eq_borrow_1_fetch)) {
                            ?>
                                <tr>
                                    <td><?php echo $sql2['borrow_id']; ?></td>
                                    <td><?php echo $sql2['s_user']; ?></td>
                                    <td><?php echo $sql1['s_firstname']; ?> <?php echo $sql1['s_lastname']; ?></td>
                                    <td>
                                        <a class="bb" href="#popup<?php echo $i; ?>">คำขอ</a>
                                        <div id="popup<?php echo $i; ?>" class="overlay">
                                            <div class="popup">
                                                <h2>รายการอุปกรณ์ที่ต้องการยืม</h2>
                                                <a class="close" href="p_approve.php">&times;</a>
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
                                                            $borrow_id = $sql2['borrow_id'];
                                                            $suser = $eq3->eq_borrow_id_fetch($borrow_id); //! แก้ชื่อ ลบ p ออก
                                                            $a = 1;
                                                            while ($sql3 = mysqli_fetch_array($suser)) {
                                                            ?>
                                                                <tr>
                                                                    <?php
                                                                    $eq_id = $sql3['eq_id'];
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
                                    <td><a class="rb" href="function/approve_p.php?ap=2&borrow_id=<?php echo $sql2['borrow_id']; ?>&se=<?php echo $sql1['s_email']; ?>">ไม่ผ่าน</a></td>
                                    <td><a class="gb" href="function/approve_p.php?ap=1&borrow_id=<?php echo $sql2['borrow_id']; ?>&sf=<?php echo $sql1['s_firstname']; ?>&sl=<?php echo $sql1['s_lastname']; ?>&su=<?php echo $sql1['s_user']; ?>">ผ่าน</a></td>
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