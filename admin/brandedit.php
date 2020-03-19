<?php include 'inc/header.php'; ?>
<?php include_once '../classes/brand.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$brand = new brand();
if (!isset($_GET['brandid']) ||  $_GET['brandid'] == null) {
    echo  " <script> window.location='catlist.php' </script>"; //quay về catlist
  
}else{
    $id = $_GET['brandid'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandName'];
    $updateBrand = $brand->updateBrand($brandName,$id);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Brand</h2>

        <?php 
        if(isset($updateBrand)){
            echo $updateBrand;
        }
        ?>
        <div class="block copyblock">
            <?php
            $getBrandName = $brand->getBrandById($id);
            if ($getBrandName) {
                while ($result = $getBrandName->fetch_assoc()) {


            ?>
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['brandName']; ?>" class="medium" name="brandName" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Edit Brand" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php

                }
            } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>