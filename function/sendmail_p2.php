<?php
session_start();
$s_firstname = $_SESSION['s_firstname'];
$s_lastname = $_SESSION['s_lastname'];
$p_email = $_SESSION['p_email'];
$s_user = $_SESSION['s_user'];
$name = "Eqborrow";
$email = "electron@electronic-borrow-equipment.com";
$sj = "Electronic Equipment Borrowing System";
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
                <h2>คำร้องขอยืมอุปกรณ์โดย : $s_firstname $s_lastname $s_user <strong style='color:#0000ff;'></strong></h2>
                <a href='https://electronic-borrow-equipment.com/' target='_blank'>
                    <h1><strong style='color:#3c83f9;'> >> เข้าสู่เว็บไซต์ เพื่อทำการอนุมัติหรือไม่อนุมัติ<< </strong> </h1>
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

$to = $p_email;
$subject = $sj;
$message = $msg;


$header  = 'From: ' . $email . "\r\n";
$header .= 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

$retval = mail($to, $subject, $message, $header);

?>
<script>
    window.open("../s_history.php", "_self")
</script>
<?php
?>