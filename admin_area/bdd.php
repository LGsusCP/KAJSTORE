<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=kaj', 'root', '');

}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
