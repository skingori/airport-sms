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



    $Notification_id_= $_POST['Notification_id'];
    $Notification_name_= $_POST['Notification_name'];

    $check_ = $con->query("SELECT Notification_id FROM notification_table WHERE Notification_id='$Notification_id_'");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO notification_table(Notification_id,Notification_name) VALUES('$Notification_id_','$Notification_name_')";

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
            <label for="">Notification ID:</label>
            <input type="number" name="Notification_id" required class="form-control" placeholder="Notification_id">
        </div>
        <div class="form-group">
            <label for="">Notification Name:</label>
            <textarea rows="5" cols="50" name="Notification_name" required class="form-control"></textarea>
        </div>


        <button type="submit" name="add" class="btn btn-danger">Add Notes</button>

    </form>

<?php include "f.php";?>