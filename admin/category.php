<?php
include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Categories</h4>
					<a href="add_category.php" class="btn btn-primary">Add</a>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-striped">
						</thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<!-- <th>Description</th> -->
								<th>Image</th>
								<th>Edit</th>
							</tr>
						<thead>
						<tbody>
							<?php
								$category=getAll("categories");

								if(mysqli_num_rows($category)>0)
								{
									foreach($category as $item)
									{
										?>
											<tr>
											<td><?php echo $item['id']; ?></td>
											<td><?=$item['name']; ?></td>
											<!-- <td><?=$item['description']; ?></td> -->
											<td><img src="../uploads/<?=$item['image']; ?>" width="50px" height="50px" alt="<?= $item['name'];?>"></td>
											<td><a href="edit_category.php?id=<?= $item['id']; ?> " class="btn btn-primary">Edit</a></td>
											</tr>
										<?php
									}
								}

								else
								{
									echo "No records found";
								}
							?>
							
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php include('includes/footer.php');?>

