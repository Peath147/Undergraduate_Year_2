<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ขอบเขตตัวแปรแบบฟังก์ชันพารามิเตอร์ </title>
</head>

<body>

    <?php
    echo "<h2>ขอบเขตตัวแปรแบบฟังก์ชันพารามิเตอร์ </h2>";
    echo "<h3>โปรแกรมหาพื้นที่สามเหลี่ยม </h3>";
    $area2 = TriAngleArea(20, 30); // เรียกฟังก์ชันโดยส่งค่า 20 ไปให้ตัวแปร
    // $base ส่งค่า 30 ไปให้ตัวแปร $high
    echo 'พื้นที่ของสามเหลี่ยมที่มีฐาน = 20 ที่มีความสูง = 30 = ' . $area2;
    function TriAngleArea($base, $high)
    { //ฟังก์ชันที่มีพารามิเตอร์ $base และ $high
        $area = ($base * $high) / 2;
        return $area;
    }
    ?>

</body>

</html>
