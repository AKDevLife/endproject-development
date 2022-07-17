<?php
session_start();
$borrow_id = $_SESSION['borrow_id'];
$reason = $_SESSION['reason'];
$s_email = $_SESSION['s_email'];

$name = "Eqborrow";
$email = 'electron@electronic-borrow-equipment.com';
$sj = 'Electronic Equipment Borrowing System';
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
            <div>
                <h1><strong style='color:#FC4F4F;'> แก้ไขข้อมูลการยืมอุปกรณ์ของคุณ </strong> </h1>	
                <h2><strong > เหตุลผลที่ให้กลับมาแก้ไข: $reason </strong> </h2><br>	
                <h2><strong > รหัสการยืม: $borrow_id </strong> </h2><br>	
                <a href='https://electronic-borrow-equipment.com/' target='_blank'>
                    <h2><strong style='color:#3c83f9;'> >> เข้าสู่เว็บไซต์ เพื่อทำการแก้ไข << </strong> </h2>
                </a>
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
    window.open("../e_approve.php", "_self")
</script>
<?php
?>