<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <h2 style="font-size:12pt; margin-top:10px">Adicionar novo Produto</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">Todos os
                                    produtos</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <livewire:service.notification-component key="{{now()}}"/>
                        
                        <form class="form-horizontal" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nome do Produto</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nome do Produto" class="form-control input-md"
                                         required > <!-- autofocus wire:keyup="generateSlug" -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Slug do Produto</label>
                                <div class="col-md-4">
                                    <input id="slug" type="text" placeholder="Slug do Produto"
                                        class="form-control input-md"  required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Descição curta</label>
                                <div class="col-md-4">
                                    <textarea type="text" placeholder="Descição curta"
                                        class="form-control input-md"  required ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descição</label>
                                <div class="col-md-4">
                                    <textarea type="text" placeholder="Descição"
                                        class="form-control input-md"  required > </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Preço padrão</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Preço padrão" class="form-control input-md"
                                         required > 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Preço promorcional</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Preço promorcional" class="form-control input-md"
                                         required > 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md"
                                         required > 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status de estoque</label>
                                <div class="col-md-4">
                                    <select name="stock_status" class="form-control">
                                        <option value="in_stock">Disponível</option>
                                        <option value="out_of_stock">Indisponível</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Em destaque</label>
                                <div class="col-md-4">
                                    <select name="featured" class="form-control">
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantidade</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantidade" class="form-control input-md"
                                         required > 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Imagem do Produto</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Categoria</label>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option value="">Seleciona a Categoria</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->slug}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
