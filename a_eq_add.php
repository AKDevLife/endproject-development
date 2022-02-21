<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A_Equipment_Add</title>
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
            
            <form class="form" action="function/eq_add.php" method="post" enctype="multipart/form-data">
                <h2 style="font-weight: bold;">เพิ่มรายการอุปกรณ์</h2>
                <hr class="s1">
                <label>ชื่ออุปกรณ์</label><br>
                <input type="text" name="eq_name" placeholder="ชื่อของอุปกรณ์.." required><br>
                <label>จำนวนอุปกรณ์ที่มี</label><br>
                <input type="text" name="eq_remain" placeholder="กรอกจำนวนอุปกรณ์ที่มี.." required><br>
                <label>จำนวนอุปกรณ์ทั้งหมด</label><br>
                <input type="text" name="eq_total" placeholder="กรอกจำนวนอุปกรณ์ทั้งหมด.." required><br>
                <label>คำอธิบาย/การใช้งาน</label><br>
                <input type="text" name="eq_descriptions" placeholder="คำอธิบายอุปกรณ์.." required><br>
                <label for="#">ชนิดอุปกรณ์</label><br>
                <select name="eq_typeid" id="eq_typeid">
                    <optgroup label="อุปกรณ์">
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
                    </optgroup>
                </select><br>
                <label>ภาพอุปกรณ์</label><br><br>
                <input style="border: solid gray 0.5px;" type="file" name="eq_image"><br><br>
                <button class="button" type="submit" name="login" class="btn">เพิ่มข้อมูล</button>
            </form>
        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div>
</body>
</html>