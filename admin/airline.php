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



$airline_code_= $_POST['airline_code'];
$airline_name_= $_POST['airline_name'];

$check_ = $con->query("SELECT airline_code FROM airline_table WHERE airline_code='$airline_code_'");
$count=$check_->num_rows;

if ($count==0) {

$query = "INSERT INTO airline_table(airline_code,airline_name) VALUES('$airline_code_','$airline_name_')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

if ($con->query($query)) {
$msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div>";
} else {
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
            <label>Airline Code:</label>
            <select class="form-control" name="airline_code">
                <option>KLM01</option>
                <option>KQ01</option>
                <option>ET01</option>
                <option>AAU01</option>
                <option>SA01</option>
                <option>AZ01</option>
            </select>
        </div>
        <div class="form-group">
            <label>Airline Name:</label>
            <select class="form-control" name="airline_name">
                <option>ROYAL DUTCH AIRLINE</option>
                <option>KENYA AIRWAYS</option>
                <option>ETHIOPIAN AIRLINE</option>
                <option>AUSTRALIAN AIRWAYS</option>
                <option>SOUTH AFRICAN AIRWAYS</option>
                <option>ALITALIA</option>
            </select>
        </div>

        <button type="submit" name="add" class="btn btn-success">Add Airline</button>

</form>

<?php include "f.php";?>