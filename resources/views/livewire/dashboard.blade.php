@section('head.title', 'Dashboard')
@section('page.title', 'Dashboard')

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success alert-label-icon label-arrow" role="alert">
                            <i class="fas fa-download label-icon"></i><strong>Entradas</strong> - {{$newEntries}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger alert-label-icon label-arrow" role="alert">
                            <i class="fas fa-upload label-icon"></i><strong>Saídas</strong> - {{$newOutputs}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-primary alert-label-icon label-arrow" role="alert">
                            <i class="fas fa-box-open label-icon"></i><strong>Produtos Novos</strong> - {{$newProducts}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-primary alert-label-icon label-arrow" role="alert">
                            <i class="fas fa-exchange-alt label-icon"></i><strong>Movimentações</strong> - {{$newMovimentations}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center">
                    <h5 class="card-title mb-0">Produtos com a quantidade crítica</h5>
                </div>
            </div>
            <div class="card-body pt-xl-1">
                <div class="table-responsive">
                    <table class="table table-striped table-centered align-middle table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Local</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($warningProducts as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->place}}</td>
                                <td>{{$product->quantity}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" align="center">Nenhuma informação a ser apresentada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center">
                    <h5 class="card-title mb-0">Top 5 maiores movimentações</h5>
                </div>
            </div>
            <div class="card-body pt-xl-1">
                <div class="table-responsive">
                    <table class="table table-striped table-centered align-middle table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Quantidade</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($largestMovimentations as $movimentation)
                            <tr>
                                <td>{{$movimentation->name}}</td>
                                <td>{{$movimentation->quantity}}</td>
                                <td>{{$movimentation->user}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">Nenhuma informação a ser apresentada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>