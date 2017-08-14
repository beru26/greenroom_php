<?php include 'config.php';

    $sql = $conn->prepare("SELECT * FROM tractors");
    $searchQuery = $conn->prepare("SELECT * FROM tractors WHERE brand = :brand
    OR type = :type OR price = :price");

    $sBrand = "";
    $sType = "";
    $sPrice ="";

    function getPost() {
        $posts = array();
        $post[0] = $_POST['brand'];
        $post[1] = $_POST['type'];
        $post[0] = $_POST['price'];
        return $posts;
    }

    //Filter
    if(isset($_POST['search'])){
        echo "isset";
        $data = getPost();
        if(empty($data)){
            echo "EMPTY";
        }else{
            $searchQuery->execute(array(
                ':brand'=> $data[0],
                ':type'=> $data[1],
                ':price'=> $data[2]
            ));

            if($searchQuery){
                $user = $searchQuery->fetch();
                if(empty($user)){
                    echo 'No data for this search';
                }
                $sBrand = $user[0];
                $sType = $user[1];
                $sPrice = $user[2];
            }
        }
    }else{
        $sql->execute();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Greenroom tractors</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/style.css" type="text/css">
    </head>
    <body>
        <form>
            <h2>SEARCH</h2>
            <input type="text" name="brand" placeholder="Brand">
            <input type="text" name="type" placeholder="Type">
            <input type="text" name="price" placeholder="Price">
            <button type="submit" name="search" value="filter">SEARCH</button>
        </form></br>

        <div>
            <table width="600" border="1px" align="center">
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

                <?php
                    while($row = $searchQuery->fetch(PDO::FETCH_ASSOC)) {
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
