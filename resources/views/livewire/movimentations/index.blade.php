@section('head.title', 'Movimentações | Listagem')
@section('page.title', 'Movimentações')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="search-box ms-2">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0" wire:model.debounce.500ms="search" placeholder="Buscar pelo nome da unidade, nome do produto, da movimentação quantidade ou nome do usuário">
                                <i class="mdi mdi-magnify search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-inline float-md-end mb-3">
                        <a href="{{route('movimentations.create')}}" class="btn btn-success waves-effect waves-light">
                            <i class="mdi mdi-plus me-2"></i> Realizar Movimentação
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-centered table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>De</th>
                            <th>Para</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Quando</th>
                            <th>Quem</th>
                            <th style="width: 100px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movimentations as $movimentation)
                        <tr>
                            <td>{{$movimentation->from->name}}</td>
                            <td>{{$movimentation->to->name}}</td>
                            <td>{{$movimentation->product->name}}</td>
                            <td>{{$movimentation->quantity}}</td>
                            <td>{{$movimentation->created_at->format('d/m/Y H:i:s')}}</td>
                            <td>{{$movimentation->user->name}}</td>
                            <td>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#" wire:click="destroy('Movimentation', {{$movimentation->id}})" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                    </li>
                                </ul>
                            </td>
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