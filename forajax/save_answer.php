<?php
require_once('../functions/init.php');

$questionId = $_GET['questionId'];
$value = $_GET['value'];
$ShuffledQuestion = $_GET['ShuffledQuestion'];
$_SESSION['answer'][$questionId] = $value;

unset($_SESSION['game-question-no'][$ShuffledQuestion]);