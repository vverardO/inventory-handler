@section('head.title', 'Produtos | Cadastrar')
@section('page.title', 'Cadastrar um Produto')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label @error('product.name') is-invalid @enderror">Nome do Produto</label>
                    <div class="col-md-10">
                        <input class="form-control @error('product.name') is-invalid @enderror" placeholder="Caneta" wire:model="product.name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label @error('value') is-invalid @enderror">Valor (R$)</label>
                    <div class="col-md-10">
                        <input id="currency-mask" class="form-control @error('value') is-invalid @enderror" placeholder="1,00" wire:model="value">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label @error('product.minimum_amount') is-invalid @enderror">Quantidade de alerta</label>
                    <div class="col-md-10">
                        <input class="form-control @error('product.minimum_amount') is-invalid @enderror" placeholder="10" wire:model="product.minimum_amount">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary w-md">Atualizar</button>
                        <a href="{{route('products.index')}}" class="btn btn-danger w-md">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
<script src="/assets/libs/imask/imask.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Pattern (Phone)
        var currencyMask = IMask(document.getElementById('currency-mask'), {
            mask: 'num',
            blocks: {
            num: {
                    scale: 2,
                    mask: Number,
                    normalizeZeros: false,
                    thousandsSeparator: '.'
                }
            }
        });
    });
</script>
@endsection