

## installation 

 ```
docker run --rm --interactive --tty -v $(pwd):/app composer install
 ```
- copy .env.example to .env
```
mv .env.exmaple .env
```
- generate app key

```
./vendor/bin/sail php artisan key:generate 
```
- run sail
```
./vendor/bin/sail
```

- in .env file  change 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=converter_app
DB_USERNAME=sail
DB_PASSWORD=password
```

- to connect mysql
```
./vendor/bin/sail mysql
```

