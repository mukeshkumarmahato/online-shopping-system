<?php
    // If upload button is clicked ...
    if (isset($_POST['update'])) {
    // image file directory
    $target = "C:/Users/Bhuwan Nepali/Downloads/Video/htdocs/online-shop-system/product_images/".basename($_FILES['Image']['name']);

    //connect to the database
    $con = mysqli_connect("localhost","root","","onlineshopping");
    $id = $_POST['product_id'];
  	$image = $_FILES['Image']['name'];
    $nam = $_POST['pname'];
  	$desc = $_POST['pdesc'];
  	$cate = $_POST['pcat'];
  	$price = $_POST['price'];
    $brand = $_POST['pbrand'];
    $pkey = $_POST['pkey'];

    move_uploaded_file($_FILES['Image']['tmp_name'], $target);
    $edit = "UPDATE `products` SET `product_image`='$image', `product_title`='$nam', `product_desc`='$desc', `product_cat`='$cate', `product_price`='$price', `product_brand`='$brand', `product_keywords`='$pkey' WHERE `Product_id`= '$id'";

    // execute query
    $query_run = mysqli_query($con, $edit);
    
  	if ($query_run){
        echo '<script type="text/javascript">alert("data are edited successfully...")</script>';
        echo "<script>window.location.href='product.php'</script>";
    }
    else{
        die("failed to insert ".mysqli_error($con));
        echo "<script>window.location.href='edit_product.php'</script>";
  	}
    }
    include "ad-header.php";
?>
<div class="product">
    <form action="edit_product.php" method="post" type="form" name="form" enctype="multipart/form-data">
        <?php
            if(isset($_GET['product_id'])){
                $id = $_GET['product_id'];
                $sql = "SELECT * FROM `products` WHERE product_id = '$id'";
                $result = mysqli_query($con,$sql);
                while($data = mysqli_fetch_array($result)){
            ?>
        <div class="pro-image">
            <div class="pimage">
                <h3>Product image</h3>
            </div>
            <input type="hidden" name="product_id" id="product_id" value="<?php echo $id;?>">
            <img src='<?php echo 'img/'.$data['product_image'];?>' onclick="triggerClick()" id="imagedisplay">
            <input type="file" name="Image" id="file" onchange="filePreview(this)" style="display: none;">
        </div>
        <div class="product-details">
            <div class="pheader">
                <h3>Product details</h3>
            </div>
            <div class="input"> 
                <label for="">Product title</label><br>
                <input type="text" name="pname" id="" required class="form-control" value="<?php echo $data['product_title']?>"><br>   
                <label for="">Description</label><br>
                <input type="text" name="pdesc" id="" required class="form-control" value="<?php echo $data['product_desc']?>"><br>
                <label for="">Pricing</label><br>
                <input type="number" name="price" id="" required class="form-control" value="<?php echo $data['product_price']?>"><br>
                <label for="">Product category</label><br>
                <select name="pcat" id="" class="form-control" required>
                    <option value="">Select Category</option>
                        <?php
                            $res = mysqli_query($con,"SELECT cat_id, cat_title FROM categories order by cat_title asc");
                            while($row = mysqli_fetch_assoc($res)){
                                echo "<option value=".$row['cat_id'].">".$row['cat_title']."</option>";
                            }
                        ?>
                </select>
                <label for="">Product brand</label><br>
                <select name="pbrand" id="" class="form-control" required>
                    <option value="">Select brand</option>
                        <?php
                            $res = mysqli_query($con,"SELECT brand_id, brand_title FROM brands order by brand_title asc");
                            while($row = mysqli_fetch_assoc($res)){
                                echo "<option value=".$row['brand_id'].">".$row['brand_title']."</option>";
                            }
                        ?>
                </select>
                <label for="">Product keywords</label><br>
                <input type="number" name="pkey" id="" required class="form-control" value="<?php echo $data['product_keywords']?>"><br>
                <input type="submit" name="update" value="Update product">
            <?php } } ?>
            </div>
        </div>
    </form>
</div>