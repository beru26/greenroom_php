<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Greenroom</title>
    </head>
    <body>

        <table>
            <tr>

            </tr>
        </table>
        <?php
            $dbhost = '127.0.0.1';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn) {
                die('Connection failed! '.mysql_error());
            }
            echo 'Connection successfull';

            // Random generált adatok
            function randomBrand{
                $brand_list = array("Toyota", "Lada", "Mazda", "Suzuki");
                return $brand_list[array_rand($brand_list)];
            }

            function randomType{
                $brand_list = array("HUN", "EN", "CH", "GER");
                return $type_list[array_rand($type_list)];
            }

            function randomPrice{
                $brand_list = array(50, 80, 100, 120);
                return $price_list[array_rand($price_list)];
            }

            function randomPerf{
                $brand_list = array("60kW", "80kW", "90kW");
                return $performance_list[array_rand($performance_list)];
            }

            function randomDescr{
                $brand_list = array("new", "used", "mildly used");
                return $description_list[array_rand($description_list)];
            }

            //Adatbázis létrehozása
            $mysql_query = 'CREATE Database greenroom';
            $db = mysql_select_db('greenroom');

            //tractors tábla létrehozása
            mysql_query = 'CREATE TABLE tractors(
                brand VARCHAR(25) NOT NULL,
                type VARCHAR(25) NOT NULL,
                price INT NOT NULL,
                performance TEXT NOT NULL,
                description TEXT NOT NULL
            )';
            echo 'Table Created';

            //Táblázat feltöltése 50 random generált traktorral
            $counter = 0;
            while($counter <= 50){
                $mysql_query("INSERT INTO tractors VALUES(
                    randomBrand(),randomType(),randomPrice(),
                    randomPerf(),randomDescr())";
            }
        ?>
    </body>
</html>
