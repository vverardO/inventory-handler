@section('head.title', 'Movimentações | Cadastro')
@section('page.title', 'Realizar uma Movimentação')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label @error('movimentation.product_id') is-invalid @enderror">Produto</label>
                        <select class="form-select" wire:model="movimentation.product_id" wire:change="$emit('productChanged')">
                            <option>Selecione</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label @error('movimentation.quantity') is-invalid @enderror">Quantidade</label>
                        <input type="text" class="form-control @error('movimentation.quantity') is-invalid @enderror" wire:model="movimentation.quantity">
                        @error('movimentation.quantity')
                            <span class="invalid-feedback mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label @error('movimentation.place_from_id') is-invalid @enderror">Local de Saída</label>
                        <select class="form-select" wire:model="movimentation.place_from_id" wire:change="$emit('placeFromChanged')">
                            <option>Selecione</option>
                            @foreach($placesFrom as $place)
                            <option value="{{$place->id}}">{{$place->name}}</option>
                            @endforeach
                        </select>
                        <div class="mt-4">
                            <h5 class="font-size-15 mb-1">Quantidade no local {{$movimentation->from?->name}}:</h5>
                            <p>{{$placeFromProductQuantity}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-6">
                            <label class="form-label @error('movimentation.place_to_id') is-invalid @enderror">Local de Entrada</label>
                            <select class="form-select" wire:model="movimentation.place_to_id" wire:change="$emit('placeToChanged')">
                                <option>Selecione</option>
                                @foreach($placesTo as $place)
                                <option value="{{$place->id}}">{{$place->name}}</option>
                                @endforeach
                            </select>
                            <div class="mt-4">
                                <h5 class="font-size-15 mb-1">Quantidade no local {{$movimentation->to?->name}}:</h5>
                                <p>{{$placeToProductQuantity}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                            <a href="{{route('users.index')}}" class="btn btn-danger w-md">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>