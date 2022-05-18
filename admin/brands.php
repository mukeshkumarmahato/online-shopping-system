<?php
    include('../db.php');
    if(isset($_POST['brand'])){
        $name = $_POST['bname'];

        $sql = "INSERT INTO brands (brand_title) VALUES ('$name')"or die ("query incorrect");
        $query_run = mysqli_query($con,$sql);

        if ($query_run){
            echo '<script type="text/javascript">alert("data are inserted successfully...")</script>';
            echo "<script>window.location.href='brands.php'</script>";
        }
        else{
            die("failed to insert ".mysqli_error($con));
            echo '<script>alert("data is not inserted")</script>';
        }      
    }
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM brands WHERE brand_id = '$id'");
    }
    mysqli_close($con);

    require ('ad-header.php');
?>
<div class="categories">
    <div class="cat-heading">
        <h3>Add brand</h3>
    </div>
    <div class="cat-input">
        <form action="" method="post">
            <input type="text" name="bname" id="" class="form" placeholder="Brand title...." required>
            <input type="submit" name="brand" value="Add brand">
        </form>
    </div>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            $res = mysqli_query($con,"SELECT brand_id, brand_title FROM brands");

            while($data=mysqli_fetch_array($res))
                {?>
                <tr>
                    <td><?php echo $data["brand_id"];?></td>
                    <td><?php echo $data["brand_title"];?></td>
                    <td>
                        <a href="brands.php?del=<?php echo $data["brand_id"];?>" onclick="return confirm('Are you sure?');"><i class="fa fa-times-circle"></i></a>
                    </td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>
<?php
    include "footer.php";
?>