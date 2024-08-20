<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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
                        <a href="#" class="btn btn-danger mt-auto ">Adicionar ao carrinho <i class="fa-solid fa-cart-shopping">  </i></a> <
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</body>
</html>