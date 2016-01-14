## Laravel 5.2 Login - only allow users to login from one browser at a time

1. Create Project: `composer create-project laravel/laravel Laravel5Login --prefer-dist`

1. Add session_id field in migration file CreateUsersTable.php and Model app/User.php

1. Set up Database and create tables: `php artisan migrate`

1. Create basic Register, Login and Logout: `php artisan make:auth`

1. Override function login() and logout() to only allow one session per user

1. Create testcase: testLoginExample(), previous session should be killed when there is another successful login
