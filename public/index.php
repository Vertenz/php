<?php
//connect to mysql
$conn = mysqli_connect("localhost", "root", "VvladmirRwh10", "gallery");
//end of connect
//require function and vars
require_once '../config/pathHoldor.php';
require_once PATH_ENGINE . 'makeDir.php';
require_once PATH_ENGINE . 'makePreview.php';
require_once PATH_ENGINE . 'renderImg.php';
//end of require function and vars

//start of html
include_once PATH_VIEWS . 'head-to-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header.php'; //include header

include_once PATH_VIEWS . 'form-render.php'; //include form for load img

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_FILES['pictureToGallery']['type'];
    if (preg_match("/image/", "$type")) {
        var_dump($conn);
        if (isset($_FILES['pictureToGallery'])) {
            makeDir(PATH_UPLOADS);
            makeDir(PATH_UPLOADS);


            $imgUploadedName = $_FILES['pictureToGallery']['name'];
            $href = 'uploads/' . $imgUploadedName;
            $hrefPreview = 'previews/' . $imgUploadedName;
            $size = $_FILES['pictureToGallery']['size'];
            if (!$conn) {
                var_dump($conn);
            } else {
                $sql = "INSERT INTO pictures (href, hrefPreview, size, imgName)
                            VALUES ('$href', '$hrefPreview', '$size', '$imgUploadedName')";
                var_dump(mysqli_error($conn)); //#
                if (!$res = mysqli_query($conn, $sql)) {
                    echo "<h1>Insert ERROR</h1>";
                    var_dump(mysqli_error($conn));
                } else {
                    move_uploaded_file($_FILES['pictureToGallery']['tmp_name'], PATH_UPLOADS . $imgUploadedName);
                    echo "Файл загружен";
                    if (copy(PATH_UPLOADS . $imgUploadedName, PATH_PREVIEW . $imgUploadedName)) {
                        makePreview(PATH_PREVIEW . $imgUploadedName);
                    }
                }
            }
            header("Location: /");
            exit;
        }
    } else {
        echo "
                <script>
                alert('Возможно загрузить только изображение');
                </script>
            ";
    }
}

if($sql = mysqli_query($conn, 'SELECT `id`, `hrefPreview` FROM `pictures`')) {
    while ($result = mysqli_fetch_array($sql)) {
        $id = $result['id'];
        $hrefPreview = $result['hrefPreview'];
        renderImg($id, $hrefPreview);
    }
    mysqli_close($conn);
};



include_once PATH_VIEWS . 'close-body-html.php';

//end of HTML

