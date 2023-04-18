<?php
require_once "../Config/config.php";
$variable = $_GET["operation"];
$val = explode(",",$variable);
switch ($val[0]) {
    case 'delete':
        Blog::delete_all("blog_id = $val[1]");
        header("location: ../View/user_data.php");
        break;
    
    default:
        # code...
        break;
}
?>