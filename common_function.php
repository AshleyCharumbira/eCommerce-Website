<?php

include("database.php");


//function to fetch all products from the database
function fetch_products(){
    global $mysqli;

    if(!isset($_GET['category'])){
        if(!isset($_GET['product_id'])){
            if(!isset($_GET['service_id'])){

    $select_products = "SELECT * FROM products";
    $result_products = mysqli_query($mysqli, $select_products);

    while($row = mysqli_fetch_assoc($result_products)){
        $product_name = $row['product_name'];
        $product_id = $row['product_id'];
        $product_image = $row['product_image'];
        $product_description = $row['product_desc'];
        $product_price = $row['price'];
        $product_status = $row['product_status'];

        echo "<div class='col-md-3 my-4'>
                <div class='card bg-success'>
                    <img src='admin_area/product_images/$product_image' class='card-img-top' alt='Product Image'style='height: 250px; margin: 0 auto;'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text' style='color:white; font-size:18px; font-weight:bold;'>Price: R $product_price</p>
                        <a href='products.php?add_cart=$product_id' class='btn'  style='background-color:#004526; color:white;'>Add to cart</a>
                
                    </div>
            </div>
        </div>";
    }
}
    }
}
}


//function to fetch all services from the database
function fetch_services(){
        global $mysqli;

        
    if(!isset($_GET['category'])){
        if(!isset($_GET['product_id'])){
            if(!isset($_GET['service_id'])){


        $select_products = "SELECT * FROM services";
        $result_products = mysqli_query($mysqli, $select_products);

        while($row = mysqli_fetch_assoc($result_products)){
            $service_name = $row['service_name'];
            $service_id = $row['service_id'];
            $service_image = $row['service_image'];
            $service_description = $row['description'];
            $service_price = $row['price'];

             
            echo "<div class='col-md-4'>
            <br>
            <div class='card bg-success'>
                <img src='admin_area/service_images/$service_image' class='card-img-top' alt='Service Image' style='height: 300px;'>
            
            </div>
            </div>
            <div class='col-md-8'>
            <br>
                <div class='bg-success' style='height: 300px;  border-radius: 10px;'>
                <br>
                    <h3 class='text-center text-dark'>$service_name</h3>  
                    <p class='text-center text-light margin: 0 auto;'>$service_description</p>
                    <div class='text-center'>
                        <a href='book_service.php' class='btn' style='background-color:#004526; color:white;'>Book Service</a>
                        <a href='quote.php' class='btn'  style='background-color:#8FBC8B'>Get Quote</a>

                    </div>
                    <p>' '</p>
               </div>
            </div>";
        }
    }
}
    }
}

//function to fetch individual product:
function fetch_one_product(){
    global $mysqli;

    if(isset($_GET['product_id'])){
        $category_id = $_GET['product_id'];


        $select_products = "SELECT * FROM products WHERE product_id = $category_id";
        $result_products = mysqli_query($mysqli, $select_products);

        while($row = mysqli_fetch_assoc($result_products)){
            $product_name = $row['product_name'];
            $product_id = $row['product_id'];
            $product_image = $row['product_image'];
            $product_description = $row['product_desc'];
            $product_price = $row['price'];
            $product_status = $row['product_status'];
            $more_details = $row['more_details'];

            echo 
            "<div class='col-md-4'>
                <br>
            <div class='card bg-success'>
                    <img src='admin_area/product_images/$product_image' class='card-img-top' alt='Product Image'>
                </div>
            </div>
            <div class='col-md-8'>
            <br>
                <div class='bg-success' >
                    <h3 class='text-center text-dark'>$product_name</h3>
                    <p class='text-center text-light margin: 0 auto;'>$product_description</p>
                    <h3 class='text-center text-dark'>More Details</h3>
                    <p class='text-center text-darkt'>$more_details</p>
                    <p class='text-center text-dark'>Price: R $product_price</p>
                    <a href='products.php?add_cart=$product_id' class='btn'  style='background-color:#004526; color:white;'>Add to cart</a>
                </div>
            </div>";
        }      
}
}

//function to fetch individual service:
function fetch_one_service(){
    global $mysqli;

    if(isset($_GET['service_id'])){
        $service_id = $_GET['service_id'];


        $select_services = "SELECT * FROM services WHERE service_id = $service_id";
        $result_services = mysqli_query($mysqli, $select_services);

        while($row = mysqli_fetch_assoc($result_services)){
            $service_name = $row['service_name'];
            $service_id = $row['service_id'];
            $service_image = $row['service_image'];
            $service_description = $row['description'];
            $service_price = $row['price'];
            $more_details = $row['more_details'];
     

            echo "<div class='col-md-4'>
             <br>
             <div class='card bg-success'>
                <img src='admin_area/service_images/$service_image' class='card-img-top' alt='Service Image'>
              </div>
            </div>

            <div class='col-md-8'>
            <br>
                <div class='bg-success'>
                    <h3 class='card-title'>$service_name</h5>
                    <p class='text-center text-light margin: 0 auto;'>$service_description</p>
                    <h3 class='text-center text-dark'>More Details</h3>
                    <p class='text-center text-light'>$more_details</p>
                    <a href='book_service.php' class='btn' style='background-color:#004526; color:white';>Book Service</a>
                    <a href='quote.php' class='btn'  style='background-color:#8FBC8B'>Get Quote</a>

                </div>
            </div>";
        }      
}
}


