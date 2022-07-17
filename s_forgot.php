<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
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
                    <div class="box">
                    <h2>ลืมรหัสผ่าน</h2><hr class="s1">
                    <form name="form1" method="post" action="function/sendmail_s_forget2.php">
                        <p>กรอก E-mail ของนักศึกษา</p>
                        <input type="email" name="s_email" pattern=".+@silpakorn.edu" size="30" placeholder="@silpakorn.edu" required><br>
                        <br>
                        <button class="button" type="submit" name="forgot" >ยืนยัน</button>   
                    </form>
                    </div>

                </div>

        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div> 
    
</body>
</html>