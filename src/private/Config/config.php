<?php
session_start();
$_SESSION["blog"]=array();
require_once "../Library/php-activerecord/ActiveRecord.php";
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('../Models');
    $cfg->set_connections(array('development' => 'mysql://root:secret@mysql-server/mydb'));
});
$_SESSION["blog"] = Blog::all();
$_SESSION["txt"]="";
foreach ($_SESSION["blog"] as $key => $value) {
    $_SESSION["txt"].="<div class='col-lg-4 col-md-12 mb-4'>
    <div class='card'>
        <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
            <img src=".$value->image." class='img-fluid' />
            <a href=''>
                <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
            </a>
        </div>
        <div class='card-body'>
            <h5 class='card-title'>".$value->blog_title."</h5>
            <p class='card-text'>".$value->blog_data."</p>
            <span class='me-2'><b>".$value->likes."</b></span><a href='' class='btn btn-warning'><i class='fa-solid fa-thumbs-up' style='color: #221f51;'></i></a>
        </div>
    </div>
</div>";
}
$_SESSION["user_blog"]="";
foreach ($_SESSION["blog"] as $key => $value) {
    if ($value->id == $_SESSION["id"]){
        $_SESSION["user_blog"].="<div class='col-lg-6 col-md-12 mb-4'>
        <div class='card'>
            <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
                <img src=".$value->image." class='img-fluid' />
                <a href=''>
                    <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                </a>
            </div>
            <div class='card-body'>
                <h5 class='card-title'>".$value->blog_title."</h5>
                <p class='card-text'>".$value->blog_data."</p>
                <span class='me-2'><b>".$value->likes."</b></span><a href='' class='btn btn-warning'><i class='fa-solid fa-thumbs-up' style='color: #221f51;'></i></a>
                <a href='' class='btn btn-danger'><i class='fa-sharp fa-solid fa-trash' style='color: #111;'></i></a>
            </div>
        </div>
    </div>";
    }
}
?>