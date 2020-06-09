<?php
include_once '../config/pathHolder.php';
function varLoad(){
    $files = scandir(PATH_ENGINE);
    foreach ($files as $file){
        if(!in_array($file, ['..', '.'])){
            if(substr($file, -4) == ".php"){
                include_once PATH_ENGINE . DIRECTORY_SEPARATOR . $file;
            }
        }
    }
}
varLoad();
