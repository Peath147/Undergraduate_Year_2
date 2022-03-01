<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมหาพื้นที่สามเหลี่ยม</title>
</head>

<body>

    <h3>โปรแกรมหาพื้นที่สามเหลี่ยม</h3>
    <p>จงเขียนโปรแกรมหาพื้นที่สามเหลี่ยม ที่มีความยาวฐานเท่ากับ 10
        ซม. และส่วนสูงเท่ากับ 5 ซม. มีพื้นที่เท่าไร</p>
    <?php
    $base = 10;
    $high = 5;
    $area = 0.5 * $base * $high;
    echo "มีพื้นที่ = ", $area, " ตารางเซนติเมตร";
    ?>

</body>

</html>
