Faux Ginger
===========

Ceci est un faux serveur Ginger pour pouvoir tester une application utilisant Ginger sans installer une version complète.

La seule clé disponible est `fauxginger` et elle dispose de tous les accès.

Copiez ce dossier dans votre `/var/www` et configurez son URL dans votre application, en rajoutant `/index.php/` à la fin. Par exemple : `http://localhost:8888/faux-ginger/index.php/`.

# Features disponibles :
  - Récupérer les informations sur un cotisant
    + Via son login
    + Via son adresse email
    + Via son numéro de badge
  - Récupérer les cotisations d'un cotisant
