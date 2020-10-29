docker-compose up -d

env.example

docker-compose exec php php artisan currency:update

http://localhost/currencies

http://localhost/currencies?sort=value

http://localhost/currencies?sort=-value

http://localhost/currencies?sort=iso_char_code&page=2

etc...

http://localhost/currency/USD

