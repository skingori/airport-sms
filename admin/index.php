

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
        $result = mysqli_query($con, "SELECT * FROM customer_flight_table ORDER BY Customer_flight_id ASC");
    ?>
    <div class="card">
        <div class="card-header" data-background-color="green">
            <h5 class="title">Booked Passengers</h5>
            <p class="category">Add message to your selection</p>
        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table">
                <thead class="text-danger">
                <th>Customer Code</th>
                <th>Flight ID</th>
                <th>Login ID</th>
                <th>Message</th>
                <th>More</th>
                </thead>
                <tbody>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Customer_flight_id']."</td>";
                    echo "<td>".$res['Customer_flight_flight_id']."</td>";
                    echo "<td class='text-primary'>".$res['Customer_flight_customer_login_id']."</td>";
                    echo "<td><a href=\"message.php?id=$res[Customer_flight_customer_login_id]\" onClick=\"return confirm('Are you sure you want to send Message?')\" class='fa fa-envelope lg-2'></a></td>";
                    echo "<td><a href=\"delete.php?id=$res[Customer_flight_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash lg-2'></a></td>";

                }
                ?>

                </tbody>
                <tfoot class="bg-info">
                <tr>
                    <th>Customer Code</th>
                    <th>Flight ID</th>
                    <th>Login ID</th>
                    <th>Message</th>
                    <th>More</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>

    <!-- PAGE CONTENT ENDS -->
<?php include "f.php";