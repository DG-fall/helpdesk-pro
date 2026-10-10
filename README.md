# HelpDesk Pro

Application de gestion de tickets de support IT construite avec **Laravel 13**, PHP 8.3, SQLite et Laravel Sanctum.

## Fonctionnalités

- Authentification et inscription avec rôles `admin`, `technician`, `user`.
- Création, recherche, filtrage et suivi des tickets.
- Priorités, statuts, catégories et affectation aux techniciens.
- Commentaires de conversation et journal d’audit.
- API REST protégée par Sanctum (`/api/tickets`).
- Interface responsive Blade, migrations et données de démonstration.

## Installation locale

```bash
cp .env.example .env
php artisan key:generate
 touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Ouvrir http://localhost:8000. Comptes de démonstration :

| Rôle | Email | Mot de passe |
|---|---|---|
| Admin | admin@helpdesk.test | password |
| Technicien | tech@helpdesk.test | password |
| Utilisateur | user@helpdesk.test | password |

## Docker

```bash
docker compose up --build
```

## Tests et qualité

```bash
php artisan test
./vendor/bin/pint --test
php artisan route:list
```

## API

Les endpoints REST sont documentés par leur structure Laravel et acceptent JSON :

- `GET /api/tickets`
- `POST /api/tickets`
- `GET /api/tickets/{ticket}`
- `PUT/PATCH /api/tickets/{ticket}`
- `DELETE /api/tickets/{ticket}` (admin uniquement)

Un token Sanctum doit être fourni dans `Authorization: Bearer <token>`.
