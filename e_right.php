<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_Right</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/p_approve.css">
</head>

<body style="background-color: #91AFA8">
    <div class="container-fluid">

        <?php
            include "item/pageheader.php";  
           
        ?>

        <div class="menu">
                <aside>
                    <?php
                        include "item/menubar_e.php";
                    ?>
                </aside>

                <main class="form"> 
                    <div class="box">
                        <h2>การให้สิทธ์</h2><hr class="s1">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <h3 style="text-align: left;">อาจารย์ : </h3>
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>รหัสประจำตัว</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>สิทธิ์</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" size="10">
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    <select name="#" id="#">
                                        <optgroup label="สิทธิ์">
                                            <option value="1">ให้สิทธิ์การอนุมัติ</option>
                                            <option value="2">ให้สิทธิ์การทั้งหมด</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td><button class="gb">ยืนยัน</button></td>

                            </tr>
                            
                        </tbody>
                        <tbody>
                        </table>
                    </form>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <h3 style="text-align: left;">นักศึกษา : </h3>
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>รหัสประจำตัว</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>สิทธิ์</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" size="10"></td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    <select name="#" id="#">
                                        <optgroup label="สิทธิ์">
                                            <option value="1">ให้สิทธิ์การอนุมัติ</option>
                                            <option value="2">ให้สิทธิ์การทั้งหมด</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td><button class="gb">ยืนยัน</button></td>

                            </tr>
                            
                        </tbody>
                        <tbody>
                        </table>
                    </form>
                    </div>
                </main>
            </div>
        <?php
            include "item/footer.php";  
        ?>
    </div>
    
</body>

</html>