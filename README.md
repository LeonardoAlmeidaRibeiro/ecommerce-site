🛒 API E-Commerce - Laravel

Sistema de consulta de pedidos desenvolvido em Laravel com API REST e interface web consumindo a API via AJAX.

🚀 Tecnologias
Laravel
PHP
MySQL
jQuery
AJAX
SweetAlert2
HTML / CSS
📡 API
GET /api/orders/{id}

Retorna:

Dados do cliente
Produtos do pedido
Quantidade
Preço
Valor total
Status do pedido
🧱 Banco de Dados
users
orders
order_itens
products

Relacionamentos:

Usuário → Pedidos
Pedido → Itens
Item → Produto
▶️ Como rodar
git clone https://github.com/LeonardoAlmeidaRibeiro/ecommerce-laravel.git
cd ecommerce-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

Acessar:

http://localhost:8000
🧪 Dados para teste
Pedido	Cliente	Status
1	Maria	Pendente
2	Alex	Pago
3	Maria	Cancelado
👨‍💻 Autor

Leonardo Almeida Ribeiro
https://github.com/LeonardoAlmeidaRibeiro
