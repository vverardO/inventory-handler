@section('head.title', 'Usuários | Cadastro')
@section('page.title', 'Cadastro de Usuários')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mt-4 mt-xl-0">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Identificação </h5>
                            <div class="row">    
                                <div class="mb-3">
                                    <label class="form-label @error('user.name') is-invalid @enderror">Nome Completo</label>
                                    <input type="text" class="form-control @error('user.name') is-invalid @enderror" placeholder="fulano da silva" wire:model="user.name">
                                </div>
                            </div>
                            <div class="row">    
                                <div class="mb-3">
                                    <label class="form-label @error('user.email') is-invalid @enderror">Email</label>
                                    <input type="text" class="form-control @error('user.email') is-invalid @enderror" placeholder="fulano da silva" wire:model="user.email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-lg-auto">
                        <div class="mt-5 mt-xl-0">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Dados de acesso</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Senha</label>
                                        <input type="password" class="form-control" placeholder="*******" wire:model="user.password">
                                    </div>
                                </div>
                            </div>
                            <h5 class="font-size-14 mb-2">Níveis de Acesso</h5>
                            <div class="row @error('user.access_role_id') is-invalid @enderror">
                                <div class="col-md-5">
                                    <div>
                                        <div class="form-check mb-3">
                                            @php $role = $accessRoles->pop() @endphp
                                            <input class="form-check-input" type="radio" name="role" wire:model="user.access_role_id" value="{{$role->id}}">
                                            <label class="form-check-label">
                                                {{$role->title}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            @php $role = $accessRoles->pop() @endphp
                                            <input class="form-check-input" type="radio" name="role" wire:model="user.access_role_id" value="{{$role->id}}">
                                            <label class="form-check-label">
                                                {{$role->title}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <div>
                                        <div class="form-check mb-3">
                                            @php $role = $accessRoles->pop() @endphp
                                            <input class="form-check-input" type="radio" name="role" wire:model="user.access_role_id" value="{{$role->id}}">
                                            <label class="form-check-label">
                                                {{$role->title}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('user.access_role_id')
                                <span class="invalid-feedback mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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