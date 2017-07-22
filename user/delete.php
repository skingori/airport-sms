<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 02/04/2017
 * Time: 00:07
 */


//including the database connection file
include '../connection/db.php';

//getting id of the data from url
$mes = $_GET['mes'];



$result1 = mysqli_query($con, "SELECT * FROM customer_flight_notification_table WHERE Customer_flight_notification_message='$mes'");

while($res = mysqli_fetch_array($result1))
{
    $id= $res['Customer_flight_notification_id'];

}

//deleting the row from table
$result = mysqli_query($con, "DELETE FROM customer_flight_notification_table WHERE Customer_flight_notification_id=$id ");
//$result = mysqli_query($con, "DELETE FROM login_table WHERE login_username=$id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>