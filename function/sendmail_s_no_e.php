<?php
include_once '../phpmailer/PHPMailerAutoload.php';
session_start();
$s_email = $_SESSION['s_email'];

header('Content-Type: text/html; charset=utf-8');

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$gmail_username = "eqborrow@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "Eqborrow.4"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1

$sender = "Eqborrow"; // ชื่อผู้ส่ง
$email_sender = "eqborrow@gmail.com"; // เมล์ผู้ส่ง 
$email_receiver = $s_email; // เมล์ผู้รับ *** ไปเปลี่ยนEmailสำหรับเทส ที่ฐานข้อมูล tb_professor ตรง s_email

$subject = "ผลการอนุมัติการยืมอุปกรณ์ล่าสุดของคุณ"; // หัวข้อเมล์

$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->Subject = $subject;

$email_content = "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8'/>
			<title>ทดสอบการส่ง Email</title>
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
                	<h1><strong style='color:#FC4F4F;'> การยืมอุปกรณ์ของคุณไม่ได้รับการอนุมัติ </strong> </h1><br>	
					<a href='http://localhost/EndProject/index.php' target='_blank'>
						<h2><strong style='color:#3c83f9;'> >> คลิ๊กที่นี่ เพื่อเข้าสู่เว็บไซต์ << </strong> </h2>
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
//  ถ้ามี email ผู้รับ
if ($email_receiver) {
	$mail->msgHTML($email_content);

	if (!$mail->send()) {  // สั่งให้ส่ง email
		// กรณีส่ง email ไม่สำเร็จ
		echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
		echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
	} else {
		// กรณีส่ง email สำเร็จ
?>
		<script>
			window.open("../e_approve.php", "_self")
		</script>
<?php
	}
}
?>