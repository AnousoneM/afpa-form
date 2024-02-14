<?php

class Entreprise
{
    /**
     * Méthode permettant de recupèrer toutes les entreprises
     * 
     * @return array json contenant les données des entreprises
     */
    public static function getAllEnteprises(): array
    {

        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM entreprise";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable $result
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // on ferme la connexion à la base de données
            $db = null;

            return $result;
        } catch (PDOException $e) {
            // permet de récupérer le message d'erreur pour un debuggage plus facile
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}

