# Desafio Insight Gestão - Back-end

Este projeto foi desenvolvido com:

- Laravel - 6.2
- PHP - 7.4

## Para rodar este projeto
```bash
$ git clone https://github.com/soarestheu/InsightBack.git
$ cd InsightBack
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan db:seed #para gerar os seeders, dados de teste
$ php artisan serve
```
Acesssar pela url: http://localhost:8000/api/base

    
## Funcionalidades

- Autenticação de usuário utilizando JWT
- Logout
- Criação, Edição, Leitura e Exclusão de Tarefas 
- Criação, Edição, Leitura e Exclusão de Usuários
- Notificação por e-mail quando houver modificações nos usuários