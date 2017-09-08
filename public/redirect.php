<?php 
    session_start();
    require_once "classes/shortener.php";

    if  (isset($_GET['codeOfUrl'])) {
        $s = new Shortener();
        $code = $_GET['codeOfUrl'];
        if  ($url = $s->getUrl($code)) {
            header("Location: $url");
            exit();
        } else {
            $_SESSION['feedback'] = "There is no such link in database!";
        }
    }

    header('Location: index.php');
?>