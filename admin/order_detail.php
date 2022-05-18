<?php
    include "ad-header.php";
    include "../db.php";
        $order_id = mysqli_real_escape_string($con, $_GET['id']);
        if(isset($_POST['update_order_status'])){
            $update_order_status = $_POST['update_order_status'];
            mysqli_query($con,"update orders set o_status='$update_order_status' where order_id='$order_id'");
        }
?>
<div class="product-list">
    <div class="list-header">
        <h3>Order detail</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>Product name</th>
                <th>Product image</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total price</th>
            </tr>
        </thead>
        <tbody class="body">
            <?php
                /*$res = mysqli_query($con,"select distinct(`order_products`.order_id), `orders`.*,products.product_title as pro_title,products.product_image as pro_image, products.product_price as pro_price, order_products.amt as pro_amt from `orders`,products,order_products
                where `order_products`.order_id='$order_id' and orders.product_id=products.product_id ");*/
                $res = mysqli_query($con,"SELECT distinct(`orders`.order_id)
                ,products.product_title as pro_title,products.product_image as pro_image, products.product_price as pro_price,order_products.qty as pro_qty, order_products.amt as pro_amt from `orders`,products,order_products
                where `order_products`.order_id='$order_id' and orders.product_id=products.product_id and order_products.order_id=orders.order_id");
                $total_price = 0;
                while($data = mysqli_fetch_assoc($res))
                {
                    $total_price = $total_price+($data['pro_qty']*$data['pro_price']);
                ?>
                <tr>
                    <td><?php echo $data["pro_title"];?></td>
                    <td><?php echo "<img src='../product_images/".$data['pro_image']."'>";?></td>
                    <td><?php echo $data["pro_qty"];?></td>
                    <td><?php echo $data["pro_price"];?></td>
                    <td><?php echo $data["pro_amt"]; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Price</td>
                    <td><?php echo $total_price;?></td>
                </tr>
        </tbody>
    </table>
    <div id="address_details">
        <?php
        $sql = mysqli_query($con,"select orders_info.*,order_status.name,user_info.mobile from orders_info,order_status,orders,user_info where orders_info.order_id=$order_id and order_status.id=orders.o_status and orders.order_id=orders_info.order_id and orders_info.user_id=user_info.user_id");
        while($row = mysqli_fetch_assoc($sql)){?>
            <strong>Customer Name:</strong>
            <?php echo $row['cardname']?><br><br>
            <strong>Contact:</strong>
            <?php echo $row['mobile']?><br><br>
            <strong>Address:</strong>
            <?php echo $row['address'] ?>, <?php echo $row['city'] ?>, <?php echo $row['state'] ?>, <?php echo $row['zip'] ?><br><br>
            <strong>Order Status:</strong>
            <?php echo $row['name']?>
        <?php } ?>
        <div>
            <form action="" method="post">
                <select name="update_order_status" class="form-status">
                    <option value="">Select Status</option>
                            <?php
                                $result = mysqli_query($con,"SELECT * FROM order_status order by id asc");
                                while($ro = mysqli_fetch_assoc($result)){
                                    echo "<option value=".$ro['id'].">".$ro['name']."</option>";
                                }
                            ?>
                </select>
                <input type="submit" class="form-status" value="Update Order Status">
            </form>
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>