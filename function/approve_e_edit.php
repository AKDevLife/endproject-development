<?php
    include_once 'function.php';
    session_start();
    $edit = new DB_con();

    $borrow_id = $_POST['borrow_id'];

    $sql = $edit->borrow_status_2_10($borrow_id);
    $_SESSION['borrow_id'] = $borrow_id;
    $_SESSION['s_email'] = $_POST['s_email'];
    $_SESSION['reason'] = $_POST['reason'];
    if ($sql) {
        ?>
            <script>
                alert("ดำเนินการสำเร็จ")
                window.open("sendmail_s_edit_e.php", "_self")
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