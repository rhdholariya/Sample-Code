
# First clone this repository, install the dependencies, and setup your .env file.

- git clone git@github.com:JeffreyWay/Laravel-From-Scratch-Blog-Project.git blog
- composer install

# Then create the necessary database.
- php artisan db
- create database blog
- copy .env.example and rename .env
- set DB_DATABASE name in .env file   
- php artisan migrate
