<?php
    $page = @$_GET['page_id'];
    if ($page==1) {
        require_once('./content/create.php');
    }else {
        require_once('./content/home.php');
    }
?>