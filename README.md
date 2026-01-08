
# Pixel Positions

A Laravel application using Tailwind CSS and Blade views for building responsive, component-driven UIs.

## Stack
- PHP (Laravel)
- Blade templates (resources/views)
- Tailwind CSS (configured via tailwind.config.js)
- Vite (asset bundling)
- Node / npm, Composer
- MySQL / PostgreSQL (configurable via .env)

## Quickstart (development)
1. Clone
    git clone <repo-url>
2. Install dependencies
    composer install
    npm install
3. Environment
    cp .env.example .env
    # set DB and other credentials in .env
    php artisan key:generate
4. Storage & DB
    php artisan storage:link
    php artisan migrate --seed
5. Run dev servers
    npm run dev
    php artisan serve

Access the app at http://127.0.0.1:8000 (or the host printed by artisan).

## Build for production
1. Build assets
    npm run build
2. Optimize Laravel
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

Deploy the built assets and ensure environment variables are set on the server.

## Project layout (high level)
- app/ — backend logic, models, controllers
- resources/views/ — Blade templates and components
- resources/css/ — Tailwind entry (imports)
- resources/js/ — frontend scripts
- tailwind.config.js — Tailwind config and purge paths
- vite.config.js — Vite configuration
- database/migrations, database/seeders — schema and seed data

Ensure Tailwind scans Blade views (resources/views/**/*.blade.php) in tailwind.config.js purge/content.

## Common commands
- composer install
- npm install
- npm run dev         # dev assets (Vite)
- npm run build       # production assets
- php artisan migrate
- php artisan migrate --seed
- php artisan tinker
- php artisan test     # PHPUnit / Pest

## Testing
Use PHPUnit or Pest per project config:
php artisan test
or
vendor/bin/phpunit

## Environment & troubleshooting
- Node >= 16 recommended.
- If migrations fail, verify DB credentials in .env.
- Fix permissions: storage/ and bootstrap/cache must be writable.
- Missing APP_KEY: run php artisan key:generate
- If assets do not update, stop dev server and restart npm run dev (Vite).

## Performance & security notes
- Never commit .env to VCS.
- Use config:cache, route:cache, and view:cache in production.
- Run queue workers for offloaded jobs (php artisan queue:work).
- Keep dependencies updated; run security scans periodically.

## Contributing
- Fork, create a feature branch, open a PR.
- Follow existing code style and Tailwind utility patterns.
- Add tests for backend changes and basic coverage for critical flows.

## License
See LICENSE (or add project license here).

<!-- End of README -->