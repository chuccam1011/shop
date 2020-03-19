<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/category.php' ?>

<?php
$cate = new category();
if (!isset($_GET['delid']) ||  $_GET['delid'] == null) {
    // echo  " <script> window.location='catlist.php' </script>"; //quay về catlist
  
}else{
	$id = $_GET['delid'];
	$delCate= $cate->delCate($id);	

}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$showCate = $cate->showCategory();
					if ($showCate) {
						$i = 0;
						while ($result = $showCate->fetch_assoc()) {
							$i++;

					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['cateName'] ?></td>
                        <td><a href="cateedit.php?cateid=<?php echo $result['cateid']; ?>">Edit</a> ||
                            <a onclick="return confirm('are you want to delete ?')"
                                href="?delid=<?php echo $result['cateid']; ?>">Delete</a></td>
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