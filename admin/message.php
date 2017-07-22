<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE Login_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $usernam= $res['Login_username'];

}

?>
<?php

require_once '../connection/db.php';
//-- GET LOGIN ID FROM LINK -->
$loginid = $_GET['id'];

//-- GET LOGIN ID FROM LINK END -->
$result3 = mysqli_query($con, "SELECT * FROM customer_flight_table WHERE Customer_flight_customer_login_id='$loginid' ORDER BY Customer_flight_id DESC LIMIT 1");

while($res = mysqli_fetch_array($result3))
{
    $code= $res['Customer_flight_id'];

}

if(isset($_POST['add'])) {

    $api_key=$_POST['api_key'];
    $api_secret=$_POST['api_secret'];
    $ip = $_POST['ip'];
    //Other

    $Customer_flight_notification_id_= $_POST['Customer_flight_notification_id'];
    $Customer_flight_notification_cust_contact_= $_POST['Customer_flight_notification_cust_contact'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];
    $Customer_flight_not_cust_flight_fl_id_= $_POST['Customer_flight_not_cust_flight_fl_id'];
    //This is used by our api
    $Customer_flight=$_POST['Customer_flight_notification_message'];
    //this is saved to db
    $Customer_flight_notification_message_= ($_POST['Customer_flight_notification_message']).",@".date("h:i:sa");

    $check_ = $con->query("SELECT Customer_flight_notification_id FROM customer_flight_notification_table WHERE Customer_flight_notification_id='$Customer_flight_notification_id_'");
    $count=$check_->num_rows;

    if ($count==0) {
        $query = "INSERT INTO customer_flight_notification_table(Customer_flight_notification_id,Customer_flight_notification_cust_contact ,Customer_flight_notification_message_status ,Customer_flight_not_cust_flight_fl_id ,Customer_flight_notification_message) VALUES('$Customer_flight_notification_id_','$Customer_flight_notification_cust_contact_','UNREAD','$Customer_flight_not_cust_flight_fl_id_','$Customer_flight_notification_message_')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Message Sent to Passenger !
    <meta content=\"2;index.php?action=home\" http-equiv=\"refresh\" />
</div>";
        //
            $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                    [
                        'api_key' =>  $api_key,
                        'api_secret' => $api_secret,
                        'to' => $Customer_flight_notification_cust_contact_,
                        'from' => 'NEXMO',
                        'text' => $Customer_flight . ".Your flight code is: #". $code .".Go to: @:"."http://$ip/flightsystem/login.php "."  :"
                    ]
                );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
        //

        }else {
            $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while sending message !
</div>";
        }

    } else {

        $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry code already taken !
</div>";

    }

    $con->close();
}
?>

<?php include "h.php";?>

    <form action="" method="post">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <div class="form-group" hidden="">
            <label>Notification ID:</label>
            <select name="Customer_flight_notification_id" id="Customer_flight_notification_id" class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Notification_id FROM notification_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Notification_id'].'">';
                    echo $row['Notification_id'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Customer Contact:</label>
            <select name="Customer_flight_notification_cust_contact" id="Customer_flight_notification_cust_contact" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Login_contact,Login_id FROM login_table WHERE Login_id='$loginid'");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Login_contact'].'">';
                    echo $row['Login_contact'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Customer Flight ID:</label>
            <select name="Customer_flight_not_cust_flight_fl_id" id="Customer_flight_not_cust_flight_fl_id" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Customer_flight_flight_id FROM customer_flight_table WHERE Customer_flight_customer_login_id='$loginid'");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Customer_flight_flight_id'].'">';
                    echo $row['Customer_flight_flight_id'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <label for="Customer_flight_notification_message">Server IP:</label>
        <div class="form-group">
            <input  type="text" name="ip" required class="form-control" placeholder="Optional">
        </div>
        <label for="api_key">Enter API-KEY</label>
        <div class="form-group">
            <input  type="text" id="api_key" name="api_key" required class="form-control" placeholder="Required">
        </div>
        <label for="api_secret">Enter API-SECRET</label>
        <div class="form-group">
            <input  type="password" id="api_secret" name="api_secret" required class="form-control" placeholder="Required">
        </div>

        <label for="Customer_flight_notification_message">Enter Message:</label>
        <div class="form-group">
            <textarea rows="4" type="" name="Customer_flight_notification_message" required class="form-control" placeholder=""></textarea>
        </div>


        <button type="submit" name="add" class="btn btn-success">Send Message</button>

    </form>


<?php include "f.php";?>