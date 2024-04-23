### Requirements:

-   PHP 8.1 or higher ([Latest XAMPP Version](https://www.apachefriends.org/download.html "Latest XAMPP Version")).
-   Composer ([Latest Composer Version](https://getcomposer.org/download/ "Latest Composer Version"))
-   NodeJS ([LTS Version](https://nodejs.org/en/download "LTS Version")).
-   GitBash ([GitBash Latest Version](https://git-scm.com/downloads "GitBash Latest Version")) _Optional_
-   phpMyAdmin or [MySQL Workbench](https://dev.mysql.com/downloads/windows/installer/8.0.html "MySQL Workbench").

All the requirements above and download links are for windows user. In case you're using Mac OS, then google it.

### Installation:

Open Terminal on destination folder and type the CLI below.

First step, clone the project using web URL:

```shell
git clone https://github.com/asenatribanyu/language-test.git
```

Second step, get inside to the destination folder:

```shell
cd /language-test
```

Third step, install the Php dependency using Composer:

```shell
composer install
```

Fourth step, copy the .env:

```shell
cp .env.example .env
```

Fifth step, generate the Project Key:

```shell
php artisan key:generate
```

Sixth step, do the database migrate with seeder:

```shell
php artisan migrate:fresh --seed
```

Seventh step, install the Javascript depedency using NodeJs:

```shell
npm install
```

[========]

Open the project with your own Text Editor (IDE) and continue the following step.

Eighth step, change the email settings inside the `.env` using your own credentials from [Mailtrap](https://mailtrap.io/ "Mailtrap") or other mail provider to sandbox the auth feature using SMTP:

```shell
MAIL_MAILER=smtp
MAIL_HOST=<your mail host here>
MAIL_PORT=<your port here>
MAIL_USERNAME=<your username here>
MAIL_PASSWORD=<your password here>
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Ninth step, follow this folder destination: `vendor` > `laravel` > `fortify` > `routes` and open `routes.php`.

Find and replace this two code , first one is:

```php
if ($enableViews) {
        Route::get(RoutePath::for('login', '/login'), [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('login');
    }
```

replace into:

```php
if ($enableViews) {
        Route::get(RoutePath::for('login', '/'), [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('login');
    }
```

second code is:

```php
Route::post(RoutePath::for('login', '/login'), [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));
```

replace into:

```php
Route::post(RoutePath::for('login', '/'), [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));
```

[========]

Now run the project by following this CLI:

Open 2 terminals, first terminal is running the Laravel server:

```shell
php artisan serve
```

second terminal is running the [Tailwind CSS](https://tailwindcss.com/ "Tailwind CSS") ([Flowbite](https://flowbite.com/ "Flowbite")) to make the web styling working:

```shell
npm run dev
```

now open the website on browser`http://127.0.0.1:8000/`
