<?php

// nous créons un namespace pour notre classe
namespace App\Models;
// nous importons la classe PDO pour pouvoir nous connecter à notre base de données
use \PDO;

class Utilisateur
{
    /**
     * Méthode permettant de créer un utilisateur
     * 
     * @param string $lastname Nom de l'utilisateur
     * @param string $firstname Prénom de l'utilisateur
     * @param string $pseudo Pseudo de l'utilisateur
     * @param string $birthdate Date de naissance de l'utilisateur
     * @param string $email Adresse mail de l'utilisateur
     * @param string $password Mot de passe de l'utilisateur
     * @param string $idEnterprise Id de l'entreprise de l'utilisateur
     * @param int $validParticipant Validation de l'utilisateur
     * 
     * @return void
     * 
     */
    public static function create(string $lastname, string $firstname, string $pseudo, string $birthdate, string $email, string $password, string $idEnterprise, int $validParticipant)
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "INSERT INTO `utilisateur` (`nom_participant`,`prenom_participant`, `pseudo_participant`, `naissance_participant`, `mail_participant`, `mdp_participant`, `photo_participant`, `id_entreprise`, `valide_participant` ) VALUES (:lastname, :firstname, :pseudo, :birthdate, :email, :mdp_participant, :photo_participant, :id_enterprise, :valide_participant);";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':lastname', htmlspecialchars($lastname), PDO::PARAM_STR);
            $query->bindValue(':firstname', htmlspecialchars($firstname), PDO::PARAM_STR);
            $query->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':mdp_participant', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':id_enterprise', $idEnterprise, PDO::PARAM_STR);
            $query->bindValue(':photo_participant', 'default.jpg', PDO::PARAM_STR);
            $query->bindValue(':valide_participant', $validParticipant, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on ferme la connexion
            $db = null;

        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Méthode permettant de mettre à jour un utilisateur
     * 
     * @param string $lastname Nom de l'utilisateur
     * @param string $firstname Prénom de l'utilisateur
     * @param string $pseudo Pseudo de l'utilisateur
     * @param string $birthdate Date de naissance de l'utilisateur
     * @param string $email Adresse mail de l'utilisateur
     * @param string $idEnterprise Id de l'entreprise de l'utilisateur
     * @param string $photo Photo de l'utilisateur
     * @param string $description Description de l'utilisateur
     *  
     * @return void
     * 
     */
    public static function update(int $id_utilisateur, string $lastname, string $firstname, string $pseudo, string $birthdate, string $email, string $idEnterprise, string $photo, string $description)
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "UPDATE `utilisateur` SET `nom_participant` = :lastname,`prenom_participant` = :firstname, `pseudo_participant` = :pseudo, `naissance_participant` = :birthdate, `mail_participant` = :email, `id_entreprise` = :id_enterprise, `photo_participant` = :photo, `description_participant` = :description WHERE `id_utilisateur` = :id_utilisateur;";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', intval($id_utilisateur), PDO::PARAM_INT);
            $query->bindValue(':lastname', htmlspecialchars($lastname), PDO::PARAM_STR);
            $query->bindValue(':firstname', htmlspecialchars($firstname), PDO::PARAM_STR);
            $query->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':id_enterprise', intval($idEnterprise), PDO::PARAM_STR);
            $query->bindValue(':photo', $photo, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR); // htmlspecialchars($description) si besoin

            // on execute la requête
            $query->execute();

            // on ferme la connexion
            $db = null;

        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de vérifier si un mail existe dans la base de données
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return bool
     */
    public static function checkMailExists(string $email): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT *, DATE_FORMAT(`naissance_participant`, '%d/%m/%Y') AS dateFr  FROM `utilisateur` WHERE `mail_participant` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $email, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on ferme la connexion
            $db = null;

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {

                return false;
            } else {
                return true;
            }
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de vérifier si un pseudo existe dans la base de données
     * 
     * @param string $pseudo Pseudo de l'utilisateur
     * 
     * @return bool
     */
    public static function checkPseudoExists(string $pseudo): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `utilisateur` WHERE `pseudo_participant` = :pseudo";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on ferme la connexion
            $db = null;

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            // on retourne le résultat
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */
    public static function getInfos(string $email): array
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT *, DATE_FORMAT(`naissance_participant`, '%d/%m/%Y') AS dateFr FROM `utilisateur` NATURAL JOIN `entreprise` WHERE `mail_participant` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $email, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on ferme la connexion
            $db = null;

            // on retourne le résultat
            return $result;
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methide permettant de supprimer un utilisateur
     * 
     * @param int $id_utilisateur Id de l'utilisateur
     * 
     * @return void
     */
    public static function delete(int $id_utilisateur): void
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "DELETE FROM `utilisateur` WHERE `id_utilisateur` = :id_utilisateur";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

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
