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
