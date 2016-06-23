<?php
//DO NOT ECHO ANYTHING ON THIS PAGE OTHER THAN RESPONSE
//'true' triggers login success
ob_start();
include 'config.php';
require 'includes/functions.php';

// Define $login_administrador and $senha_administrador
$login_administrador = $_POST['login_administrador'];
$senha_administrador = $_POST['senha_administrador'];

// To protect MySQL injection
$login_administrador = stripslashes($login_administrador);
$senha_administrador = stripslashes($senha_administrador);

$response = '';
$loginCtl = new LoginForm;
$conf = new GlobalConf;
$lastAttempt = checkAttempts($login_administrador);
$max_attempts = $conf->max_attempts;


//First Attempt
if ($lastAttempt['lastlogin'] == '') {

    $lastlogin = 'never';
    $loginCtl->insertAttempt($login_administrador);
    $response = $loginCtl->checkLogin($login_administrador, $senha_administrador);

} elseif ($lastAttempt['attempts'] >= $max_attempts) {

    //Exceeded max attempts
    $loginCtl->updateAttempts($login_administrador);
    $response = $loginCtl->checkLogin($login_administrador, $senha_administrador);

} else {

    $response = $loginCtl->checkLogin($login_administrador, $senha_administrador);

};

if ($lastAttempt['attempts'] < $max_attempts && $response != 'true') {

    $loginCtl->updateAttempts($login_administrador);
    $resp = new RespObj($login_administrador, $response);
    $jsonResp = json_encode($resp);
    echo $jsonResp;

} else {

    $resp = new RespObj($login_administrador, $response);
    $jsonResp = json_encode($resp);
    echo $jsonResp;

}

unset($resp, $jsonResp);
ob_end_flush();
