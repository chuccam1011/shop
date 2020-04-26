<?php
include 'inc/header.php';
?>

<?php

//day idproduct vao CSDL
if (isset($_GET['idproduct']))
	$idproduct = $_GET['idproduct'];
	
?>

<!DOCTYPE HTML>

<body>

	<div class="main">
		<div class="content">
			<div class="cartoption">
				<div class="cartpage">
					<h2>Your Cart</h2>
					<table class="tblone">`
						<tr>
							<th width="20%">Product Name</th>
							<th width="10%">Image</th>
							<th width="15%">Price</th>
							<th width="25%">Quantity</th>
							<th width="20%">Total Price</th>
							<th width="10%">Action</th>
						</tr>
						<tr>
							<!-- one product -->
							<td>Product Title</td>
							<td><img src="images/new-pic3.jpg" alt="" /></td>
							<td>Tk. 20000</td>
							<td>
								<form action="" method="post">
									<input type="number" name="" value="1" />
									<input type="submit" name="submit" value="Update" />
								</form>
							</td>
							<td>Tk. 40000</td>
							<td><a href="">X</a></td>
						</tr>

					</table>
					<!-- total  -->
					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Sub Total : </th>
							<td>TK. 210000</td>
						</tr>
						<tr>
							<th>VAT : </th>
							<td>TK. 31500</td>
						</tr>
						<tr>
							<th>Grand Total :</th>
							<td>TK. 241500 </td>
						</tr>
					</table>
				</div>
				<div class="shopping">
					<div class="shopleft">
						<a href="index.html"> <img src="images/shop.png" alt="" /></a>
					</div>
					<div class="shopright">
						<a href="login.html"> <img src="images/check.png" alt="" /></a>
					</div>
				</div>
			</div>
			<div class="clear"></div>
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