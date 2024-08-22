
<body>
    <h1>Olá, bem vindo</h1>

    <div class="container">
        <div class="row">
            @foreach ($itens as $item)
            <div class="col-md-3 d-flex align-items-stretch"> 
                <div class="card mb-4" style="width: 18rem;">
                    <img src="{{ $item->imagem ? asset('storage/' . $item->imagem) : 'https://cdn.awsli.com.br/production/static/img/produto-sem-imagem.gif' }}" class="card-img-top" alt="Imagem do produto" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->nome }}</h5>
                        <p class="card-text">{{ $item->descricao }}</p>
                        <h3 class="card-text">R${{ $item->preco }}</h3>

                        <form action="{{ route('carrinho.adicionar', $item->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-danger">Adicionar ao carrinho <i class="fa-solid fa-cart-shopping"></i></button>
                        </form>
                        <a href="{{ route('carrinho.exibir') }}" class="btn btn-primary mb-4">Ver Carrinho</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
