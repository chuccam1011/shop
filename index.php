<?php
include 'inc/header.php';
include 'inc/slider.php';

?>


<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">

            <?php
            $getProducts = $product->GetProduct_feathred(); // nhan ds san pham noi bat type =  0
            if ($getProducts) {
                while ($result = $getProducts->fetch_assoc()) {
            ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="detail.php?detailID=<?php echo $result['productid']; ?> "><img src="<?php echo 'admin/uploads/' . $result['img']; ?>" alt="" /></a>
                        <h2><?php echo $result['productName']; ?></h2>
                        <p><?php echo $result['productDesc']; ?></p>
                        <p><span class="price"><?php echo $result['price']; ?></span></p>
                        <div class="button"><span><a href="detail.php?detailID=<?php echo $result['productid']; ?> " class="details">Details</a></span></div>
                    </div>
            <?php    }
            } ?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>New Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.php"><img src="images/new-pic1.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <p><span class="price">$403.66</span></p>
                <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
            </div>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.php"><img src="images/new-pic2.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <p><span class="price">$621.75</span></p>
                <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
            </div>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.php"><img src="images/feature-pic2.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <p><span class="price">$428.02</span></p>
                <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
            </div>
            <div class="grid_1_of_4 images_1_of_4">
                <img src="images/new-pic3.jpg" alt="" />
                <h2>Lorem Ipsum is simply </h2>
                <p><span class="price">$457.88</span></p>

                <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include_once 'inc/footer.php' ?>