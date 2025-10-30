<?php

$host = "localhost";
$user = "root";
$passaword = "";

$bancoOrigem = "sislogin";
$conexaoOrigem = new mysqli($host, $user, $passaword, $bancoOrigem);

$bancoDestino = "sislogin2";
$conexaoDestino = new mysqli($host, $user, $passaword, $bancoDestino);

?>