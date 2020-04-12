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
            $getProducts = $product->GetProduct_feathred(); 
            // nhan ds san pham noi bat type =  0
            if ($getProducts) {
                while ($result = $getProducts->fetch_assoc()) {
            ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="detail.php?detailID=<?php echo $result['productid']; ?> ">
                            <img height="250px" width="240px" src="<?php echo 'admin/uploads/' . $result['img']; ?>" alt="" /></a>
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

            <?php
            $getProducts = $product->GetProduct_Nonfeathred(); // nhan ds san pham khong  noi bat type =  1
            if ($getProducts) {
                while ($result = $getProducts->fetch_assoc()) {
            ?>


                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="detail.php?detailID=<?php echo $result['productid']; ?>">
                            <img height="250px" width="240px" src="<?php echo 'admin/uploads/' . $result['img']; ?>" alt="" /></a>
                        <h2><?php echo $result['productName']; ?> </h2>
                        <p><span class="price"><?php echo $result['price']; ?></span></p>
                        <div class="button"><span><a href="detail.php?detailID=<?php echo $result['productid']; ?>" class="details">Details</a></span></div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
</div>
<?php include_once 'inc/footer.php' ?>