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


## Installation

1. Clone this repository with:
```
git clone https://github.com/philippe-corleone/laravel-template.git
```
2. Install all packages and run:
```
composer update
```
3. Costumize the `.env` in the root directory and set you database, user and password. Default it is MySQL in use.
4. Migrate all tables and run: 
```
php artisan migrate
```
5. Run all database seeds:
```
php artisan db:seed
```
6. Install all npm dependencies (this includes elexier):
```
npm install
```
7. Install gulp:
```
npm install gulp
```
8. check out gulp and run `gulp`.
9. Now you login with the email `admin@secret.com` and the password `secret`. This user has all rights.
10. Ready, enjoy!
