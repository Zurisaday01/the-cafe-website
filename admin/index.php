<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php

	$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

	$sql_products = "SELECT COUNT(*) FROM product";
	$sql_orders = "SELECT COUNT(*) FROM orders";
	$sql_customers = "SELECT COUNT(*) FROM users";
	$sql_messages = "SELECT COUNT(*) FROM message";

	$result_products = $conn->query($sql_products);
	$total_products = mysqli_fetch_row($result_products)[0];

	$result_orders = $conn->query($sql_orders);
	$total_orders = mysqli_fetch_row($result_orders)[0];

	// minus the admin
	$result_customers = $conn->query($sql_customers);
	$total_customers = mysqli_fetch_row($result_customers)[0] - 1;

	$result_messages = $conn->query($sql_messages);
	$total_messages = mysqli_fetch_row($result_messages)[0];

	

?>



<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_products; ?></h3>

                  <p>Products</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $total_orders; ?></h3>

                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>

			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $total_customers; ?></h3>
  
					<p>Customers</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-person-stalker"></i>
				  </div>
				  
				</div>
			  </div>



			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
				  <div class="inner">
					<h3><?php echo $total_messages; ?></h3>
  
					<p>Messages</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-android-menu"></i>
				  </div>
				  
				</div>
			  </div>


		  </div>
		  
</section>

<?php require_once('footer.php'); ?>