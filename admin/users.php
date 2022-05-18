<?php
	include "../db.php";
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM user_info WHERE user_id = '$id'");
    }
    include "ad-header.php";
?>
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
                <th>Action</th>
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
                    <td>
                        <a href="users.php?del=<?php echo $data["user_id"];?>" onclick="return confirm('Are you sure?');"><i class="fa fa-times-circle"></i></a>
                    </td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>
<?php
    include "footer.php";
?>