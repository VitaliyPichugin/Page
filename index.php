<?php
require_once 'config.php';

function __autoload($file){
    if(file_exists('controller/'.$file.'.php')){
        require_once 'controller/'.$file.'.php';
    }else{
        require_once 'model/'.$file.'.php';
    }
}

if($_GET['param'] == 'logout'){
    unset ( $_SESSION['userName']);
    unset  ($_SESSION['userPhoto']);
    unset  ($_SESSION['userUid']);
    header('Location: /');
}

if($_GET['code'] || $_GET['option'] == 'auth' && isset($_SESSION['userUid'])){
    header('Location: /');
}

if(isset($_GET['option'])){
    $class = strip_tags($_GET['option']);

    switch($class){
        case 'index':
            $init = new Index();
            break;
        case 'auth':
            $init = new Auth();
            break;

        default:
            $init = new Index();
            break;
    }
}else{
    $init = new Index();
}

echo $init->get_body();




