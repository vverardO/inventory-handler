@section('head.title', 'Unidades | Listagem')
@section('page.title', 'Unidades')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="search-box ms-2">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0" wire:model.debounce.500ms="search" placeholder="Buscar por nome">
                                <i class="mdi mdi-magnify search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-inline float-md-end mb-3">
                        <a href="" class="btn btn-success waves-effect waves-light">
                            <i class="mdi mdi-plus me-2"></i> Nova Unidade
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-centered table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th style="width: 100px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($places as $place)
                        <tr>
                            <td>{{$place->name}}</td>
                            <td>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="" class="px-2 text-primary"><i class="bx bx-pencil font-size-18"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" wire:click="destroy('Place', {{$place->id}})" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" align="center">Nenhuma informação a ser apresentada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>