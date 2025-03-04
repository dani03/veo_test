

## Description
Ce projet Laravel permet de gérer la validation et le traitement d'une liste d'altitudes en vérifiant la conformité des valeurs et en calculant les surfaces protégées. Le projet repose sur une architecture propre en séparant la logique métier dans un service (`ProtectionService`) et en gardant le contrôleur (`ProtectionController`) léger.

## Choix de Conception

### 1. **Utilisation d'un Service (ProtectionService)**
Le choix d'externaliser la logique métier dans un service permet de garder le contrôleur concis et facile à comprendre, faciliter la réutilisation de la logique dans d'autres parties de l'application.

### 2. **Injection de dépendances**
L'injection de `ProtectionService` dans `ProtectionController` asure
- Une meilleure séparation des responsabilités.
- Une flexibilité lorsqu'il est question de modification du service.

### 3. **Utilisation de Blade pour le Frontend**
Blade simplifie la gestion des erreurs et des messages de validation tout en gardant le code lisible 
possibilité d'utiliser vue Js mais j'ai préferé garder au plus simple et ne pas en faire trop sachant que ce n'était pas demandé.

### 4. **Création d'une commande Artisan**
Une commande personnalisée `calculate:surface` permet d'exécuter la logique métier en ligne de commande, offrant une alternative à l'interface web même s'il avait été demandé l'un ou l'autre j'ai opté pour faire les 2 et afin de facilité le test en ligne j'ai ajouté le projet en ligne avec laravel cloud nouveauté de laravel sur l'url :
https://test-veolia-main-icqjyh.laravel.cloud/.

### 5. **Automatisation avec un Makefile**
Le `Makefile` facilite l'installation et l'exécution du projet en automatisant :
- L'installation des dépendances (`composer install`, `npm install`).
- La configuration de l'environnement (`.env`, `database.sqlite`).
- La migration de la base de données (`php artisan migrate`).
- Le lancement du serveur (`php artisan serve`).





# 📌 Guide d'installation et d'utilisation du projet

## 🚀 Installation du projet

1. **Télécharger le repository**  
   Clonez le projet en exécutant la commande suivante dans votre terminal :
   ```sh
   git clone <URL_DU_REPO>
   ```

2. **Se placer dans le dossier du projet**
   ```sh
   cd nom_du_projet
   ```

3. **Lancer le projet**  
   Exécutez la commande suivante pour construire et démarrer le projet :
   ```sh
   make build-start
   ```
   Cela démarrera l'application avec les services nécessaires.

4. **Lancer le serveur de développement Frontend**  
   Ouvrez un **nouveau terminal**, placez-vous à la racine du projet et exécutez :
   ```sh
   npm run dev
   ```
   Cela compilera les assets frontend.

---

##  Deux façons de tester le projet

### **1️⃣ Via le navigateur**
📌 Une fois le projet lancé, ouvrez votre navigateur et accédez à l’URL suivante :  
👉 [http://localhost:8000](http://localhost:8000)

---

### **2️⃣ Via la ligne de commande**
Vous pouvez exécuter le calcul en utilisant **Artisan** :
```sh
php artisan calculate:surface
```

#### 📝 Étapes après l'exécution de la commande :
1. **Entrez le nombre de surfaces** que vous souhaitez analyser.
2. **Saisissez une valeur minimale** de **2** pour définir les surfaces à protéger.

---

## 🎯 Résumé des commandes principales
| Action | Commande |
|--------|---------|
| Cloner le projet | `git clone <URL_DU_REPO>` |
| Aller dans le dossier du projet | `cd nom_du_projet` |
| Construire et démarrer le projet | `make build-start` |
| Lancer le serveur frontend | `npm run dev` |
| Exécuter le calcul en ligne de commande | `php artisan calculate:surface` |

---
