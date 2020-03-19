<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php
$product = new product();
if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
//	echo  " <script> window.location='productlist.php' </script>"; //quay về list

} else {
	$id = $_GET['delid'];
	$delproduct = $product->delproduct($id);
}
function textShorten($text, $limit = 400)
{
	$text = $text . " ";
	$text = substr($text, 0, $limit);
	$text = substr($text, 0, strrpos($text, ' '));
	$text = $text . ".....";
	return $text;
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">
			<?php
			if (isset($delproduct)) {
				echo $delproduct;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Description</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Image</th>
						<th>Type</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>

					<?php
					//lấy ten thuong hiệu, catename theo id
					$product = new product();
					$brand = new brand();
					$cate = new category();
					$productList = $product->showProduct();

					if ($productList) {
						while ($result = $productList->fetch_assoc()) { //can fetch_assoc mới đc

							$cateName = $cate->getCateById($result['cateid']);
							if (isset($cateName)) {
								$resultcateName = $cateName->fetch_assoc(); //lấy ten thuong hiệu, catename theo id
							}
							$brandName = $brand->getBrandById($result['brandid']);
							if (isset($brandName)) {
								$resultbrandName = $brandName->fetch_assoc(); //lấy ten thuong hiệu, catename theo id
							}
					?>
							<tr class="odd gradeX">
								<td> <?php echo $result['productid']; ?></td>
								<td> <?php echo $result['productName']; ?></td>
								<td> <?php echo $result['price']; ?></td>
								<td> <?php echo textShorten($result['productDesc'], 20); ?></td>
								<td> <?php echo $resultcateName['cateName']; ?></td>
								<td> <?php echo $resultbrandName['brandName']; ?></td>
								<td> <img height="50px" width="50px" src="<?php echo 'uploads/' . $result['img']; ?>" alt="img"> </td>
								<td> <?php if ($result['type'] == 1) {
											echo 'Featured';
										} else echo 'Non-Featured';
										?></td>

								<td><a href="productedit.php?productid=<?php echo $result['productid']; ?>">Edit</a> ||
									<a onclick="return confirm('are you want to delete ?')" href="?delid=<?php echo $result['productid']; ?>">Delete</a></td>
							</tr>
					<?php
						}
					} ?>
				</tbody>
			</table>

		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>