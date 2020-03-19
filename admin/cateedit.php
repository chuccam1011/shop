<?php include 'inc/header.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$cate = new category();
if (!isset($_GET['cateid']) ||  $_GET['cateid'] == null) {
    echo  " <script> window.location='catlist.php' </script>"; //quay về catlist
  
}else{
    $id = $_GET['cateid'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cateName = $_POST['cateName'];
    $updateCate = $cate->updateCategory($cateName,$id);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Category</h2>

        <?php 
        if(isset($updateCate)){
            echo $updateCate;
        }
        ?>
        <div class="block copyblock">
            <?php
            $getCateName = $cate->getCateById($id);
            if ($getCateName) {
                while ($result = $getCateName->fetch_assoc()) {


            ?>
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['cateName']; ?>" class="medium" name="cateName" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Edit" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php

                }
            } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>