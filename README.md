# Test Primaco

Test de connaissance PHP MySQL Primaco

## Installation

Aucun installation nécessaire

Créer une base de donnée test_primaco avec les accès root/root puis exécuter le sql suivant pour créer la table

```
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `addressstreet` varchar(100) DEFAULT NULL,
  `addresssuite` varchar(100) DEFAULT NULL,
  `addresscity` varchar(100) DEFAULT NULL,
  `addresszipcode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT
```

## Usage

au chargement de la page le script s'exécute automatiquement et récupère la liste des utilisateurs puis les rempli dans la table users locale

pour l'ajout d'un utilisateur, l'envoi vers l'API se fait bien mais l'API n'offre pas de verification pour s'assurer du bon fonctionnement
