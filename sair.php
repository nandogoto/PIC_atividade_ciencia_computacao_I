<?php
session_start();
ob_start();
unset($_SESSION['email'], $_SESSION['senha']);
$_SESSION['msg'] = "<p style='color: green'>Deslogado com sucesso!</p>";

header("Location: home.php");