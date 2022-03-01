<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวแปรชนิดบูลลีน</title>
</head>

<body>

    <?php
    echo "<h2>ตัวแปรชนิดบูลลีน </h2>";
    $true_var = 1;
    $false_var = 0;
    echo "true_var = 1 แสดงค่าเป็น " . $true_var . "<br>";
    echo " false_var = 0 แสดงค่าเป็น " . $false_var . "<br>";
    $true_var = true;
    $false_var = false;
    echo "true_var = true แสดงค่าเป็น " . $true_var . "<br>";
    echo " false_var = false แสดงค่าเป็น " . $false_var . "<br><br>";
    $true_var = true;
    if ($true_var) {
        echo "ตัวแปร \$true_var มีค่าเป็นจริง";
    } else {
        echo "ตัวแปร \$true_var มีค่าเป็นเท็จ";
    }
    ?>

</body>

</html>
