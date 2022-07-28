<?php include('includes/header.php');
include('../functions/myfunctions.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    $product= getByID("products",$id);
                    if(mysqli_num_rows($product)>0)
                    {
                        $data = mysqli_fetch_array($product);
            ?>
			<div class="card">
				<div class="card-header">
				<h4> Edit product</h4>
				</div>
				<div class="card-body">
					<form action="code.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<input type="hidden" name="product_id" value="<?=$data['id'] ?>">
							<label for="">Name</label>
							<input type="text" name="name" value="<?=$data['name'] ?>" placeholder="Enter product name" class="form-control">
						</div>
						<div class="col-md-6">
                            <label for="">Category</label>
                        <?php
                            $category = getByID("categories", $data['category_id']);
                            $category_data = mysqli_fetch_array($category); ?>
                            <select class="form-select" name="category_id">
                            <?php
                        ?>
                            <?php
                                $categories = getAll("categories");
                                if (mysqli_num_rows($categories) > 0){
                                foreach($categories as $item){
                                    ?>
                                    <option value="<?php echo $item['id']; ?>" <?= $item['id'] == $category_data['id'] ? "selected": ""?>><?php echo $item['name']; ?></option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <label for="">Subcategory</label>
                            <?php
                            $subcategory = getByID("subcategories", $data['subcategory_id']);
                            $subcategory_data = mysqli_fetch_array($subcategory); ?>
                            <select class="form-select" name="subcategory_id">
                            <?php
                        ?>
                            <?php
                                $subcategories = getAll("subcategories");
                                if (mysqli_num_rows($subcategories) > 0){
                                foreach($subcategories as $item){
                                    ?>
                                    <option value="<?php echo $item['id']; ?>" <?= $item['id'] == $subcategory_data['id'] ? "selected": ""?>><?php echo $item['name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        </div>
						<div class="col-md-12">
							<label for="">Description</label>
							<textarea rows="3" name="description" placeholder="Enter description" class="form-control"><?=$data['description'] ?></textarea>
						</div>
                        <div class="col-md-12">
							<label for="">Specification</label>
							<textarea rows="3" name="specification" placeholder="Enter specification" class="form-control"><?=$data['specification'] ?></textarea>
						</div>
                        <div class="col-md-6">
							<label for="">Price</label>
							<input type="text" name="price" value="<?=$data['price'] ?>" placeholder="Enter product price" class="form-control">
						</div>
						<div class="col-md-12">
							<label for="">Upload Image</label>
							<input type="file" name="image" class="form-control">
							<label for="">Current Image</label>
							<input type="hidden" name="old_image" value="<?=$data['image'] ?>">
							<img src="../uploads/<?=$data['image'] ?>" height="50px" width="50px" alt="">
						</div>
						<div class="col=md-12">
						<button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
						</div>
					</div>
					</form>
				</div>
			</div>
                <?php
                    }
                    else{
                        echo "product not found";
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

