<?php
    require_once 'pathHolder.php';
    function requireFor($name) {
        switch ($name){
            case 'index':
                require_once '../config/pathHolder.php';
                require_once PATH_ENGINE . 'db.php';
                require_once PATH_RENDER . 'renderProduct.php';
                break;
            case 'product':
                require_once '../config/pathHolder.php';
                require_once PATH_ENGINE . 'db.php';
                require_once PATH_RENDER . 'renderProduct.php';
                require_once PATH_RENDER . 'renderSingleProduct.php';
                require_once PATH_RENDER . 'renderComment.php';
                break;
            case 'login':
                require_once '../config/pathHolder.php';
                require_once PATH_ENGINE . 'db.php';
                require_once PATH_ENGINE . 'base.php';
                require_once PATH_ENGINE . 'checkLogin.php';
                break;
            case 'account':
                require_once '../config/pathHolder.php';
                break;
            case 'cart':
                require_once '../config/pathHolder.php';
                require_once PATH_ENGINE . 'db.php';
                require_once PATH_ENGINE . 'base.php';
        }
    }