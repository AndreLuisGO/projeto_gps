<?php
//DATABASE CONNECTION VARIABLES
$host = "localhost"; // Host name
$login_administrador = "root"; // Mysql login_administrador
$senha_administrador = ""; // Mysql senha_administrador
$db_name = "ictafast"; // Database name

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix."administrador";
$tbl_attempts = $tbl_prefix."loginAttempts";
