<?php
$pedido = $_REQUEST['pedidos'];
$body = $_REQUEST['body'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="assets/icons/favicon.ico">

        <title>Pedidos app</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/ie-emulation-modes-warning.js" type="text/javascript"></script>


        <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>

        <?php
            include 'navbar.php';
            include "$body.php";
        ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>');</script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
</body>
</html>
