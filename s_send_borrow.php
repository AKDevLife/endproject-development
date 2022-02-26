<?php
session_start();
include_once 'function/function.php';
$s_id = $_SESSION['s_id'];
$eq_id = $_GET['eq_id'];
$act = $_GET['act'];

if ($act == 'add' && !empty($eq_id)) {
        $_SESSION['cart'][$eq_id] = 1;
        $_SESSION['eq_id'] = $eq_id;
}

if ($act == 'remove' && !empty($eq_id)) {
    unset($_SESSION['cart'][$eq_id]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S_Send_Borrow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/send_borrow.css">
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
                    <h2>กรอกข้อมูลการขอยืม</h2>
                    <hr class="s1">
                    <div>
                        <form action="function/s_borrow.php" method="post" enctype="multipart/form-data">
                            <!-- ค้นหาข้อมูลและส่งชื่อ นาสกุลของนักศึกษา และอ.ที่ปรึกษาของคนนั้นไป -->
                            <?php
                                $s_id = $_SESSION['s_id'];
                                $s_info = new DB_con();
                                $s_fetch_info = $s_info->s_fetch($s_id);
                                $row2 = mysqli_fetch_array($s_fetch_info);
                            ?>
                            <!-- แถบที่ซ่อน -->
                            <div class="visually-hidden-focusable">
                                <input type="text" name="s_firstname" value="<?php echo $row2['s_firstname']; ?>">
                                <input type="text" name="s_lastname" value="<?php echo $row2['s_lastname']; ?>">
                                <input type="text" name="p_email" value="<?php echo $row2['p_email']; ?>">
                                <input type="text" name="s_user" value="<?php echo $row2['s_user']; ?>">
                            </div>
                            <!-- แถบใส่ข้อมูลปกติ -->
                            <div class="row mb-2 dr">
                                <div class="col">
                                    <label for="FromDate" class="form-label ml-1">วันที่ยืม</label>
                                    <input type="date" class="form-control" name="FromDate" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="ToDate" class="form-label ml-1">ถึงวันที่</label>
                                    <input type="date" class="form-control" name="ToDate" required>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col pt-2">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            <h5>จุดประสงค์ในการนำไปใช้งาน</h5>
                                        </label>
                                    </div>
                                    <div class="form-check col-7">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="text_size" name="sbr_objective">
                                            <option selected></option>
                                            <option value="งานโครงงานวิศกรรมไฟฟ้า">งานโครงงานวิศกรรมไฟฟ้า</option>
                                            <option value='งานวิจัย'>งานวิจัย</option>
                                            <option value='งานบริการวิชาการ'>งานบริการวิชาการ</option>
                                            <option value='อื่นๆ'>อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="s1"><br>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>รหัสอุปกรณ์</th>
                                        <th>ชื่ออุปกรณ์</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวน</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $zz = 0;
                                    $amount = 1;
                                    include_once('function/function.php');
                                    $fetchdata = new DB_con();
                                    $eq_id = $_SESSION['eq_id'];
                                    if (!empty($_SESSION['cart'])) {
                                        // $value คือ ค่า1 จาก บรรทัดที่9 จะเปลี่ยนเป็นชื่ออะไรก็ได้ เพราะเป็นแค่ค่าตัวรับค่า ที่มาจาก $eq_id ที่เป็นตัวชี้ตำแหน่ง
                                        foreach ($_SESSION['cart'] as $eq_id => $value) {
                                            $zz++;
                                            $sql = $fetchdata->eq_id_fetch($eq_id);
                                            $row = mysqli_fetch_array($sql)
                                    ?>
                                            <tr>
                                                <td><?php echo $row['eq_id']; ?></td>
                                                <td><?php echo $row['eq_name']; ?></td>
                                                <td><?php echo $row['eq_descriptions']; ?></td>
                                                <td><input type='text' name='eq_amount<?php echo $zz ?>' value='<?php echo $amount ?>' size='2'></td>
                                                <td><a href="s_send_borrow.php?eq_id=<?php echo $row['eq_id'] ?>&act=remove" class="btn btn-danger">ลบ</a></td>
                                                <input type="hidden" name='eq_id<?php echo $zz ?>' value="<?php echo $row['eq_id']; ?>">
                                                
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tr>
                                    <td colspan="5" align="right"><a class="btn btn-info" href="s_eq_borrow.php">เพิ่มอุปกรณ์ตัวอื่น</a>
                                        <input type="hidden" name='loop' value=<?php echo $zz ?>>
                                        <button type="submit" name='s_borrow' class="button">ส่งคำขอยืม</button>
                                    </td>
                                </tr>
                        </form>
                        <h6 style="color: red;">* โปรดระบุจำนวนอุปกรณ์ไม่เกินจำนวนคงเหลือของอุปกรณ์</h6>
            </main>
        </div>
    </div>

</body>

</html>