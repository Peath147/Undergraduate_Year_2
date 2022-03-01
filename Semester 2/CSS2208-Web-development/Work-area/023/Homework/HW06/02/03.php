<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมคำนวณค่าจ้างค่าตัดหญ้า</title>

    <style>
        .box {
            width: 300px;
            padding: 20px;
            border: 5px solid red;
        }
    </style>

</head>

<body>

    <div class="box">
        <h3>โปรแกรมคำนวณค่าจ้างค่าตัดหญ้า</h3>
        ความยาวของรั้วบ้าน : <?php echo $_GET['L1']; ?><br>
        ความกว้างของรั้วบ้าน : <?php echo $_GET['W1']; ?><br>
         ความยาวของตัวบ้าน : <?php echo $_GET['L2']; ?><br>
        ความกว้างของตัวบ้าน : <?php echo $_GET['W2']; ?><br>
        อัตราค่าจ้างต่อตารางเมตร : <?php echo $_GET['Rate']; ?><br>
        <hr>
        <?php
        $L1 = $_GET['L1'];
        $W1 = $_GET['W1'];
        $L2 = $_GET['L2'];
        $W2 = $_GET['W2'];
        $Rate = $_GET['Rate'];
        $Area1 = $L1 * $W1;
        $Area2 = $L2 * $W2;
        $Area3 = $Area1 - $Area2;
        $Money = $Area3 * $Rate;
        ?>
        จำนวนเงินที่ต้องจ่าย = <?php echo $Money ?><br>
        พื้นที่ของรั้วบ้าน = <?php echo $Area1 ?><br>
        พื้นที่ของตัวบ้าน = <?php echo $Area2 ?><br>
        พื้นที่สนามหญ้า = <?php echo $Area3 ?><br>
    </div>

</body>

</html>

