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



    $Flight_route_id_= $_POST['Flight_route_id'];
    $Flight_route_route_id_= $_POST['Flight_route_route_id'];
    $Flight_route_flight_id_= $_POST['Flight_route_flight_id'];

    $check_ = $con->query("SELECT Flight_route_id FROM flight_route_table WHERE Flight_route_id='$Flight_route_id_'");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO flight_route_table(Flight_route_id,Flight_route_route_id,Flight_route_flight_id) VALUES('$Flight_route_id_','$Flight_route_route_id_','$Flight_route_flight_id_')";

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
            <label>Select Flight Route ID:</label>
            <input type="number" name="Flight_route_id" required class="form-control" placeholder="Flight route id">
        </div>
        <div class="form-group">
            <label>Select Route ID:</label>
            <select name="Flight_route_route_id" required class="form-control">
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
            <label>Select Flight ID:</label>
            <select name="Flight_route_flight_id" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Flight_id FROM flight_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Flight_id'].'">';
                    echo $row['Flight_id'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>


        <button type="submit" name="add" class="btn btn-success">Add Flight Route</button>

    </form>

<?php include "f.php";?>