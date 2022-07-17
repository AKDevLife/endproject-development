<?php
session_start();
if (isset($_POST['forgot']) && $_POST['s_email']) {
    include_once 'function.php';
    $s_email = $_POST['s_email'];
    $reset_password = new DB_con();
    $select = $reset_password->reset_password($s_email);
    if (mysqli_num_rows($select) == 1) //เช็คว่ามี email ในดาต้าเบสมั้ยแล้วดึงค่ามา
    {
        while ($row = mysqli_fetch_array($select)) {
            $email = $row['s_email'];
            $pass = $row['s_password'];
        }

        $name = "Eqborrow";
        $email = 'electron@electronic-borrow-equipment.com';
        $sj = "Reset Password";
        $msg = "
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8'/>
        <title>Electronic Equipment Borrowing System</title>
    </head>
    <body>
        <h1 style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
            <img src='https://cdn-icons-png.flaticon.com/512/2983/2983973.png' style='width: 80px;'>
            Electronic Equipment Borrowing System
        </h1>
        <div style='padding:20px;'>
            <div style='text-align:center;margin-bottom:50px;'>
                <img src='https://images.unsplash.com/photo-1555664424-778a1e5e1b48?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80' style='width:100%' />					
            </div>
            <div>				
                
                 <a href='https://electronic-borrow-equipment.com/s_newPassword.php?key=" . $email . "&reset=" . $pass . "' target='_blank'>
                    <h2><strong style='color:#3c83f9;'> >> เข้าสู่เว็บไซต์ เพื่อเข้าหน้าเปลี่ยนรหัส << </strong> </h2>
                </a>
            </div>
            <div style='margin-top:30px;'>
                <hr>
            </div>
        </div>
        <div style='background: #3b434c;color: #a2abb7;padding:30px;'>
            <div style='text-align:center'> 
                2022 © Electronic Equipment Borrowing System
            </div>
        </div>
    </body>
</html>
";

        $to = $s_email;
        $subject = $sj;
        $message = $msg;

        $header  = 'From: ' . $email . "\r\n";
        $header .= 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $retval = mail($to, $subject, $message, $header);

?>
        <script>
            alert("ส่งลิ้งรีเซ็ตรหัสผ่านไปยัง E-mail เรียบร้อยแล้ว");
            window.open("../index.php", "_self")
        </script>
    <?php

    }
    if (mysqli_num_rows($select) == 0) {  // ถ้าไม่มี email ในดาต้าเบส
    ?>
        <script>
            alert("E-mail ไม่ถูกต้อง")
            window.open("../s_forgot.php", "_self")
        </script>
<?php
    }
}
?>