<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="css/e_history.css">
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
                        <h2>ประวัติการอนุมัติ</h2><hr class="s1">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>คำร้องขอ</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>-</td>
                                <td>
                                <a class="bb2" href="#popup1">รายละเอียด</a>
                                  
                                  <div id="popup1" class="overlay">
                                      <div class="popup">
                                          <h2>รายการอุปกรณ์ที่ต้องการยืม</h2>
                                          <a class="close" href="#">&times;</a>
                                          <div class="content">
                                          <table class="table table-bordered">
                                              <thead>
                                                  <tr>
                                                  <th>ชื่ออุปกรณ์</th>
                                                  <th>จำนวนที่ยืม</th>
                                                  <th>วันที่ยืม</th>
                                                  <th>ถึงวันที่</th>
                                                  <th>เหตุที่ยืม</th>

                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                  </tr>
                                                  <tr>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>

                                                  </tr>
                                                  <tr>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                                      <td>-</td>
                                              
                                                  </tr>
                                              </tbody>
                                              <tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                                </td>
                                <td><div class="rb">
                                    เลยกำหนด
                                </div></td>


                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>-</td>
                                <td>
                                <a class="bb2" href="#popup1">รายละเอียด</a>
                                </td>
                                <td><div class="ob">
                                    ครบกำหนด
                                </div></td>

                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>-</td>
                                <td>
                                <a class="bb2" href="#popup1">รายละเอียด</a>
                                </td>
                                <td><div class="gb">
                                    ยังไม่ครบกำหนด
                                </div></td>
                                
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