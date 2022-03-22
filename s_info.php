<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S_Info</title>
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
            $row =mysqli_fetch_array($s_fetch_info);
        ?>

        <div class="menu">
                <aside>
                    <?php
                        include "item/menubar_s.php";
                    ?>
                </aside>

                <main class="form1"> 
                    
                    
                    <div class="box">
                        <h2 style="text-align: center;">ข้อมูลสมาชิก</h2>
                        <img class="inner-img rounded mx-auto d-block" src=photo_student/<?php echo $row['s_image']; ?> width="210" height="220" />
                        <hr class="s1">
                        <p>ชื่อ : <?php echo $row['s_firstname'];?></p>
                        <p>นามสกุล : <?php echo $row['s_lastname'];?></p>
                        <p>รหัสประจำตัว : <?php echo $row['s_user'];?></p>
                        <p>เบอร์โทรติดต่อ : <?php echo $row['s_phone'];?></p>
                        <p>e-mail : <?php echo $row['s_email'];?></p>
                        <p>อาจารย์ที่ปรึกษา : <?php echo $row['p_firstname'];?> <?php echo $row['p_lastname'];?></p>
                        <hr class="s1">
                        <button class="button" type="submit" name="#" onclick="window.location.href='s_edit_info.php'">แก้ไขข้อมูล</button>   
                        
                    </div><br>

                </main>

        </div>
        <?php
            include "item/footer.php";  
        ?>
    </div>

</body>
</html>