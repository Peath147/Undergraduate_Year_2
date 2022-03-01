<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวแปรชนิดอ็อบเจกต์</title>
</head>

<body>

    <?php
    class phone
    {
        var $phone_no = "";
        var $phone_brand = "";
        var $phone_model = "";
        var $phone_system = "";
        function call()
        {
            echo "กำลังโทรออกไปยังหมายเลข....";
        }
    }
    echo "<h2> ตัวแปรชนิดอ็อบเจกต์</h2>";
    $objphone = new phone();
    echo "สร้างคลาส phone เรียบร้อยแล้ว <br> ";
    $objphone->phone_no = "0811234567";
    $objphone->phone_brand = "Apple";
    $objphone->phone_model = "iPhone 5";
    $objphone->phone_system = "AIS";
    echo "หมายเลขโทรศัพท์นี่คือ : " . $objphone->phone_no . "<br>";
    echo "ยี่ห้อ : " . $objphone->phone_brand . "<br>";
    echo "รุ่น : " . $objphone->phone_model . "<br>";
    echo "ระบบ : " . $objphone->phone_system . "<br> <br>";
    echo "เรียกใช้ function โทรออก : ";
    echo $objphone->call();
    ?>

</body>

</html>
