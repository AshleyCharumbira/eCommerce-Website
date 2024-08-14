<?php

include('../database.php');
 ?>

<h1 class="text-center " style="color:white; font-size:30px;">Users</h1>
<br>
<table class="table-bordered" style="margin-top: 0;">
    <thead>
    <tr>
        <th>Username</th>     
        <th>Email Address</th>
        <th>Contact Number</th>
        <th>Physical Address</th>

    </tr>
</thead>
<tbody>
    <?php

        $get_orders = "SELECT * FROM user";
        $result_orders = mysqli_query($mysqli, $get_orders);
        $count_orders = mysqli_num_rows($result_orders);

        while($row_orders = mysqli_fetch_assoc($result_orders)){
         $username = $row_orders['username'];
         $user_email = $row_orders['user_email'];
         $mobile = $row_orders['user_mobile'];
         $address = $row_orders['user_address'];


            echo "<tr>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td>$mobile</td>
                    <td>$address</td>
              
                </tr>";
        }

     

    ?>

</tbody>
</table>