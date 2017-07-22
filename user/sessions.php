<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['fcode']) ) {
    header('Location:index.php');
}elseif(!isset($_SESSION['fcode'])) {
    header('Location:../login.php');
}


?>