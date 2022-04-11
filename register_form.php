<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/registerpage.css">     
</head>
<body style="background-color: #91AFA8">
    <div class="container-fluid">
        <?php
            include "item/pageheader.php";  
        ?>

        <div class="menu">
                <aside>
                    <ul>
                        <li><a href="index.php">ถอยกลับ</a></li>
                    </ul>
                </aside>

                <div class="form">
                    <h2>สมัครสมาชิก</h2><hr class="s1">

                    <form class="box" action="function/register.php" method="post" enctype="multipart/form-data">
                        <h3>Student</h3><hr class="s1">
                        <label>ชื่อ</label><br>
                        <input type="text" name="s_firstname" required><br>
                        <label>นามสกุล</label><br>
                        <input type="text" name="s_lastname" required><br>
                        <label>รหัสนักศึกษา</label><br>
                        <input type="text" name="s_user" required><br>
                        <label>รหัสผ่าน</label><br>
                        <input type="text" name="s_password" required><br>
                        <label>เบอร์โทรติดต่อ</label><br>
                        <input type="text" name="s_phone" required><br>
                        <label for="email">E-mail</label><br>
                        <input type="email" name="s_email" pattern=".+@silpakorn.edu||.+@su.ac.th" size="30" placeholder="@silpakorn or @su.ac.th" title="รูปแบบอีเมลไม่ถูกต้อง" required><br>
                        <label>อาจารย์ที่ปรึกษา</label><br>

                        <select id="text_size" name="p_id">
                            <option selected></option>
                        <?php
                            include_once 'function/function.php';
                            $p_id_fetch = new DB_con();
                            $pif = $p_id_fetch->p_id_fetch();
                            $i = 1;
                            while ($row = mysqli_fetch_array($pif)) {
                        ?>
                            <option value="<?php echo $row['p_id']; ?>">อ.<?php echo $row['p_firstname'];?> <?php echo $row['p_lastname'];?></option>
                        <?php
                            $i = $i + 1;
                            }
                        ?>
                        </select><br>
                        
                        <label >รูปนักศึกษา</label><br>
                        <input type="file" name="s_image" required><br><br>
                        <button class="button" type="submit" name="register">ยืนยัน</button>   
                    </form>

                </div>

        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div> 
</body>
</html>