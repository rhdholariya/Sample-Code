
# First clone this repository, install the dependencies, and setup your .env file.

- git clone git@github.com:rhdholariya/Stockman-Assessment.git
- composer install

# Create the database and follow below steps.
- php artisan db
- create database blog
- copy .env.example and rename .env
- set DB_DATABASE name in .env file   
- php artisan migrate
