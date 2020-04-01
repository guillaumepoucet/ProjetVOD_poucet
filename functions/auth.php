<?php
function online() :bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['online']);
}

function session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function user_online() :void {
    if(!online()) {
        header('location:connexion.php');
        exit();
    }
}