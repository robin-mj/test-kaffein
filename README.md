# Test technique Kaffein

## Présentation

-   Site web faisant office de test de recrutement pour rejoindre l'agence Kaffein en tant qu'alternant.
-   Le site permet de visualiser les entreprises et contacts du CRM HubSpot du client fictif.

## Setup

-   Ouvrez un terminal et placez vous dans le dossier contenant les fichiers du site web
-   Installez les dependencies avec les commandes `npm install` & `composer install`
-   Renseignez les informations de connexion à votre base de données (préalablement créée) dans le fichier .env :
    ```
    DB_CONNECTION=mysql
    DB_HOST=host
    DB_PORT=port
    DB_DATABASE=db-name
    DB_USERNAME=username
    DB_PASSWORD=password
    ```
-   Créez les tables avec la commande `php artisan migrate`
-   Remplissez les informations des entreprises et de leur contact avec la commande `php artisan import:data`
-   Lancez le server avec `php artisan serve` et compilez les fichiers avec `npm run watch`

## Sur le site

-   Entrez l'url dans votre navigateur
-   Créer un compte en cliquant sur "Want to register?"
-   Vous arrivez sur la page d'accueil. Vous pouvez à présent filtrer les entreprises par secteur d'activités, consulter les informations des entreprises dans les grandes lignes ou bien dans les détails en cliquant sur l'entreprise souhaitée.

## Problème possibles

-   La commande `php artisan import:data` ne fonctionne pas :

    -   Vérifiez les informations de connexion à votre base de données dans le fichier .env.
    -   Vérifiez que les propriétés "name" et "domain" des entreprises soient définies dans votre compte HubSpot, elles sont obligatoires dans la base de données.
    -   Vérifiez que les propriétés "firtname" et "lastname" des contacts soientt définies dans votre compte HubSpot, elles sont obligatoires dans la base de données.

-   Les logos des entreprises et/ou les avatars des contacts ne s'affichent pas :

    -   Vérifiez que les logos et/ou avatars soient définis dans votre compte HubSpot.
    -   Les url des images ne sont pas les bons. Contactez moi pour régler le problème.

-   Vous ne pouvez plus vous connecter avec vos identifiants :
    -   Vos identifiants ne sont pas les bons. Vérifiez les et ré-essayer.
    -   Réinitialisez votre mot de passe en cliquant sur "Forgot your password?"
    -   Après la commande `php artisan migrate`, les comptes existants sont supprimés. Vous devez donc vous enregistrer à nouveau pour avoir accès au site.
