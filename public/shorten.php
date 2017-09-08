<?php
    session_start();
    require_once 'classes/shortener.php';

    $s = new Shortener();

    if (isset($_POST['url'])) {
        $url = $_POST['url'];

        if  ($code = $s->makeCode($url)) {
            $_SESSION['feedback'] = "Done! Here is your link <a href='{$s->getUrl($code)}'>http://localhost:8080/Shortener_URL/public/$code</a>";
        } else {
            $_SESSION['feedback'] = "Error! Perhaps an incorrect URl?";
        }
        

    } else if (isset($_GET['codeOfUrl'])) {
        $massUrl = parse_url($_GET['codeOfUrl']);
        $massUrl[path] = substr($massUrl[path], 22, strlen($massUrl[path]) - 22);
        $code = $massUrl[path];
        if ($url = $s->getUrl($code)){
            header("Location: $url");
            exit();
        }
    }
    header('location: index.php');
?>