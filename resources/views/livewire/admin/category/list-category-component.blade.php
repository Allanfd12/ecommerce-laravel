<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 ">
                                <h2 style="font-size:12pt; margin-top:10px">Todas as Categorias</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.category.add') }}"
                                    class="btn btn-success pull-right">Adicionar Nova Categoria</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="{{route('admin.category.edit',['slug'=>$category->slug])}}" ><i class="fa fa-edit fa-2x"></i></a>
                                            
                                            <a href="" ><i class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $categories->links('layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
