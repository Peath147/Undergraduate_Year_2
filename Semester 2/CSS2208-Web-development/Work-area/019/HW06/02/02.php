<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมหาพื้นที่สามเหลี่ยม</title>

    <style>
        .box{
            width: 300px;
            padding: 20px;
            border: 5px solid red;
        }
    </style>

</head>

<body>

    <div class="box">
        <h3>โปรแกรมหาพื้นที่สามเหลี่ยม</h3>
        ความยาวฐาน : <?php echo $_GET["base"]; ?><br>   
        ความยาวสูง : <?php echo $_GET["high"]; ?><br>
        <?php
        $base = $_GET["base"];
        $high = $_GET["high"];
        $area = ($base * $high) / 2;
        ?>
        พื้นที่สามเหลี่ยม = <?php echo $area; ?><br>
    </div>

</body>

</html>
