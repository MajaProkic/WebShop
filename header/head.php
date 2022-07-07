<?php 
require_once(__DIR__.'/../functions/functions.php');

$func=new Functions();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Modlice/style/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/Modlice/javascript/js.js"></script>
    <link rel = "icon" href ="/Modlice/images/logo.jpg"  type = "image/x-icon">
    <meta name="description" content="<?php  echo $func->dynamicDescription($_SERVER['PHP_SELF'])?>">
    <title><?php  echo $func->dynamicTitle($_SERVER['PHP_SELF'])?></title>
</head>
<body >
