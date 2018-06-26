<?php
include_once 'config_v1.php';
function connecter_db(){
    $cnx = new PDO(DSN, USER, PASSE);
    return $cnx;
    }
function get_all($table){
    $cnx=connecter_db();    
	$rp=$cnx->prepare("select * from $table");
	$rp->execute(array());
	$data=$rp->fetchAll();
    return $data;
}


?>