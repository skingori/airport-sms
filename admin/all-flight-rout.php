<?php include'h.php';?>
<?php

$result = mysqli_query($con, "SELECT * FROM `flight_route_table`");
?>
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h5 class="title">ROUTES & FLIGHT</h5>
            <span><a href="" onclick="printData()"><i class="fa fa-print fa-stack-2x"></i></a></span>
            <p class="category">These are all flights and their routes </p>

        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped" id="table1">
                <thead class="" style="font-family: 'Arial Black'">
                <th>ROUTE ID</th>
                <th>ROUTE CODE</th>
                <th>FLIGHT ID</th>
                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td>".$res['Flight_route_id']."</td>";
                    echo "<td>".$res['Flight_route_route_id']."</td>";
                    echo "<td>".$res['Flight_route_flight_id']."</td>";



                }
                ?>

                <?php

                ?>
                </tbody>
                <tfoot class="alert-success">
                <tr>
                    <th>ROUTE ID</th>
                    <th>ROUTE CODE</th>
                    <th>FLIGHT ID</th>

                </tr>

                </tfoot>
            </table>
        </div>
    </div>

<?php include 'f.php';?>