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
    <script>
        function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
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
                        <li><a href="index.php">ถอยกลับ</a></li>
                    </ul>
                </aside>

                <div class="form">
                    <div class="box">
                      <?php
                          if($_GET['key'] && $_GET['reset'])
                          {
                              include_once('function/function.php');
                            $email=$_GET['key'];
                            $pass=$_GET['reset'];
                          $reset_password = new DB_con();
                          $select = $reset_password->reset_password2($email,$pass);
                            if(mysqli_num_rows($select)==1)
                            {
                              ?>
                              <form method="post" action="function/submit_new.php">
                              <input type="hidden" name="email" value="<?php echo $email;?>">
                              <p>กรอกรหัสผ่านใหม่</p>
                              <input type="password" name='password' id="myInput"><br><br>
                              <input type="checkbox" onclick="myFunction()">Show Password
                              <br><br>
                              <input class="button"  type="submit" name="submit_password">
                              </form>
                              <?php
                            }
                            else {
                            ?>
                        <script>
                            alert("ลิ้งนี้ใช้ไม่ได้แล้ว")
                            window.open("index.php", "_self")
                        </script>
                        <?php
                            }
                          }
                          ?>
                    </div>

                </div>

        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div> 
    
</body>
</html>

