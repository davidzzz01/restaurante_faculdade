<div class="container mt-5">
    <h2 class="mb-4">Seu Carrinho</h2>

    @if(session('carrinho') && count(session('carrinho')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('carrinho') as $id => $item)
                    @php
                        $subtotal = $item['preco'] * $item['quantidade'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['nome'] }}</td>
                        <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                        <td>{{ $item['quantidade'] }}</td>
                        <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                        <td>
                           <a href="{{ route('carrinho.remover', $id) }}" class="btn btn-danger btn-sm">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
            <h4>Total: R$ {{ number_format($total, 2, ',', '.') }}</h4>
            <form action="{{ route('pedido.finalizar') }}" method="POST"> 
                @csrf
                <button type="submit" class="btn btn-success">Finalizar Pedido</button>
            </form>
        </div>
    @else
        <div class="alert alert-info">
            Seu carrinho está vazio.
        </div>
    @endif
</div>