<?php
session_start();

if (!isset($_SESSION['fcode']) ) {
header('Location:sessions.php');
}

include '../connection/db.php';

$code=$_SESSION['fcode'];

$result1 = mysqli_query($con, "SELECT * FROM customer_flight_table WHERE Customer_flight_id='$code'");

while($res1 = mysqli_fetch_array($result1))
{
    $logid = $res1['Customer_flight_customer_login_id'];

}

//get contact
$result = mysqli_query($con, "SELECT * FROM login_table WHERE Login_id='".$logid."'");

while($res2 = mysqli_fetch_array($result))
{
    $mobile = $res2['Login_contact'];

}
?>

<!-- Get messages notifications-->

<?php
include '../connection/db.php';
$result = mysqli_query($con,"SELECT COUNT(4) FROM customer_flight_notification_table WHERE Customer_flight_notification_message_status='UNREAD' AND Customer_flight_notification_cust_contact='$mobile' ");
$row = mysqli_fetch_array($result);

$total = $row[0];

$result = mysqli_query($con,"SELECT COUNT(4) FROM customer_flight_notification_table WHERE Customer_flight_notification_message_status='READ' AND Customer_flight_notification_cust_contact='$mobile'");
$row = mysqli_fetch_array($result);

$total1 = $row[0];

$result = mysqli_query($con,"SELECT COUNT(4) FROM customer_flight_notification_table WHERE Customer_flight_notification_cust_contact='$mobile'");
$row = mysqli_fetch_array($result);

$totalall = $row[0];
?>
<!-- -->
<?php include "h.php";?>

<?php
$result = mysqli_query($con, "SELECT * FROM customer_flight_notification_table WHERE Customer_flight_notification_message_status ='UNREAD' AND Customer_flight_notification_cust_contact='$mobile' ORDER BY Customer_flight_notification_id DESC");
?>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {

                    echo  "<div class='alert alert-success alert-dismissible'>
                            <a href='read.php?msg=".$res['Customer_flight_notification_message']."' class='close' data-dismiss='alert' aria-label='Close'><b<span aria-hidden='true'>&times;</span></a>
                           <a href='open.php?op=".$res['Customer_flight_notification_message']."'> ".$res['Customer_flight_notification_message']."</a>
                    </div>";

                }



 include "f.php";?>