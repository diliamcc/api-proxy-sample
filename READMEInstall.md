### 3.1. Local 
1. run composer install 
2. copy .env.example file to .env 
3. set APP_ENV in .env file to local 
4. set APP_DEBUG in .env file to true 
5. set APP_URL in .env file to your base url application (example: http://127.0.0.1:8000) 
6. set DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD in .env file to your database configuration 
7. run php artisan key:generate 
8. run php artisan migrate:refresh --seed 
9. run php artisan serve