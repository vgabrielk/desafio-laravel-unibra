
# Desafio Unibra 

Desafio técnico para vaga de desenvolvedor Laravel
# :white_check_mark: Requisitos ##

Você deve ter o php e o composer instalado na sua máquina. 

## Rodar localmente

Clone o projeto

```bash
ssh>
    git clone git@github.com:vgabrielk/desafio-laravel-unibra.git

https>
    git clone https://github.com/vgabrielk/desafio-laravel-unibra.git
```

## Vá até o diretório do projeto

```bash
    cd desafio-laravel-unibra
```

1 - No diretório raiz do projeto, crie um arquivo .env e cole todo o conteúdo do arquivo .env.example no arquivo .env, em seguida gere uma chave com o comando:
```bash
    php artisan key:generate
```
2 - Agora rode o seguinte comando : 
```bash
Windows :
    composer install --ignore-platform-reqs && del composer.lock && composer install
```
```bash
Linux :
    composer install --ignore-platform-reqs && sudo rm composer.lock && composer install
```

## Configurar banco de dados

1 - Crie um banco de dados e no arquivo .env onde estará as variáveis de ambiente que realiza a conexão com o banco de dados, elas aparecerão dessa forma :
```bash
    DB_CONNECTION=mysql 
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<database-name> //Nome do banco de dados criado anteriormente.
    DB_USERNAME=root //Nome de usuário
    DB_PASSWORD=<database-password> //Senha do usuário, caso não tenha deixe vazio
```
2 - Agora no diretório raiz rode o seguinte comando : 
```bash
    php artisan migrate && php artisan serve
```
3 - Uma mensagem como essa aparecerá : 
```bash
    INFO  Server running on + Porta do servidor
```

