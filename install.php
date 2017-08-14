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

//Create Tractor class with constructor function
class Tractor{

    public $brand;
    public $type;
    public $price;
    public $performance;
    public $description;

    function __construct($Brand,$Type,$Price,$Performance,$Description){
        $this->brand = $Brand;
        $this->type = $Type;
        $this->price = $Price;
        $this->performance = $Performance;
        $this->description = $Description;
    }
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
    $performance_list = array("60 kW", "80 kW", "90 kW");
    return $performance_list[array_rand($performance_list)];
}

function randomDescr(){
    $description_list = array("new", "used", "mildly used");
    return $description_list[array_rand($description_list)];
}

//fill the table with the generated data
$counter = 1;
while($counter <= 50){
    $tractor = new Tractor(randomBrand(),randomType(),randomPrice(),randomPerf(),randomDescr());

    $sql = ("INSERT INTO tractors(brand, type,
            price,performance,description)
            VALUES(:brand,:type,:price,
            :performance,:description)");


    $instmt = $conn->prepare($sql);

    $instmt->bindValue(':brand', $tractor->brand);
    $instmt->bindValue(':type', $tractor->type);
    $instmt->bindValue(':price', $tractor->price);
    $instmt->bindValue(':performance', $tractor->performance);
    $instmt->bindValue(':description', $tractor->description);

    $inserted = $instmt->execute();
    $counter++;
}

echo $counter-1 .' row inserted!<br>';

die();
