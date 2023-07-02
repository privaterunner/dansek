## Installation

clone the repository

    git clone https://github.com/privaterunner/dansek.git
    
Switch to the repo folder

    cd mit
    
Install all the dependencies using

    composer install
    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations

    php artisan migrate

Start the local development server

    php artisan serve

on another terminal run

    npm run dev

## API ENDPOINTS

Returns all users whose status is not complete
    
    locahost:8000/users 

Returns all users with completed status

    localhost:8000/users/verified

Updates the user status

    localhost:8000/users/{mit_id}/update

Deletes a user

    localhost:8000/users/{mit_id}/delete

Returns a single user

    localhost:8000/users/{mit_id}
