<?php 
require_once  __DIR__ . './connexion.php';

function sessionStart() {
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
}

