<?php 
require_once(__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../header/url_extension.php');

$func=new Functions();
?>
<head>
    <meta charset="UTF-8">
    <html lang="sr">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Modlice/style/style.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/Modlice/javascript/js.js"></script>
    <link rel = "icon" href ="../images/logo.jpg"  type = "image/x-icon">
    <meta name="description" content="<?php  echo $func->dynamicDescription($_SERVER['PHP_SELF'])?>">
    <title><?php  echo $func->dynamicTitle($_SERVER['PHP_SELF'])?></title>
</head>
<body>
