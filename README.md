## Install Project

- git clone ...
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan serve

## Auth
При запуске php artisan db:seed создается пользователь с полями name и api_token\
api_token статичный (не генерируется, что бы генерировался нужно разкоментить строку в UserFactory),\
его можно посмотреть либо в Базе либо в UserFactory\
Все запросы к API должны идти с Auth Bearer

## Api Methods

### /api/books 

Authors и Publishers добавляются исключительно с Book\
Book связан с Authors и Publishers через hasOne и удаляются каскадно

CRUD
GET /api/books - получение всех Книг из базы\
GET /api/books/{id} - получение одной Книги из базы\
POST /api/books - добавление Книги в базу\
PUT /api/books/{id} - изменение Книги в базе\
DELETE api/books/{id} - удаление Книги из базы

### /api/authors
GET /api/authors - получение всех Авторов\
GET /api/authors/{id} - получение одного Автора

### /api/publishers
GET /api/publishers - получение всех Издателей\
GET /api/publishers/{id} - получение одного Издаьеля

