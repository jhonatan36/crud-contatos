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

configure as opções de envio de e-mail caso queira receber e-mails de recuperação de senha

```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
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
