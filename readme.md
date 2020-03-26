## Steps to start app

- `composer update`
- `npm install`
- Create datatabase
- Set .env file
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD
    - BROADCAST_DRIVER
    - PUSHER_APP_ID
    - PUSHER_APP_KEY
    - PUSHER_APP_SECRET
    - PUSHER_APP_CLUSTER
    - PAYPAL_SANDBOX_CLIENT_ID
    - PAYPAL_SANDBOX_SECRET
    - PAYPAL_LIVE_CLIENT_ID
    - PAYPAL_LIVE_SECRET
    - PAYPAL_MODE
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate:refresh --seed`
- `php artisan passport:install`

---

## New Commands 2020

- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan config:cache
- docker-compose exec db bash
- docker-compose exec app php artisan migrate

