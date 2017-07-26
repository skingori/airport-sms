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

<?php include "h.php"; ?>
								<!-- PAGE CONTENT BEGINS -->
								<!--<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										pasenger messaging system
										<small>(v1.4)</small>
									</strong>,
									with realtime data
								</div>-->
    <?php
        $result = mysqli_query($con, "SELECT * FROM login_table ORDER BY Login_id ASC");
    ?>
    <div class="card">
        <div class="card-header" data-background-color="green">
            <h5 class="title">ALL USERS</h5>
            <span><a href="" onclick="printData()"><i class="fa fa-print fa-stack-2x"></i></a></span>
            <p class="category">These are all users registered on our database </p>

        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table" id="table1">
                <thead class="text-danger">
                <th>Login ID</th>
                <th>User Name</th>
                <th>User Contact</th>
                <th>User Email</th>
                <th>User Type</th>
                <th></th>
                </thead>
                <tbody>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Login_id']."</td>";
                    echo "<td>".$res['Login_fullname']."</td>";
                    echo "<td>".$res['Login_contact']."</td>";
                    echo "<td>".$res['Login_email']."</td>";
                    echo "<td>".$res['Login_rank']."</td>";
                    echo "<td><a href=\"delete.php?us=$res[Login_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash lg-2'></a></td>";


                }
                ?>

                </tbody>
                <tfoot class="bg-primary">
                <tr>
                    <th>Login ID</th>
                    <th>User Name</th>
                    <th>User Contact</th>
                    <th>User Email</th>
                    <th>User Type</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>

    <!-- PAGE CONTENT ENDS -->
<?php include "f.php"; ?>