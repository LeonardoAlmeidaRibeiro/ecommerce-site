🛒 API E-Commerce - Sistema de Consulta de Pedidos

Sistema desenvolvido em Laravel para gerenciamento e consulta de pedidos de um e-commerce. A aplicação permite visualizar informações completas de um pedido, incluindo dados do cliente, produtos adquiridos, status da compra e valor total, através de uma API REST consumida por uma interface web com AJAX.

Este projeto demonstra a integração completa entre backend e frontend, utilizando boas práticas de desenvolvimento com Laravel, Eloquent ORM e consumo de API.

✨ Funcionalidades
Consulta de pedidos por ID
Exibição dos dados do cliente (nome, CPF, telefone e e-mail)
Listagem dos produtos do pedido com quantidade e preço unitário
Cálculo automático do valor total do pedido
Interface web com feedback visual
Validações com mensagens amigáveis utilizando SweetAlert2
Tratamento de erros (404, 422 e 500)
Formatação de CPF, telefone, data e moeda no frontend
🚀 Tecnologias Utilizadas
Backend
PHP 8
Laravel 10/11
Eloquent ORM
API RESTful
Migrations e Seeders
Frontend
HTML5
CSS3
JavaScript
jQuery
AJAX
SweetAlert2
Banco de Dados
MySQL ou SQLite
Modelagem relacional
📁 Estrutura do Projeto
ecommerce-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── OrderController.php
│   │   │   └── Api/OrderController.php
│   └── Models/
│       ├── User.php
│       ├── Order.php
│       ├── OrderItem.php
│       └── Product.php
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── css/styles.css
│   └── assets/images/
├── resources/views/
│   └── index.blade.php
├── routes/
│   ├── web.php
│   └── api.php
└── README.md
🗄️ Modelagem do Banco de Dados
Tabela	Descrição
users	Clientes do sistema
products	Produtos disponíveis
orders	Pedidos realizados
order_itens	Itens de cada pedido
Relacionamentos
Um usuário possui muitos pedidos
Um pedido pertence a um usuário
Um pedido possui muitos itens
Um item pertence a um produto
🔧 Instalação e Configuração
Pré-requisitos
PHP >= 8.1
Composer
MySQL ou SQLite
Passo a passo
# Clonar o repositório
git clone https://github.com/LeonardoAlmeidaRibeiro/ecommerce-laravel.git

# Entrar na pasta
cd ecommerce-laravel

# Instalar dependências
composer install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Configurar banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=

# Executar migrations e seeders
php artisan migrate --seed

# Iniciar servidor
php artisan serve

Acesse no navegador:

http://localhost:8000
📡 Endpoints da API
Buscar pedido por ID
GET /api/orders/{id}
Resposta de sucesso
{
  "success": true,
  "data": [...],
  "message": "Pedido encontrado!"
}
Resposta de erro
{
  "success": false,
  "data": [],
  "message": "Pedido não encontrado"
}
🎯 Como Usar o Sistema
Acesse a página inicial
Digite o código do pedido
Clique em Buscar
O sistema exibirá:
Dados do cliente
Data do pedido
Status
Produtos
Valor total
🧪 Dados de Teste (Seeders)
Usuários
Maria Silva
Alex Ramos
Produtos
Mouse Gamer
Teclado Gamer
Computador Gamer
Monitor Gamer
Pedidos
Pedido 1 – Pendente
Pedido 2 – Pago
Pedido 3 – Cancelado
📝 Status dos Pedidos
Status	Descrição
Pendente	Aguardando pagamento
Pago	Pagamento confirmado
Enviado	Pedido em transporte
Entregue	Entregue ao cliente
Cancelado	Pedido cancelado

👨‍💻 Autor

Leonardo Almeida Ribeiro
GitHub: https://github.com/LeonardoAlmeidaRibeiro
