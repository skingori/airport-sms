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
<?php include'h.php';?>
<?php

$result = mysqli_query($con, "SELECT * FROM `login_table`");
?>
    <div class="card">
        <div class="card-header" data-background-color="green">
            <h5 class="title">All USERS</h5>
        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table" id="table1">
                <thead class="">
                <th>User ID</th>
                <th>Fullname</th>
                <th>Contact</th>
                <th>Email</th>
                <th><i class="fa fa-sticky-note"></i></th>
                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td>".$res['Login_id']."</td>";
                    echo "<td>".$res['Login_fullname']."</td>";
                    echo "<td>".$res['Login_contact']."</td>";
                    echo "<td>".$res['Login_email']."</td>";
                    echo "<td><a href=\"edit.php?id=$res[Login_id]\" onClick=\"return confirm('Are you sure you want to edit?')\" class='fa fa-pencil-square-o lg-2'></a></td>";




                }
                ?>

                <?php

                $result = mysqli_query($con,"SELECT COUNT(0) FROM login_table");
                $row3 = mysqli_fetch_array($result);

                $totalx= $row3[0];

                ?>
                </tbody>
                <tfoot class="alert-success">
                <tr>
                    <th><b>TOTAL</b></th>
                    <td></td>
                    <td></td>
                    <td><?php echo $totalx ;?></td>
                    <td></td>


                </tr>

                </tfoot>
            </table>
        </div>
    </div>

<?php include 'f.php';?>