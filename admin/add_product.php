<?php
    // If save button is clicked ...
    if (isset($_POST['save'])) {
    // image file directory
    $target = "C:/Users/Bhuwan Nepali/Downloads/Video/htdocs/online-shop-system/product_images/".basename($_FILES['Image']['name']);

    //connect to the database
    $con = mysqli_connect("localhost","root","","onlineshop");
  	$image = $_FILES['Image']['name'];
    $nam = $_POST['pname'];
  	$desc = $_POST['pdesc'];
  	$cate = $_POST['pcat'];
  	$price = $_POST['price'];
    $brand = $_POST['pbrand'];
    $pkey = $_POST['pkey'];

    move_uploaded_file($_FILES['Image']['tmp_name'], $target);
    $sql = "INSERT INTO products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords) values ('$cate','$brand','$nam','$price','$desc','$image','$pkey')" or die ("query incorrect");
    $query_run = mysqli_query($con, $sql);

    if ($query_run){
      echo '<script type="text/javascript">alert("data are inserted successfully...")</script>';
      echo "<script>window.location.href='product.php'</script>";
      }
    else{
      die("failed to insert ".mysqli_error($con));
      echo "<script>window.location.href='add_product.php'</script>";
      }
}
    include "ad-header.php";
?>
<div class="product">
    <form name="form" method="post" action="" enctype="multipart/form-data" id="uploadForm">
        <div class="pro-image">
            <div class="pimage">
                <h3>Product image</h3>
            </div>
            <img src="img/placeholder.jpg" alt="" onclick="triggerClick()" id="imagedisplay">
            <input type="file" name="Image" id="file" onchange="filePreview(this)" style="display: none;">
            <!--div class="image">
            </div-->
        </div>
        <div class="product-details">
            <div class="pheader">
                <h3>Product details</h3>
            </div>
            <div class="input">
                <label for="">Product title</label><br>
                <input type="text" name="pname" id="" required class="form-control"><br>   
                <label for="">Description</label><br>
                <input type="text" name="pdesc" id="" required class="form-control"><br>
                <label for="">Pricing</label><br>
                <input type="number" name="price" id="" required class="form-control"><br>
                <label for="">Product category</label><br>
                    <select name="pcat" id="" class="form-control">
                        <option value="">Select Category</option>
                            <?php
                                $res = mysqli_query($con,"SELECT cat_id, cat_title FROM categories order by cat_title asc");
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<option value=".$row['cat_id'].">".$row['cat_title']."</option>";
                                }
                            ?>
                    </select>
                <label for="">Product brand</label><br>
                <select name="pbrand" id="" class="form-control">
                        <option value="">Select brand</option>
                            <?php
                                $res = mysqli_query($con,"SELECT brand_id, brand_title FROM brands order by brand_title asc");
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<option value=".$row['brand_id'].">".$row['brand_title']."</option>";
                                }
                            ?>
                    </select>
                <label for="">Product keywords</label><br>
                <input type="number" name="pkey" id="" required class="form-control"><br>
                <input type="submit" name="save" value="Add product">
            </div>
        </div>
    </form>
</div>
<?php
    include "footer.php";
?>