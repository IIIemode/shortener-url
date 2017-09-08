<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shortener URL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div id="app"></div>
        <?php 
            if (isset($_SESSION['feedback'])) {
                echo "<p>".$_SESSION['feedback']."</p>";
                unset($_SESSION['feedback']);
            }
        ?>
    </div>
<script src="bundle.js"></script>
</body>
</html>