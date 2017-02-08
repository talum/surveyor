# Behavioral Surveyor 

## Setup
- Fork and/or clone repo
- Make sure you have PHP > 5.6
- Install Laravel and Composer if you don't already have them installed
- Run `composer install`
- Run `php artisan key:generate`
- Set up the .env
  - I used the following configs
  ```
    APP_ENV=local
    APP_KEY=base64:FlamjlOt2VMtD0qKiZfo0Y1EDXs9KHsRo3H+VawAbPQ=
    APP_DEBUG=true
    APP_LOG_LEVEL=debug
    APP_URL=http://localhost

    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database/database.sqlite
    DB_USERNAME=
    DB_PASSWORD=

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    SESSION_DRIVER=file
    QUEUE_DRIVER=sync

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_DRIVER=smtp
    MAIL_HOST=mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=

  ```
- Run `php artisan migrate`
- Run `php artisan db:seed`
- I know this sounds strange, but in dev, using sqlite3, I needed to change
  the DB_DATABASE path to `../database/database.sqlite` before booting up
  the server
- Run `php artisan serve`
- Visit `localhost:8000`

## Using the App
- Register an account
- Log in
- Visit the dashboard and click on the surveys
- The survey results will be located at '/surveys/{id}/results'

## Tests
- To run the test suite, make sure the migrations have been run with `php
  artisan migrate`
- Then from the command line, run `./vendor/bin/phpunit`
