# SISTEMA DE CONTATOS

## Passo a passo

### Configurar env

crie o arquivo `.env` e configure as variaveis abaixo.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_contatos
DB_USERNAME=root
DB_PASSWORD=
```

### criar key do laravel

```
php artisan key:generate
```

### criar tabelas do banco

-   deve se criar um banco antes de rodar a migration de criação das tabelas

```
php artisan migrate
```
