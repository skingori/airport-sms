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



    $Login_id_= $_POST['Login_id'];
    $Login_username_= $_POST['Login_username'];
    $Login_password= $_POST['Login_password'];
    $Login_fullname_= $_POST['Login_fullname'];
    $Login_contact_= $_POST['Login_contact'];
    $Login_email_= $_POST['Login_email'];
    $Login_rank_= $_POST['Login_rank'];
    //Adding encryption
    $Login_password_= md5($Login_password);
    //
    $check_ = $con->query("SELECT Login_username FROM login_table WHERE Login_username='$Login_username_'");
    $count=$check_->num_rows;

    if ($count==0) {

    $query = "INSERT INTO login_table(Login_id,Login_username,Login_password,Login_fullname,Login_contact,Login_email,Login_rank) VALUES('$Login_id_','$Login_username_','$Login_password_','$Login_fullname_','$Login_contact_','$Login_email_','$Login_rank_')";

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
            <label>Login ID:</label>
            <input type="text" name="Login_id" required class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label>Login username:</label>
            <input type="text" name="Login_username" required class="form-control" >
        </div>
        <div class="form-group">
            <label>Login fullname:</label>
            <input type="text" name="Login_fullname" required class="form-control" >
        </div>
        <div class="form-group">
            <label>Login Rank:</label>
            <select class="form-control" name="Login_rank">
                <option selected="" value="2">User</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label>Login contact:</label>
            <input type="number" name="Login_contact" required class="form-control" >
        </div>
        <div class="form-group">
            <label>Login email:</label>
            <input type="email" name="Login_email" required class="form-control" >
        </div>
        <div class="form-group">
            <label>Login password:</label>
            <input type="password" name="Login_password" required class="form-control" >
        </div>



        <button type="submit" name="add" class="btn btn-success">Create User</button>

    </form>


<?php include "f.php";?>