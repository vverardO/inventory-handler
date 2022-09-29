@section('head.title', 'Unidades | Cadastro')
@section('page.title', 'Cadastro de uma Unidade')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label @error('place.name') is-invalid @enderror">Nome da Unidade</label>
                    <div class="col-md-10">
                        <input class="form-control @error('place.name') is-invalid @enderror" placeholder="Galpão I" wire:model="place.name">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                        <a href="{{route('places.index')}}" class="btn btn-danger w-md">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>