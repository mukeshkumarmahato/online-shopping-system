<?php
	include "../db.php";
    include "ad-header.php";
?>
<div class="product-list">
    <div class="list-header">
        <h3>Order detail</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>Order id</th>
                <th>Order date</th>
                <th>Address</th>
                <th>Payment type</th>
                <th>Payment status</th>
                <th>Order status</th>
            </tr>
        </thead>
        <tbody class="body">
            <?php
                $result = mysqli_query($con,"SELECT `orders`.*, orders_info.address AS orders_info_str, order_status.name AS order_status_str FROM `orders`, order_status, orders_info WHERE order_status.id = `orders`.o_status AND orders.order_id = orders_info.order_id");
                while($data=mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><a href="order_detail.php?id=<?php echo $data['order_id'];?>"><?php echo $data['order_id'];?></a></td>
                    <td><?php echo $data['added_on'];?></td>
                    <td><?php echo $data['orders_info_str'];?></td>
                    <td><?php echo $data['p_type'];?></td>
                    <td><?php echo $data['p_status'];?></td>
                    <td><?php echo $data['order_status_str'];?></td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>
<?php
    include "footer.php";
?>