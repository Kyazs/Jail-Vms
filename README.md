# Accessing the Project Files

Due to the large size of the system files, I am unable to provide them directly through Google Drive. Instead, you can access the full project by cloning our GitHub repository.

## Steps to Clone the Repository

1. Ensure you have Git installed on your system. If not, download it [here](https://git-scm.com/downloads).
2. Open your terminal or command prompt.
3. Run the following command to clone the repository:

    ```sh
    git clone https://github.com/Kyazs/Jail-Vms.git
    ```

4. Navigate to the project directory:

    ```sh
    cd Jail-Vms
    ```

5. Follow the setup instructions provided below to configure the project.

## Requirements

- Visual Studio Code (VSCode)
- XAMPP
- In the XAMPP folder (`c:\xampp\php\php.ini`), remove the semicolon (`;`) from the line `extension=gd`.

## Guide

1. First, clone the repository:

    ```sh
    git clone https://github.com/Kyazs/Jail-Vms.git
    ```

2. Make sure you are in the main branch or `Backend/login-signup`.

3. Run `composer install`.

4. Copy `.env.example` to the root folder and rename it to `.env`.

5. Update the `.env` file with the following content:

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

6. Run the following commands:

    ```sh
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan optimize
    php artisan serve
    npm run dev
    ```