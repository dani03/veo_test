ENV_FILE = .env
ENV_EXAMPLE_FILE = .env.example
DATABASE_SQLITE = ./database/database.sqlite

# run les migrations
migrations:
	php artisan migrate

# pour lancer le projet des le début avec toutes les commande dans l'ordre
build-start:
	@make sqlite-create-file
	composer install
	@make env-file
	@echo "génération de la clé d'application... "
	php artisan key:generate
	@make migrations
	npm install
	php artisan serve
	@echo "le projet est lancé"

# creation du fichier .env s'il n'existe pas en ajoutant les configuration de BDD
env-file:
	@if [ ! -f $(ENV_FILE) ]; then \
		cp $(ENV_EXAMPLE_FILE) $(ENV_FILE); \
		echo "$(ENV_FILE) a été créer."; \
	else \
		echo "$(ENV_FILE) existe déjà."; \
	fi
# création du fichier database.sqlite
sqlite-create-file:
	@if [ ! -f $(DATABASE_SQLITE) ]; then \
		touch $(DATABASE_SQLITE); \
		echo "$(DATABASE_SQLITE) est bien crée ..."; \
	else \
		echo "$(DATABASE_SQLITE) existe ..."; \
	fi
