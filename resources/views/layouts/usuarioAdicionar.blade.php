<!-- Modal -->
<div class="modal fade" id="adicionarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style='border-radius:20px'>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            @if(Auth::check())
                {{ Auth::user()->name }}
            @endif
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('adicionar.usuario') }}" method='POST' >
            {{ csrf_field() }}

            <div class="modal-body">
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control" name='name' placeholder="Digite um nome" id="nomeInput" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name='email' placeholder="Digite um email" id="emailInput" required>
                </div>
                <div class="form-group">
                    <label for="Senha">Senha</label>
                    <input type="password" class="form-control" name='password' height=500 id="senhaInput" placeholder="Digite uma senha" required>
                </div>                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>

        </div>
    </div>
</div>
