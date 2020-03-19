<?php include 'inc/header.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$cate = new category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cateName= $_POST['cate'];
    $insetCate= $cate->insertCategory($cateName);
    
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <?php 
        if(isset($insetCate)){
            echo $insetCate;}
        ?>
        <div class="block copyblock">
            <form action="" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." class="medium" name="cate" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>