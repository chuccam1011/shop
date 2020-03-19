<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php' ?>

<?php
$brand = new brand();
if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
	//echo  " <script> window.location='brandlist.php' </script>"; //quay về list

} else {
	$id = $_GET['delid'];
	$delBrand = $brand->delBrand($id);
}
?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Brand List</h2>
		<?php
		if (isset($delBrand))
			echo $delBrand;
		?>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$showBrand = $brand->showBrand();
					if ($showBrand) {
						$i = 0;
						while ($result = $showBrand->fetch_assoc()) {
							$i++;

					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['brandName'] ?></td>
								<td><a href="brandedit.php?brandid=<?php echo $result['brandid']; ?>">Edit</a> ||
									<a onclick="return confirm('are you want to delete ?')" href="?delid=<?php echo $result['brandid']; ?>">Delete</a></td>
							</tr>

					<?php
						}
					}
					?>
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