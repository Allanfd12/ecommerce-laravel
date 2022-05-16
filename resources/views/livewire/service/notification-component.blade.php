<div>
    @if(Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
        <strong>Erro</strong> {{ Session::get('error_message') }}
    </div>
    @endif
    @if (Session::has('success_message'))
    <div class="alert alert-success">
        <strong>Sucesso</strong> {{Session::get('success_message')}}
    </div>
    @endif
</div>
