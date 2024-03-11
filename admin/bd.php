<?php

$servidor="localhost";
$baseDeDatos="myweb";
$usuario="root";
$contraseña="";

try{


    $connection=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);
    echo "Conexion realizada...";


}catch(Exception $error){
    echo $error->getMessage();


}
?>