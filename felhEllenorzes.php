<?php


class FelhEllenorzes
{
function __construct()
{
    session_start();
}

function ellenorzes($session){
    if (!isset($_SESSION[$session])){
        header("Location: ../belepes/belepes.php");
    }
}
function felhasznalo(){
    $this->ellenorzes("loggedin");
}
function admin(){
    $this->ellenorzes("adminLoggedIn");
}
function szuperAdmin(){
    $this->ellenorzes("szuperAdminLoggedIn");
}
}