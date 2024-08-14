<?php

include('../database.php');
 ?>

<h1 class="text-center " style="color:white; font-size:30px;">Categories</h1>
<br>
<table class="table-bordered" style="margin: 0 auto; width: 500px;">
    <thead>
        <tr>
            <th style="text-align: center;">Category Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_categories = "SELECT * FROM categories";
            $result_categories = mysqli_query($mysqli, $get_categories);
            $count_categories = mysqli_num_rows($result_categories);

            while($row_categories = mysqli_fetch_assoc($result_categories)){
                $category_name = $row_categories['title'];

                echo "<tr>
                        <td style='text-align: center;'>$category_name</td>
                    </tr>";
            }
        ?>
    </tbody>
</table>
    <thead>
    <tr>
        <th>Category Name</th>     
      

    </tr>
</thead>
<tbody>
    <?php

        $get_orders = "SELECT * FROM categories";
        $result_orders = mysqli_query($mysqli, $get_orders);
        $count_orders = mysqli_num_rows($result_orders);

        while($row_orders = mysqli_fetch_assoc($result_orders)){
          $category_name = $row_orders['title'];

            echo "<tr>
                    <td>$category_name</td>
              
                </tr>";
        }

    ?>

</tbody>
</table>