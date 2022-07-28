<?php include('includes/header.php');
include('../functions/myfunctions.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    $subcategory= getByID("subcategories",$id);
                    if(mysqli_num_rows($subcategory)>0)
                    {
                        $data = mysqli_fetch_array($subcategory);
            ?>
			<div class="card">
				<div class="card-header">
				<h4> Edit Subcategory </h4>
				</div>
				<div class="card-body">
					<form action="code.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<input type="hidden" name="subcategory_id" value="<?=$data['id'] ?>">
							<label for="">Name</label>
							<input type="text" name="name" value="<?=$data['name'] ?>"placeholder="Enter subcategory name" class="form-control">
						</div>
						<div class="col-md-12">
							<label for="">Description</label>
							<textarea rows="3" name="description" placeholder="Enter description" class="form-control"><?=$data['description'] ?></textarea>
						</div>
						<div class="col-md-12">
							<label for="">Upload Image</label>
							<input type="file" name="image" class="form-control">
							<label for="">Current Image</label>
							<input type="hidden" name="old_image" value="<?=$data['image'] ?>">
							<img src="../uploads/<?=$data['image'] ?>" height="50px" width="50px" alt="">
						</div>
						<div class="col=md-12">
						<button type="submit" class="btn btn-primary" name="update_subcategory_btn">Update</button>
						</div>
					</div>
					</form>
				</div>
			</div>
                <?php
                    }
                    else{
                        echo "Subcategory not found";
                    }
                }
                else{
                    echo "Something went wrong";
                }
                ?>
		</div>
	</div>
</div>

<?php include('includes/footer.php');?>

