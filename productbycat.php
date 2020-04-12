<?php include 'inc/header.php'; ?>
<?php
// have cateid >> tim products
if (isset($_GET['cateID'])) {
	$idcate = $_GET['cateID'];
	$productList = $product->GetProductByCate($idcate);
}



?>
<!DOCTYPE HTML>

<body>
	<div class="main">
		<div class="content">
			<div class="content_top">
				<div class="heading">
					<h3>Latest from Iphone</h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section group">

				<?php
				if ($productList) {
					while ($result = $productList->fetch_assoc()) {

				?>
						<div class="grid_1_of_4 images_1_of_4">
							<a href="detail.php?detailID=<?php echo $result['productid']; ?>"><img height="250px" width="240px" src="<?php echo 'admin/uploads/'.$result['img']; ?>" alt="" /></a>
							<h2><?php echo $result['productName'] ?></h2>
							<p><?php echo $result['productDesc'] ?></p>
							<p><span class="price"> <?php echo $result['price'] ?></span></p>
							<div class="button"><span><a href="detail.php?detailID=<?php echo $result['productid']; ?>" class="details">Details</a></span></div>
						</div>
				<?php
					}
				}
				?>
			</div>



		</div>
	</div>

	<?php include 'inc/footer.php';
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