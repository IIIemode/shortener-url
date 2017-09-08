<?php 

    require_once 'classes/shortener.php';

    $s = new Shortener();

    if (isset($_POST['url'])) {
        $url = $_POST['url'];
        echo $url;

        $code = $s->makeCode($url);
    } else if (isset($_GET['codeOfUrl'])) {
        $massUrl = parse_url($_GET['codeOfUrl']);
        
        $massUrl[path] = substr($massUrl[path], 22, strlen($massUrl[path]) - 22);
        $code = $massUrl[path];

        if ($url = $s->getUrl($code)){
            // echo $url;
            header("Location: $url");
            exit();
        }

    }

?>