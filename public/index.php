<?php

require_once '../config/pathHoldor.php';


include_once PATH_VIEWS . 'head-to-body.php';

include_once PATH_VIEWS . 'header.php';

include_once PATH_VIEWS . 'form-render.php';

  function makePreview($img){
    $imagickSrc = new Imagick($img);
    $compressionList = [Imagick::COMPRESSION_JPEG2000
    ];

    $imagickDst = new Imagick();
    $imagickDst->setCompression(80);
    $imagickDst->setCompressionQuality(80);
    $imagickDst->newPseudoImage(
          $imagickSrc->getImageWidth(),
          $imagickSrc->getImageHeight(),
          'canvas:white'
    );
    $imagickDst->compositeImage(
        $imagickSrc,
        Imagick::COMPOSITE_ATOP,
        0,
        0
    );
    $imagickDst->adaptiveResizeImage(250,250);
    $imagickDst->setImageFormat("jpg");
    $imagickDst->writeImage($img);

}

    function recountFiles($path) {
        $dir = opendir($path);
        $count = 0;
        while($file = readdir($dir)){
            if($file == '.' || $file == '..' || is_dir($path . $file)){
                continue;
            }
            $count++;
        }
    }

    function renderImg($path) {
        $files = scandir($path);
        foreach ($files as $file) {
            if (!file_exists($file)) {
                $imgPath = $file;
                include PATH_VIEWS . 'galery.php';
            }
        }
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['pictureToGallery'])) {
        if (!file_exists(PATH_UPLOADS)) {
            mkdir(PATH_UPLOADS);
        };
        if (!file_exists(PATH_PREVIEW)) {
            mkdir(PATH_PREVIEW);
        };

        $imgUploadedName = $_FILES['pictureToGallery']['name'];

        if (move_uploaded_file($_FILES['pictureToGallery']['tmp_name'], PATH_UPLOADS . $imgUploadedName)) {
            echo "Файл загружен";
        }
        if (copy(PATH_UPLOADS . $imgUploadedName, PATH_PREVIEW . $imgUploadedName)) {
            makePreview(PATH_PREVIEW . $imgUploadedName);
        }
    }
};


include_once PATH_VIEWS . 'close-body-html.php';
renderImg(PATH_PREVIEW);


