<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ขอบเขตตัวแปรแบบโลคอล</title>
</head>

<body>

    <?php
    echo "<h2>ขอบเขตตัวแปรแบบโลคอล </h2>";
    function update_counter()
    {
        $counter = 0;
        $counter++;
    }
    $counter = 10;
    echo "ค่ํา \$counter เริ่มต้น = $counter <br>";
    update_counter();
    echo "ค่ํา \$counter เมื่อเรียกฟังก์ชัน update_counter = $counter <br>";
    ?>

</body>

</html>
