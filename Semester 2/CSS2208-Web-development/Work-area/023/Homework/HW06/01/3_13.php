<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การใช้อาร์เรย์สามมิติแบบใช้ตัวบอกตำแหน่งเป็นตัวเลข</title>
</head>

<body>

    <?php
    echo "<h2> การใช้อาร์เรย์สามมิติแบบใช้ตัวบอกตำแหน่งเป็นตัวเลข </h2> ";
    $Condo[0][0][0] = "ห้อง A1";
    $Condo[0][1][0] = "ห้อง A2";
    $Condo[0][2][0] = "ห้อง A3";
    $Condo[1][0][0] = "ห้อง A4";
    $Condo[1][1][0] = "ห้อง A5";
    $Condo[1][2][0] = "ห้อง A6";
    $Condo[2][0][0] = "ห้อง A7";
    $Condo[2][1][0] = "ห้อง A8";
    $Condo[2][2][0] = "ห้อง A9";
    $Condo[0][0][1] = "ห้อง B1";
    $Condo[0][1][1] = "ห้อง B2";
    $Condo[0][2][1] = "ห้อง B3";
    $Condo[1][0][1] = "ห้อง B4";
    $Condo[1][1][1] = "ห้อง B5";
    $Condo[1][2][1] = "ห้อง B6";
    $Condo[2][0][1] = "ห้อง B7";
    $Condo[2][1][1] = "ห้อง B8";
    $Condo[2][2][1] = "ห้อง B9";
    echo '$Condo[0][0][0] = ' . $Condo[0][0][0] . '<br>';
    echo '$Condo[0][1][0] = ' . $Condo[0][1][0] . '<br>';
    echo '$Condo[0][2][0] = ' . $Condo[0][2][0] . '<br>';
    echo '$Condo[1][0][0] = ' . $Condo[1][0][0] . '<br>';
    echo '$Condo[1][1][0] = ' . $Condo[1][1][0] . '<br>';
    echo '$Condo[1][2][0] = ' . $Condo[1][2][0] . '<br>';
    echo '$Condo[2][0][0] = ' . $Condo[2][0][0] . '<br>';
    echo '$Condo[2][1][0] = ' . $Condo[2][1][0] . '<br>';
    echo '$Condo[2][2][0] = ' . $Condo[2][2][0] . '<br>';
    echo '$Condo[0][0][1] = ' . $Condo[0][0][1] . '<br>';
    echo '$Condo[0][1][1] = ' . $Condo[0][1][1] . '<br>';
    echo '$Condo[0][2][1] = ' . $Condo[0][2][1] . '<br>';
    echo '$Condo[1][0][1] = ' . $Condo[1][0][1] . '<br>';
    echo '$Condo[1][1][1] = ' . $Condo[1][1][1] . '<br>';
    echo '$Condo[1][2][1] = ' . $Condo[1][2][1] . '<br>';
    echo '$Condo[2][0][1] = ' . $Condo[2][0][1] . '<br>';
    echo '$Condo[2][1][1] = ' . $Condo[2][1][1] . '<br>';
    echo '$Condo[2][2][1] = ' . $Condo[2][2][1] . '<br>';
    ?>

</body>

</html>
