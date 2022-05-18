<?php
	include "../db.php";
    if(isset($_POST['cat'])){
        $name = $_POST['cname'];

        $sql = "INSERT INTO categories (cat_title) VALUES ('$name')"or die ("query incorrect");
        $query_run = mysqli_query($con,$sql);

        if ($query_run){
            echo '<script type="text/javascript">alert("data are inserted successfully...")</script>';
            echo "<script>window.location.href='categories.php'</script>";
        }
        else{
            die("failed to insert ".mysqli_error($con));
            echo '<script>alert("data is not inserted")</script>';
        }      
    }
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM categories WHERE cat_id = '$id'");
    }
    mysqli_close($con);

    require ('ad-header.php');
?>
<div class="categories">
    <div class="cat-heading">
        <h3>Add category</h3>
    </div>
    <div class="cat-input">
        <form action="" method="post">
            <input type="text" name="cname" id="" class="form" placeholder="Category title...." required>
            <input type="submit" name="cat" value="Add category">
        </form>
    </div>
</div>
<div class="categories">
    <div class="cat-heading">
        <h3>Categories details</h3>
    </div>
    <table class="plist">
        <thead class="heading">
            <tr>
                <th>id</th>
                <th>Categories</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            $res = mysqli_query($con,"SELECT cat_id, cat_title FROM categories");

            while($data=mysqli_fetch_array($res))
                {?>
                <tr>
                    <td><?php echo $data["cat_id"];?></td>
                    <td><?php echo $data["cat_title"];?></td>
                    <td>
                        <a href="categories.php?del=<?php echo $data["cat_id"];?>" onclick="return confirm('Are you sure?');"><i class="fa fa-times-circle"></i></a>
                    </td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>
<?php
    include "footer.php";
?>