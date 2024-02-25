<?php

namespace App\Models;
use \PDO;

class Trajet
{
    /**
     * 
     * Méthode de créer un trajet
     * 
     * @param string $date_trajet Date du trajet
     * @param string $distance_trajet Distance du trajet
     * @param string $temps_trajet Temps du trajet
     * @param int $id_transport Id du transport
     * @param int $id_utilisateur Id de l'utilisateur
     * 
     * @return void
     * 
     */
    public static function create(string $date_trajet, string $distance_trajet, string $temps_trajet, int $id_transport, int $id_utilisateur): void
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "INSERT INTO `trajet` (`date_trajet`, `distance_trajet`, `temps_trajet`, `id_transport`, `id_utilisateur`) VALUES (:date_trajet, :distance_trajet, :temps_trajet, :id_transport, :id_utilisateur);";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':date_trajet', htmlspecialchars($date_trajet), PDO::PARAM_STR);
            $query->bindValue(':distance_trajet', htmlspecialchars($distance_trajet), PDO::PARAM_STR);
            $query->bindValue(':temps_trajet', htmlspecialchars($temps_trajet), PDO::PARAM_STR);
            $query->bindValue(':id_transport', intval($id_transport), PDO::PARAM_INT);
            $query->bindValue(':id_utilisateur', intval($id_utilisateur), PDO::PARAM_INT);

            // on execute la requête
            $query->execute();
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    /**
     * 
     * Méthode permettant de récupèrer tous les trajets d'un utilisateur selon son id
     * 
     * @param int $user_id Id de l'utilisateur
     * 
     * @return array tableau contenant tous les trajets d'un utilisateur
     * 
     */
    public static function getAllTrajets(int $user_id): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT *, DATE_FORMAT(`date_trajet`, '%d/%m/%Y') AS dateFr FROM trajet NATURAL JOIN transport WHERE id_utilisateur = :id_utilisateur ORDER BY date_trajet DESC, id_trajet DESC";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', intval($user_id), PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable $result
            $result = $query->fetchAll();

            // on retourne le résultat
            return $result;
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de supprimer un trajet
     * 
     * @param int $id_trajet Id du trajet
     * 
     * @return void
     */
    public static function delete(int $id_trajet): void
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "DELETE FROM trajet WHERE id_trajet = :id_trajet";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_trajet', intval($id_trajet), PDO::PARAM_INT);

            // on execute la requête
            $query->execute();
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de supprimer tous les trajets d'un utilisateur
     * 
     * @param int $id_trajet Id du trajet
     * 
     * @return void
     */
    public static function deleteAll(int $id_utilisateur): void
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "DELETE FROM trajet WHERE id_utilisateur = :id_utilisateur";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', intval($id_utilisateur), PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on ferme la connexion
            $db = null;
            
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
