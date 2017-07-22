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



    $Customer_flight_id_= $_POST[''];
    $Customer_flight_flight_id_= $_POST['Customer_flight_flight_id'];
    $Customer_flight_customer_login_id_= $_POST['Customer_flight_customer_login_id'];

    $check_ = $con->query("SELECT Customer_flight_id FROM customer_flight_table WHERE Customer_flight_id=''");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO customer_flight_table(Customer_flight_id,Customer_flight_flight_id,Customer_flight_customer_login_id,Customer_flight_timestamp) VALUES('$Customer_flight_id_','$Customer_flight_flight_id_','$Customer_flight_customer_login_id_',NOW())";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span>  successfully registered !
</div>";
        }else {
            $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span>  error while registering !
</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span>  sorry code already taken !
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
            <label>Flight ID:</label>
            <select name="Customer_flight_flight_id" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT * FROM flight_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Flight_number'].'">';
                    echo $row['Flight_number'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Customer ID:</label>
            <select name="Customer_flight_customer_login_id" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Login_id,Login_rank FROM login_table WHERE Login_rank !='1'");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Login_id'].'">';
                    echo $row['Login_id'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>


        <button type="submit" name="add" class="btn btn-success">Assign Flight</button>

    </form>

<?php include "f.php";?>