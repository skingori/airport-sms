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
    $username= $res['Login_username'];

}

?>
<?php

require_once '../connection/db.php';

if(isset($_POST['add'])) {


    $Flight_number_= $_POST['Flight_number'];
    $Flight_name_= $_POST['Flight_name'];
    $Flight_route_route_id_= $_POST['Flight_route_route_id'];
    $Flight_schedule_= $_POST['Flight_schedule'];
    $Flight_departure_time_= $_POST['Flight_departure_time'];
    $Flight_airline_id_= $_POST['Flight_airline_id'];

    $check_ = $con->query("SELECT Flight_id FROM flight_table WHERE Flight_id=''");
    $count=$check_->num_rows;

    if ($count==0) {
        $query = "INSERT INTO flight_table(Flight_id, Flight_number, Flight_name, Flight_route_route_id, Flight_schedule, Flight_departure_time ,Flight_airline_id) VALUES('$Flight_id_','$Flight_number_','$Flight_name_','$Flight_route_route_id_','$Flight_schedule_','$Flight_departure_time_','$Flight_airline_id_')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div>";
        }else {
            $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
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


        <div class="form-group">
            <label>Flight Number:</label>
            <select name="Flight_number" required class="form-control">

                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT * FROM airline_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['airline_code'].'">';
                    echo $row['airline_code'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Flight Name:</label>
            <select name="Flight_name" required class="form-control">

                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT * FROM airline_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['airline_name'].'">';
                    echo $row['airline_name'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Route ID:</label>
            <select name="Flight_route_route_id" id="Flight_route_route_id" required class="form-control">
                <option selected></option>
                    <?php
                    $result = mysqli_query($con,"SELECT Route_id FROM routes_table");
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['Route_id'].'">';
                        echo $row['Route_id'];
                        echo '</option>';
                    }
                    ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Flight_schedule">Flight Schedule:</label>
            <input type="datetime-local" id="" name="Flight_schedule" required class="form-control" placeholder="Flight schedule">
        </div>
        <label for="Flight_departure_time">Flight Departure time:</label>
        <div class="form-group">
            <input type="datetime-local" name="Flight_departure_time" required class="form-control" placeholder="Flight departure time">
        </div>
       <div class="form-group">
            <label>Airline ID:</label>
            <select name="Flight_airline_id" required class="form-control">
                <option selected></option>
                    <?php
                    $result = mysqli_query($con,"SELECT airline_id FROM airline_table");
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['airline_id'].'">';
                        echo $row['airline_id'];
                        echo '</option>';
                    }
                    ?>
            </select>
        </div>

        <button type="submit" name="add" class="btn btn-success">Add Flight</button>

    </form>

<?php include "f.php";?>