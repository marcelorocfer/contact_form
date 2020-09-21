## Instruções de configuração do projeto.

- Clone o repositório.
- Entre no diretório do projeto.
- Execute o comando "composer install".
- Execute o comando "php artisan key:generate".
- Copie arquivo ".env.example" e salve como ".env".
- Crie um banco de dados e configure as credenciais da sua base de dados para o arquivo ".env".
- Configure as credenciais do seu servidor de e-mails no arquivo ".env".
- Execute o comando "php artisan serve" para iniciar um servidor de desenvolvimento local ou acesse pelo navegador através do endereço "http://localhost/nomedodiretorio/public/" ou "http://127.0.0.1/nomedodiretorio/public/".

## Exemplo de configuração do servidor de e-mails no arquivo ".env"

- Utilizando GMAIL

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seudominio@gmail.com
MAIL_PASSWORD=sua_senha
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seudominio@seuemail.com
MAIL_FROM_NAME="${APP_NAME}"

- Utilizando Mailtrap

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

## Observações.

Esse projeto foi criado com ajuda do framework de desenvolvimento PHP Laravel. Mais informações podem ser obtidas através da sua [documentação](https://laravel.com/docs) através do link https://laravel.com/docs.

