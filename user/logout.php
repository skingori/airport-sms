<?php
session_start();

if (!isset($_SESSION['fcode'])) {
    header("Location:../login.php");
} else if (isset($_SESSION['fcode'])!="")  {
    header("Location: sessions.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userSession']);
    header("Location:../login.php");
}
