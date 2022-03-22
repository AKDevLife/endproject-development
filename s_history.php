<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S_History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/history.css">
</head>

<body style="background-color: #91AFA8">
    <div class="container-fluid">

        <?php
        include "item/pageheader.php";

        ?>

        <div class="menu">
            <aside>
                <?php
                include "item/menubar_s.php";
                ?>
            </aside>

            <main class="form">
                <div class="box">
                    <h2>สถานะ/ประวัติการยืม</h2>
                    <hr class="s1">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสการยืม</th>
                                    <th>วันที่ทำรายการ</th>
                                    <th>คำร้องขอ</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('function/function.php');
                                $s_user = $_SESSION['s_user'];
                                $eq = new DB_con();
                                $eq1 = new DB_con();
                                $eq2 = new DB_con();

                                $eq_p_borrow = $eq->eq_borrow_suser_fetch($s_user);
                                $i = 1;
                                while ($sql1 = mysqli_fetch_array($eq_p_borrow)) {
                                ?>
                                    <tr>
                                        <td><?php echo $sql1['borrow_id']; ?></td>
                                        <td><?php echo $sql1['DateTime']; ?></td>
                                        <td>
                                            <a class="bb2" href="#popup<?php echo $i; ?>">รายละเอียด</a>

                                            <div id="popup<?php echo $i; ?>" class="overlay">
                                                <div class="popup">
                                                    <h2>รายการอุปกรณ์ที่ต้องการยืม</h2>
                                                    <a class="close" href="s_history.php">&times;</a>
                                                    <div class="content">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ชื่ออุปกรณ์</th>
                                                                    <th>จำนวนที่ยืม</th>
                                                                    <th>วันที่ยืม</th>
                                                                    <th>ถึงวันที่</th>
                                                                    <th>เหตุที่ยืม</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $borrow_id = $sql1['borrow_id'];
                                                                $suser = $eq2->eq_borrow_id_fetch($borrow_id);
                                                                while ($sql2 = mysqli_fetch_array($suser)) {
                                                                ?>
                                                                    <tr>
                                                                        <?php
                                                                        $eq_id = $sql2['eq_id'];
                                                                        $eq_name = $eq1->eq_id_fetch($eq_id);
                                                                        while ($sql3 = mysqli_fetch_array($eq_name)) { ?>
                                                                            <td><?php echo $sql3['eq_name']; ?></td>
                                                                        <?php
                                                                            $i = $i + 1;
                                                                        }
                                                                        ?>
                                                                        <td><?php echo $sql2['eq_number']; ?></td>
                                                                        <td><?php echo $sql2['FromDate']; ?></td>
                                                                        <td><?php echo $sql2['ToDate']; ?></td>
                                                                        <td><?php echo $sql2['Descriptions']; ?></td>
                                                                    </tr>
                                                                <?php
                                                                    $i = $i + 1;
                                                                }
                                                                ?>
                                                            </tbody>
                                                            <tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <?php if ($sql1['Status'] == 1 || $sql1['Status'] == 2) { ?>
                                            <td>
                                                <div class="bb">
                                                    รอการอนุมัติ
                                                </div>
                                            </td>
                                        <?php }
                                        if ($sql1['Status'] == 3 || $sql1['Status'] == 5) { ?>
                                            <td>
                                                <div class="rb">
                                                    ไม่ได้รับการอนุมัติ
                                                </div>
                                            </td>
                                        <?php }
                                        if ($sql1['Status'] == 4) { ?>
                                            <td>
                                                <div class="gb">
                                                    ได้รับการอนุมัติ
                                                </div>
                                            </td>
                                        <?php }
                                        if ($sql1['Status'] == 6) { ?>
                                            <td>
                                                <div class="bb">
                                                    กำลังยืมอุปกรณ์
                                                </div>
                                            </td>
                                        <?php }
                                        if ($sql1['Status'] == 8) { ?>
                                            <td>
                                                <div class="gb">
                                                    คืนอุปกรณ์เรียบร้อย
                                                </div>
                                            </td>
                                        <?php }
                                        if ($sql1['Status'] == 10) { ?>
                                            <td>
                                                <div class="dropdown1">
                                                    <button class="ob">แก้ไขใหม่</button>
                                                    <div class="dropdown-content">
                                                        <a href="#popup">แก้ไขรายการ</a>
                                                        <div id="popup" class="overlay">
                                                            <div class="popup">
                                                                <h3>รายการอุปกรณ์</h3>
                                                                <hr class="s1">
                                                                <a class="close" href="s_history.php">&times;</a>
                                                                <table class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ชื่ออุปกรณ์</th>
                                                                            <th>จำนวนที่ยืม</th>
                                                                            <th>วันที่ยืม</th>
                                                                            <th>ถึงวันที่</th>
                                                                            <th>&nbsp;</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $borrow_id = $sql1['borrow_id'];
                                                                        $suser = $eq2->eq_borrow_id_fetch($borrow_id);
                                                                        while ($sql2 = mysqli_fetch_array($suser)) {
                                                                        ?>
                                                                            <tr>
                                                                                <?php
                                                                                $eq_id = $sql2['eq_id'];
                                                                                $eq_name = $eq1->eq_id_fetch($eq_id);
                                                                                $sql3 = mysqli_fetch_array($eq_name);
                                                                                ?>
                                                                                <td><?php echo $sql3['eq_name']; ?></td>
                                                                                <td><?php echo $sql2['eq_number']; ?></td>
                                                                                <td><?php echo $sql2['FromDate']; ?></td>
                                                                                <td><?php echo $sql2['ToDate']; ?></td>
                                                                                <td><a href="function/edit_delete.php?borrow_id=<?php echo $sql2['borrow_id']; ?>&eq_id=<?php echo $sql2['eq_id']; ?>&eq_number=<?php echo $sql2['eq_number']; ?>" class="btn btn-danger" style="padding: 3px;" onclick="return confirm('ยืนยันว่า จะเอาอุปกรณ์นี้ออก ไม่สามารถแก้คืนได้')">ลบ</a></td>
                                                                            </tr>
                                                                        <?php
                                                                            $i = $i + 1;
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                    <tr>
                                                                        <td colspan="5" align="right">
                                                                            <a class="btn btn-warning mx-1" style="float :right" href="function/edit_send_e.php?borrow_id=<?php echo $sql1['borrow_id']; ?>&s_user=<?php echo $sql1['s_user']; ?>">ส่งคำร้องอีกครั้ง</a>
                                                                            <a class="btn btn-info" style="float :right" href="function/edit_cancel.php?borrow_id=<?php echo $sql1['borrow_id']; ?>">ยกเลิกการยืม</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        <?php } 
                                        if ($sql1['Status'] == 7 || $sql1['Status'] == 9) { ?>
                                            <td>
                                                <div class="rb">
                                                    ถูกยกเลิก
                                                </div>
                                            </td>
                                        <?php } 
                                        if ($sql1['Status'] == 11) { ?>
                                            <td>
                                                <div class="rb">
                                                    ยกเลิกด้วยตัวเอง
                                                </div>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                            <tbody>
                        </table>
                    </form>

                </div>
            </main>
        </div>
        <?php
        include "item/footer.php";
        ?>
    </div>

</body>

</html>