<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost; dbname=archive' , 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>