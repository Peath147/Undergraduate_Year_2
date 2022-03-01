<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ขอบเขตตัวแปรแบบสแตติก</title>
</head>

<body>

    <?php
    echo "<h2>ขอบเขตตัวแปรแบบสแตติก </h2>";
    function update_counter()
    {
        static $counter = 0;
        $counter++;
        echo "ค่าของตัวแปรสแตติกมีค่าเท่ากับ : $counter <br>";
    }
    $counter = 10;
    update_counter();
    update_counter();
    echo "ค่าของตัวแปรโกบอลมีค่าเท่ากับ : $counter <br>";
    ?>

</body>

</html>
