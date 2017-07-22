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



    $Route_id_= $_POST['Route_id'];
    $Route_description_= $_POST['Route_description'];

    $check_ = $con->query("SELECT Route_id FROM routes_table WHERE Route_id='$Route_id_'");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO routes_table(Route_id,Route_description) VALUES('$Route_id_','$Route_description_')";

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
            <label>Flight Route:</label>
            <select name="Route_id" required class="form-control">
                <option>NRB-01</option>
                <option>AMSTD-02</option>
                <option>ET-01</option>
                <option>AAU-02</option>
                <option>SA-01</option>
                <option>AZ-02</option>
                <option>TZ-01</option>
                <option>AU-O1</option>
                <option>SK-01</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea rows="6" name="Route_description" required class="form-control">N/A
            </textarea>
        </div>


        <button type="submit" name="add" class="btn btn-success">Add Route</button>

    </form>

<?php include "f.php";?>