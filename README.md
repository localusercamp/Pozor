# About

Проект реализован в рамках тестового задания по разбработке библиотеки фильмов. Полноценное тестовое задание доступно по маршруту: ...

Система представляет из себя сайт, состоящих из следующих подсистем:
* Портал - позволяющий просматривать коллекцию одобренных фильмов.
* Личный кабинет - позволяющий авторизованным пользователям (модераторам) манипулировать своими карточками фильмов.
* Панель администратора - позваляющая администраторам системы утверждать ранее созданые карточки, которые будут добавлены в библиотеку.

# Tech stack
* PHP 8.1 / Laravel
* Vue 3
* Mysql 
# How to start
    git clone https://github.com/Kerroline/Pozor.git
## Windows (Open Server Panel)
### Backend
    
    copy ./server to .../openserver/domains
    copy ./images/ to  .../openserver/domains/server/storag/app/public/
    cd .../openserver/domains/server
    composer install
    move .env.example to .env
    Create DB and FIX to YOUR DB in .env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
    php artisan migrate:fresh --seed
    php artisan storage:link
    php artisan serve

### Frontend

    cd ./client
    npm install
    Setup HOST_URL (default http://localhost:8000) in ./src/store/index.js
    npm run serve







