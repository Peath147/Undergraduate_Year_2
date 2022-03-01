<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมตัวแปรเรฟเฟอเรนซ์ใน PHP</title>
</head>

<body>

    <?php
    echo "<h2> โปรแกรมตัวแปรเรฟเฟอเรนซ์ใน PHP </h2>";
    $original_var = 5;
    echo "ค่าตัวแปรเดิม \$original_val = $original_var <br>";
    $ref_var = &$original_var;
    $ref_var++;
    echo "ค่าตัวแปรหลังเพิ่มค่าตัวแปรเรฟเฟอเรนซ์\$original_val = $original_var";
    ?>

</body>

</html>
