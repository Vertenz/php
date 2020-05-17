<?php
 function renderComment ($id) {
     if (!$conn = getConnection()) {
         echo "<h1>Error connect</h1>";
     } else {
         $sql = "SELECT `namePerson`, `comm` FROM `comment` WHERE idOfProduct=$id";
         if ($result = queryArray($sql)) {
             foreach ($result as $element) {
                 $name = $element['namePerson'];
                 $comment = $element['comm'];
                 include PATH_VIEWS . 'commentBlock.php';
             }
         }else echo "<h1>Ошибка чтения данных</h1>";
     }
 }
