## Requirements

- Visual Studio Code (VSCode)
- XAMPP
- In the XAMPP folder (`c:\xampp\php\php.ini`), remove the semicolon (`;`) from the line `extension=gd`

## Guide

1. Run `composer install`
2. Copy `.env.example` to the root folder and rename it to `.env`
3. Update the `.env` file with the following content:

    ```env
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:aHOUdRwBcP7bNISkzqzg3TDXb7xSp38L0HzFkTmmF1c=
    APP_DEBUG=true
    APP_TIMEZONE=Asia/Manila
    APP_URL=http://localhost

    APP_LOCALE=en
    APP_FALLBACK_LOCALE=en
    APP_FAKER_LOCALE=en_US

    APP_MAINTENANCE_DRIVER=file
    # APP_MAINTENANCE_STORE=database

    PHP_CLI_SERVER_WORKERS=4

    BCRYPT_ROUNDS=12

    # QR code backend: imagick, gd
    QR_CODE_BACKEND=gd

    LOG_CHANNEL=stack
    LOG_STACK=single
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=jail_vms
    DB_USERNAME=root
    DB_PASSWORD=

    SESSION_DRIVER=database
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=null

    BROADCAST_CONNECTION=log
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=database

    CACHE_STORE=database
    CACHE_PREFIX=

    MEMCACHED_HOST=127.0.0.1

    REDIS_CLIENT=phpredis
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=santosjohncasper@gmail.com
    MAIL_PASSWORD=oxadufbsbwlqldda
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS="johncasper.bit@gmail.com"
    MAIL_FROM_NAME="Jail-Vms"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    VITE_APP_NAME="${APP_NAME}"
    ```

4. Run the following commands:

    ```sh
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan optimize
    php artisan serve
    npm run dev
    ```