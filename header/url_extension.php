<?php

$inactive = 1600; 
ini_set('session.gc_maxlifetime', $inactive);

    session_start();
    if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > $inactive)) {
        // last request was more than 2 hours ago
        session_unset();     // unset $_SESSION variable for this page
        session_destroy();   // destroy session data
        header("Location:../index.php");
    }
    $_SESSION['time'] = time();
    //$_SESSION['base']='http://www.tridradionica.com';
    $_SESSION['base']='/Modlice';
?>