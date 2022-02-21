<?php
include_once 'function.php';
session_start();
$s_id=$_SESSION['s_id'];
$updatedata = new DB_con();
$s_info = new DB_con();
$s_fetch_info = $s_info->s_fetch($s_id);
$i = 1;
$row =mysqli_fetch_array($s_fetch_info);
$old_s_password = md5($_POST['old_s_password']);
$new_s_password1 = md5($_POST['new_s_password1']);
$new_s_password2 = md5($_POST['new_s_password2']);

if($old_s_password == $row['s_password']){
$sql = $updatedata->s_update_pass($new_s_password1, $s_id);
if ($sql) {
    ?>
            <script>
                alert("เปลี่ยนรหัสผ่านสำเร็จ")
                window.open("../s_info.php", "_self")
            </script>
    
        <?php
        } else {
        ?>
            <script>
                alert("เปลี่ยนรหัสผ่านไม่สำเร็จ")
                window.open("../s_edit_password.php", "_self")
            </script>
    <?php
        }
}
else if($old_s_password != $row['s_password']){
        ?>
                <script>
                    alert("รหัสผ่านเก่าไม่ตรงกัน")
                    window.open("../s_edit_password.php", "_self")
                </script>
        
            <?php
} 
else{
    ?>
    <script>
        alert("ERROR")
        window.open("../s_edit_info.php", "_self")
    </script>
    <?php
}


