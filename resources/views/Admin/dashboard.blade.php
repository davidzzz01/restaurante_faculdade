
    <h1 class="text-center mb-4">Dashboard</h1>

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
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <th scope="row">{{ $pedido->pedido_id }}</th>
                        <td>{{ $pedido->nome_cliente }}</td>
                        <td>{{ $pedido->nome_item }}</td>
                        <td class="text-right">R${{ number_format($pedido->total, 2, ',', '.')}}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>{{ date('d-m-Y', strtotime($pedido->item_create_at)) }}</td>
                        <td>
                            <form action="{{ route('update', ['id' => $pedido->pedido_id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status">
                                    <option value="solicitado" {{ $pedido->status == 'solicitado' ? 'selected' : 'pendente' }}>Solicitado</option>
                                    <option value="finalizado" {{ $pedido->status == 'finalizado' ? 'selected' : 'pendente' }}>Finalizado</option>
                                </select>
                                <button type="submit">Atualizar Status</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
</body>
</html>
