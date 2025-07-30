
## Installation 
Make sure that you have setup the environment properly. You will need minimum PHP 8.1, MySQL/MariaDB, composer and Node.js.

1. Download the project (or clone using GIT)
2. Copy `.env.example` into `.env` and configure your database credentials
3. Go to the project's root directory using terminal window/command prompt
4. Run `composer install`
5. Set the application key by running `php artisan key:generate --ansi`
6. Run migrations `php artisan migrate:fresh --seed`
7. Run `npm install`
8. Run `npm run build` to build assets
9. Start local server by executing `php artisan serve`

## Features

- Role-based access control using Spatie's laravel-permission package
- Three predefined user roles:
  - Super Admin
  - Admin
  - Product Manager
- Permission-based access restriction
- CRUD operations for:
  - Users
  - Roles
  - Products
- Role assignment to users
- Permission assignment to roles
- Bootstrap 5-based UI
- Laravel 10, PHP 8.1+, MySQL-compatible

## Default User Roles and Permissions

### Super Admin

- Has unrestricted access to the entire system.
- Permissions are bypassed using `Gate::before` in `AuthServiceProvider`.
- Can manage roles, users, and products without limitation.

### Admin

- Has full access to manage users, roles, and products.
- Assigned permissions:
- create-role
- edit-role
- delete-role
- create-user
- edit-user
- delete-user
- create-product
- edit-product
- delete-product

### Product Manager

- Has limited access to manage only products.
- Assigned permissions:
- create-product
- edit-product
- delete-product
