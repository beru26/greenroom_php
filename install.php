<?php include 'config.php';

//create tractors table
$mysql_query = "CREATE TABLE IF NOT EXISTS tractors(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    brand VARCHAR(25) NOT NULL,
    type VARCHAR(25) NOT NULL,
    price INT NOT NULL,
    performance TEXT NOT NULL,
    description TEXT NOT NULL
)";

$stmt = $conn->query($mysql_query);
if ($stmt) {
    echo 'Table Created<br>';
} else {
    echo 'Table creation failed';
}

//Random genereated data

function randomBrand(){
    $brand_list = array("Toyota", "Lada", "Mazda", "Suzuki");
    return $brand_list[array_rand($brand_list)];
}

function randomType(){
    $type_list = array("HUN", "EN", "CH", "GER");
    return $type_list[array_rand($type_list)];
}

function randomPrice(){
    $price_list = array(50, 80, 100, 120);
    return $price_list[array_rand($price_list)];
}

function randomPerf(){
    $performance_list = array("60kW", "80kW", "90kW");
    return $performance_list[array_rand($performance_list)];
}

function randomDescr(){
    $description_list = array("new", "used", "mildly used");
    return $description_list[array_rand($description_list)];
}

//fill the table with the generated data
$counter = 1;
while($counter <= 50){
    $brand = randomBrand();
    $type = randomType();
    $price = randomPrice();
    $perf = randomPerf();
    $desc = randomDescr();
    $sql = ("INSERT INTO tractors(brand, type,
            price,performance,description)
            VALUES(:brand,:type,:price,
            :performance,:description)");


    $instmt = $conn->prepare($sql);

    $instmt->bindValue(':brand', $brand);
    $instmt->bindValue(':type', $type);
    $instmt->bindValue(':price', $price);
    $instmt->bindValue(':performance', $perf);
    $instmt->bindValue(':description', $desc);

    $inserted = $instmt->execute();
    $counter++;
}

echo $counter-1 .' row inserted!<br>';

die();
