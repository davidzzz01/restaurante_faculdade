
    <h1 class="text-center mb-4">Olá, este é nosso dashboard</h1>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <th scope="row">{{ $pedido->pedido_id }}</th>
                        <td>{{ $pedido->nome_cliente }}</td>
                        <td>{{ $pedido->nome_item }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>{{ date('d-m-Y', strtotime($pedido->item_create_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
</body>
</html>
