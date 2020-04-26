<?php
include 'inc/header.php';
if (isset($_GET['detailID'])) {
	$idproduct = $_GET['detailID'];
}

$getproduct_by_id = $product->getProductById($idproduct);

if ($getproduct_by_id) {
	$result = $getproduct_by_id->fetch_assoc();

	// get id cate from product table to get cate name
	$idcate = $result['cateid'];
	$idbrand = $result['brandid'];
	$getBand_by_id = $brand->getBrandById($idbrand);
	$get_cate_by_id = $cat->getCateById($idcate);
}
if ($get_cate_by_id) {
	$category = $get_cate_by_id->fetch_assoc();
}
if ($getBand_by_id) {
	$brandName = $getBand_by_id->fetch_assoc();
}
?>

<!DOCTYPE HTML>

<body>

	<div class="main">
		<div class="content">
			<div class="section group">
				<div class="cont-desc span_1_of_2">
					<div class="grid images_3_of_2">
						<img src="<?php echo 'admin/uploads/' . $result['img'] ?>" alt="" />
					</div>
					<div class="desc span_3_of_2">
						<h2>Lorem Ipsum is simply dummy text </h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
						<div class="price">
							<p>Price: <span><?php echo $result['price']; ?></span></p>
							<p>Category: <span><?php echo $category['cateName']; ?></span></p>
							<p>Brand:<span><?php echo $brandName['brandName'] ?></span></p>
						</div>
						<div class="add-cart">
							<form action="cart.php?idproduct=<?php echo $idproduct; ?>" method="post">
								<input type="number" class="buyfield" name="quantity" value="1" />
								<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
							</form>
						</div>
					</div>
					<div class="product-desc">
						<h2>Product Details</h2>
						<p> <?php echo $result['productDesc']; ?> </p>
					</div>

				</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
						// show List category
						$cateList = $cat->showCategory();
						if ($cateList) {
							while ($resultCateList = $cateList->fetch_assoc()) {
						?>
							<li><a href="productbycat.php?cateID=<?php echo $resultCateList['cateid']; ?>">
								<?php echo $resultCateList['cateName'] ; ?> </a></li>
						<?php
							}
						}
						?>
					</ul>

				</div>
			</div>
		</div>
	</div>

	<?php
	include 'inc/footer.php';
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>

</html>