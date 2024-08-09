<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    unset($_SESSION["USER_LOGIN"]);
    unset($_SESSION["USER_ADM"]);

    header("Location: TelaMenu.php");
    exit();
?>