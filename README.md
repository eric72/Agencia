# Agencia

### Setup le projet
Version of Symfony: Symfony 5.0.2

Start the project
```
php -S 127.0.0.1:8000 -t public
```

Database login:
```
Accès BDD: https://remotemysql.com/phpmyadmin/
Username: YFE0TzKNh9
Password: gG3wWH1jft
```

Load the fixtures and the content of the legacy (JSON File).
In the repository of the project:
```
php bin/console doctrine:fixtures:load
```

API Combinations
```
Example local combination api with parameter:
localhost:8000/getCombinations/?combinations[]=4&combinations[]=6&combinations[]=8
```

Doc API Combinations

```
Routes:
host:port/getCombinations/?combinations
Example:
localhost:8000/getCombinations/
Parameters:
combinations
```