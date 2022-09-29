@section('head.title', 'Saída de Produto | Cadastro')
@section('page.title', 'Realizar uma Saída de Produto')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Nome do Produto</label>
                    <div class="col-md-10">
                        <select class="form-select @error('productOutput.product_id') is-invalid @enderror" wire:model="productOutput.product_id">
                            <option>Selecione</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Nome da Unidade</label>
                    <div class="col-md-10">
                        <select class="form-select @error('productOutput.place_id') is-invalid @enderror" wire:model="productOutput.place_id">
                            <option>Selecione</option>
                            @foreach($places as $place)
                            <option value="{{$place->id}}">{{$place->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label @error('productOutput.quantity') is-invalid @enderror">Quantidade</label>
                    <div class="col-md-10">
                        <input class="form-control @error('productOutput.quantity') is-invalid @enderror" placeholder="1" wire:model="productOutput.quantity">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary w-md">Realizar Saída</button>
                        <a href="{{route('outputs.index')}}" class="btn btn-danger w-md">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
