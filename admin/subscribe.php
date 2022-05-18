<?php
	include "../db.php";
    include "ad-header.php";
?>
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