@section('page.title', 'Registrar')

<div class="card">
    <div class="card-body p-4"> 
        <div class="text-center mt-2">
            <h5 class="text-primary">Bem vindo ao Inventory Handler!</h5>
            <p class="text-muted">Cadastre-se.</p>
        </div>
        <div class="p-2 mt-4">
            <form wire:submit.prevent="register">
                <div class="mb-3">
                    <label class="form-label" for="name">Nome</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Insira seu usuário">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input  type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Insira seu email">        
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Senha</label>
                    <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Insira sua senha">        
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Registrar</button>
                </div>
                <div class="mt-4 text-center">
                    <p class="mb-0">Já possui cadastro?
                        <a href="{{ route('login') }}" class="fw-medium text-primary">Acessar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>