<?php

// This is the API which has two possible reponses
// 1) return a list of cars or 2) returns details about a specific car using the VIN.

function get_cars()
{
    //build JSON array
     header("Access-Control-Allow-Origin: *");
     header("Content-Type: application/json");
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
        $current_car = array("make" =>  $result_ar['Make'], "model" =>$result_ar['Model'], "vin" => $result_ar['VIN'], "price" => number_format($result_ar['ASKING_PRICE'],0) );
        array_push($car_list, $current_car);
        }
    $mysqli->close();
    return $car_list;
}

function add_car(){
    if(isset($_GET['VIN'])){
        header("Access-Control-Allow-Origin: *");
        include 'db.php';
        $make = $_GET['make'];
        $vin = $_GET['model'];
        $VIN = $_GET['VIN'];
        $price = $_GET['price'];
        //echo "VIN is ".$vin;
       // $query = "insert into tbl_mobile (name,model,color) values ('" . $name ."','". $model ."','" . $color ."')";
        $query = "INSERT INTO inventory (make, model, VIN, price) VALUES ('" . $make ."','". $model ."','" .$VIN ."', '" . $price ."')";
       echo $query;
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
             // The delete was successful.
            if($result != 0){
                $result = array('success'=>1);
                return $result;
            }
        }
    } else {
        echo "Sorry the car was not inserted<br>";
    }
}

function delete_car(){
    if(isset($_GET['VIN'])){
        header("Access-Control-Allow-Origin: *");
        include 'db.php';
        $vin = $_GET['VIN'];
        //echo "VIN is ".$vin;
        $query = "DELETE FROM inventory WHERE VIN='$vin'";
        echo $query."<br>";
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

    $query = "SELECT * FROM inventory WHERE VIN=$vin";
 //echo $query."<br/>";
    /* Try to query the database */
    if ($result = $mysqli->query($query)) {
        // Don't do anything if successful.
    } else {
        echo "Sorry, a vehicle with VIN of $vin cannot be found <br>";
    }
// Loop through all the rows returned by the query, creating a table row for each
  //  echo "Searching for ".$vin;
    while ($result_ar = mysqli_fetch_assoc($result)) {
        $current_car = array("make" =>  $result_ar['Make'], "model" =>$result_ar['Model'], "year"=>$result_ar['YEAR'],  "color" => $result_ar['EXT_COLOR'], "mileage" =>  $result_ar['MILEAGE'],  "vin" => $result_ar['VIN'], "price" => number_format($result_ar['ASKING_PRICE'],0) );
    }

    $mysqli->close();

    return $current_car;
}


$possible_url = array( "get_cars", "get_car_by_vin", "update_car", "delete_car", "add_car");
$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
    switch ($_GET["action"])
    {
        case "delete_car":
            $value=delete_car($_GET["VIN"]);
            break;
        case "add_car":
            $value=add_car($_GET["VIN"]);
            break;
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
$json = json_encode($value);
if ($json === false) {
    // Avoid echo of empty string (which is invalid JSON), and
    // JSONify the error message instead:
    $json = json_encode(array("jsonError", json_last_error_msg()));
    if ($json === false) {
        // This should not happen, but we go all the way now:
        $json = '{"jsonError": "unknown"}';
    }
    // Set HTTP response status code to: 500 - Internal Server Error
    http_response_code(500);
}
echo $json;
//exit(json_encode($value));