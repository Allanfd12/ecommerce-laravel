<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <h2 style="font-size:12pt; margin-top:10px">Editar Categoria</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">Todas as
                                    categorias</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                       
                        <livewire:service.notification-component key="{{now()}}"/>

                        <form class="form-horizontal" wire:submit.prevent="update">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nome da Categoria</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nome da Categoria" class="form-control input-md"
                                        wire:model="name" required autofocus wire:keyup="generateSlug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_slug" class="col-md-4 control-label">Slug da Categoria</label>
                                <div class="col-md-4">
                                    <input id="new_slug" type="text" placeholder="Slug da Categoria"
                                        class="form-control input-md" wire:model="new_slug" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
