<?php include'h.php';?>
<?php

$result = mysqli_query($con, "SELECT * FROM `routes_table`");
?>
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h5 class="title">REGISTERED ROUTES</h5>
            <span><a href="" onclick="printData()"><i class="fa fa-print fa-stack-2x"></i></a></span>
            <p class="category">These are the registered routes </p>

        </div>
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped" id="table1">
                <thead class="" style="font-family: 'Arial Black'">
                <th>ROUTE CODE</th>
                <th>DESCRIPTION</th>
                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td>".$res['Route_id']."</td>";
                    echo "<td>".$res['Route_description']."</td>";



                }
                ?>

                <?php

                ?>
                </tbody>
                <tfoot class="alert-success">
                <tr>
                    <th>ROUTE CODE</th>
                    <th>DESCRIPTION</th>

                </tr>

                </tfoot>
            </table>
        </div>
    </div>

<?php include 'f.php';?>