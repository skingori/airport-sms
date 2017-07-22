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
<?php include "h.php"; ?>
    <div class="widget-box widget-color-green">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">Code :<?php echo$code ;?></h5>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <ul class="list-unstyled spaced2">

                    <?php

                    $msg = $_GET['op'];

                    $result = mysqli_query($con, "SELECT * FROM customer_flight_notification_table WHERE Customer_flight_notification_message='$msg' ORDER BY Customer_flight_notification_id DESC");
                    ?>

                    <?php
                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                    while($res = mysqli_fetch_array($result)) {

                        echo $res['Customer_flight_notification_message'];

                    }
                    ?>


                </ul>


            </div>

            <div>
                <a href="#" class="btn btn-block btn-success">
                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                    <span></span>
                </a>
            </div>
        </div>
    </div>


<?php include "f.php"; ?>