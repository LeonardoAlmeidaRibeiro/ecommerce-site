<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API E-Commerce</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>
<body>
    <header>
        <div class="logo-container">
            <h1>API E-Commerce</h1>
            <p>Desenvolvido por <a href="https://github.com/LeonardoAlmeidaRibeiro">@LeonardoAlmeidaRibeiro</a></p>
        </div>
    </header>

    <main>
        <section id="vendas">
            <div class="container">
                <div class="card">
                    <h2 class="card-title">Consultar Vendas</h2>

                    <!-- Formulário de Busca -->
                    <form method="GET" action="/api/vendas" class="search-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="vendedor">Código da compra:</label>
                                <input type="text" id="compra" name="compra" class="form-control" placeholder="Código da compra">
                            </div>

                            <button type="submit" class="btn-search" disabled>Buscar</button>
                        </div>
                    </form>

                    <!-- Tabela de Resultados -->
                    <div class="table-container">
                        <table class="sales-table">
                            <thead>
                                <tr>
                                    <th class="show992">ID</th>
                                    <th class="show576">Nome</th>
                                    <th>CPF</th>
                                    <th>Data Nascimento</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody id="resultados-table">
                                <!-- Os resultados da API serão inseridos aqui via JavaScript -->
                                <tr>
                                    <td colspan="7" class="loading-message">
                                        Faça uma busca para ver os resultados
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Loading Spinner -->
                    <div id="loading" class="loading-spinner" style="display: none;">
                        <div class="spinner"></div>
                        <p>Carregando...</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>

    </script>
</body>
</html>
