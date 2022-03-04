<?php
    include_once 'function.php';
    session_start();
    $approve = new DB_con();
    $noapprove = new DB_con();
    
    $borrow_id = $_GET['borrow_id'];

// ถ้าapเท่ากับ1 แสดงว่ากดผ่าน ให้เปล่ยนค่าStatusเป็น4
if ($_GET['ap'] == '1') {
    // ใช้ในการส่งอีเมล
    $_SESSION['s_email'] = $_GET['se'];
    $sql = $approve->borrow_status_2_4($borrow_id);
    if ($sql) {
        ?>
            <script>
                alert("ดำเนินการสำเร็จ")
                window.open("sendmail_s.php", "_self")
            </script>
        
        <?php
    } else {
        ?>
            <script>
                alert("ดำเนินการไม่สำเร็จ")
                // window.open("../e_approve.php", "_self")
            </script>
        
        <?php
    }
}
// ถ้าapเท่ากับ2 แสดงว่ากดไม่ผ่าน ให้เปล่ยนค่าStatusเป็น5
if ($_GET['ap'] == '2') {
    $_SESSION['s_email'] = $_GET['se'];
    $sql = $noapprove->borrow_status_2_5($borrow_id);
    if ($sql) {
        ?>
            <script>
                alert("ดำเนินการสำเร็จ")
                window.open("sendmail_s_no_e.php", "_self")
            </script>
        
        <?php
    } else {
        ?>
            <script>
                alert("ดำเนินการไม่สำเร็จ")
            </script>
        
        <?php
    }
}
?>