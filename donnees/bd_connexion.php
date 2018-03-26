<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_billetterie_eag;charset=utf8', 'root', 'billetterie');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
