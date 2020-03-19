<?php

// gap loi neu include chug  vs brand
$filepath=realpath(dirname(__FILE__));
include  ($filepath.'../lib/database.php');
include  ($filepath.'../helpers/format.php');
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