//function to fetch categories from the database
function fetch_categories(){
    global $mysqli;
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($mysqli, $select_categories);

    while($row = mysqli_fetch_assoc($result_categories)){
        $category_name = strtolower($row['title']);
        $category_id = $row['category_id'];
        
        $display_category_name = ucfirst(strtolower($category_name)); // capitalize the first letter

        echo "<li class='nav-item bg-success'>
            <a href= '$category_name.php?' class='nav-link text-light' style='font-size: 20px; font-weight: bold; color:white;'>$display_category_name</a>
        </li>";

        //function to fetch items inside category
        $select_products = "SELECT * FROM " . strtolower($category_name) . " WHERE category_id = $category_id";
        $result_products = mysqli_query($mysqli, $select_products);
    
        while($row = mysqli_fetch_assoc($result_products)){
            $product = lcfirst(substr($category_name, 0, -1)) . "_name";
            $product_name = $row[$product];
            $id = lcfirst(substr($category_name, 0, -1)) . "_id";
            $product_id = $row[$id];
    
            echo "<li class='nav-item'>
                <a href='$category_name.php?$id=$product_id' class='nav-link text-light'>$product_name</a>
            </li>";
        }

    }
}

//function to search for products
function search_product(){
    global $mysqli;

    if(isset($_GET['search_data_product'])){
        $search = $_GET['search_data'];

        $select_products = "SELECT * FROM products WHERE key_words LIKE '%$search%'";
        $result_products = mysqli_query($mysqli, $select_products);

        if($result_products->num_rows == 0){
            echo "<h1 class='text-center' style='color:orange'>No products found</h1>";
        }

        while($row = mysqli_fetch_assoc($result_products)){
            $product_name = $row['product_name'];
            $product_id = $row['product_id'];
            $product_image = $row['product_image'];
            $product_description = $row['product_desc'];
            $product_price = $row['price'];
            $product_status = $row['product_status'];

            echo "<div class='col-md-4 my-2'>
            <div class='card bg-success'>
                <img src='admin_area/product_images/$product_image' class='card-img-top' alt='Product Image'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_name</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text' style='color:white; font-size:18px; font-weight:bold;'>Price: R $product_price</p>
                    <a href='products.php?add_cart=$product_id' class='btn'  style='background-color:#004526; color:white;'>Add to cart</a>
                </div>
            </div>
        </div>";
        }
    }
}

//function to search for products
function search_services(){
    global $mysqli;

    if(isset($_GET['search_data_service'])){
        $search = $_GET['search_data'];

        $select_products = "SELECT * FROM services WHERE key_words LIKE '%$search%'";
        $result_products = mysqli_query($mysqli, $select_products);

        if($result_products->num_rows == 0){
            echo "<h1 class='text-center' style='color:orange'>No services found</h1>";
        }

        while($row = mysqli_fetch_assoc($result_products)){
            $product_name = $row['service_name'];
            $product_id = $row['service_id'];
            $product_image = $row['service_image'];
            $product_description = $row['description'];
            $product_price = $row['price'];
      

            echo "<div class='col-md-4 my-2'>
            <div class='card bg-success'>
                <img src='admin_area/service_images/$product_image' class='card-img-top' alt='Service Image'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_name</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='book_service.php' class='btn'  style='background-color:#004526; color:white;'>Book Service</a>
                    <a href='quote.php' class='btn'  style='background-color:#8FBC8B'>Get Quote</a>
                </div>
            </div>
        </div>";
        }
    }
}


//function to fetch all services from the database
function fetch_certificates(){
    global $mysqli;

    
if(!isset($_GET['category'])){
    if(!isset($_GET['product_id'])){
        if(!isset($_GET['service_id'])){
            if(!isset($_GET['certificate_id'])){    


    $select_products = "SELECT * FROM certificates";
    $result_products = mysqli_query($mysqli, $select_products);

    while($row = mysqli_fetch_assoc($result_products)){
        $service_name = $row['certificate_name'];
        $service_id = $row['certificate_id'];
        $service_image = $row['cert_image'];
        $service_description = $row['cert_description'];
    

        echo "<div class='col-md-4 mb-2'>
        <div class='card bg-success'>
            <img src='admin_area/cert_images/$service_image' class='card-img-top' alt='Service Image'>
            <div class='card-body'>
                <h5 class='card-title'>$service_name</h5>
                <p class='card-text'>$service_description</p>
                <a href='book_inspection.php' class='btn' style='background-color: #004526; color:white;'>Book Inspection</a>
            </div>
        </div>
    </div>";
    }
}
}
}
}
}
    

