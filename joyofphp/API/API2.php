<?php

// This is the API which has two possible responses
// 1) return a list of cars or 2) returns details about a specific car using the VIN.

function get_cars()
{
//build JSON array
header("Access-Control-Allow-Origin: *");
include 'db.php';
$query = "SELECT * FROM inventory ORDER BY Make";
/* Try to insert the new car into the database */
if ($result = $mysqli->query($query)) {
// Don't do anything if successful.
}
else
{
echo "Error getting cars from the database.<br>";
}

$car_list = array();
// print_r( $car_list);
// Loop through all the rows returned by the query, creating a table row for each
while ($result_ar = mysqli_fetch_assoc($result)) {
$current_car = array("make" => $result_ar['Make'], "model" =>$result_ar['Model'], "vin" => $result_ar['VIN'], "price" => number_format($result_ar['ASKING_PRICE'],0) );
array_push($car_list, $current_car);
}
$mysqli->close();
return $car_list;
}

function delete_car(){
    if(isset($_GET['VIN'])){
        header("Access-Control-Allow-Origin: *");
        include 'db.php';
        $vin = $_GET['VIN'];
        $query = "SELECT * FROM INVENTORY WHERE VIN=$vin";
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
             // The delete was successful.
            if($result != 0){
                $result = array('success'=>1);
                return $result;
            }
        }
    } else {
        echo "Sorry, a vehicle with VIN of $vin cannot be found <br>";
    }
}

function get_car_by_vin( $vin)
{
header("Access-Control-Allow-Origin: *");
include 'db.php';
$current_car = array();

$query = "SELECT * FROM INVENTORY WHERE VIN=$vin";
// echo $query;
/* Try to query the database */
if ($result = $mysqli->query($query)) {
// Don't do anything if successful.
} else {
echo "Sorry, a vehicle with VIN of $vin cannot be found <br>";
}
// Loop through all the rows returned by the query, creating a table row for each
// echo "Searching for ".$vin;
while ($result_ar = mysqli_fetch_assoc($result)) {
$current_car = array("make" => $result_ar['Make'], "model" =>$result_ar['Model'], "year"=>$result_ar['YEAR'], "color" => $result_ar['EXT_COLOR'], "mileage" => $result_ar['MILEAGE'], "vin" => $result_ar['VIN'], "price" => number_format($result_ar['ASKING_PRICE'],0) );
}

$mysqli->close();

return $current_car;
}

$possible_url = array( "get_cars", "get_car_by_vin");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
switch ($_GET["action"])
{
case "get_cars":
$value = get_cars();
break;
case "get_car_by_vin":
if (isset($_GET['VIN']))
$value = get_car_by_vin($_GET["VIN"]);
else
$value = "Missing argument";
break;

}
}

//return JSON array
exit(json_encode($value));
?>