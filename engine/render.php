<?php
function renderPage(string $template, array $params = [], bool $useLayout = true){
    $content = renderTemplate($template, $params);
    if($useLayout) {
        $content = renderTemplate('htmlTegs', ['content' => $content]);
    }
    return $content;
}

function renderTemplate(string $template, array $params = [])
{
    ob_start();
    extract($params);
    include PATH_VIEWS . "{$template}.php";
    return ob_get_clean();
}

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
