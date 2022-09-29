@section('head.title', 'Entrada de Produto | Listagem')
@section('page.title', 'Entradas de Produtos')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="search-box ms-2">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0" wire:model.debounce.500ms="search" placeholder="Buscar pelo nome do usuário, email do usuário, nome do produto, nome da unidade ou quantidade">
                                <i class="mdi mdi-magnify search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-inline float-md-end mb-3">
                        <a href="{{route('entries.create')}}" class="btn btn-success waves-effect waves-light">
                            <i class="mdi mdi-plus me-2"></i> Entrada de Produto
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-centered table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Usuário</th>
                            <th>Produto</th>
                            <th>Unidade</th>
                            <th>Quantidade</th>
                            <th style="width: 100px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entries as $entry)
                        <tr>
                            <td>{{$entry->user->name}}</td>
                            <td>{{$entry->product->name}}</td>
                            <td>{{$entry->place->name}}</td>
                            <td>{{$entry->quantity}}</td>
                            <td>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#" wire:click="destroy('ProductEntry', {{$entry->id}})" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" align="center">Nenhuma informação a ser apresentada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>