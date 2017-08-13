<?php include 'config.php';
    $sql = $conn->prepare("SELECT * FROM tractors");
    $sql->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Greenroom tractors</title>
    </head>
    <body>
        <div class="">
            <table width="600" border="1px">
                <tr>
                    <td>ID</td>
                    <td>BRAND</td>
                    <td>TYPE</td>
                    <td>PRICE</td>
                    <td>PERFORMANCE</td>
                    <td>DESCRIPTION</td>
                </tr>

                <?php
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                    <td><?php print($row['id']); ?></td>
                    <td><?php print($row['brand']); ?></td>
                    <td><?php print($row['type']); ?></td>
                    <td><?php print($row['price']); ?></td>
                    <td><?php print($row['performance']); ?></td>
                    <td><?php print($row['description']); ?></td>
                    </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </body>
</html>
