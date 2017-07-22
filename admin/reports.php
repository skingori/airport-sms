<?php include'h.php';?>
<?php

$result = mysqli_query($con, "SELECT * FROM `customer_flight_notification_table`");
?>
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h5 class="title">SYSTEM MESSAGES</h5>
            <span><a href="" onclick="printData()"><i class="fa fa-print fa-stack-2x"></i></a></span>
            <p class="category">This is a list of all sent messages </p>

        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table" id="table1">
                <thead class="" style="font-family: 'Arial Black'">
                <th>CONTACT</th>
                <th width="15%">STATUS</th>
                <th width="15%">FLIGHT ID</th>
                <th width="75%">MESSAGE</th>
                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td>".$res['Customer_flight_notification_cust_contact']."</td>";
                    echo "<td>".$res['Customer_flight_notification_message_status']."</td>";
                    echo "<td>".$res['Customer_flight_not_cust_flight_fl_id']."</td>";
                    echo "<td>".$res['Customer_flight_notification_message']."</td>";



                }
                ?>

                <?php

                $result = mysqli_query($con,"SELECT COUNT(Customer_flight_notification_message) FROM customer_flight_notification_table");
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


                </tr>

                </tfoot>
            </table>
        </div>
    </div>

<?php include 'f.php';?>