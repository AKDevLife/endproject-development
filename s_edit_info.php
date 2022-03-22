<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S_Edit_Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/info.css">
</head>
<body style="background-color: #91AFA8">
    <div class="container-fluid">

        <?php
            include "item/pageheader.php";  
            include "function/function.php";
            $s_id=$_SESSION['s_id'];
            $s_info = new DB_con();
            $s_fetch_info = $s_info->s_fetch($s_id);
            $i = 1;
            $row =mysqli_fetch_array($s_fetch_info);  
        ?>

        <div class="menu">
                <aside>
                    <ul>
                        <a href=""></a>
                        <li><a href="s_info.php">ถอยกลับ</a></li>
                        <li><a href="s_edit_password.php">เปลี่ยนรหัสผ่าน</a></li>
                        <li><a href="index.php">ออกจากระบบ</a></li>
                    </ul>
                </aside>

                <main class="form1"> 
                    
                    <form class="box2" action="function/s_edit.php" method="post" enctype="multipart/form-data">
                        <h2 style="text-align: center;">แก้ไขข้อมูล</h2>
                        <hr class="s1">
                        <label>ชื่อ</label><br>
                        <input type="text" name="s_firstname" value='<?php echo $row['s_firstname']; ?>' ><br>
                        <label>นามสกุล</label><br>
                        <input type="text" name="s_lastname"  value='<?php echo $row['s_lastname']; ?>' ><br>
                        <label>รหัสนักศึกษา</label><br>
                        <input type="text" name="s_user" value='<?php echo $row['s_user']; ?>' ><br>
                        <label>เบอร์โทรติดต่อ</label><br>
                        <input type="text" name="s_phone" value='<?php echo $row['s_phone']; ?>' ><br>
                        <label for="email">E-mail</label><br>
                        <input type="email" name="s_email" pattern=".+@silpakorn.edu" size="30" placeholder="@su.ac.th" value='<?php echo $row['s_email']; ?>' ><br>
                        <label>รูปนักศึกษา</label><br><br>
                        <img class="inner-img rounded mx-auto d-block" src=photo_student/<?php echo $row['s_image']; ?> width="210" height="220" /> <br>
                        <input style="border: solid gray 0.5px;" type="file" name="s_image" ><br><br>
                        <hr class="s1">
                        <button class="button" type="submit" name="s_edit" >ยืนยันข้อมูล</button>   
                    </form>
                    
                </main>

        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div>
</body>
</html>