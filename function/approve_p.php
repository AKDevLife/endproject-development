<?php
    include_once 'function.php';
    session_start();
    $approve = new DB_con();
    $noapprove = new DB_con();

    $borrow_id = $_GET['borrow_id'];

// ถ้าapเท่ากับ1 แสดงว่ากดผ่าน ให้เปล่ยนค่าStatusเป็น4
if ($_GET['ap'] == '1') {
    // ใช้ในการส่งอีเมล
    $_SESSION['s_firstname'] = $_GET['sf'];
    $_SESSION['s_lastname'] = $_GET['sl'];
    $_SESSION['s_user'] = $_GET['su'];  //TODO: เพิ่มการส่ง session s_user ไปด้วย
    $sql = $approve->borrow_status_1_2($borrow_id);
    if ($sql) {
        ?>
            <script>
                alert("ดำเนินการสำเร็จ")
                window.open("sendmail_e.php", "_self")
            </script>
        
        <?php
    } else {
        ?>
            <script>
                alert("ดำเนินการไม่สำเร็จ")
                window.open("../p_approve.php", "_self")
            </script>
        
        <?php
    }
}
// ถ้าapเท่ากับ2 แสดงว่ากดไม่ผ่าน ให้เปล่ยนค่าStatusเป็น5
if ($_GET['ap'] == '2') {
    $sql = $noapprove->borrow_status_1_3($borrow_id);
    if ($sql) {
        ?>
            <script>
                alert("ดำเนินการสำเร็จ")
                window.open("sendmail_s_no_p.php", "_self")
            </script>
        
        <?php
    } else {
        ?>
            <script>
                alert("ดำเนินการไม่สำเร็จ")
                window.open("../p_approve.php", "_self")
            </script>
        
        <?php
    }
}
?>