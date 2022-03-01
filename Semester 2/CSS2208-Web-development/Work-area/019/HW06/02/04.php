<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมคำนวณค่าผ่อนรถยนต์</title>

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
        <h3>โปรแกรมคำนวณค่าผ่อนรถยนต์</h3>
        ราคารถยนต์ : <?php echo $_GET['price']; ?><br>
        เงินดาวน์ : <?php echo $_GET['rate']; ?><br>
        อัตราดอกเบี้ย : <?php echo $_GET['increase']; ?><br>
        จำนวนปีที่จะผ่อน : <?php echo $_GET['year']; ?><br>
        <?php
        $price = $_GET['price'];
        $rate = $_GET['rate'];
        $increase = $_GET['increase'];
        $year = $_GET['year'];

        $money1 = $price - $rate;
        $interate = (($money1 * $increase) / 100);
        $interate_sum = $interate * $year;
        $money_pay = $money1 + $interate_sum;
        $monthly = ($money_pay / ($year * 12));
        ?>
        <hr>
        จำนวนเงินที่ต้องจ่าย : <?php echo $money_pay; ?><br>
        จำนวนเงินที่จะผ่อนต่อเดือน : <?php echo $monthly; ?><br>
    </div>
</body>

</html>

