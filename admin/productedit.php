<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php'; ?>
<?php
$product = new product();
if (!isset($_GET['productid']) ||  $_GET['productid'] == NULL) {
    echo  " <script> window.location='catlist.php' </script>"; //quay về catlist
} else {
    $id = $_GET['productid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $updateProduct = $product->updateProduct($_POST, $_FILES,$id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <?php
        if (isset($updateProduct)) {
            echo $updateProduct;
        }
        ?>
        <div class="block">
            <?php
            $get_product_by_id = $product->getProductById($id);
            if (isset($get_product_by_id)) {
                $resultProduct = $get_product_by_id->fetch_assoc();
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $resultProduct['productName']; ?>" name="productName" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category">
                                <option>---Select Category----</option>
                                <?php
                                $cate = new category();
                                $catelist = $cate->showCategory();
                                if ($catelist) {
                                    while ($result = $catelist->fetch_assoc()) {

                                ?>
                                        <option <?php
                                                if ($resultProduct['cateid'] == $result['cateid']) {
                                                    echo 'selected';
                                                }
                                                ?> value="<?php echo $result['cateid']; ?>"> <?php echo $result['cateName']; ?> </option>
                                <?php
                                    }
                                } ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brand">
                                <option>-----Select Brand------</option>
                                <?php
                                $brand = new brand();
                                $brandlist = $brand->showBrand();
                                if ($brandlist) {
                                    while ($result = $brandlist->fetch_assoc()) {
                                ?>

                                        <option <?php
                                                if ($resultProduct['brandid'] == $result['brandid']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $result['brandid']; ?>"> <?php echo $result['brandName']; ?>
                                        </option>
                                <?php
                                    }
                                } ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="productDesc" class="tinymce"> <?php echo $resultProduct['productDesc']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" value="<?php echo $resultProduct['price']; ?>" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img height="300px" src="<?php echo 'uploads/' . $resultProduct['img']; ?>" alt=""> <br>
                            <input name="img" type="file" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select vla id="select" name="type">
                                <?php
                                if ($resultProduct['type'] == 1) {
                                    echo '
                                    <option>Select Type</option>
                                    <option selected value="1">Featured</option>
                                    <option value="2">Non-Featured</option>
                                    ';
                                } else {
                                    echo '
                                    <option>Select Type</option>
                                    <option  value="1">Featured</option>
                                    <option selected value="2">Non-Featured</option>
                                    ';
                                }
                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>