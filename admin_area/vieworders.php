<?php

include('../database.php');

if (isset($_POST['update_status'])) {
    $invoice_number = $_POST['invoice_number'];
    // Prepare the SQL statement
    $sql = "UPDATE orders SET order_status = 'complete' WHERE invoice_number = ?";
    $stmt = $mysqli->prepare($sql);

    // Bind the invoice number to the SQL statement
    $stmt->bind_param("s", $invoice_number);
   
     // Execute the SQL statement and check for errors
     if ($stmt->execute()) {
        echo "Order marked as paid!";
    } else {
        echo "Error executing query: " . $stmt->error;
    }
}

?>

<h1 class="text-center " style="color:white; font-size:30px;">Pending Orders</h1>

<table class="table-bordered" style="margin-top: 0;">
    <thead>
    <tr>
        <th>Invoice Number</th>     
        <th>Customer Name</th>
        <th>Customer Contact Number</th>
        <th>Number of Items</th>
        <th>Order Date</th>
        <th>Amount Due</th>
        <th>Order Status</th>
        <th>Mark as Paid</th>

    </tr>
</thead>
<tbody>
    <?php

        $get_orders = "SELECT * FROM orders WHERE order_status = 'pending'";
        $result_orders = mysqli_query($mysqli, $get_orders);
        $count_orders = mysqli_num_rows($result_orders);

        while($row_orders = mysqli_fetch_assoc($result_orders)){
         $invoice_number = $row_orders['invoice_number'];
         $user_id = $row_orders['user_id'];
         $quantity = $row_orders['total_products'];
        $order_date = $row_orders['order_date'];
        $amount_due = $row_orders['amount'];
        $order_status = $row_orders['order_status'];

        $get_user = "SELECT * FROM user WHERE user_id = '$user_id'";
        $result_user = mysqli_query($mysqli, $get_user);
        $row_user = mysqli_fetch_assoc($result_user);
        $customer_name = $row_user['username'];
        $customer_contact = $row_user['user_mobile'];

            echo "<tr>
                    <td>$invoice_number</td>
                    <td>$customer_name</td>
                    <td>$customer_contact</td>
                    <td>$quantity</td>
                    <td>$order_date</td>
                    <td>R $amount_due</td>
                    <td>$order_status</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='invoice_number' value='$invoice_number'>
                            <button name='update_status' class='btn btn-primary'>Paid</button>
                        </form>
                    </td>
                </tr>";

        }

  

    ?>

</tbody>
</table>