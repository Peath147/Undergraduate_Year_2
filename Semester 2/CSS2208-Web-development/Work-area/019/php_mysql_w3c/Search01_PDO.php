<html>

<body bgcolor="#FFFFFF">
    <?php
    if (!isset($_POST['keyword']) && !isset($_POST['fields'])) {
        $keyword = "";
        $fields = "";
    } else {
        $keyword = $_POST['keyword'];
        $fields = $_POST['fields'];
    }
    ?>
    <form name="form1" method="post" action="Search01_PDO.php">
        ชื่อที่ต้องการค้นหา
        <input type="text" name="keyword" value="<?php echo "$keyword"; ?>">
        จาก Filed
        <select name="fields">
            <option value="<?php echo "$fields"; ?>"><?php echo "$fields"; ?></option>
            <option value="cid">cid</option>
            <option value="cname">cname</option>
            <option value="address">address</option>
            <option value="telephone">telephone</option>
            <option value="credit_lim">credit_lim</option>
            <option value="curr_bal">curr_bal</option>
        </select>
        <input type="submit" name="Submit" value="ค้นหา">
    </form>
    <hr>
    <?php
    if (empty($keyword) or empty($fields)) {
        echo "กรุณาเลือกรายการค้นหา ด้วยครับ";
        exit();
    } else {
        require 'connect_PDO.php';
        try {
            $sql = "SELECT * FROM CUSTOMER_TBL WHERE $fields like '%$keyword%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    ?>
            <div align="center"><?php echo " แสดงรายการค้นหา <b>$keyword</b> จาก Field <b>$fields</b>"; ?><br><br>
            </div>
            <table width="91%" border="1" align="center">
                <tr>
                    <td width="8%">
                        <div align="center">cid</div>
                    </td>
                    <td width="12%">
                        <div align="center">cname</div>
                    </td>
                    <td width="12%">
                        <div align="center">Address</div>
                    </td>
                    <td width="11%">
                        <div align="center">Telephone</div>
                    </td>
                    <td width="11%">
                        <div align="center">credit_lim</div>
                    </td>
                    <td width="11%">
                        <div align="center">curr_bal</div>
                    </td>
                </tr>

                <?php
                // Loop for read data
                while ($row = $stmt->fetch()) {
                    $cid = $row["cid"];
                    $cname = $row["cname"];
                    $address = $row["address"];
                    $telephone = $row["telephone"];
                    $credit_lim = $row["credit_lim"];
                    $curr_bal = $row["curr_bal"];
                ?>
                    <tr>
                        <td width="8%">
                            <div align="center"><?php echo "$cid"; ?></div>
                        </td>
                        <td width="12%">
                            <?php echo "$cname"; ?>
                        </td>
                        <td width="12%">
                            <?php echo "$address"; ?>
                        </td>
                        <td width="11%">
                            <?php echo "$telephone"; ?>
                        </td>
                        <td width="11%">
                            <?php echo "$credit_lim"; ?>
                        </td>
                        <td width="11%">
                            <?php echo "$curr_bal"; ?>
                        </td>
                    </tr>
        <?php
                } //end foreach\

            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        } //end else
        $conn = null;
        ?>
            </table>
</body>
</html>