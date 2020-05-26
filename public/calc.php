<?php
//require function and vars
require_once '../config/pathHolder.php';
require_once PATH_ENGINE . 'math.php';
//end of require function and vars

//start of html
include_once PATH_VIEWS . 'open-html-head-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header-html.php'; //include header

include_once PATH_VIEWS . 'calcPage.php';

include_once PATH_VIEWS . 'secondCalc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['id'] == 'Отправить') {
        $firstNuber = $_POST['firstNumber'];
        $do = $_POST['calc'];
        $secondNumber = $_POST['secondNumber'];
        $answer = calculateThis($firstNuber, $do, $secondNumber);
        include PATH_VIEWS . 'answerHTML.php';
    } else {
        $firstNuber = $_POST['firstNumber'];
        $do = $_POST['calc'];
        $secondNumber = $_POST['secondNumber'];
        $answer = calculateThis($firstNuber, $do, $secondNumber);
        include PATH_VIEWS . 'answerHTML.php';
    }
}
include_once PATH_VIEWS . 'close-html-body.php';
