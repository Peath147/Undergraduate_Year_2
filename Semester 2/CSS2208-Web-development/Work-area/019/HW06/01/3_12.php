<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การใช้อาร์เรย์สองมิติแบบใช้ตัวบอกตำแหน่งเป็นตัวเลข</title>
</head>

<body>

    <?php
    echo "<h2> การใช้อาร์เรย์สองมิติแบบใช้ตัวบอกตำแหน่งเป็นตัวเลข </h2> ";
    $Cars[0][0] = "วีออส";
    $Cars[0][1] = "ยาริส";
    $Cars[0][2] = "อัลติส";
    $Cars[1][0] = "แจ๊ส";
    $Cars[1][1] = "ซิตี้";
    $Cars[1][2] = "ซีวิค";
    echo '$Cars[0][0] = ' . $Cars[0][0] . '<br>';
    echo '$Cars[0][1] = ' . $Cars[0][1] . '<br>';
    echo '$Cars[0][2] = ' . $Cars[0][2] . '<br>';
    echo '$Cars[1][0] = ' . $Cars[1][0] . '<br>';
    echo '$Cars[1][1] = ' . $Cars[1][1] . '<br>';
    echo '$Cars[1][2] = ' . $Cars[1][2] . '<br>';
    ?>

</body>

</html>
