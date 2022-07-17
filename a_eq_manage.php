<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A_Equipment_Manage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/eq_manage.css">
</head>
<body style="background-color: #91AFA8">
    <div class="container-fluid">

        <?php
            include "item/pageheader.php";
        ?>
            
            <div class="main">
                <aside>
                    <?php
                        include "item/menubar_a.php";
                    ?>
                </aside>

                <main style="background-color: #f2f2f2;">

                <div class="container">
                    <form class="row justify-content-end py-2" action="a_eq_manage_extra.php" method="GET">
                    <div class="btn-group col-2 ">
                            <select name="type" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <option value=11>--- หมวดหมู่อุปกรณ์ ---</option>
                                <ul class="dropdown-menu">
                                    <?php
                                    include_once('function/function.php');
                                    $eq_type_fetch = new DB_con();
                                    $sql = $eq_type_fetch->eq_type_fetch();
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <li><a>
                                                <option value=<?php echo $i ?>><?php echo $row['eq_typename']; ?>
                                            </a></li>
                                    <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </ul>
                            </select>
                        </div>
                        <input class="col-3 mx-5" type="search" placeholder="Search" aria-label="Search" name="qt">
                        <button class="btn btn-success col-1 " type="submit">Search</button>
                    </form>
                </div>

                <?php 
                    include_once('function/function.php');
                    $fetchdata = new DB_con();
                    $sql = $fetchdata->eq_fetch();
                    $i = 1;
                    while($row = mysqli_fetch_array($sql)) {
                ?>

                <div class="item">
                    <div class="img">
                        <a href="https://www.google.com/search?q=<?php echo $row['eq_name']; ?>" target="_blank">
                        <img src="photo_equipment/<?php echo $row['eq_typename']; ?>/<?php echo $row['eq_image']; ?>" alt=""></a>
                    </div>
                    <div class="content">
                        <h3><?php echo $row['eq_name']; ?></h3>
                        <a class="other" href="https://www.google.com/search?q=<?php echo $row['eq_name']; ?>">อ่านเพิ่มเติม</a>
                        <h4>คงเหลือ: <?php echo $row['eq_remain']; ?></h4>
                    </div>
                    <div class="footer">
                        <button type="button" class="btn btn-success btn_edit "  onclick="window.location.href='a_eq_edit.php?eq_id=<?php echo $row['eq_id']; ?>'">แก้ไข</button>
                        <button type="button" class="btn btn-danger btn_delete"  onclick="window.location.href='function/eq_delete.php?eq_id=<?php echo $row['eq_id']; ?>'">ลบ</button>
                    </div>
                </div>

                <?php 
                    $i = $i+1;
                    }
                ?>


            </main>
        </div>
        <?php
            include "item/footer.php";  
        ?>          
    </div>
</body>
</html>