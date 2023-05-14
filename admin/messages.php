<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Messages</h1>
	</div>
	<div class="content-header-right">
		<a href="product-add.php" class="btn btn-primary btn-sm">Add Product</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th width="60">Full Name</th>
								<th width="60">Email</th>
								<th width="160">Message</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
								
								$i=0;


								// Check connection
								if($conn){ 

									$sql = "SELECT id, full_name, email, message FROM message";
									$result = $conn->query($sql);

									
									
									if ($result->num_rows > 0) {
	
										while($row = $result->fetch_assoc()) {

											$i++;
	
											$id = $row['id'];
											$full_name = $row['full_name'];
											$email = $row['email'];
											$message = $row['message'];
											
										

											echo "<tr>";
												echo "<td>$i</td>";
												echo "<td>$full_name</td>";
												echo "<td>$email</td>";
												echo "<td>$message</td>";
	
												echo "<td>";										
													echo "<a href='#' class='btn btn-danger btn-xs' data-href='message-delete.php?id=$id' data-toggle='modal' data-target='#confirm-delete'>Delete</a>";
												echo "</td>";
											echo "</tr>";
										}

										$result->close();
									}


								}

							?>							
		
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
                <p style="color:red;">Be careful! This product will be deleted from the order table, payment table, size table, color table and rating table also.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>