<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวแปรชนิดจำนวนทศนิยม</title>
</head>

<body>

    <?php
    echo "<h2>ตัวแปรชนิดจำนวนทศนิยม </h2>";
    // แบบที่ 1
    $real1 = 3.14;
    $real2 = 0.577;
    // แบบที่ 2
    $real3 = 0.314E1; // 0.314 * (10^1) เท่ํากับ 3.14
    $real4 = 5.77E-1; // 5.77*(10^-1) เท่ํากับ 0.577.
    echo "\$real1 = " . $real1 . "<BR>";
    echo "\$real2 = " . $real2 . "<BR><BR>";
    echo "\$real3 = 0.314E1 = " . $real3 . "<BR>";
    echo "\$real4 = 5.77E-1 = " . $real4 . "<BR>";
    ?>

</body>

</html>
