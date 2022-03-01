<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวแปรชนิดเลขจำนวนเต็ม เลขฐานสิบหก</title>
</head>

<body>

    <?php
    echo "<h2>ตัวแปรชนิดเลขจำนวนเต็ม เลขฐานสิบหก </h2>";
    $a = 0x10; //มีค่ําเป็น 16 ฐํานสิบ //
    $b = 0xFF; //มีค่ําเป็น 255 ฐํานสิบ //
    $c = -0x1FF; //มีค่ําเป็น -511 ฐํานสิบ //
    echo "\$a = " . $a . "<br>";
    echo "\$b = " . $b . "<br>";
    echo "\$c = " . $c . "<br>";
    ?>

</body>

</html>
