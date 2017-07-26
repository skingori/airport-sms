<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 02/04/2017
 * Time: 00:07
 */


//including the database connection file
include("../connection/db.php");

if (isset($_GET['id'])){
//getting id of the data from url
$id = $_GET['id'];
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM customer_flight_table WHERE Customer_flight_id=$id ");
//$result = mysqli_query($con, "DELETE FROM login_table WHERE login_username=$id");
//redirecting to the display page (index.php in our case)
header("Location:index.php");
}

if (isset($_GET['mes'])){
   $mes =$_GET['mes']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM customer_flight_notification_table WHERE Customer_flight_notification_id=$mes ");
   
   header("Location:reports.php");
   
}

if (isset($_GET['ai'])){
   $ai =$_GET['ai']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM airline_table WHERE airline_id=$ai ");
   
   header("Location:all-arlines.php");
   
}
if (isset($_GET['cf'])){
   $cf =$_GET['cf']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM customer_flight_table WHERE Customer_flight_id=$cf ");
   
   header("Location:all-cust-flight.php");
   
}

if (isset($_GET['rt'])){
   $rt =$_GET['rt']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM flight_route_table WHERE Flight_route_id=$rt ");
   
   header("Location:all-flight-rout.php");
   
}

if (isset($_GET['art'])){
   $art =$_GET['art']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM routes_table WHERE Route_id=$art ");
   
   header("Location:all-routes.php");
   
}
if (isset($_GET['us'])){
   $us =$_GET['us']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM login_table WHERE Login_id=$us ");
   
   header("Location:allusers.php");
   
}