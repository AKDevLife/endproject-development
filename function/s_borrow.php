<?php
    include_once 'function.php';
    session_start();
    $s_id = $_SESSION['s_id'];
        
    $s_fetch = new DB_con();
    $check_eq_number = new DB_con();
    $eq_id_fetch = new DB_con();
    $eq_update_remain = new DB_con();
    $eq_p_borrow = new DB_con();
    
    
    // ใช้ในการบันทึกข้อมูลการขอยืม
    $s_fetch = $s_fetch->s_fetch($s_id);
    $row = mysqli_fetch_array($s_fetch);
    $s_user =$row['s_user'];
    $FromDate = $_POST['FromDate'];
    $ToDate = $_POST['ToDate']; 
    $Descriptions = $_POST['sbr_objective'];
    $loopnum = $_POST['loop'];

    // ใช้ในการส่งอีเมล
    $_SESSION['s_firstname'] = $_POST['s_firstname'];
    $_SESSION['s_lastname'] = $_POST['s_lastname'];
    $_SESSION['p_email'] = $_POST['p_email'];

    // เช็คค่า eq_numberทั้งหมดที่ส่งมาก่อนจะไปทำการเพิ่มและอัปเดตข้อมูล
    for($c=1;$c<=$loopnum;$c++)
    {   
        $eq_id = $_POST['eq_id'.$c];
        $eq_number_check = $_POST['eq_amount'.$c];
        $check = $check_eq_number->eq_id_fetch($eq_id);
        $row_check = mysqli_fetch_array($check);
        if($row_check['eq_remain']< $eq_number_check){
            goto a;
        }
    }
    // สุ่มค่าใส่ในรหัสการขอยืม โดยไม่มีการเช็คค่าซ้ำ
    $numrand = (mt_rand(1, 100000));
    $borrow_id = $numrand;
    // เพิ่มและอัปเดตข้อมูล
    for($j=1;$j<=$loopnum;$j++)
    {   
        $eq_id = $_POST['eq_id'.$j];
        $eq_number = $_POST['eq_amount'.$j];
        $eq_fetch_info = $eq_id_fetch->eq_id_fetch($eq_id);
        $eq_info =mysqli_fetch_array($eq_fetch_info);
        $eq_remain = $eq_info['eq_remain']-$eq_number;
        $remain= $eq_update_remain->eq_update_remain( $eq_remain, $eq_id);


        $sql=$eq_p_borrow->eq_borrow_insert($borrow_id, $s_user, $eq_id , $eq_number, $FromDate, $ToDate ,$Descriptions);   
    }
    if ($remain && $sql) {
        unset($_SESSION['cart']);
        ?>
                <script>
                    alert("ทำการยืมสำเร็จ")
                    window.open("sendmail_p.php", "_self")
                </script>
        
            <?php
            } else {
            a:
            ?>
                <script>
                    alert("จำนวนอุปกรณ์ ไม่พอให้ยืม")
                    window.open("../s_eq_borrow.php", "_self")
                </script>
        <?php
            }
?>