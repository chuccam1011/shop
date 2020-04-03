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
								<form action="cart.php" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" /> 
									<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
								</form>
							</div>
						</div>
						<div class="product-desc">
							<h2>Product Details</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>

					</div>
					<div class="rightsidebar span_3_of_1">
						<h2>CATEGORIES</h2>
						<ul>
							<li><a href="productbycat.php">Mobile Phones</a></li>
							<li><a href="productbycat.php">Desktop</a></li>
							<li><a href="productbycat.php">Laptop</a></li>
							<li><a href="productbycat.php">Accessories</a></li>
							<li><a href="productbycat.php#">Software</a></li>
							<li><a href="productbycat.php">Sports & Fitness</a></li>
							<li><a href="productbycat.php">Footwear</a></li>
							<li><a href="productbycat.php">Jewellery</a></li>
							<li><a href="productbycat.php">Clothing</a></li>
							<li><a href="productbycat.php">Home Decor & Kitchen</a></li>
							<li><a href="productbycat.php">Beauty & Healthcare</a></li>
							<li><a href="productbycat.php">Toys, Kids & Babies</a></li>
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