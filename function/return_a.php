<?php
    include_once 'function.php';

    $sql = new DB_con();
    $sql2 = new DB_con();
    $sql3 = new DB_con();
    $sql4 = new DB_con();
    
    $borrow_id = $_GET['borrow_id'];
    $eq_borrow_id_fetch = $sql->eq_borrow_id_fetch($borrow_id);
    while ($row = mysqli_fetch_array($eq_borrow_id_fetch)) {
        $eq_id = $row['eq_id'];
        $eq_id_fetch = $sql2->eq_id_fetch($eq_id);
        $eq_remain_old = mysqli_fetch_array($eq_id_fetch);
        $eq_remain = $eq_remain_old['eq_remain']+$row['eq_number'];
        $remain= $sql3->eq_update_remain($eq_remain, $eq_id);
    }
    $borrow_status_6_8 = $sql4->borrow_status_6_8($borrow_id);

    if ($sql) {
        ?>
                <script>
                    alert("คืนอุปกรณ์สำเร็จ")
                    window.open("../a_borrowing.php", "_self")
                </script>
        
            <?php
            } else {
            ?>
                <script>
                    alert("มีอะไรบางอย่างผิดพลาด")
                </script>
        <?php
            }
?>