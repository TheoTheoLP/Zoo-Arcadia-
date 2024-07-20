# Zoo Arcadia 
 Projet informatique

# Zoo Arcadia Application

## Déploiement/utlisation en Local

1. Clonage le repository :
   ```bash
   git clone <url-du-repository>
   cd <nom-du-repository>
   ```

2. Créez et activez un environnement virtuel (Préférable mais optionnel) :
   ```bash
   python -m venv venv
   source venv/bin/activate  # Pour Windows: venv\Scripts\activate
   ```

3. Installez les dépendances :
   ```bash
   pip install -r requirements.txt
   ```

4. Configurez votre base de données MySQL :
   - Créez une base de données nommée `zoo_db`.
   - Exécutez le script SQL pour créer les tables et insérer les données de test :
     ```bash
     mysql -u <votre-utilisateur> -p zoo_db < database_setup.sql
     ```

5. Configurez les variables d'environnement dans un fichier `.env` :
   ```bash
   cp .env.example .env
   ```
   Remplissez le fichier `.env` avec vos informations de configuration.

6. Démarrez le serveur :
   ```bash
   php -S localhost:3060
   ```

7. Accédez à l'application via (http://localhost:3060).
Essayez le port 8000 http://localhost:3060 en cas d'erreur. 
