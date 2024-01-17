<?php

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
            $sql = "INSERT INTO `utilisateur` (`nom_participant`,`prenom_participant`, `pseudo_participant`, `naissance_participant`, `mail_participant`, `mdp_participant`, `id_entreprise`, `valide_participant` ) VALUES (:lastname, :firstname, :pseudo, :birthdate, :email, :mdp_participant, :id_enterprise, :valide_participant);";

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
            $query->bindValue(':valide_participant', $validParticipant, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
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
            $sql = "SELECT * FROM `utilisateur` WHERE `mail_participant` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $email, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
