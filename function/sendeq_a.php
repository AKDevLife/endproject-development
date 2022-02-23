<?php
    include_once 'function.php';
    $sendeq = new DB_con();
    $borrow_id = $_GET['borrow_id'];
    $sql = $sendeq->borrow_status_4_6($borrow_id);
    if ($sql) {
        ?>
            <script>
                alert("ดำเนินการสำเร็จ")
                window.open("../a_sendeq.php", "_self")
            </script>
        
        <?php
    } else {
        ?>
            <script>
                alert("ดำเนินการไม่สำเร็จ")
            </script>
        
        <?php
    }

?>