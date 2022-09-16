@section('head.title', 'Dashboard')
@section('page.title', 'Dashboard')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="text-center mb-5">
            <h2>Dashboard</h2>
            <p class="text-muted mb-4" style="font-size: 25px;">Interface ainda não finalizada, ainda necessita definir os gráficos que vão ser apresentados aqui.</p>
        </div>
        @if(auth()->user()->mustEditProfile)
        <div class="text-center mb-5">
            <div class="alert alert-warning" role="alert">
                <h2>Acesso</h2>
                Pelo visto você está sem acesso aos menus, <a href="{{route("users.edit", auth()->user()->id)}}" class="alert-link">clique aqui</a> para alterar seus acessos.
            </div>
        </div>
        @endif
    </div>
</div>
