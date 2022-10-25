Clone the repository

    git clone git@github.com:arambaghumyan/my-app.git

Switch to the repo folder

    cd /my-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    npx mix
    php artisan serve

## To create a user
    
    php artisan create:user

    username: unique, min. 5 alnum symbols
    email: unique, valid email
    password: min. 8 symbols, latin+numeric+uppercase

