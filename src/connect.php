<?php

    try
    {
        // On se connecte à MySQL
        $db = new PDO('mysql:host=localhost;dbname=retrogame;charset=utf8', 
        'root', 
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }


