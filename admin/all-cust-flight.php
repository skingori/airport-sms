<?php include'h.php';?>
<?php

$result = mysqli_query($con, "SELECT * FROM `customer_flight_table`");
?>
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h5 class="title">CUSTOMER & FLIGHT</h5>
            <span><a href="" onclick="printData()"><i class="fa fa-print fa-stack-2x"></i></a></span>
            <p class="category">These are all flights booked and the passengers </p>

        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped" id="table1">
                <thead class="" style="font-family: 'Arial Black'">
                <th>FLIGHT ID</th>
                <th>FLIGHT CODE</th>
                <th>PASSENGER ID</th>
                <th>TIME</th>
                <td></td>
                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td>".$res['Customer_flight_id']."</td>";
                    echo "<td>".$res['Customer_flight_flight_id']."</td>";
                    echo "<td>".$res['Customer_flight_customer_login_id']."</td>";
                    echo "<td>".$res['Customer_flight_timestamp']."</td>";
                    echo "<td><a href=\"delete.php?cf=$res[Customer_flight_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash lg-2'></a></td>";




                }
                ?>

                <?php

                ?>
                </tbody>
                <tfoot class="alert-success">
                <tr>
                    <th>FLIGHT ID</th>
                    <th>FLIGHT CODE</th>
                    <th>PASSENGER ID</th>
                    <th>TIME</th>
                    <td></td>


                </tr>

                </tfoot>
            </table>
        </div>
    </div>

<?php include 'f.php';?>