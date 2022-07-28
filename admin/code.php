<?php
session_start();
include('../functions/myfunctions.php');

if(isset($_POST['add_category_btn']))
{
	$name=$_POST['name'];
	$description=$_POST['description'];
	$_SESSION['message'] = 'Aditya';
	$image=$_FILES['image']['name']; 
	$path="../uploads";
	
	$image_ext= pathinfo($image,PATHINFO_EXTENSION);
	$filename=time().'.'.$image_ext;

	$cate_query="INSERT INTO categories (name ,description,image)
	VALUES ('$name' ,'$description','$filename')";
	
	$cate_query_run= mysqli_query($con,$cate_query);
	
	if($cate_query_run)
	{
		move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
		redirect("add_category.php","Category added Succesfully");

	}
	else
	{
		redirect("add_category.php","Something went wrong");

	}
}

if(isset($_POST['add_subcategory_btn']))
{
	$name=$_POST['name'];
	$description=$_POST['description'];
	$image=$_FILES['image']['name']; 
	$path="../uploads";
	
	$image_ext= pathinfo($image,PATHINFO_EXTENSION);

	$filename=time().'.'.$image_ext;

	$cate_query="INSERT INTO subcategories (name ,description, image)
	VALUES ('$name','$description','$filename')";
	
	$cate_query_run= mysqli_query($con,$cate_query);
	
	if($cate_query_run)
	{
		move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
		redirect("add_subcategory.php","Subcategory added Succesfully");

	}
	else	
	{
		redirect("add_subcategory.php","Something went wrong");

	}
}

if(isset($_POST['add_product_btn']))
{
	$name=$_POST['name'];
	$description=$_POST['description'];
	$category_id= $_POST['category_id'];
	$specification = $_POST['specification'];
	$subcategory_id=$_POST['subcategory_id'];
	$image=$_FILES['image']['name'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity']; 
	$path="../uploads";
	
	$image_ext= pathinfo($image,PATHINFO_EXTENSION);
	$filename=time().'.'.$image_ext;

	$cate_query="INSERT INTO products (name ,description, specification, category_id , subcategory_id,image, price, quantity)
	VALUES ('$name' ,'$description','$specification','$category_id','$subcategory_id','$filename','$price','$quantity')";

	$cate_query_run= mysqli_query($con,$cate_query);
	
	if($cate_query_run)
	{
			move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
			redirect("add_product.php","Product added Succesfully");

	}	
	else
	{
		redirect("add_product.php","Something went wrong");

	}
}

if(isset($_POST['update_category_btn']))
{
	$category_id= $_POST['category_id'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$new_image=$_FILES['image']['name']; 
	$old_image=$_POST['old_image'];

	if($new_image!= "")
	{
		$image_ext= pathinfo($new_image,PATHINFO_EXTENSION);
		$update_filename=time().'.'.$image_ext;

	}
	else{
		$update_filename =$old_image;
	}
	$path="../uploads";
	
	$update_query= "UPDATE categories SET name= '$name',description='$description',
	image='$update_filename' WHERE id='$category_id'";

	$update_query_run = mysqli_query($con,$update_query);
	if($update_query_run)
	{
		if($_FILES['image']['name']!="")
		{
			move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
			if(file_exists("../uploads/".$old_image))
			{
				unlink("../uploads/".$old_image);
			}
		}
		redirect("edit_category.php?id=$category_id","Category Updated succesfully");
	}
	else{
		redirect("edit_category.php?id=$category_id","Something went wrong");

	}
}

if(isset($_POST['update_subcategory_btn']))
{
	$subcategory_id= $_POST['subcategory_id'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$new_image=$_FILES['image']['name']; 
	$old_image=$_POST['old_image'];

	if($new_image!= "")
	{
		$image_ext= pathinfo($new_image,PATHINFO_EXTENSION);
		$update_filename=time().'.'.$image_ext;

	}
	else{
		$update_filename =$old_image;
	}
	$path="../uploads";
	
	$update_query= "UPDATE subcategories SET name= '$name',image='$update_filename', description='$description' WHERE id='$subcategory_id'";

	$update_query_run = mysqli_query($con,$update_query);
	if($update_query_run)
	{
		if($_FILES['image']['name']!="")
		{
			move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
			if(file_exists("../uploads/".$old_image))
			{
				unlink("../uploads/".$old_image);
			}
		}
		redirect("edit_subcategory.php?id=$subcategory_id","Subcategory Updated succesfully");
	}
	else{
		redirect("edit_subcategory.php?id=$subcategory_id","Something went wrong");

	}
}

if(isset($_POST['update_product_btn']))
{
	$product_id= $_POST['product_id'];
	$subcategory_id= $_POST['subcategory_id'];
	$category_id= $_POST['category_id'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$specification = $_POST['specification'];
	$new_image=$_FILES['image']['name']; 
	$old_image=$_POST['old_image'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];

	if($new_image!= "")
	{
		$image_ext= pathinfo($new_image,PATHINFO_EXTENSION);
		$update_filename=time().'.'.$image_ext;

	}
	else{
		$update_filename =$old_image;
	}
	$path="../uploads";
	
	$update_query= "UPDATE products SET name= '$name',category_id='$category_id',subcategory_id='$subcategory_id' ,description='$description' ,specification='$specification',image='$update_filename', price='$price', quantity='$quantity' WHERE id='$product_id'";

	$update_query_run = mysqli_query($con,$update_query);
	if($update_query_run)
	{
		if($_FILES['image']['name']!="")
		{
			move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
			if(file_exists("../uploads/".$old_image))
			{
				unlink("../uploads/".$old_image);
			}
		}
		redirect("edit_product.php?id=$product_id","Product Updated succesfully");
	}
	else{
		redirect("edit_product.php?id=$product_id","Something went wrong");
	}
}

?>