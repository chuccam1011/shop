<?php include 'inc/header.php'; ?>
<?php include '../classes/brand.php'?>
<?php include 'inc/sidebar.php'; ?>
<?php
$cate = new brand();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName= $_POST['brandName'];
    $insertBrand= $cate->insertBrand($brandName);
    
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Brand</h2>
        <?php 
        if(isset($insertBrand)){
            echo $insertBrand;}
        ?>
        <div class="block copyblock">
            <form action="brandadd.php" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Brand Name..." class="medium" name="brandName" />
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