<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S_Edit_Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/info.css">
    <script>
    var check = function() {
    if (document.getElementById('new_s_password1').value == document.getElementById('new_s_password2').value) 
    {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'รหัสผ่านตรงกัน';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'รหัสผ่านไม่ตรงกัน';
        }
    }
    </script>
</head>
<body style="background-color: #91AFA8">
    <div class="container-fluid">
        
        <?php
            include "item/pageheader.php";  
        ?>

        <div class="menu">
                <aside>
                    <ul>
                        <a href=""></a>
                        <li><a href="s_edit_info.php">ถอยกลับ</a></li>
                        <li><a href="index.php">ออกจากระบบ</a></li>
                    </ul>
                </aside>

                <main class="form1"> 
                    
                    <form class="box2" action="function/s_edit_pass.php" method="post" enctype="multipart/form-data">
                        <h2 style="text-align: center;">แก้ไขรหัสผ่าน</h2>
                        <hr class="s1">
                        <label>รหัสผ่านเดิม</label><br>
                        <input type="password" name="old_s_password" id="old_s_password"  required><br>
                        <label>รหัสผ่านใหม่่</label><br>
                        <input type="password" name="new_s_password1" id="new_s_password1" onkeyup='check();' required><br>
                        <label>ยืนยัน-รหัสผ่านใหม่</label><br>
                        <input type="password" name="new_s_password2" id="new_s_password2" onkeyup='check();' required><br>
                        <span id='message'></span>
                        <hr class="s1">
                        <button class="button" type="submit"  name="s_edit_pass" >ยืนยันข้อมูล</button>   
                    </form>

                </main>

        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div>
</body>
</html>