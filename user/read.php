<?php
include '../connection/db.php';

if(isset($_GET['msg']))
$mess=$_GET['msg'];

$result1 = mysqli_query($con, "SELECT * FROM customer_flight_notification_table WHERE Customer_flight_notification_message='$mess'");

while($res1 = mysqli_fetch_array($result1))
{
    $id = $res1['Customer_flight_notification_id'];

//updating the table
$result = mysqli_query($con, "UPDATE customer_flight_notification_table SET Customer_flight_notification_message_status='READ' WHERE Customer_flight_notification_id=$id");

//redirectig to the display page. In our case, it is index.php
header("Location: index.php");

}