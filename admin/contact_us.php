<?php
	include "../db.php";
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM contact_us WHERE id = '$id'");
    }
    include "ad-header.php";
?>
<div class="product-list">
    <div class="list-header">
        <h3>Users comment</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>contact no</th>
                <th>comment</th>
                <th>date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="body"> 
            <?php
            $res = mysqli_query($con,"SELECT * FROM contact_us");

            while($data=mysqli_fetch_array($res))
                {?>
                <tr>
                    <td><?php echo $data["id"];?></td>
                    <td><?php echo $data["name"];?></td>
                    <td><?php echo $data["email"];?></td>
                    <td><?php echo $data["mobile"];?></td>
                    <td><?php echo $data["comment"];?></td>
                    <td><?php echo $data["added_on"];?></td>
                    <td>
                        <a href="contact_us.php?del=<?php echo $data["id"];?>" onclick="return confirm('Are you sure?');"><i class="fa fa-times-circle"></i></a>
                    </td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>
<?php
    include "footer.php";
?>