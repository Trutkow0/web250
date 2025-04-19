 <?php
$mysqli = new mysqli('localhost', 'phpuser', 'CpccUser01!', 'Cars' );
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli->connect_error);
    exit();
}
//select a database to work with
$mysqli->select_db("Cars");
 
?>