//function to fetch individual certificate:
function fetch_one_certificate(){
    global $mysqli;

    if(isset($_GET['certificate_id'])){
        $service_id = $_GET['certificate_id'];


        $select_services = "SELECT * FROM certificates WHERE certificate_id = $service_id";
        $result_services = mysqli_query($mysqli, $select_services);

        while($row = mysqli_fetch_assoc($result_services)){
            $service_name = $row['certificate_name'];
            $service_id = $row['certificate_id'];
            $service_image = $row['cert_image'];
            $service_description = $row['cert_description'];
            $more_details = $row['more_details'];
            

            echo "<div class='col-md-4'>
            <br>
            <div class='card bg-success'>
                <img src='admin_area/cert_images/$service_image' class='card-img-top' alt='Service Image'>
            
            </div>
        </div>
        <div class='col-md-8'>
            <br>
                <div class='bg-success'>
                    <h3 class='text-center text-dark'>$service_name</h3>  
                    <p class='text-center text-light margin: 0 auto;'>$service_description</p>
                    <h3 class='text-center text-dark'>More Details</h3>
                    <p class=text-center text-light>$more_details</p> 
                    <a href='book_inspection.php' class='btn' style='background-color:#004526; color:white;';>Book inspection</a>
                    <p>' '</p>
               </div>
            </div>";
        }      
}
}

//function to search for certificate
function search_certificate(){
    global $mysqli;

    if(isset($_GET['search_data_certificate'])){
        $search = $_GET['search_data'];

        $select_products = "SELECT * FROM certificates WHERE key_words LIKE '%$search%'";
        $result_products = mysqli_query($mysqli, $select_products);

        if($result_products->num_rows == 0){
            echo "<h1 class='text-center' style='color:orange'>No certificates found</h1>";
        }

        while($row = mysqli_fetch_assoc($result_products)){
            $product_name = $row['certificate_name'];
            $product_id = $row['certificate_id'];
            $product_image = $row['cert_image'];
            $product_description = $row['cert_description'];
           

            echo "<div class='col-md-4 my-2'>
            <div class='card bg-success'>
                <img src='admin_area/cert_images/$product_image' class='card-img-top' alt='Product Image'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_name</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='book_inspection.php' class='btn'  style='background-color:#004526; color:white;'>Book Inspection</a>
                </div>
            </div>
        </div>";
        }
    }
}

//Function to get IP address:
function getIPAddress() {  
    // ip from share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    // ip from proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
// ip from remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  



//cart function:
function cart(){
    global $mysqli;

    if(isset($_GET['add_cart'])){
        $ip = getIPAddress();
        $product_id = $_GET['add_cart'];

        $check_product = "SELECT * FROM cart_details WHERE ip_address = '$ip' AND product_id = $product_id";
        $result_check = mysqli_query($mysqli, $check_product);

        if($result_check->num_rows > 0){
            echo "<script>alert('Product already in cart')</script>";
            echo "<script>window.open('products.php', '_self')</script>";
        }else{
                $insert_query= "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($product_id, '$ip',1)";
                $result_insert = mysqli_query($mysqli, $insert_query);
                echo "<script>alert('Product added to cart')</script>";
                echo "<script>window.open('products.php', '_self')</script>";
    
            }
        }
    }

//function to get cart item number:
function cart_item(){
    
    if(isset($_GET['add_cart'])){
        global $mysqli;
        $ip = getIPAddress();
        $check_product = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
        $result_check = mysqli_query($mysqli, $check_product);
        $count_items = $result_check->num_rows;
        }else{
            global $mysqli;
            $ip = getIPAddress();
            $check_product = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
            $result_check = mysqli_query($mysqli, $check_product);
            $count_items = $result_check->num_rows;
            }
        echo $count_items;
    }

//function for total price:
function total_price(){
    global $mysqli;
    $ip = getIPAddress();
    $total = 0;
    $select_cart = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
    $result_cart = mysqli_query($mysqli, $select_cart);

    while($row_product_price = mysqli_fetch_array($result_cart)){
        $product_id = $row['product_id'];
        $select_product = "SELECT * FROM products WHERE product_id = $product_id";
        $result_product = mysqli_query($mysqli, $select_product);

        while($row_product_price = mysqli_fetch_array($result_product)){
            $product_price = array($row_product_price['price']);
            $product_values= array_sum($product_price);
            $total += $product_values;
        }
    }
    echo $total;
}   






?>