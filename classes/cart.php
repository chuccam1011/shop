
<?php
$filepath=realpath(dirname(__FILE__));
include  ($filepath.'../lib/database.php');
include  ($filepath.'../helpers/format.php');
class cart
{

    private $db;
    public $fm;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }
}
?>