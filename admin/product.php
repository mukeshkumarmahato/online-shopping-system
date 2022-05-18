<?php
	include "../db.php";
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM products WHERE product_id = '$id'");
    }
    mysqli_close($con);

    require ('ad-header.php');
?>
<div class="product-list">
    <div class="list-header">
        <h3>Products list</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th><a href="add_product.php"><button class="add">Add new product</button></a></th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //pagination
            include "../pagination/func.php";
            $page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
            $limit = 15; //if you want to dispaly 5 records per page then you have to change here
            $startpoint = ($page * $limit) - $limit;
            $statement = "products ORDER BY product_id asc"; //you have to pass your query over here
            $res = mysqli_query($con,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");

            while($data=mysqli_fetch_array($res))
                {?>
                <tr>
                    <td><?php echo "<img src='../product_images/".$data['product_image']."'>";?></td>
                    <td><?php echo $data["product_title"];?></td>
                    <td><?php echo $data["product_price"];?></td>
                    <td><a href="edit_product.php?product_id=<?php echo $data["product_id"];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="product.php?del=<?php echo $data["product_id"];?>" onclick="return confirm('Are you sure?');"><i class="fa fa-times-circle"></i></a></td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
    <?php
    echo '<div id="pagingg">';
    echo pagination($statement,$limit,$page);
    echo '</div>';
    ?>
</div>
<?php
    include "footer.php";
?>