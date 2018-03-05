# Corleone Laravel Template

Do you want to set up often a laravel project with user, role management and many more features, but you want not set up a laravel project from beginning again and again?

Than here comes the solution. This is a laravel 5.6 template which comes with user authorization and a user, role and permission management realized by the package `zizaco/entrust` and it has integrated user settings realized by the package `corleone/user-settings`. Also the new bootstrap 4.0 comes with laravel 5.6.

It is also multilingual and has all functions to manage languages. The default languages are german and english, but the default language files are available for 66 languages. These files were taken from the package `caouecs/laravel-lang`. Thanks for that!

For the icons it is used the `ionic-team/ionicons` library.

All these packages which are used to realize this project stand under the MIT license.

### Used Packages

`zizaco/entrust`: https://github.com/Zizaco/entrust  
`corleone/user-settings`: https://github.com/philippe-corleone/user-settings  
`caouecs/laravel-lang`: https://github.com/caouecs/Laravel-lang  
`ionic-team/ionicons`: https://github.com/ionic-team/ionicons  


## Installation of the Application

1. Clone this repository with:
```
git clone https://github.com/philippe-corleone/laravel-template.git
```
2. Install all packages and run:
```
composer update
```
3. Costumize the `.env` in the root directory and set your database, the database user and the database password. Default it is MySQL in use. You should also set the app name.
4. Generate an app key with the command: `php artisan key:generate`
5. Migrate all tables and run: 
```
php artisan migrate
```
6. Run all database seeds:
```
php artisan db:seed
```
The application is now running and can be used! You can log in with the email `admin@secret.com` and the password `secret`.

## Installation of the developer tools
This Laravel template uses Elixir (https://laravel.com/docs/5.3/elixir) and gulp to generate css and javascript files. An `Gulpfile.js` already exists in the project and is in use. To use exlixir and gulp follow the following steps:

1. Install all npm dependencies (this includes elexier):
```
npm install
```
2. Install gulp:
```
npm install gulp
```
3. check out gulp and run `gulp`.
