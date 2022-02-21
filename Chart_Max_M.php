<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chart Month</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/a_chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php include_once 'function/function.php';
        $MY=$_POST['bdaymonth'];
        $xlables =[]; 
        $ylables =[];
        $c_fetch = new DB_con();
        $eq_fetch = new DB_con();
        $chart = $c_fetch->eq_borrow_CMM_fetch(4,$MY);
        $x=0;
        foreach($chart as $c)
            {
                $x++;
                $eq_id = $c['eq_id'];
                $eq = $eq_fetch-> eq_id_fetch($eq_id);
                $row = mysqli_fetch_array($eq);
            
                $xlables[$x] = $row['eq_name'];
                $ylables[$x] = $c['eq_number'];
                
            }
    ?>
    <script type="text/javascript">
        window.onload = function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php for($a=1;$a<=$x;$a++)
            {echo $xlables[$a].',';
            }?>],
            datasets: [{
                label: '# Number of equipment',
                data: [<?php for($a=1;$a<=$x;$a++)
            {echo $ylables[$a].',';
            }?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    grace: '5%',
                    beginAtZero: true
                }

            },
            plugins: {
                title: {
                    display: true,
                    text: 'อุปกรณ์ที่ถูกยืมมากที่สุดในช่วง <?php echo $MY ?>'
                }
        }
        }
        });
        var image = myChart.toBase64Image();
        console.log(image);
        document.getElementById('btn-download').onclick = function() {
        // Trigger the download
        var a = document.createElement('a');
        a.href = myChart.toBase64Image();
        a.download = 'อุปกรณ์ที่ถูกยืมมากที่สุดในช่วง <?php echo $MY ?>.png';
        a.click();
        }}
    </script>
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

            <div class="form">
                <a href="a_chart_m.php" class="btn">เดือน</a>
                <a href="a_chart_y.php" class="btn">ปี</a>
                <hr class="s1">
                <form action="Chart_Max_M.php" method="post" enctype="multipart/form-data">
                    <input type="month" name="bdaymonth" id="bdaymonth" required>
                    <input type="submit" value="ยืนยัน" class="button" >
                </form>
            <canvas id="myChart" style= "width: 87%; height: 618px; margin:0 auto"></canvas>
            <button id="btn-download" class="btn-download" >Download</button>
        </div>
        </div>
    </div>

</body>
</html>