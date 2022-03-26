<?php
    $action= Utilities::get("action","index");
    switch ($action) {
        case 'index':
            include "./views/home/index.php";
            break;
        default:
            # code...
            break;
    }
?>