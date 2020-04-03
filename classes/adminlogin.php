<?php


include  '../lib/database.php';
include '../helpers/format.php';
include '../lib/sesion.php';
Session::checkLogin();
class adminLogin
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }
    public function login_admin($aduser, $adpass)
    {
        $aduser = $this->fm->validation($aduser);
        $adpass = $this->fm->validation($adpass);

        $adpass = mysqli_real_escape_string($this->db->link, $adpass);
        $aduser = mysqli_real_escape_string($this->db->link, $aduser);

        if (empty($aduser) || empty($adpass)) {
            $alert = "user and pass must be not empty";
            return $alert;
        } else {

            $query = " SELECT * FROM tbl_admin WHERE aduser='$aduser ' AND adpass= '$adpass' LIMIT 1";
            $result= $this->db->select($query);
            if($result){
                $value= $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('adminId',$value['adid']);
                Session::set('adminPass',$value['adpass']);
                Session::set('adminUser',$value['aduser']);
                Session::set('adminName',$value['adname']);
                header('Location:index.php');
            }else{
                $alert= "Pass or User not match";
                return $alert;
            }
        }
    }
}
