# Agencia

### Cheminement

1/ J'ai crée le système de login, basique à symfony.. <br>
2/ J'ai récupéré les fichier binaire json, je les ai converti en JSON via le package bsondump d MongoDB <br>
3/ J'ai crée les entités en me servant des schémas de l'ancienne base <br>
3/ J'ai corrigé les fichiers converti en JSON valid <br>
4/ Je traite les sources de la legacy pour la nouvelle base sous mysql et y insérer les anciennes données<br>
5/ (Reste à faire l'algo et le retouner le nombre de combinaison dans une response) <br>

+ : J'aurais aussi pu couvertir la legacy en sql depuis mongoDB, créer la bdd et généré mes entités depuis les fichiers sql généré.

### Setup le projet
Version de Symfony: Symfony 5.0.2

Démarrer le projet en local
```
php -S 127.0.0.1:8000 -t public
```

Infos base de données:
```
Accès BDD: https://remotemysql.com/phpmyadmin/
Username: YFE0TzKNh9
Password: gG3wWH1jft
```

Charger les fixtures et le contenu de la legacy (fichier JSON).
Dans le répertoire du projet:
```
php bin/console doctrine:fixtures:load
```