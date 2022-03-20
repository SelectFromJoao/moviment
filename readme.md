# Teste Movement REST API

- [Como rodar a aplicação via docker]
```
docker-compose build app
docker-compose up -d
```

- [Swagger da aplicação]
```
http://localhost:8000/api/documentation
```

- [Rodando localmente]
```
composer install
php artisan serve
```

- [Rodar teste unitarios da aplicação via docker]
```
docker exec -it movement-App ./vendor/bin/phpunit
```

- [Rodar teste unitarios da aplicação local]
```
./vendor/bin/phpunit
```

