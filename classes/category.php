<?php

include '../lib/database.php';
include '../helpers/format.php';
class category
{

    private $db;
    public $fm;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }
    public function insertCategory($cateName)
    {
        $aduser = $this->fm->validation($cateName);


        $adpass = mysqli_real_escape_string($this->db->link, $cateName);


        if (empty($aduser)) {
            $alert = "Cate Name must be not empty";
            return $alert;
        } else {

            $query = " INSERT INTO tbl_category(cateName) VALUES ('$cateName' )  ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class= 'success' > Insert Category  succsesfull </span>";
                return $alert;
            } else {
                $alert = "<span class= 'error' > Insert Category fail </span>";
                return $alert;
            }
        }
    }

    public function showCategory()
    {
        $query = " SELECT * FROM `tbl_category` order by cateid desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCateById($id)
    {
        $query = " SELECT * FROM `tbl_category` WHERE cateid='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCategory($cateName, $id)
    {
        $cateName = $this->fm->validation($cateName);
        $cateName = mysqli_real_escape_string($this->db->link, $cateName);
        if (empty($cateName)) {
            $alert = "CateName must be not empty";
            return $alert;
        } else {

            $query = " UPDATE  tbl_category SET cateName='$cateName' WHERE cateid='$id' ";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class= 'success' > Update Category  succsesfull </span>";
                return $alert;
            } else {
                $alert = "<span class= 'error' > Update Category fail </span>";
                return $alert;
            }
        }
    }

    public function delCate($id)
    {
        $query = " DELETE FROM `tbl_category` WHERE cateid='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class= 'success' > Update Category  succsesfull </span>";
            return $alert;
        } else {
            $alert = "<span class= 'error' > Update Category fail </span>";
            return $alert;
        }
    }
}


class brand
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    public function insertBrand($brandName)
    {
        $brandName = $this->fm->validation($brandName);


        $brandName = mysqli_real_escape_string($this->db->link, $brandName);


        if (empty($brandName)) {
            $alert = "Cate Name must be not empty";
            return $alert;
        } else {

            $query = " INSERT INTO brand(brandName) VALUES ('$brandName' )  ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class= 'success' > Insert brand succsesfull </span>";
                return $alert;
            } else {
                $alert = "<span class= 'error' > Insert brand fail </span>";
                return $alert;
            }
        }
    }

    public function showBrand()
    {
        $query = " SELECT * FROM `brand` order by brandid desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getBrandById($id)
    {
        $query = " SELECT * FROM `brand` WHERE brandid='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateBrand($brandName, $id)
    {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if (empty($brandName)) {
            $alert = "brandName must be not empty";
            return $alert;
        } else {

            $query = " UPDATE  brand SET brandName='$brandName' WHERE brandid='$id' ";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class= 'success' > Update brandName  succsesfull </span>";
                return $alert;
            } else {
                $alert = "<span class= 'error' > Update brandName fail </span>";
                return $alert;
            }
        }
    }

    public function delBrand($id)
    {
        $query = " DELETE FROM `brand` WHERE brandid='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class= 'success' > Delete Category  succsesfull </span>";
            return $alert;
        } else {
            $alert = "<span class= 'error' > Delete Category fail </span>";
            return $alert;
        }
    }
}
/// product
class product
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    public function insertProduct($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //kiem tra  hinhj  anh  va lays hinh  anh cho  vao  forder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileTemp = $_FILES['img']['tmp_name'];

        $div = explode('.', $fileName);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploader_img = "uploads/" . $unique_img;

        if (empty($productName) || empty($category) || empty($brand) || empty($productDesc) ||  empty($productDesc) ||  empty($price) || empty($type)) {
            $alert = "<span class='error' > File must be not emtpy  </span>";;
            return $alert;
        } else {
            move_uploaded_file($fileTemp, $uploader_img);
            $query = " INSERT INTO product(productName,cateid,brandid,productDesc,type,price,img) VALUES 
                                        ('$productName','$category','$brand','$productDesc','$type','$price','$unique_img ' )  ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class= 'success' > Insert product succsesfull </span>";
                return $alert;
            } else {
                $alert = "<span class= 'error' > Insert product fail </span>";
                return $alert;
            }
        }
    }

    public function showProduct()
    {
        $query = " SELECT * FROM `product` order by productid desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductById($id)
    {
        $query = " SELECT * FROM `product` WHERE productid='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateProduct($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //kiem tra  hinhj  anh  va lays hinh  anh cho  vao  forder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileTemp = $_FILES['img']['tmp_name'];

        $div = explode('.', $fileName);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploader_img = "uploads/" . $unique_img;

        if (empty($productName) || empty($category) || empty($brand) || empty($productDesc) ||  empty($productDesc) ||  empty($price) || empty($type)) {
            $alert = "<span class='error' > File must be not emtpy  </span>";
            return $alert;
        } else {
            if (!empty($fileName)) { //neu nguoi dung chon  anh file name se ko trong
                if ($fileSize > 2048000) {
                    $alert = "<span class='error' > File must be not less 3MB !  </span>";;
                    return $alert;
                } elseif (in_array($file_ext, $permited) == false) {
                    $alert = "<span class='error' > You can only upload file with " . implode($permited) . " </span>";
                    return $alert;
                }

                move_uploaded_file($fileTemp, $uploader_img);
                $query = " UPDATE  product SET 
                productName='$productName',
                cateid='$category',
                brandid='$brand',
                productDesc='$productDesc',
                type='$type',
                price='$price',
                img = '$unique_img'
                WHERE productid='$id'
                 ";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = "<span class= 'success' > Update product succsesfull </span>";
                    return $alert;
                } else {
                    $alert = "<span class= 'error' > Update product fail </span>";
                    return $alert;
                }
            } else { // neue ko chon anh file name  se trong
                $query = " UPDATE  product SET 
                productName='$productName',
                cateid='$category',
                brandid='$brand',
                productDesc='$productDesc',
                type='$type',
                price='$price'
           
                WHERE productid='$id'
                 ";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = "<span class= 'success' > Update product succsesfull </span>";
                    return $alert;
                } else {
                    $alert = "<span class= 'error' > Update product fail </span>";
                    return $alert;
                }
            }
        }
    }

    public function delproduct($id)
    {
        $query = " DELETE FROM `product` WHERE productid='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class= 'success' > Delete product  succsesfull </span>";
            return $alert;
        } else {
            $alert = "<span class= 'error' > Delete product fail </span>";
            return $alert;
        }
    }
    // end backe
    //to font end'
    public function GetProduct_feathred(){
        $query = " SELECT * FROM `product` WHERE type='0' ";
        $result = $this->db->select($query);
        return $result;

    }

}
