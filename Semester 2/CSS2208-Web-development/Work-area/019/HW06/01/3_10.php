<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การใช้ Array แบบระบุตำแหน่งแบบข้อความ</title>
</head>

<body>

    <?php
    echo "<h2> การใช้ Array แบบระบุตำแหน่งแบบข้อความ </h2> ";
    $customer = array(
        'firstname' => 'สมชาย',
        'lastname' => 'รักชาติ',
        'address' => 'ดุสิต กรุงเทพมหานคร',
        'phone' => '021601234'
    );
    echo $customer['firstname'] . '<br>';
    echo $customer['lastname'] . '<br>';
    echo $customer['address'] . '<br>';
    echo $customer['phone'] . '<br>';
    ?>

</body>

</html>
