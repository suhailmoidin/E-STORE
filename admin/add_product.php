<?php include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4> Add Products</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter product name" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="description" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Specification</label>
                            <textarea name="specification" placeholder="Enter specification" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
						<div class="col-md-6">
                            <label for="">Category</label>
                        <select class="form-select" name="category_id">
                        <option selected>Select Category</option>
                            <?php
                                $categories = getAll("categories");
                                if (mysqli_num_rows($categories) > 0){
                                foreach($categories as $item){
                                    ?>
                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Subcategory</label>
                            <select class="form-select" name="subcategory_id">
                            <option selected>Select SubCategory</option>
                                <?php
                                    $subcategories = getAll("subcategories");
                                    if (mysqli_num_rows($subcategories) > 0){
                                    foreach($subcategories as $item){
                                        ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>

                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Price</label>
                            <input type="text" name="price" placeholder="Enter price" class="form-control">
                        </div>
                        <div class="col=md-12">
                        <button type="submit" class="btn btn-primary mt-3" name="add_product_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php');?>