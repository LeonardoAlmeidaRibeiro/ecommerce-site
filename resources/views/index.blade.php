<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API E-Commerce</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        <form method="GET" action="#" class="search-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="vendedor">Código da compra:</label>
                                    <input type="text" id="codigo_compra" name="codigo_compra" class="form-control" placeholder="Código da compra">
                                </div>

                                <button type="button" class="btn-search" onclick="executarBuscar()"> Buscar </button>
                            </div>
                        </form>

                        <!-- Tabela de Resultados -->
                        <div class="table-container">
                            <table class="sales-table">
                            <thead>
                                <tr>
                                    <th>ID Pedido</th>
                                    <th>Cliente</th>
                                    <th>CPF</th>
                                    <th>Data</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th>Produtos</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                                <tbody id="resultados-table">
                                    <!-- Os resultados da API serão inseridos aqui via JavaScript -->
                                    <tr>
                                        <td colspan="8" class="loading-message">
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
        function executarBuscar()
            {

                var codigo_compra = $("#codigo_compra").val();

                if (codigo_compra == '')
                {
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Preencha o código da compra!",
                    });
                    return false;
                }

                var data = {
                    codigo_compra: codigo_compra,
                };

              $.ajax({
                url: "/ecommerce-laravel/public/api/orders/" + codigo_compra,
                type: "GET",
                data: data,

                success: function(response) {
                if(response.success){

                    $("#resultados-table").html("");

                    $.each(response.data, function(index, pedido){

                        var produtos = '';
                        var total = 0;

                        $.each(pedido.order_itens, function(i, item){

                            var nomeProduto = item.product.name;
                            var quantidade = item.quantity;
                            var preco = parseFloat(item.price);

                            total += preco * quantidade;

                            produtos += nomeProduto + ' (x' + quantidade + ') - ' + formatarMoeda(preco.toFixed(2)) + '<br>';
                        });

                        var statusCor = '';

                        if(pedido.status == 'Pendente'){
                            statusCor = '<span style="color: orange">Pendente</span>';
                        }
                        else if(pedido.status == 'Cancelado'){
                            statusCor = '<span style="color: red">Cancelado</span>';
                        }
                        else if(pedido.status == 'Pago'){
                            statusCor = '<span style="color: green">Pago</span>';
                        }

                        var linha = '<tr>' +
                            '<td>' + pedido.id + '</td>' +
                            '<td>' + pedido.user.name + '</td>' +
                            '<td>' + formatarCPF(pedido.user.cpf) + '</td>' +
                            '<td>' + formatarData(pedido.moment) + '</td>' +
                            '<td>' + formatarTelefone(pedido.user.phone) + '</td>' +
                            '<td>' + statusCor + '</td>' +
                            '<td>' + produtos + '</td>' +
                            '<td>' + formatarMoeda(total.toFixed(2)) + '</td>' +
                            '</tr>';

                        $("#resultados-table").append(linha);


                    });
                    }
                },

                error: function(xhr) {

                    if(xhr.status == 404){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: xhr.responseJSON.message
                        });

                         $("#codigo_compra").val("");

                        $("#resultados-table").html("");

                        var novoRegistro = '<tr>' +
                            '<td colspan="8"<span style="color: gray">' + xhr.responseJSON.message + '</span></td>' +
                            '</tr>';

                        $("#resultados-table").prepend(novoRegistro);
                    }
                    else if(xhr.status == 500){
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Erro no servidor'
                        });
                    }
                    else if(xhr.status == 422){
                        var message = '';
                        $.each(xhr.responseJSON.errors, function(campo, conteudo) {
                            message += conteudo;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: message
                        });
                          $("#codigo_compra").val("");

                        $("#resultados-table").html("");

                        var novoRegistro = '<tr>' +
                            '<td colspan="8"><span style="color: gray">' +message + '</span></td>' +
                            '</tr>';

                        $("#resultados-table").prepend(novoRegistro);
                    }
                }
                });
            }

            function formatarCPF(cpf) {
                cpf = cpf.replace(/\D/g, '');
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                return cpf;
            }

            function formatarData(data) {
                var d = new Date(data);
                var dia = String(d.getDate()).padStart(2, '0');
                var mes = String(d.getMonth() + 1).padStart(2, '0');
                var ano = d.getFullYear();
                var hora = String(d.getHours()).padStart(2, '0');
                var minuto = String(d.getMinutes()).padStart(2, '0');

                return dia + '/' + mes + '/' + ano + ' ' + hora + ':' + minuto;
            }

            function formatarTelefone(telefone) {
                telefone = telefone.replace(/\D/g, '');
                telefone = telefone.replace(/^(\d{2})(\d)/g, '($1) $2');
                telefone = telefone.replace(/(\d{5})(\d{4})$/, '$1-$2');
                return telefone;
            }

            function formatarMoeda(valor) {
                return parseFloat(valor).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                });
            }

    </script>
</body>
</html>
