<?php
        $username = $_SESSION['username'];

        $get_user = "SELECT * FROM user WHERE username = '$username'";
        $result_user = mysqli_query($mysqli, $get_user);
        $row_user = mysqli_fetch_assoc($result_user);
        $user_id = $row_user['user_id'];
  

?>

<table class="table-bordered mt-5">
    <thead>
    <tr>
        <th>Order Number</th>
        <th>Order Date</th>
        <th>Invoice Number</th>
        <th>Amount Due</th>
        <th>Order Status</th>

    </tr>
</thead>
<tbody>
    <?php

        $get_orders = "SELECT * FROM orders WHERE user_id = '$user_id' AND order_status = 'pending'";
        $result_orders = mysqli_query($mysqli, $get_orders);
        $count_orders = mysqli_num_rows($result_orders);
        if($count_orders >0){
            echo "<h1 class='text-center' style='color:white; font-size:30px;'>You have $count_orders pending order(s)</h1>";
        }else{
            echo "<h1 class='text-center my-5' style='color:white; font-size:30px;'>You have no pending orders</h1>";
        }

        while($row_orders = mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['order_id'];
            $order_date = $row_orders['order_date'];
            $invoice_no = $row_orders['invoice_number'];
            $order_status = $row_orders['order_status'];
            $amount = $row_orders['amount'];

       

            echo "<tr>
                    <td>$order_id</td>
                    <td>$order_date</td>
                    <td>$invoice_no</td>
                    <td>R $amount</td>
                    <td>$order_status</td>
                </tr>";
        }

     

    ?>

</tbody>
</table>