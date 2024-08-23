
<x-NavBar/>
    <h1 class="text-center mb-4 mt-2">Dashboard</h1>

    <div class="container">
        <table class="table table-hover table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col" style="width: 160px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td scope="row">{{ $pedido->pedido_id }}</td>
                        <td>{{ $pedido->nome_cliente }}</td>
                        <td>{{ $pedido->nome_item }}</td>
                        <td class="text-right">R${{ number_format($pedido->total, 2, ',', '.') }}</td>
                        <td class ="text-center" style="text-transform: uppercase;">{{ $pedido->status }}</td>
                        <td class ="text-center" style="width: 120px;">{{ date('d-m-Y', strtotime($pedido->item_create_at)) }}</td>
                        <td class="d-flex" style="width: 170px;">
                            <form action="{{ route('update', ['id' => $pedido->pedido_id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select">
                                    <option value="solicitado" {{ $pedido->status == 'solicitado' ? 'selected' : '' }}>Solicitado</option>
                                    <option value="finalizado" {{ $pedido->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                                </select>
                                <button type="submit"style="color:limegreen; border:0; font-size:22px;cursor:pointer;" ><i class="fa-solid fa-check" ></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-danger text-white">
                <tr>
                    <td colspan="6" class="text-left">TOTAL:</td>
                    <td colspan="1" class="text-right">
                        R$ {{$totalGeralFormatado}}
                    </td>
                </tr>
            </tfoot>
        </table>
        
    </div>
<x-Footer/>
   
</body>
</html>
<style>
 
 th{
    background-color: #dc3545;
    color: white;
 text-align: center;
}



</style>