<?php

session_start();
session_unset();
session_destroy();
    $msg = 'Logging out!';
    echo JSON_encode($msg);
?>