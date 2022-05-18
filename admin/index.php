<?php
	include "../db.php";
    include "ad-header.php";
?>
<!-- End Navbar -->
<div class="categories">
    <div class="cat-heading">
        <h3>Categories details</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>id</th>
                <th>Categories</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody class="body">
            <?php 
                $result=mysqli_query($con,"select * from categories")or die ("query 1 incorrect.....");
                $i=1;
                while(list($id,$categories)=mysqli_fetch_array($result))
                {	
                  $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
                  $query = mysqli_query($con,$sql);
                  $row = mysqli_fetch_array($query);
                  $count=$row["count_items"];
                  $i++?>
                    <tr>
                          <td><?php echo $id ?></td>
                          <td><?php echo $categories ?></td>
                          <td><?php echo $count ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="categories">
    <div class="cat-heading">
        <h3>Brand details</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>Id</th>
                <th>Brand title</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody class="body">
            <?php 
                $result=mysqli_query($con,"select * from brands")or die ("query 1 incorrect.....");
                $i=1;
                while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                {	
                    $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                    $query = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($query);
                    $count=$row["count_items"];
                    $i++;
                    echo "<tr>
                            <td>$brand_id</td>
                            <td>$brand_title</td>
                            <td>$count</td>
                          </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<div class="product-list">
    <div class="list-header">
        <h3>Users details</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>contact no</th>
                <th>Address | city</th>
            </tr>
        </thead>
        <tbody class="body"> 
            <?php
            $res = mysqli_query($con,"SELECT * FROM user_info");

            while($data=mysqli_fetch_array($res))
                {?>
                <tr>
                    <td><?php echo $data["user_id"];?></td>
                    <td><?php echo $data["first_name"];?></td>
                    <td><?php echo $data["email"];?></td>
                    <td><?php echo $data["mobile"];?></td>
                    <td><?php echo $data["address1"];?> | <?php echo $data["address2"];?></td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>
<div class="product-list">
    <div class="list-header">
        <h3>Subscribers</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>id</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody class="body"> 
            <?php
                $res = mysqli_query($con,"SELECT * FROM email_info");

                while($data=mysqli_fetch_array($res))
                    {?>
                    <tr>
                        <td><?php echo $data["email_id"];?></td>
                        <td><?php echo $data["email"];?></td>
                    </tr>
                <?php } ?>        
        </tbody>
    </table>
</div>
<?php
include "footer.php";
?>