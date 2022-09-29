@section('head.title', 'Movimentações | Cadastro')
@section('page.title', 'Realizar uma Movimentação')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Nome do Produto</label>
                    <div class="col-md-10">
                        <select class="form-select @error('movimentation.product_id') is-invalid @enderror" wire:model="movimentation.product_id" wire:change="$emit('productChanged')">
                            <option>Selecione</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label @error('movimentation.quantity') is-invalid @enderror">Quantidade</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('movimentation.quantity') is-invalid @enderror" wire:model="movimentation.quantity">
                        @error('movimentation.quantity')
                            <span class="invalid-feedback mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Local de Saída</label>
                    <div class="col-md-10">
                        <select class="form-select @error('movimentation.place_from_id') is-invalid @enderror" wire:model="movimentation.place_from_id" wire:change="$emit('placeFromChanged')">
                            <option>Selecione</option>
                            @foreach($placesFrom as $place)
                            <option value="{{$place->id}}">{{$place->name}}</option>
                            @endforeach
                        </select>
                        @if($placeFromProductQuantity)
                        <div class="mt-4">
                            <h5 class="font-size-15 mb-1">Quantidade no local {{$movimentation->from?->name}}:</h5>
                            <p>{{$placeFromProductQuantity}}</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Local de Entrada</label>
                    <div class="col-md-10">
                        <select class="form-select @error('movimentation.place_to_id') is-invalid @enderror" wire:model="movimentation.place_to_id" wire:change="$emit('placeToChanged')">
                                <option>Selecione</option>
                                @foreach($placesTo as $place)
                                <option value="{{$place->id}}">{{$place->name}}</option>
                                @endforeach
                            </select>
                            @if($placeToProductQuantity)
                            <div class="mt-4">
                                <h5 class="font-size-15 mb-1">Quantidade no local {{$movimentation->to?->name}}:</h5>
                                <p>{{$placeToProductQuantity}}</p>
                            </div>
                            @endif
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                        <a href="{{route('movimentations.index')}}" class="btn btn-danger w-md">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>