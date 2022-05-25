<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 ">
                                <h2 style="font-size:12pt; margin-top:10px">Todos os Produtos</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.product.add') }}"
                                    class="btn btn-success pull-right">Adicionar Novo Produto</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Estoque</th>
                                    <th>Preço</th>
                                    <th>Categoria</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('assets/images/products/' . $product->getImage()) }}"
                                                width="60" alt="{{ $product->name }}" /></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock_status }}</td>
                                        <td>{{ $product->getPrice() }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href=""><i class="fa fa-edit fa-2x"></i></a>

                                            <a href="#"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links('layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
