<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A_Equipment_Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/eq_add.css">
</head>
<body style="background-color: #91AFA8">
    <div class="container-fluid">
        <?php
            include "item/pageheader.php";
        ?>

        <div class="main">
            <aside>
                <?php
                    include "item/menubar_a.php";
                ?>
            </aside>
            <?php 
                include_once('function/function.php');
                session_start();
                $_SESSION['eq_id'] = $_GET['eq_id'];
                $eq_id_fetch = new DB_con();
                $eq_id = $_SESSION['eq_id'];
                $sql = $eq_id_fetch->eq_id_fetch($eq_id);
                while($row = mysqli_fetch_array($sql)) {
            ?>
            <form class="form" action="function/eq_edit.php" method="post" enctype="multipart/form-data">
                <h2 style="font-weight: bold;">แก้ไขอุปกรณ์</h2>
                <hr class="s1">
                <label>ชื่ออุปกรณ์</label><br>
                <input type="text" name="eq_name" value="<?php echo $row['eq_name']; ?>"><br>
                <label>จำนวนอุปกรณ์ที่มี</label><br>
                <input type="text" name="eq_remain" value="<?php echo $row['eq_remain']; ?>"><br>
                <label>จำนวนอุปกรณ์ทั้งหมด</label><br>
                <input type="text" name="eq_total" value="<?php echo $row['eq_total']; ?>"><br>
                <label>คำอธิบาย/การใช้งาน</label><br>
                <input type="text" name="eq_descriptions" value="<?php echo $row['eq_descriptions']; ?>"><br>
                <label for="#">ชนิดอุปกรณ์</label><br>
                <select name="eq_typeid" id="eq_typeid">
                        <option value="<?php echo $row['eq_typeid']; ?>" selected ><?php echo $row['eq_typename']; ?></option>
                        <option value="1">IC Digital</option>
                        <option value="2">Controller and Electronic</option>
                        <option value="3">ตัวเก็บประจุ</option>
                        <option value="4">ขดลวดเหนี่ยวนำ (L)</option>
                        <option value="5">โมดูลเซ็นเซอร์</option>
                        <option value="6">Embedded Boards</option>
                        <option value="7">LED</option>
                        <option value="8">โมดูลจอ LCD</option>
                        <option value="9">ครุภัณฑ์</option>
                        <option value="10">อุปกรณ์อื่นๆ</option>
                </select><br>
                <label>ภาพอุปกรณ์</label><br><br>
                <img src="photo_equipment/<?php echo $row['eq_typename']; ?>/<?php echo $row['eq_image']; ?>" class="rounded mx-auto d-block" width="300" alt="">
                <input style="border: solid gray 0.5px;margin-top: 20px;" type="file" name="eq_image"><br><br>
                <?php } ?>
                <button class="button" type="submit" name="eq_update" class="btn">อัพเดทข้อมูล</button>
            </form>
        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div>
</body>
</html>
