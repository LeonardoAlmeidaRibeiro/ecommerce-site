# 🛒 Order Management API (Laravel)

Este projeto é uma API REST desenvolvida em **Laravel** para gerenciamento de pedidos, usuários e produtos, com suporte a relacionamento entre entidades e carregamento otimizado de dados.

---

## 📌 Sobre o projeto

A aplicação simula um sistema de pedidos (orders), onde:

* Um **usuário** pode ter vários pedidos
* Um **pedido** possui vários itens
* Cada **item do pedido** está associado a um produto

A API permite consultar pedidos com todos os seus relacionamentos (usuário e produtos), utilizando **Eager Loading** para melhor performance.

---

## 🚀 Tecnologias Utilizadas

<p align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="php" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" height="40" alt="laravel" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" height="40" alt="mysql" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" alt="javascript" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" height="40" alt="git" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" height="40" alt="github" />
</p>


---

## 📂 Estrutura do projeto

### Models

* `User` → Usuários do sistema
* `Product` → Produtos disponíveis
* `Order` → Pedidos realizados
* `OrderItem` → Itens de cada pedido

### Relacionamentos

```php
// Order
public function user()
public function orderItens()

// OrderItem
public function order()
public function product()
```

---

## 🧠 Conceitos aplicados

* Relacionamentos Eloquent (`hasMany`, `belongsTo`)
* Eager Loading (`with`)
* API REST com retorno em JSON
* Tratamento de exceções
* Migrations e Seeders
* Organização em camadas (Controller → Model)

---

## 🔗 Endpoints

### 📥 Buscar pedido por ID

```
GET /api/orders/{id}
```

### ✅ Resposta de sucesso

```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "user": {...},
      "order_itens": [
        {
          "product": {...}
        }
      ]
    }
  ],
  "message": "Pedido encontrado!"
}
```

### ❌ Pedido não encontrado

```json
{
  "success": false,
  "data": [],
  "message": "Pedido não encontrado"
}
```

---

## 🖥️ Visualização (Web)

Existe também uma rota web que lista todos os pedidos:

```
GET /
```

Controller:

```php
public function index()
{
    $orders = Order::with('user', 'orderItens.product')->get();
    return view('index', compact('orders'));
}
```

---

## 🗄️ Banco de Dados

### Tabelas principais

* `users`
* `products`
* `orders`
* `order_itens`

### Relacionamentos

* `orders.user_id → users.id`
* `order_itens.order_id → orders.id`
* `order_itens.product_id → products.id`

---

## 🌱 Seeders

O projeto já possui seeders para popular o banco:

* `UserSeeder`
* `ProductSeeder`
* `OrderSeeder`
* `OrderItemSeeder`

Executar:

```bash
php artisan migrate --seed
```

---

## ⚙️ Como rodar o projeto

```bash
# Clonar o repositório
git clone https://github.com/seu-usuario/seu-repo.git

# Entrar na pasta
cd seu-repo

# Instalar dependências
composer install

# Copiar .env
cp .env.example .env

# Gerar chave
php artisan key:generate

# Configurar banco no .env

# Rodar migrations + seeders
php artisan migrate --seed

# Subir servidor
php artisan serve
```

---

## 📈 Possíveis melhorias

* Implementar autenticação (Laravel Sanctum ou JWT)
* Criar endpoints de criação/edição/exclusão (CRUD completo)
* Paginação de pedidos
* Filtros por status e data
* Validação com Form Requests
* Testes automatizados (PHPUnit)

---

## 👨‍💻 Autor

Desenvolvido por **Leonardo Almeida**

---

## 📄 Licença

Este projeto está sob a licença MIT.
