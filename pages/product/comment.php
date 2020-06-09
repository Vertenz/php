<?php
$id = (int)$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$conn = getConnection()) {
        var_dump($conn);
    } else {
        $name = $_POST['namePerson'];
        $comm = $_POST['comment'];
        $sql = "INSERT INTO comment (idOfProduct, namePerson, comm)
                        VALUE ('$id', '$name', '$comm')";
        if (!$res = execute($sql)) {
            echo "<h1>Insert ERROR</h1>";
        } else {
            echo "<script>
                               document.getElementById('status').
                               insertAdjacentHTML('beforeend', 'Комментарий добавлен');
                          </script>";
        }
    }
    redirect("/product/single?id=$id");
}

