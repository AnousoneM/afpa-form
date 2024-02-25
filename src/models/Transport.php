<?php

namespace App\Models;
use \PDO;
class Transport
{
    /**
     * Méthode de recupèrer tous les types de transports   
     * 
     * @return array tableau contenant toutes les entreprises
     */
    public static function getAllTransports(): array
    {

        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM transport";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable $result
            $result = $query->fetchAll();

            // on ferme la connexion
            $db = null;

            // on retourne le résultat
            return $result;
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}