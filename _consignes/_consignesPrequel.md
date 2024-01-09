# FORMULAIRE PHP
> Récupération des données fournies par l'utilisateur

## Boiler plate
Mis en place de la structure de notre exercice.  
Dans l'exemple, bootstrap a installé via NPM d'où le dossier **node_modules** et **les packages** mais vous n'êtes pas obligé de l'installer ;).

## MVC : Modèle Vue Controleur
> MVC léger

Nous allons mettre en place un pattern connu mais en version lite.  
- **index.php** :  
    - il doit faire une redirection vers le controleur : ***controller-signup.php***
- **controller-signup.php** :  
    - il va faire tous les contrôles du formulaire  
        - le clic sur le bouton s'enregistrer
        - la validité des inputs
        - cacher le formulaire
        - etc ...
    - il va également inclure la vue : ***view-signup.php***
- **view-signup.php** :
    - il va inclure ***le head et le footer***
    - il va également contenir le formulaire d'inscription

## Formulaire
Mettre en place un formulaire pour une inscription fictive.  
Il faudra un formulaire qui enverra les inputs via **la méthode POST**.

## Gestions des erreurs
Vous devez effectuer des contrôles avant de valider l'inscription.  
Le contrôle s'effectuera au click sur le bouton **S'enregistrer**.  
> **!! Attention !!** les contrôles doivent étre effectuer en back et non en front : *bref en PHP et non en JS* :p

- **Nom** : pas de vide / uniquement des lettres
- **Prénom** : pas de vide / uniquement des lettres
- **Courriel** : pas de vide / uniquement format mail
- **Date de naissance** : pas de vide
- **Mot de passe** : pas de vide / mot de passe identique / plus de 8 caractères

Vous devez faire en sorte d'afficher les erreurs de l'utilisateur, exemple :  

## Validation de l'inscription
Une fois que tous les voyants sont au vert, il faut cacher le formulaire et faire une synthèse des informations rentrées.  
Indiquer également qu'un mail de confirmation a été envoyé.